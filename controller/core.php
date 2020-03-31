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

    public static function getCategoria(){    
        $api = API_URL.'categorias';
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        return $response;
    }
    
    public static function getCompacto($page = 1){    
        $api = API_URL.'compacto';
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        return $response;
    }
}
?>