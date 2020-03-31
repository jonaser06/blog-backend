<?php
class notaController extends Core{

    public static $param = DEV_DATABASE;
    public static $category = 'Categorias';
    public static $create = true;

    public function NuevaNota(){
        
        $db = self::$param;
        $collection = self::$category;
        $categorias = [];

        $twig = $this->init();
        $categorias = $this->getCategoria();

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Nueva Nota',
            'categorias'=>$categorias->data
        ];

        $render = $twig->render('nueva.html', $data);
        echo $render;
        
    }

    public function ListaNota(){
        
        $db = self::$param;
        $collection = self::$category;
        $categorias = [];

        $twig = $this->init();
        $categorias = $this->getCategoria();
        $compacto = $this->getCompacto();

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'cdn'=> CDN_MEDIA,
            'section' =>'Nueva Nota',
            'data'    => $compacto->data,
            'categorias'=>$categorias->data,
        ];

        $render = $twig->render('lista.html', $data);
        echo $render;
        
    }
}

?>