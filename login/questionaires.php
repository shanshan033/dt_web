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
  
    if(!isset($_POST['submit'])){
        exit("Wrong execute");
    }

     session_start();
     $name = $_SESSION["name"];
// 
    // Obtain the value from form
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    $a6 = $_POST['a6'];
    $a7 = $_POST['a7'];
    $a8 = $_POST['a8'];
    $message = $_POST['message'];
    //Insert data into database
    $findId = "select user_id from users where user_name = '$name'";
    $id=mysqli_fetch_row(mysqli_query($con, $q));

    $q="INSERT INTO questionnaire_a (user_id, user_name,question1, question2, question3, question4, question5, question6, question7, question8, message) VALUES ('$id', '$name', '$a1','$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$message')";

    $reslut=mysqli_query($con, $q);
 
    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
        header("Refresh:1; url=../tests/welcome.php");//一秒后刷新进入登录页
    }


?>