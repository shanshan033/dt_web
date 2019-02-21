<?php
session_start();
if(empty($_SESSION["name"]))               //判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
{
    header("location:../login/login.html");
    exit;
}else{
  $name = $_SESSION["name"];  
}
?>

<!DOCTYPE PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Attention Level Tasks</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="attention_task.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <!-- <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script> -->
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
     <script src="js/jquery.ffform.js" type="text/javascript"></script>
</head>



<body style="">
  <div class="container bounceIn animated center-in-center" style="top: 15%; ">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="jumbotron">
        <?php echo "<h1>Hello :)</br> {$name}</h1>" ?>
        
        <p class ="text-center">
          There are four attnetion tasks required to be completed. <br>
          There is no time limitation.<br>
          Just try your best!<br>
        </p>

         <p>
           <a class="btn btn-primary btn-lg btn-block" href="stroop_color.html">Start Testing</a>
        </p>
      </div>
        
      </div>
    </div>
  </div>
</div>


</body>

</html>