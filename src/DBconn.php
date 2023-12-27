<?php

namespace VVV;

class DBconn{

    public static function connect(){
        $mysqli = @new \mysqli('localhost', 'root', '', 'VVV');
        if(mysqli_connect_error()){
            echo "Error" . mysqli_connect_errno();
        }
    
        return $mysqli;
    }

    
}