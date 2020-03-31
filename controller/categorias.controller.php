<?php
class categoriasController extends Core{

    public static $param = DEV_DATABASE;
    public static $category = 'Categorias';
    public static $create = true;

    public function Categorias(){
        $twig = $this->init();
        $categorias = $this->getCategoria();
        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Categorias',
            'categorias'=>$categorias->data
        ];

        $render = $twig->render('categorias.html', $data);
        echo $render;
    }

    public function UpdateCategorias($data){
        $id =  $data['cid'];
        $data = json_encode($data);
        $api = API_URL.'categorias/update/'.$id;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result= curl_exec($ch);
        curl_close($ch);
        if($result):
            header('Location: '.HOME_DIR.'/categorias?message=true');
            exit;
        else:
            header('Location: '.HOME_DIR.'/categorias?message=false');
            exit;
        endif;
        
    }


}

?>
