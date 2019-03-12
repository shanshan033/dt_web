<?php 
session_start();
if(empty($_SESSION["name"]))               //判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
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
    <!-- <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script> -->
    <!--Framework-->
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
     <script src="js/jquery.ffform.js" type="text/javascript"></script>
     <!-- document.getElementById("clock").value = timer; -->

<script type="text/javascript">

  //Initialize variables
  // var userName = $('#nameFooter').html();
  var correctNumber = 0;
  var totalCorrectNumber = 0;
  var errorNumber = 0;
  var totalTimer = 0;

   // Record the time
   function clock() {         
      totalTimer +=1;
      // document.getElementById("clock").value = timer;
   }
   setInterval(clock,10);

   


	$(document).ready(function(){

    // Create a 10x10 table containing images
    var generate = function (){
    var tableData = "";
    for (var j=0; j<10; j++){
        tableData+="<tr>";
        for(var i=0;i<10;i++){
          // Images are randomly distributed into the table
          var id=Math.round(Math.random()*6)+1;
          var data = "<input type='image' src=images/img"+id+".png class = 'imgClass' id='img"+id+"' >";
          tableData+="<td>"+data+"</td>";
          if (id == 0 || id == 3 || id == 4){
            totalCorrectNumber +=1;
          }

        }
        tableData+="</tr>";
      }

      return tableData;
    }

    // Show table into web page
  	$("#tbody1").html(generate());

      /* Check whether the choice is right (this alert will not be shown in ths final version)
  		 * Obtain the id of the image and check the correction
       */

  	$("table tr td").on("click", function () {
          var tdidx = $(this).index();
          var td = $(this).find("td:eq("+tdidx+")").context.childNodes[0].id;
          $(this).find("input").addClass("darken");
          $(this).find('input').attr('disabled', true);
          console.log($(this).find("td:eq("+tdidx+")").context.childNodes[0].id);
          
          if (td == "img0" || td == "img3" || td == "img4"){
          	// alert("You are right!");
            correctNumber +=1;
          }
          else{            	
            // alert("You are wrong!");
            errorNumber +=1;
          }

        if(correctNumber == totalCorrectNumber || errorNumber >= (100-totalCorrectNumber)){
            // pass database
            // alert("error: "+errorNumber+" total correct: "+totalCorrectNumber);

            $.ajax({
            type: 'POST',
            url: "dot_cancellation_store.php",
            dataType: "json",
            data: {username:function() {
                return $('#nameFooter').html()},
                correct_number: correctNumber,
                error_number: errorNumber,
                total_correct_number: totalCorrectNumber,
                answer_time: totalTimer},
            success: function(){
                setTimeout("window.location.href='schulte_table/schulte_table.html'", 500);
             
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                
                    状态码
                    console.log(XMLHttpRequest.status);
                    // 状态
                    console.log(XMLHttpRequest.readyState);
                    // 错误信息   
                    console.log(textStatus);

                }
        });

          }
      });
  });
</script>

</head>
<!-- 
  <div class="timer">
        <h3> Timer </h3>
         <form>
            <input type="text" id="clock" size="20" placeholder="0" />
        </form> 
    </div>

    <div class="task-explanation">
        <h3> Task Description </h3>
            <p> Cross out all of the groups containing four dots with computer mouse</p>   
    </div>
 -->
<!--  <div class="clock">
        <h3> Timer </h3>
         <form>
            <input type="text" id="clock" size="20" placeholder="0" />
        </form> 
    </div> -->
<body style="">
	<!-- <div class="demos-buttons">
        <h3>
            Attention Task </h3>
        <a href="stroop_color.html" class="submit">Stroop Color</a><br />
        <a href="#" class="submit">Mouse Tracking Task</a> 
        <br>
        <a href="#" class="submit active">Dot Cancellation Task </a> 
        <br>
        <a href="#" class="submit">Trail Marking Task </a><br>
  </div> -->

<div class="container bounceIn animated center-in-center-dot-cancellation">
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