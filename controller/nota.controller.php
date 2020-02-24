<?php
class notaController extends Core{

    public function NuevaNota(){
        
        $twig = $this->init();

        $data = [
            'home_url'=>HOME_DIR,
            'base_url'=>BASE_DIR,
            'section'=>'Nueva Nota'
        ];

        $render = $twig->render('nueva.html', $data);
        echo $render;
        
    }


}

?>