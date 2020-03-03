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

$app->get('/publicar/',function(){
    header('Location: '.HOME_DIR);
    exit;
});

#POST
$app->post('/publicar/',function(){
    header('Content-Type: application/json');
    if(isset($_POST['title']) && isset($_POST['bajada']) && isset($_POST['url']) && isset($_POST['tag']) && isset($_POST['contenido']) ):
        $compacto = new stdClass();
        $compacto->titulo       = $_POST['title'];
        $compacto->titulo_seo   = $_POST['title'];
        $compacto->bajada       = $_POST['bajada'];
        $compacto->url          = $_POST['url'];
        $compacto->contenido    = $_POST['contenido'];
        $compacto->categoria    = array(
            "cid"           =>  $_POST['cidcategoria'],
            "nombre"        =>  $_POST['categoria'],
            "url"           =>  $_POST['urlcategoria'],
        );
        $compacto->img          = array(
            "ext"           =>  'jpg',
            "path"          =>  $_POST['pathImage'],
            "description"   =>  $_POST['leyendaImput']
        );
        $compacto->video        = array(
            "ext"           =>  "",
            "path"          =>  "",
            "description"   =>  ""
        );
        $compacto->publicidad   = "";
        $compacto->fecha        = $_POST['date'];
        $compacto->tags         = array(
            "tid"           =>  "",
            "nombre"        =>  $_POST['tag'],
            "url"           =>  "",
        );
        $compacto->tipo         = "";
        $post = new postController();
        $post->postCompacto($compacto);
        exit;
        echo json_encode($compacto);
    else:
        echo 'rellene todo los campos!';
    endif;
});

$app->run();

?>