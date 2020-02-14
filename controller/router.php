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

    if(isset($_POST['title']) && isset($_POST['bajada']) && isset($_POST['url']) && isset($_POST['tag']) && isset($_POST['contenido']) ):
        $compacto = new stdClass();
        $compacto->title        = $_POST['title'];
        $compacto->bajada       = $_POST['bajada'];
        $compacto->url          = $_POST['url'];
        $compacto->tag          = $_POST['tag'];
        $compacto->contenido    = $_POST['contenido'];

        echo json_encode($compacto);
    else:
        echo 'rellene todo los campos!';
    endif;
});

$app->run();

?>