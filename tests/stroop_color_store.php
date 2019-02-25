<?
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
  
    if(!isset($_POST['ans'])){
        exit("Wrong execute");
    }else{

    // Obtain the value from form
    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];

    //Insert data into database
    $q="INSERT INTO stroop_color (user_id, user_name, user_gender, user_age, question_id, answer_time, answer_flag) VALUES ('$id', $name', '$gender','$age')";

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
}


?>