<?php
header("Content-Type: text/html; charset=utf8");

   // include('connect.php');//connect database

    $server="127.0.0.1";//主机
    $db_username="root";//你的数据库用户名
    $db_password="Lxy551812";//你的数据库密码
    $db_name = "dt_web";
    $con = mysqli_connect($server,$db_username,$db_password, $db_name);//链接数据库


    if(!$con){
        die("can't connect".mysqli_connect_error().PHP_EOL);//如果链接失败输出错误
    }else{
        // echo "connect success\n";
    }
    //mysql_select_db('test',$con);//选择数据库（我的是test）

    // if (isset($_REQUEST['username']){
        $valid_name = $_REQUEST['username'];
        $userNameSQL = "select * from users where user_name = '$valid_name'";
        $resultSet = mysqli_query($con, $userNameSQL);
        if (mysqli_num_rows($resultSet) > 0){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }

        // if (isset($_REQUEST['password']){
        //     $valid_name = $_REQUEST['username'];
        //     $userNameSQL = "select * from users where user_name = '$valid_name' and user_password = '$valid_password";
        //     $resultSet = mysqli_query($con, $userNameSQL);
        //     if (mysqli_num_rows($resultSet) > 0){
        //         echo json_encode(true);
        //     }else{
        //         echo json_encode(false);
        //     }
        // }

    // }


    // $valid_password = $_REQUEST['password'];
    // Detect the exist of username 
    

    // $userNameSQL = "select * from users where user_name = '$valid_name' and user_password = '$valid_password";
    // $resultSet = mysqli_query($con, $userNameSQL);
    // if (mysqli_num_rows($resultSet) > 0)
    //     echo json_encode(true);
    // else
    //     echo json_encode(false);
    ?>