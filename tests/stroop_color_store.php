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
  
    if(!isset($_POST['username'])){
        // echo "false";
        echo json_encode(false);
        // exit("Wrong execute");
    }else{

    // Obtain the value from form
    $answer_time = $_POST['answer_time'];
    $answer_flag = $_POST['answer_flag'];
    $question_id = $_POST['question_id'];
    $total_answer_time = $_POST['total_answer_time'];
    $name = $_POST['username'];
    if ($question_id == 11) {
        # code...
        echo json_encode(false);
    }

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];


    //Insert data into database
    $q="INSERT INTO stroop_color (user_name, user_id, user_gender, user_age, test_group, question_id, answer_time, total_answer_time, answer_flag) VALUES ('$name', $id, $gender, $age, $test_times, $question_id, '$answer_time', '$total_answer_time', $answer_flag)";

    $reslut=mysqli_query($con, $q);
    
    // echo "query success\n";

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{


        // echo "Success";//Success
        mysqli_close($con);//Close database
        echo json_encode(true);
       
        // header("Refresh:1; url=login.html");//一秒后刷新进入登录页
        // exit("true");
    }
}


?>