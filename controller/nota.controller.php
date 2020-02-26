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
            'section'=>'Nueva Nota',
            'categorias'=>$categorias
        ];

        $render = $twig->render('nueva.html', $data);
        echo $render;
        
    }


}

?>