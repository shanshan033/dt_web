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

    if(!isset($_POST["image"])){
        // die("Post was empty.");
        echo json_encode(false);
    }else{

    $image = $_POST["image"];
    $name = $_POST["username"];
    $answer_time = $_POST["time"];

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];
   

    //Insert data into database
    $q="INSERT INTO mouse_tracking (user_name, user_id, user_gender, user_age, test_group, image, answer_time) VALUES ('$name', $id, $gender, $age, $test_times, '$image', '$answer_time')";

    // echo $q;

    $reslut=mysqli_query($con, $q);
    
    // echo $reslut[0];


    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{


        // echo "Success";//Success
        // $sql = "SELECT image FROM mouse_tracking WHERE user_name = '$name' AND test_group = $test_times ";
        // $reslut=mysqli_query($con, $sql);
        // $row=mysqli_fetch_row($reslut);
        // // echo $row;
        // echo "<img src='$row[0]'/>";
        mysqli_close($con);//Close database
        echo json_encode(true);
       

    }

}

?>