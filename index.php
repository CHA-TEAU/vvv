<?php

require_once __DIR__ . '/vendor/autoload.php';

use Steampixel\Route;
use Vvv\controllers\userController;
use Vvv\DBconn;


Route::add('/', function(){
    echo "Hello World!";
});

Route::add('/reg', function(){
    include "src/views/reg.php";
});

Route::add('/api/reg', function(){
    $json = json_decode(file_get_contents("php://input"), true);
    $uc = new userController();
    $uc -> reg($json);

}, 'post');

Route::add('/auth', function(){
    include "src/views/auth.php";
});

Route::add('/api/auth', function(){
    $json = json_decode(file_get_contents("php://input"), true);
    $uc = new userController();
    $uc -> auth($json);

 

}, "post");

Route::add('/ul', function(){
    
        include "src/views/userList.php";
    
});



Route::add("/api/getUsers", function() {
        $db = DBconn::connect();
        $res = $db->query("SELECT * FROM `vvvusers`");

        $json = [];

        while($ress = mysqli_fetch_assoc($res)) {
            array_push($json, $ress);
        }

        echo json_encode($json);

});





Route::run('/');