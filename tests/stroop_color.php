<?php 
session_start();
if(empty($_SESSION["name"]))               
{
    header("location:../login/login.html");
    exit();
}else{
  $name = $_SESSION["name"];  
}

?>

<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Stroop Task</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="css/attention_task.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.min.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
    <script src="js/jquery.ffform.js" type="text/javascript"></script>
    <script src="js/stroop_color.js" type="text/javascript"></script>

</head>
<body style="">
     <div class="demos-buttons">
        <h4 id="question_id"></h4>
        <h4 id="timer">Timer: 00:00:00</h4>
    </div>

<div class="container bounceIn animated center-in-center-task" style="width: 70%">
	<div id="formSC">
        <!-- Generate random table in Javascript -->
</div>
</div>
<div class="footer">
<div class="footer-name" >
    <p id="nameFooter"><?php echo "{$name}";?></p>
</div>
</div>

</body>

</html>