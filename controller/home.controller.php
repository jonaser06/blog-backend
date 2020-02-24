<?php
class indexController extends Core{

    public function index(){
        
        $twig = $this->init();

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Nueva Nota'
        ];        

        $render = $twig->render('inicio.html', $data);
        echo $render;
        
    }

}

?>