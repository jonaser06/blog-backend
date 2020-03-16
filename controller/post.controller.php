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

    public static function putCompacto($data,$id){
        $data = json_encode($data);
        $api = API_URL.'compacto/update/'.$id;
        $ch = curl_init();
        curl_setopt($ch, CURLPOT_URL,$api);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
        curl_setopt($ch,CURLPOT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLPOT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $result= curl_exec($ch);
        curl_close($ch);
        if($result):
            header('Location: '.HOME_DIR.'?message=true');
        else:
            header('Location: '.HOME_DIR.'?message=false');
        endif;
    }

    public static function deleteCompacto($id){
        $api = API_URL.'compacto/delete/'.$id;
        $ch = curl_init();
        curl_setopt($ch, CURLPOT_URL,$api);
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
