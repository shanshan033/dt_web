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
// 
    // Obtain the value from form
    $name = $_POST['username'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    //Insert data into database
    $q="INSERT INTO users (user_name,user_password, user_age, user_gender) VALUES ('$name','$password', '$age', '$gender')";

    $reslut=mysqli_query($con, $q);
    
    // echo "query success\n";

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{

        // echo "Success";//Success
        mysqli_close($con);//Close database
       
        header("Refresh:1; url=login.html");//一秒后刷新进入登录页
        // exit("true");
    }


?>