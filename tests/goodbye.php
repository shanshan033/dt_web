<?php

session_start();
if(empty($_SESSION["name"]))               //判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
{
    header("location:../login/login.html");
    exit();
}else{
  $name = $_SESSION["name"];  
}

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

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $test_times = $row[5] + 1;

    $q="UPDATE users SET test_times = $test_times WHERE user_name = '$name'";
    // echo $q;

    $reslut=mysqli_query($con, $q);

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
    }

// delete session
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Attention Level Tasks</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="css/attention_task.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <!-- <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script> -->
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
     <script src="js/jquery.ffform.js" type="text/javascript"></script>
</head>



<body style="">
  <div class="container bounceIn animated center-in-center-intro">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="jumbotron">
        <?php echo "<h1>Thank you :)</h1>" ?>
        
        <p class ="text-center">
          Four attnetion tasks have been completed successfully. <br>
          See you!<br>
        </p>
      </div>
        
      </div>
    </div>
  </div>
</div>


</body>

</html>