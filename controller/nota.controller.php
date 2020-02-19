<?php
class notaController extends Core{

    public function NuevaNota(){
        $twig = Core::init();

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Nueva Nota'
        ];

        $render = $twig->render('nueva.html', $data);
        return $render;
        
    }

    public function Categorias(){
        $twig = Core::init();
        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Categorias'
        ];

        $render = $twig->render('categorias.html', $data);
        return $render;
    }

}

?>