<?php
class categoriasController extends Core{

    public static $param = DEV_DATABASE;
    public static $category = 'Categorias';
    public static $create = true;

    public function Categorias(){

        $db = self::$param;
        $collection = self::$category;

        $twig = $this->init();        
        $api = API_URL_PROD.'categorias';
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Categorias',
            'categorias'=>$response->data
        ];

        $render = $twig->render('categorias.html', $data);
        echo $render;
    }

    public function UpdateCategorias($data){
        echo json_encode($data);
        exit;
    }


}

?>
