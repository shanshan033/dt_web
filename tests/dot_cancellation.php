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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dot Cancellation Task</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	  <link href="css/attention_task.css" rel="stylesheet" type="text/css">
    <!--Framework-->
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
    <script src="js/jquery.ffform.js" type="text/javascript"></script>
    <script src="js/dot_cancellation.js" type="text/javascript"></script>
</head>

<body style="">
<div class="container bounceIn animated center-in-center-dot-cancellation" style="width : 75%">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-hover table-bordered">
    			<tbody id="tbody1">
    			</tbody>
			</table>
		</div>
	</div>
</div>

<div class="footer">
<div class="footer-name" >
    <p id="nameFooter"><?php echo "{$name}";?></p>
</div>
</div>

</body>

</html>