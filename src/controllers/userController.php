<?php

namespace Vvv\controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Vvv\models\userModel;

class userController{
   
    public function reg($json){
        if(!empty($json['login']) and !empty($json['name']) and !empty($json['pass'])){
           
        

        $um = new userModel();
        $res = $um -> userReg($json['login'], $json['name'], $json['pass']);
        if($res){
            echo json_encode($res);
        }
     }
    }

    public function auth($json){

        
        if(!empty($json['login']) and !empty($json['pass'])){
           
            $um = new userModel();
           
            $res = $um -> userAuth($json['login'], $json['pass']);
            
           // echo json_encode($res);
            $key = "Access";
            $payload =[
                'iss' => 'http://vvv/',
                'login' => $res['payload']['login'],
                'id' => $res['payload']['id']
            ];

            $jwt = JWT::encode($payload, $key, 'HS256');
            echo json_encode(['status' => 'ok',
                            'payload' => [
                                'accessToken' => $jwt
                            ]]
                        );

            
        }else {

            echo "Nothing";
        } 
    }
}