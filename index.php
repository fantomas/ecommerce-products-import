<?php

/*
 * Copyright (c) 2013 Todor Georgiev under GPL v2
 * See the file LICENSE for copying permission.
 * http://choosealicense.com/licenses/gpl-v2/
 */

ini_set('memory_limit', '256M'); // memory_limit 256M
set_time_limit(60); // max_execution_time 60 sec

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

$app->view->setTemplatesDirectory($app->config('templates.path')); // https://github.com/codeguy/Slim-Views/issues/2#issuecomment-22371934
$app->view()->getEnvironment()->addGlobal('baseUrl', 'http://nutrapress.com/ecommerce-products-import/');


// GET route
$app->get('/', function () use ($app) {

    //copyRemote("http://85.14.28.164/d/images/slideshows/0000053031-middle.jpg", 'files/test.jpg');
    //$pageTitle = 'hello world';
    //$body = 'sup world';
    //$app->view()->setData(array('title' => $pageTitle, 'body' => $body));
    $app->render('step1.php');
    //$app->render('../views/index.php', array('title' => 'Sahara'));
});

$app->map('/step1', function () use ($app) {
    if ($app->request()->isPost()) {
        //print_r($_FILES);
        $filename = $_FILES['csv-file']['name'];
        $new_upload = 'files/' . $filename;
        if (move_uploaded_file($_FILES['csv-file']['tmp_name'], $new_upload)) {
            $_SESSION['csv-file'] = $filename;
            $app->flash('message', 'File uploaded!');
            $app->redirect('./step2');
        } else {
            $app->flash('errors', 'unable to upload file');
            $app->render('step1.php');
        }
    } else {
        $app->render('step1.php');
    }
})->via('GET', 'POST');

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
        'ProductClassName',
        'ProductMainImage',
        'ProductImages',
    );

    if ($app->request()->isPost()) {
        $filename = $_SESSION['csv-file'];
        $code = pathinfo($filename, PATHINFO_FILENAME);

        $csv_mapping_user = array_flip($csv_mapping);
        foreach ($csv_mapping_user as $key => $column) {
            $csv_mapping_user[$key] = (isset($_POST[$key]) AND !empty($_POST[$key])) ? $_POST[$key] : false;
        }
        //var_dump($csv_mapping_user);

        $csv = parseCSV('files/' . $_SESSION['csv-file']);

        $csv_ordered = array();
        //var_dump($csv_mapping_user);
        array_shift($csv);

        $dir = "./files/" . $code;
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        $image_queue = array();
        $k = 0;
		
        foreach ($csv as $num => $line) {
            foreach ($csv_mapping_user as $column => $value) {
                switch ($column) {
                    case 'ProductCode':
                        $sku = $line[$value - 1];
                        if (isset($line[$value - 1]) AND !empty($line[$value - 1])) {
                            $csv_ordered[$num][$column] = $line[$value - 1];
                        }
                        break;
                    case 'ProductMainImage':
                        if ($line[$value - 1]) {
                            //echo 'from: '.$line[$value-1].' to: '.'files/'.$code.'/'.$line[0].'.'.pathinfo($line[$value-1], PATHINFO_EXTENSION).'<br />';
                            $image_queue[$k]['from'] = $line[$value - 1];
                            $image_queue[$k]['dest'] = 'files/' . $code . '/' . $sku . '.' . pathinfo($line[$value - 1], PATHINFO_EXTENSION);
                            //copyRemote($line[$value - 1], 'files/' . $code . '/' . $sku . '.' . pathinfo($line[$value - 1], PATHINFO_EXTENSION)); // TODO add queue
                            $k++;
                        }
                        break;
					case 'CategoryName': //enclose CategoryName with "" in order to work properly for summercart version 4
						if (isset($line[$value - 1]) AND !empty($line[$value - 1])) {
                            $csv_ordered[$num][$column] = '"'.$line[$value - 1].'"';
                        }
						break;
					case 'ProductDetailedDescription': //strip tags from ProductDetailedDescription as they are not allowed in version 4
						if (isset($line[$value - 1]) AND !empty($line[$value - 1])) {
                            $csv_ordered[$num][$column] = strip_tags($line[$value - 1]);
                        }
						break;
                    default:
                        if (isset($line[$value - 1]) AND !empty($line[$value - 1])) {
                            $csv_ordered[$num][$column] = $line[$value - 1];
                        }
                        break;
                }
            }
        }
        //die();
		$csv_headers = array();
		foreach ($csv_mapping_user as $key => $value) {
			if($value AND $key!='ProductMainImage') {
				$csv_headers[] = $key;
			}
		}

		array_unshift($csv_ordered, $csv_headers);
        // Creates summercart ready csv
        $fp = fopen($dir . '/' . $filename, 'w');
		//$j = 0;
        foreach ($csv_ordered as $fields) {
			/*if($j == 1) {
				array_walk($fields, 'encodeCSV');
				$test = mb_detect_encoding($fields[0]);
				var_dump($test);
			}
			$j++;*/
			//array_walk($fields, 'encodeCSV');
            fputcsv($fp, $fields);
        }
        fclose($fp);
        //die();
        // Creates temp file for image downloads
        $fp = fopen($dir . '/image_queue.csv', 'w');
        foreach ($image_queue as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);

        //$test = addzip (dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME) , dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME).".zip" );
        //var_dump($test);

        $app->redirect('./download/'.base64_encode($code));
    } else {
        //var_dump($_SESSION);
        $csv = parseCSV('files/' . $_SESSION['csv-file']);

        $csv_uploaded_columns = (isset($csv[0])) ? $csv[0] : array();
        array_unshift($csv_uploaded_columns, "N/A");

        $app->render('step2.php', array('csv_mapping' => $csv_mapping, 'csv_uploaded_columns' => $csv_uploaded_columns));
    }
})->via('GET', 'POST');

$app->map('/download/:code_b64', function ($code_b64) use ($app) {
    $code = base64_decode($code_b64);
    $images_downloaded = 0;
    $images_todownload = 0;
    $message = false;
    $zip_file = false;
    if(is_file('files/'.$code.'/image_queue.csv')) {
        // Reads image queue file
        $image_queue = array();
        $i = 0;
        if (($handle = fopen('files/'.$code.'/image_queue.csv', "r+")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                //$num = count($data);
                //echo "<p> $num fields in line $row: <br /></p>\n";
                $image_queue[$i]['from'] = $data[0];
                $image_queue[$i]['to'] = $data[1];
                //var_dump($data);
                /*foreach ($data as $value) {
                    echo $value . "<br />\n";
                }*/
                //for ($c=0; $c < $num; $c++) {
                  //  echo $data[$c] . "<br />\n";
                //}
                $i++;
            }
            fclose($handle);
            
            $active_part = array_slice($image_queue, 0, 100);
            $rest_part = array_slice($image_queue, 100);
            //var_dump("active part: ", count($active_part));
            //var_dump("rest part: ", count($rest_part));
            if(is_array($active_part) AND !empty($active_part)) {
                foreach ($active_part as $value) {
                    copyRemote($value['from'], $value['to']);
                }
                //rewind($handle);
                if(count($rest_part) > 0) {
                    $handle2 = fopen('files/'.$code.'/image_queue.csv', "w");
                    foreach ($rest_part as $fields) {
                        fputcsv($handle2, $fields);
                    }
                    fclose($handle2);
                } else {
                    unlink('files/'.$code.'/image_queue.csv');
                }
                $images_todownload = count($rest_part);
                $images_downloaded = count(scandir('files/' . $code)) - 3;
            }
            
        }
        //$csv = parseCSV('files/'.$code.'/image_queue.csv');
        //var_dump($csv);
    } else {
        $message = ": Done";
                if (is_dir('files/' . $code)) {
                    $images_downloaded = count(scandir('files/' . $code)) - 3;

                    /* Export zip file */
                    $filename = $_SESSION['csv-file'];
                    $zip = new ZipArchive;
                    if (!$zip->open(dirname(__FILE__) . '/files/' . $code . '.zip', ZipArchive::CREATE)) {
                        die("Failed to create archive\n");
                    }
                    $handle = opendir(dirname(__FILE__) . '/files/' . $code);
                    if ($handle) {
                        while (false !== ($entry = readdir($handle))) {
                            //var_dump($entry);
                            if ($entry != "." && $entry != "..") {
                                //var_dump('adding file: '.dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME).'/'.$entry,$zip->addFile(dirname(__FILE__).'/files/'.pathinfo($filename, PATHINFO_FILENAME).'/'.$entry,$entry));
                                $zip->addFile(dirname(__FILE__) . '/files/' . pathinfo($filename, PATHINFO_FILENAME) . '/' . $entry, $entry);
                            }
                        }
                        closedir($handle);
                    } else {
                        die("Failed to add dir\n");
                    }
                    //var_dump($zip->status,$zip->statusSys, $zip->filename, $zip->numFiles);
                    //var_dump('zip close: ',$zip->close());
                    if ($zip->close()) {
                        $zip_file = '../files/' . $code . '.zip';
                        //$app->response->headers->set('Content-Type', 'application/zip');
                        //$app->response->headers->set('Content-Length', filesize(dirname(__FILE__) . '/files/' . $code . '.zip'));
                        //$app->response->headers->set('Content-Disposition', 'attachment; filename="' . $code . '.zip' . '"');
                        //readfile(dirname(__FILE__) . '/files/' . $code . '.zip');

                        //unlink(dirname(__FILE__).'/files/'.$code.'.zip');		
                        //$app->response->headers->set('Location', $code.'.zip');
                    }
                }
            }
    
    
    //copyRemote("http://85.14.28.164/d/images/slideshows/0000053031-middle.jpg", 'files/test.jpg');
    //$pageTitle = 'hello world';
    //$body = 'sup world';
    //$app->view()->setData(array('title' => $pageTitle, 'body' => $body));
    $app->render('download.php', array('message' => $message, 'code' => $code, 'images_downloaded' => $images_downloaded, 'images_todownload' => $images_todownload, 'zip_file' => $zip_file));
    //$app->render('../views/index.php', array('title' => 'Sahara'));
})->via('GET');


// POST route
/* $app->post( '/step1', function () use ($app) {
  $req = $app->request;
  $file = $req->getMediaType();
  $app->view()->setData(array('title' => 'This is a POST route', 'body' => $file));
  $app->render('step2.php');
  }); */

// PUT route
$app->put(
        '/put', function () {
    echo 'This is a PUT route';
}
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
        '/delete', function () {
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

    if (($handle = fopen($file_path, 'r')) !== FALSE) {
        // necessary if a large csv file
        set_time_limit(0);
        $nn = 0;

        //while (($data = fgetcsv($temp)) !== false) {
        while (($data = fgetcsv($handle, 0, ';', '"')) !== FALSE) {
            //$csv[] = $data;
            // Count the total keys in the row.
            $c = count($data);
            // Populate the multidimensional array.
            for ($x = 0; $x < $c; $x++) {
                $csv[$nn][$x] = $data[$x];
            }
            $nn++;
        }
        fclose($handle);
    }
    return $csv;
}

function encodeCSV(&$value, $key){
    $value = iconv('ASCII', 'UTF-8', $value);
}

function detect_encoding($string) {  
  static $list = array('utf-8', 'windows-1251', 'ISO-8859-1', 'ASCII');
  
  foreach ($list as $item) {
    $sample = iconv($item, $item, $string);
    if (md5($sample) == md5($string))
      return $item;
  }
  return null;
}
