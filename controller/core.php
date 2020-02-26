<?php
class Core {

    public static $param = DEV_DATABASE;
    public static $category = 'Categorias';
    public static $create = true;

    public static function init(){
        $loader = new Twig_Loader_Filesystem('./view/responsive');
        $twig = new Twig_Environment($loader);
        return $twig;
    }

    public static function mongoConnet(){

        $string = "mongodb://".MONGO_HOST.":".MONGO_PORT;

        $collection = new MongoDB\Client($string);

        return $collection;

    }
    
}
?>