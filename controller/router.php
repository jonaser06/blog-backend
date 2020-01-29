<?php

require_once './controller/home.controller.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

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