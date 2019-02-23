<?php 
    session_start();
    $name = $_SESSION["name"];

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
  
    if(isset($_POST['submitA'])){
         // Obtain the value from form
    $a1 = $_POST['q1'];
    $a2 = $_POST['q2'];
    $a3 = $_POST['q3'];
    $a4 = $_POST['q4'];
    $a5 = $_POST['q5'];
    $a6 = $_POST['q6'];
    $a7 = $_POST['q7'];
    $a8 = $_POST['q8'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Shanghai");
    $time = date("Y-m-d h:i:sa");

    //Insert data into database
    // Search user id matching user name
    $q = "SELECT user_id FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];

    // Insert questionnaires answer into 

    $q="INSERT INTO questionnaire_a (user_id, user_name,question1, question2, question3, question4, question5, question6, question7, message, answer_time) VALUES ( $id,'$name', '$a1','$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$message', '$time')";

    // echo $q;

    $reslut=mysqli_query($con, $q);
 
    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
        header("Refresh:1; url=../tests/welcome.php");//一秒后刷新进入登录页
    }
    }
    else if(isset($_POST['submitB'])){
        // echo "submit b\n";
    $a1 = $_POST['q1'];
    $a2 = $_POST['q2'];
    $a3 = $_POST['q3'];
    $a4 = $_POST['q4'];
    $a4 = implode(", ",$a4);
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Shanghai");
    $time = date("Y-m-d h:i:sa");

    //Insert data into database
    // Search user id matching user name
    $q = "SELECT user_id FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];

    // Insert questionnaires answer into 
    $q="INSERT INTO questionnaire_b (user_id, user_name,question1, question2, question3, question4, message, answer_time) VALUES ( $id,'$name', '$a1','$a2', '$a3', '$a4', '$message', '$time')";

    $reslut=mysqli_query($con, $q);
 
    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
        header("Refresh:1; url=../tests/goodbye.php");//一秒后刷新进入登录页
    }
    }else{
        exit("wrong excute");
    }
   


?>