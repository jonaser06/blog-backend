<?php
class postController extends Core{

    public static function postCompacto($data){
        $data = json_encode($data);
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

}
?>