<?php
/*
 * Copyright (c) 2013 Todor Georgiev under GPL v2
 * See the file LICENSE for copying permission.
 * http://choosealicense.com/licenses/gpl-v2/
 */

require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'debug' => true,	
	'templates.path' => './views',
	//'log.level' => 4,
    //'log.enabled' => true,
    //'log.writer' => new \Slim\Extras\Log\DateTimeFileWriter(array(
    //    'path' => '../logs',
    //    'name_format' => 'y-m-d'
    //)),
	'view' => new \Slim\Views\Twig(),
	'cookies.lifetime' => '20 minutes',
	'cookies.encrypt' => false
));

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));

//$app->view->setTemplatesDirectory("/path/to/templates");
$app->view()->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache',
	'charset' => 'utf-8',
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);

$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);


// GET route
$app->get( '/', function () use ($app) {
	
	//copyRemote("http://85.14.28.164/d/images/slideshows/0000053031-middle.jpg", 'files/test.jpg');
	//$pageTitle = 'hello world';
    //$body = 'sup world';

	
    //$app->view()->setData(array('title' => $pageTitle, 'body' => $body));
    $app->render('step1.php');
	//$app->render('../views/index.php', array('title' => 'Sahara'));
});

$app->map('/step1', function () use ($app) { 
    if($app->request()->isPost()) {
		//print_r($_FILES);
		$filename = $_FILES['csv-file']['name'];
		$new_upload = 'files/' . $filename;
		if(move_uploaded_file($_FILES['csv-file']['tmp_name'], $new_upload)) {
			$_SESSION['csv-file'] = $filename;
			$app->flash('message','File uploaded!');
			$app->redirect('./step2');
		} else {
			$app->flash('errors', 'unable to upload file');
			$app->render('step1.php');
		}
    } else {
		$app->render('step1.php');
	}    
})->via('GET','POST');

$app->map('/step2', function () use ($app) {
	$csv_mapping = array(
			'ProductCode',
			'ManufacturerName',
			'CategoryName',
			'CategoryBranch',
			'ProductIsActive',
			'ProductName',
			'ProductDescription',
			'ProductDescriptionXHTML',
			'ProductDetailedDescription',
			'ProductDetailedDescriptionXHTML',
			'ProductPrice',
			'ProductWeight',
			'ProductQuantity',
			'ProductIsEgood',
			'ProductClassName'
		);

    if($app->request()->isPost()) {
		//print_r($_FILES);
		$filename = $_SESSION['csv-file'];
		
		$csv_mapping_user = array_flip($csv_mapping);
		foreach($csv_mapping_user as $key => $column) {
			$csv_mapping_user[$key] = $_POST[$key];
		}
		//var_dump($csv_mapping_user);
		
		$csv = parseCSV('files/'.$_SESSION['csv-file']);
		
		$csv_ordered = array();
		
		foreach ($csv as $num => $line) {
			foreach ($csv_mapping_user as $column => $value) {
				if($line[$value-1]) {
					$csv_ordered[$num][$column] =  $line[$value-1];
				}
			}
		}
		
		
		//var_dump($csv_ordered);
		$dir = "./files/".pathinfo($filename, PATHINFO_FILENAME);
		var_dump($dir);
		if(!is_dir($dir)) { mkdir( $dir ); }
		
		$fp = fopen($dir.'/'.$filename, 'w');

		foreach ($csv_ordered as $fields) {
			fputcsv($fp, $fields);
		}

		fclose($fp);
		
		//$test = addzip (dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME) , dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME).".zip" );
		//var_dump($test);
		
		/* Export zip file */
		$zipname = pathinfo($filename, PATHINFO_FILENAME).'.zip';
		$file = tempnam("tmp", "zip");
		$zip = new ZipArchive;
		$path = "./files/".$zipname;
		//var_dump($path);
		if (!$zip->open($file, ZIPARCHIVE::OVERWRITE))
			die("Failed to create archive\n");
		//$zip->open('files/'.$zipname, ZipArchive::CREATE);
		if ($handle = opendir(dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME))) {
		  while (false !== ($entry = readdir($handle))) {
		  //var_dump($entry);
			if ($entry != "." && $entry != "..") {
				$zip->addFile($entry);
			}
		  }
		  closedir($handle);
		}

		$zip->close();
//var_dump(dirname(__FILE__));
		$app->response->headers->set('Content-Type', 'application/zip');
		$app->response->headers->set('Content-Length', filesize($file));
		$app->response->headers->set('Content-Disposition', 'attachment; filename="'.$file.'"');
		readfile($file); 

		unlink($file); 
		
		//$app->response->headers->set('Location', $zipname);
		
		//header('Content-Type: application/zip');
		//header("Content-Disposition: attachment; filename='".$zipname."'");
		//header('Content-Length: ' . filesize($zipname));
		//header("Location: ".$zipname);
		
		
    } else {
		//var_dump($_SESSION);
		$csv = parseCSV('files/'.$_SESSION['csv-file']);
		
		$csv_uploaded_columns = $csv[0];
		array_unshift($csv_uploaded_columns, "N/A");
		
		$app->render('step2.php', array('csv_mapping' => $csv_mapping, 'csv_uploaded_columns' => $csv_uploaded_columns, $flash)); 
	}    
})->via('GET','POST');


// POST route
/*$app->post( '/step1', function () use ($app) {
		$req = $app->request;
		$file = $req->getMediaType();
		$app->view()->setData(array('title' => 'This is a POST route', 'body' => $file));
		$app->render('step2.php');
});*/

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

$app->run();

function copyRemote($fromUrl, $toFile) {
    try {
        $client = new Guzzle\Http\Client();
        $response = $client->get($fromUrl)
            //->setAuth('login', 'password'))
            ->setResponseBody($toFile)
            ->send();
        return true;
    } catch (Exception $e) {
        // Log the error or something
        return false;
    }
}

function parseCSV($file_path) {
	$csv = array();
		
		if(($handle = fopen($file_path, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);
			$nn = 0;

			//while (($data = fgetcsv($temp)) !== false) {
            while(($data = fgetcsv($handle, 0, ';','"')) !== FALSE) {
                //$csv[] = $data;
				// Count the total keys in the row.
				$c = count($data);
				// Populate the multidimensional array.
				for ($x=0;$x<$c;$x++)
				{
					$csv[$nn][$x] = $data[$x];
				}
				$nn++;
            }
            fclose($handle);
        }
	return $csv;
}

// compress all files in the source directory to destination directory 
    function addzip($source , $destination)
    {
          function list_directory( $source)
              {
                if (is_dir($source))
                {
                    $files = dir($source);

                        $i = 0 ;
                      while ( FALSE !== ($entry = $files->read())) 
                      {
                        if ( $entry != '.' && $entry != '..' )
                        {
                          $filename[$i] = $source.$entry;
                          $i++;
                        }
                       }
                      $files->close();
                      return ($filename);
                  }

              }
        function create_zip($files = array(),$dest = '',$overwrite = false) {
            if(file_exists($dest) && !$overwrite) { return false; }
            $valid_files = array();
            if(is_array($files)) {
                foreach($files as $file) {
                    if(file_exists($file)) {
                        $valid_files[] = $file;
                    }
                }
            }
            if(count($valid_files)) {
                $zip = new ZipArchive();
                if($zip->open($dest,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                    return false;
                }
                foreach($valid_files as $file) {
                    $zip->addFile($file,$file);
                }               
                $zip->close();              
                return file_exists($dest);
            }
            else
            {
                return false;
            }
        }
        $files_to_zip = list_directory($source);
        $result = create_zip($files_to_zip,$destination);
    }