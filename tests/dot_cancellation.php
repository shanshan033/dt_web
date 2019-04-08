<?php 
session_start();
if(empty($_SESSION["name"]))               
{
    header("location:../login/login.html");
    exit();
}else{
  if(empty($_SESSION["group_dot"])){
    $_SESSION["group_dot"] = 1;
  }
  
  $group = $_SESSION["group_dot"];
  $name = $_SESSION["name"];  
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dot Cancellation Task</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="css/attention_task.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.min.css" rel="stylesheet" type="text/css">

    <!--Framework-->
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
    <script src="js/jquery.ffform.js" type="text/javascript"></script>
    <script src="js/dot_cancellation.js" type="text/javascript"></script>
</head>

<body style="">
    <div class="demos-buttons-dot">
      <h5><?php echo "Group: {$group} / 3 </br> 
          ---------------------------------</br>";?></h5>
      <h5 id="question_id">
      </h5>
    </div>
<div class="container bounceIn animated center-in-center-dot-cancellation" style="margin-left: 150px">
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