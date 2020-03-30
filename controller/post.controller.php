<?php
class postController extends Core{

    public function getCompacto(){   

        $twig = $this->init();        
        $api = API_URL.'notas';
        $ch = curl_init( $api );
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER, 1 );
        $response = curl_exec( $ch );
        $httpCode = curl_getinfo( $ch ,CURLINFO_HTTP_CODE );
        curl_close( $ch );
        
        if( $httpCode === 200 ):
            $data = json_decode( json_encode(json_decode( $response )->data), true );       
            $render = $twig->render( 'notas.html' , $data );
            echo $render;
        else:
            $render = $twig->render('notas.html', []);
            echo $render;       
         endif;
    }

    public static function postCompacto($data){
        $data = json_encode( $data );
        $api = API_URL.'compacto';
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result= curl_exec($ch);
        curl_close($ch);
        if($result):
            header('Location: '.HOME_DIR.'?message=true');
        else:
            header('Location: '.HOME_DIR.'?message=false');
        endif;
    }

    public static function putCompacto( $data , $id ){
        $data = json_encode($data);
        $api = API_URL.'compacto/update/'.$id;
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result= curl_exec($ch);

        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpCode === 200):
            header('Location: '.HOME_DIR.'?message=true');
        else:
            header('Location: '.HOME_DIR.'?message=false');
        endif;
    }

    public static function deleteCompacto( $id ){
        $api = API_URL.'compacto/delete/'.$id;
        $ch = curl_init( $api );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result= curl_exec( $ch );
        $httpCode = curl_getinfo( $ch ,CURLINFO_HTTP_CODE );
        curl_close( $ch );
        if( $httpCode === 200 ):
            header('Location: '.HOME_DIR.'?message=true');
        else:
            header('Location: '.HOME_DIR.'?message=false');
        endif;
    }


}
?>
