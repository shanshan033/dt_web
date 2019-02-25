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
    <title>Stroop Task</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
	<link href="attention_task.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
     <script src="js/jquery.ffform.js" type="text/javascript"></script>
    
<script type="text/javascript">
	//Record the completing  time
	 // var timer = 0;
  //    function clock() {
  //    timer +=1;
  //    document.getElementById("clock").value = timer;
  //    }
	 // setInterval(clock,1000);

	/* if one of button is clicked
	 * Check whether the choice is correct
	 * Then the page automatically jump to the next question 
	 */
	$(document).ready(function () { 

	var randomTest = function(){
		var list = ["Red", "Brown", "Blue", "Green", "Purple", "Black", "Orange"];
		var btn = new Array();

		// The first button
		var random = Math.floor(Math.random() * list.length + 1)-1; 
     	btn.push(list[random]);
     	var button1 = list[random];
     	// $("#btn1").css("background", list[random]);
     	// $("#btn1").text(list[random]);
		list.splice(random, 1);

		// The second button
		var random = Math.floor(Math.random() * list.length + 1)-1;
     	btn.push(list[random]);
     	var button2 = list[random];
     	// $("#btn2").css("background", list[random]);
     	// $("#btn2").text(list[random]);
		list.splice(random, 1);

		// The third button
     	var random = Math.floor(Math.random() * list.length + 1)-1;
     	btn.push(list[random]);
     	var button3 = list[random];
     	// $("#btn3").css("background", list[random]);
     	// $("#btn3").text(list[random]);
     	list.splice(random, 1);

     	// The fourth button
     	var random = Math.floor(Math.random() * list.length + 1)-1;
     	btn.push(list[random]);
     	var button4 = list[random];
     	// $("#btn4").css("background", list[random]);
     	// $("#btn4").text(list[random]);
     	// list.splice(random, 1);

     	// Create the heading 
		var random = Math.floor(Math.random() * 4 + 1)-1;
		var h1_color = btn[random];
		var h1_text = list[random];
		alert(list);
		// $("h1").css("color",h1);
		// $("h1").text(list[random]);
		return {
			button1: button1,
			button2: button2,
			button3: button3,
			button4: button4,
			h1_color: h1_color,
			h1_text: h1_text
		};

		// return [button1, button2, button3, button4, h1_color, h1_text];
	}

	function generate(){

		var Test = randomTest();
		var headingData = "<div class='row clearfix'><div class='col-md-12 column'><h1 class='display-1' style='color:"+Test.h1_color+"'>"+Test.h1_text+"</h1></div></div>";
		var buttonData = "<div class = 'buttonClass'><div class='row clearfix'><div class='col-md-6 column'><button id = 'btn1' style = 'background:"+Test.button1+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button1+"</button></div><div class='col-md-6 column'><button id = 'btn2' style = 'background:"+Test.button2+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button2+"</button></div></div><div class='row clearfix'><div class='col-md-6 column'><button id = 'btn3' style = 'background:"+Test.button3+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button3+"</button></div><div class='col-md-6 column'><button id = 'btn4' style = 'background:"+Test.button4+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button4+"</button></div></div></div>";

		var formData = headingData+buttonData;

		$("#formSC").html(formData);

		// return formData;
	}

	// Generate random form
	generate();
	// alert("succuss in normal");
		

		$("#formSC").click(function(event){

		var id = event.target.id
		var string = "#" + id;
		// Obtain color from heading and button
		var heading_color = $("h1").css("color");
		var button_choice = $(string).css("background-color");

		// Alert whether the answer is correct (it will not be shown in the final version)
		if (heading_color == button_choice){
			alert("You are right! ");
		}
		else{
			alert("You are wrong! ");
		}

		generate();
		// alert("succuss in button");

		// var formData = generate();

		// create random color
		// var list = ["Red", "Brown", "Blue", "Green", "Purple", "Black", "Orange"];
		// var btn = new Array();

		// // The first button
		// var random = Math.floor(Math.random() * list.length + 1)-1; 
  // //    	btn.push(list[random]);
  //    	$("#btn1").css("background", Test.button1);
  //    	$("#btn1").text(Test.button1);
		// // list.splice(random, 1);

		// // // The second button
		// // var random = Math.floor(Math.random() * list.length + 1)-1;
  // //    	btn.push(list[random]);
  //    	$("#btn2").css("background", Test.button2);
  //    	$("#btn2").text(Test.button2);
		// // list.splice(random, 1);

		// // // The third button
  // //    	var random = Math.floor(Math.random() * list.length + 1)-1;
  // //    	btn.push(list[random]);
  //    	$("#btn3").css("background", Test.button3);
  //    	$("#btn3").text(Test.button3);
  // //    	list.splice(random, 1);

  // //    	// The fourth button
  // //    	var random = Math.floor(Math.random() * list.length + 1)-1;
  // //    	btn.push(list[random]);
  //    	$("#btn4").css("background", Test.button4);
  //    	$("#btn4").text(Test.button4);
  // //    	 list.splice(random, 1);

  // //    	// Create the heading 
		// // var random = Math.floor(Math.random() * 4 + 1)-1;
		// // var h1 = btn[random];
		// $("h1").css("color",Test.h1_color);
		// $("h1").text(Test.h1_text);
		// $("#formSC").html(formData)

	    });

		});






	// });
</script>

<!--      <div class="task-explanation">
        <h3> Task Description </h3>
            <p> Choose the option that corresponds to the color of the test, rather than the meaning of the text.</p>   
    </div>

  <div class="timer">
        <h3> Timer </h3>
         <form>
            <input type="text" id="clock" size="20" placeholder="0" />
        </form> 
    </div> -->

</head>
<body style="">

	<div class="demos-buttons">
        <h3>
            Attention Task </h3>
        <a href="#" class="submit active">Stroop Color</a><br />
        <a href="#" class="submit">Mouse Tracking Task</a> 
        <br>
        <a href="dot_cancellation.html" class="submit">Dot Cancellation Task </a> 
        <br>
        <a href="#" class="submit">Trail Marking Task </a><br>
    </div>

<!-- <form action = "stroop_color.php" method="POST"> -->
<div class="container bounceIn animated center-in-center">
	<div id="formSC">
<!-- 	<div class="row clearfix">
		<div class="col-md-12 column">
			<h1 class="display-1" style="color:green">
				Red
			</h1>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-6 column">
			 <button id = "btn1" style = "background: red" type="submit" name = "ans" class="btn btn-lg btn-block btn-info">Red</button>
		</div>
		<div class="col-md-6 column">
			 <button id = "btn2" style = "background: green" type="submit" name = "ans" class="btn btn-info btn-lg btn-block">Green</button>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-6 column">
			 <button id = "btn3" style = "background: blue" type="submit" name = "ans" class="btn btn-info btn-lg btn-block">Blue</button>
		</div>
		<div class="col-md-6 column">
			 <button id = "btn4" style = "background: orange" type="submit" name = "ans" class="btn btn-info btn-lg btn-block">Orange</button>
		</div>
	</div>
</div> -->
</div>
<!-- </form> -->
</body>

</html>