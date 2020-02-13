<?php

require_once './controller/home.controller.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

#ROUTES
$app->get('/', function(){
    $render = indexController::index();
    echo $render;
});

$app->get('/nueva-nota/',function(){
    $render = notaController::NuevaNota();
    echo $render;
});

#POST
$app->post('/publicar/',function(){
    var_dump($_POST);
    exit;
    $render = notaController::NuevaNota();
    echo $render;
});

$app->run();

?>