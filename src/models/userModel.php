<?php

namespace Vvv\models;
use Vvv\DBconn;

class userModel{

    public function userReg($login, $name, $pass){
        $db = DBconn::connect();
        $res = $db->query("INSERT INTO `vvvusers`(`id`, `name`, `login`, `pass`) VALUES (NULL, '$name', '$login', '$pass')");

        try{
            if($res){
                return ["status"=>"ok",
                        "payload"=>[
                            "login"=>$login,
                            "pass"=>$pass,
                            "name"=>$name
                        ]];
            }else
            {
                return false;
            }
        }catch (\mysqli_sql_exception $e){
            return ["status"=>"error",
                    "payload"=>[
                        "description"=>"Login exist"
                    ]];
        }
       
    }
    
    public function userAuth($login, $pass){
        $db = DBconn::connect();
        $res = $db->query("SELECT * FROM `vvvusers` WHERE `login` = '$login' AND `pass` = '$pass'");

        $res = mysqli_fetch_assoc($res);

        if($res){
            return ["status"=>"ok",
                    "payload"=>[
                        "login"=>$login,
                        "pass"=>$pass,
                        "id"=>$res['id']
                    ]];
        } else {

            return ["status" => "null",
                    'payload' => "Not found"];
        

        }
    }
    
}