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
	'view' => new \Slim\Views\Twig()
));

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
		move_uploaded_file($_FILES['csv-file']['tmp_name'], $new_upload);
		$app->redirect('/ecommerce-products-import/step2');
    } else {
		$app->render('step1.php'); 
	}    
})->via('GET','POST');

$app->map('/step2', function () use ($app) {
    if($app->request()->isPost()) {
		//print_r($_FILES);
		$filename = $_FILES['csv-file']['name'];
		$new_upload = 'files/' . $filename;
		move_uploaded_file($_FILES['csv-file']['tmp_name'], $new_upload);
		$app->redirect('/step2');
    } else {
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
		$app->render('step2.php', array('csv_mapping' => $csv_mapping)); 
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