<?php

require_once './controller/home.controller.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

#ROUTES
$app->get('/', function(){
    $render = new indexController(); 
    $render->index();
});

$app->get('/nueva-nota/',function(){
    $render = new notaController(); 
    $render->NuevaNota();
});

$app->get('/categorias/',function(){
    $render = new categoriasController(); 
    $render->Categorias();
});

#POST
$app->post('/publicar/',function(){
    header('Content-Type: application/json');
    if(isset($_POST['title']) && isset($_POST['bajada']) && isset($_POST['url']) && isset($_POST['tag']) && isset($_POST['contenido']) ):
        $compacto = new stdClass();
        $compacto->title        = $_POST['title'];
        $compacto->bajada       = $_POST['bajada'];
        $compacto->url          = $_POST['url'];
        $compacto->tag          = $_POST['tag'];
        $compacto->contenido    = $_POST['contenido'];
        $compacto->categoria    = $_POST['categoria'];
        $compacto->pathImage    = $_POST['pathImage'];
        $compacto->leyendaImput = $_POST['leyendaImput'];
        $compacto->date         = $_POST['date'];
        echo json_encode($compacto);
        exit;
    else:
        echo 'rellene todo los campos!';
    endif;
});

$app->run();

?>