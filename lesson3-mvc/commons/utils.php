<?php

define('BASE_URL', "http://localhost/pt14315-web/lesson3-mvc/");
define('ADMIN_ASSET_URL', BASE_URL . "public/admin/");

function dd($val){
    echo "<pre>";
    var_dump($val);
    die;
}

function customUploadFile($file){

    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], 'public/images/'.$filename);
        return "public/images/" . $filename;
    }

    return null;
}