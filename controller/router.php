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

$app->post('/categoriaUpdate/',function(){

    if( isset($_POST['update-title']) && isset($_POST['update-description']) && isset($_POST['update-url']) && isset($_POST['category-id']) ):
        $data = [
            "category-id"        => $_POST['category-id'],
            "title"              => $_POST['update-title'],
            "update-description" => $_POST['update-description'],
            "update-url"         => $_POST['update-url']
        ];

        $render = new categoriasController(); 
        $render->UpdateCategorias($data);
    else:
        header('Location: '.HOME_DIR);
        exit;
    endif;
    
});

$app->get('/publicar/',function(){
    header('Location: '.HOME_DIR);
    exit;
});

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
$app->post('delete/:id',function($id){
    $compacto = new Compacto;
    $compacto->delete((int)$id);
});

$app->put('/actualizar/:id',function(){
     header('Content-Type: application/json');
     if(isset($_POST['update-id']) && isset($_POST['update-title']) && isset($_POST['update-description']) && isset($_POST['update-url']) ):
        $categoria = new stdClass();
        $categoria->cid = ($_POST['update-id']);

     else:
     endif;

});

$app->run();

?>