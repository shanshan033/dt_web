<?php

session_start();
if(empty($_SESSION["name"]))               //判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
{
    header("location:../login/login.html");
    exit();
}else{
  $name = $_SESSION["name"];  
}

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
  
    // Save each try
    if(isset($_POST['answer_number'])){
        // Obtain the value from form
    $answer_number = $_POST['answer_number'];
    $answer_flag = $_POST['answer_flag'];
    $answer_time = $_POST['time'];
    $total_time = $_POST['total_time'];
    $correct_clicks = intval($_POST['correctClicks']);
    $wrong_clicks = intval($_POST['wrongClicks']);

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    //Insert data into database
    $q="INSERT INTO schulte_table (user_name, user_id, user_gender, user_age, test_group, answer_number, answer_flag, answer_time, total_time, correct_clicks, wrong_clicks) VALUES ('$name', $id, $gender, $age, $test_times, '$answer_number', '$answer_flag', '$answer_time', '$total_time', $correct_clicks, $wrong_clicks)";

    // echo $q;

    $reslut=mysqli_query($con, $q);
    
    // echo "query success\n";

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{

        // $q="UPDATE users SET schulte_table_group = $test_times WHERE user_name = '$name'";
        // $reslut=mysqli_query($con, $q);


        // echo "Success";//Success
        mysqli_close($con);//Close database
        echo json_encode(true);
       
        // header("Refresh:1; url=login.html");//一秒后刷新进入登录页
        // exit("true");
    }
}
?>