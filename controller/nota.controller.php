<?php
class notaController{

    public function NuevaNota(){
        $loader = new Twig_Loader_Filesystem('./view/responsive');
        $twig = new Twig_Environment($loader);

        $data = [
            'base_url'=>BASE_DIR,
        ];

        $render = $twig->render('nueva.html', $data);
        return $render;
        
    }

}

?>