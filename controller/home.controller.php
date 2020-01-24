<?php
class indexController{

    public function index(){
        $loader = new Twig_Loader_Filesystem('./view/responsive');
        $twig = new Twig_Environment($loader);

        $data = [
            'base_url'=>BASE_DIR,
            
        ];

        $render = $twig->render('inicio.html', $data);
        return $render;
        
    }

}

?>