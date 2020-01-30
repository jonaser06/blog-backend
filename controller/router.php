<?php

require_once './controller/home.controller.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

#API
$app->post('/api/generate_url/','generate_url');
$app->post('/api/post/','post');

function generate_url(){
    $request = \Slim\Slim::getInstance()->request();
    $getbody = json_decode($request->getBody());
    $url = $getbody->url;
    ApiController::generateUrl($url);
}

function post(){
    var_dump($_POST);
}

#ROUTES
$app->get('/','index');
$app->get('/nueva-nota/','nuevanota');

function index(){
    $render = indexController::index();
    echo $render;
}

function nuevanota(){
    $render = notaController::NuevaNota();
    echo $render;
}



$app->run();

?>