<?php
class categoriasController extends Core{

    public static $param = DEV_DATABASE;
    public static $category = 'Categorias';
    public static $create = true;

    public function Categorias(){

        $db = self::$param;
        $collection = self::$category;
        $categorias = [];

        $twig = $this->init();
        $client = $this->mongoConnet();
        $client = $client->$db->$collection;
        $getAll = $client->find();
        
        foreach($getAll as $categ){
            $response = [
                "cid"           => $categ["cid"],
                "status"        => $categ["status"],
                "descripcion"   => $categ["descripcion"],
                "titulo"        => $categ["titulo"],
                "url"           => $categ["url"]
            ];
            array_push($categorias,$response);
        }
        
        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Categorias',
            'categorias'=>$categorias
        ];

        $render = $twig->render('categorias.html', $data);
        echo $render;
    }


}

?>
