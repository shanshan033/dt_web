<?php
  session_start();
  $name = $_SESSION["name"];  

  include("../login/validation/dbConnection.php");
 
  $q = "SELECT * FROM users WHERE user_name = '$name' ";
  $reslut = mysqli_query($con, $q);
  $row = mysqli_fetch_row($reslut);
  $test_times = $row[5] + 1;

  $q="UPDATE users SET test_times = $test_times WHERE user_name = '$name'";

  $reslut=mysqli_query($con, $q);

  if (!$reslut){
      die('Error: ' . mysqli_error($con));//Error warming
  }else{
      mysqli_close($con);//Close database
  }
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