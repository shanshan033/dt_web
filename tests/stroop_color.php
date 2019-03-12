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
	<link href="css/attention_task.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.min.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--Framework-->
    <!-- <script src="js/jquery-1. 10.2.min.js" type="text/javascript"></script> -->
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <!--End Framework-->
     <script src="js/jquery.ffform.js" type="text/javascript"></script>

</head>
<body style="">

<div class="container bounceIn animated center-in-center-task" style="position: absolute;">
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
   
<script type="text/javascript">
    // Record the completing  time
    //Initialize variables
    var TestNumber = 0;
    // var totalTimer = 0;
    // var currentTimer = 0;
    // var totalTime = new Date();
    var startTime = new Date();
    var lastTime = new Date();
    var flag = 0;
    var userName = $('#nameFooter').html();

    // Calculate time
    // function clock() {
    // totalTimer +=1;
    // currentTimer +=1;
    // }
    
    // // Refresh each millsecond
    // setInterval(clock,10);

    /* if one of button is clicked
     * Check whether the choice is correct
     * Then the page automatically jump to the next question 
     */
    $(document).ready(function () { 


    var randomTest = function(){
        var list = ["Red", "Grey", "Blue", "Green", "Purple", "Black", "Orange", "Pink" ];
        var btn = new Array();

        // The first button
        var random = Math.floor(Math.random() * list.length + 1)-1; 
        btn.push(list[random]);
        var button1 = list[random];
        // $("#btn1").css("background", list[random]);
        // $("#btn1").text(list[random]);
        list.splice(random, 1);
        // alert("first: "+random+" button: "+btn+" list:"+list);


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
        // alert("thrid: "+random+" list:"+list);

        // The fourth button
        var random = Math.floor(Math.random() * list.length + 1)-1;
        btn.push(list[random]);
        var button4 = list[random];
        // $("#btn4").css("background", list[random]);
        // $("#btn4").text(list[random]);
        list.splice(random, 1);
        // alert("forth: "+random+" list:"+list);

        // Create the heading 
        var random = Math.floor(Math.random() * 4 + 1)-1;
        var h1_color = btn[random];
        var h1_text = list[random];
        // alert("text: "+random+" colour: "+h1_color+" text:"+h1_text);
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
        var buttonData = "<div class='row clearfix'><div class='col-md-6 column'><button id = 'btn1' style = 'background:"+Test.button1+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button1+"</button></div><div class='col-md-6 column'><button id = 'btn2' style = 'background:"+Test.button2+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button2+"</button></div></div><div class='row clearfix'><div class='col-md-6 column'><button id = 'btn3' style = 'background:"+Test.button3+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button3+"</button></div><div class='col-md-6 column'><button id = 'btn4' style = 'background:"+Test.button4+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button4+"</button></div></div>";

        var formData = headingData+buttonData;

        $("#formSC").html(formData);

        TestNumber = TestNumber+1;

        // return formData;
    }

    // Generate random form
    generate();
    // alert("succuss in normal");
        

        // $('button').click(function(event){
        $(document).on('click', "button", function() {
        var currentTime = new Date();
        var time = ((currentTime - lastTime) / 1000).toFixed(2);

        var id = event.target.id
        var string = "#" + id;
        // Obtain color from heading and button
        var heading_color = $("h1").css("color");
        var button_choice = $(string).css("background-color");

        // Alert whether the answer is correct (it will not be shown in the final version)
        var flag = 0;
        if (heading_color == button_choice){

            // alert("You are right! ");
            flag = 1;
        }
        else{
            // alert("You are wrong! ");
             flag = 0;
        }

        var diff = lastTime - startTime;
        diff = diff / 1000;
        var seconds = Math.floor(diff % 60);
        diff = diff / 60;
        var minutes = Math.floor(diff % 60);
        diff = diff / 60;
        var hours = Math.floor(diff % 24);

        var totalTime =  ("0" + hours).slice (-2) + ':' + ("0" + minutes).slice (-2) + ':' + ("0" + seconds).slice (-2);

        console.log(time+ " "+totalTime);

        $.ajax({
            type: 'POST',
            url: "stroop_color_store.php",
            // contentType: "application/json;",
            dataType: "json",
            data: {username: userName,
                answer_flag: flag,
                answer_time: time,
                question_id: TestNumber,
                total_answer_time: totalTime},
            succuss: function(msg){
 
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                window.location.href="intro_dot.html";
                    // 状态码
                    // console.log(XMLHttpRequest.status);
                    // // 状态
                    // console.log(XMLHttpRequest.readyState);
                    // // 错误信息   
                    // console.log(textStatus);

                }
        });
        generate();

        //Initalize timer
        lastTime = new Date();
        // currentTimer = 0;
        

        });

        });






    // });
</script>



</html>