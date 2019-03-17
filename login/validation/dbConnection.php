<?php 
    header("Content-Type: text/html; charset=utf8");

    $server="127.0.01";// localhost
    $db_username="root";//databse username
    $db_password="Lxy551812";//database password
    $db_name = "dt_web";
    $con = mysqli_connect($server,$db_username,$db_password, $db_name);// connect database

    if(!$con){
        die("can't connect".mysqli_connect_error().PHP_EOL);// if link fails, die
    }else{
        // do nothing
    }
?>