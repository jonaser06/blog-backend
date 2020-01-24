<?php

require_once './controller/home.controller.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/','index');

function index(){
    $render = indexController::index();
    echo $render;
}


$app->run();

?>