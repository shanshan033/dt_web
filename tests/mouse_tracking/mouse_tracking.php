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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/schulte.css">
    <link href="../css/attention_task.css" rel="stylesheet" type="text/css">
    <script src="js/vue.min.js"></script>
    <title>Mouse Tracking</title>
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>
    <div id="app" class="wrapper w3-container w3-padding-0 w3-margin-0"
         tabindex="-1"
         @mousemove="appendMouseMove($event)"
         @keyup.esc="dialogShowed ? hideDialog() : execDialog('mousemap')"
         v-focus v-cloak>
		<!-- delete mouse focus and hover

			style="background-image: url('img/unnc.jpg');"
		 -->

		<!-- show img in background -->
        
        <div class="w3-container w3-margin-top w3-center">
        	<img src="img/task1.jpg" style="height: 100%; width: 100%;">
          <!--   <canvas class="mouse-map"
                    width="1000" height="500"
                    ref="mousemap_canvas">
            </canvas> -->
        </div>
        <div class="footer">
            <div class="footer-name" >
                <p id="nameFooter" ref="username"><?php echo "{$name}";?></p>
            </div>
        </div>

        <!--  <div class="w3-container w3-light-grey w3-center">
                    <button type="button"
                            class="w3-btn w3-indigo w3-text-white w3-xlarge"
                            style="width: 80%; margin: 10px;"
                            @click="startGame()"
                            ref="btn">
                        Start Test
                    </button>
        </div> -->



        <!-- <div v-for="r in gridRange" class="row" :style="{height: rowHeight}">
            <div v-for="c in gridRange" class="cell" :style="{width: colWidth}"
                 @mouseover="hoveredCell = r*gridSize + c"
                 @mouseleave="hoveredCell = -1"
                 @click="setClickedCell(r*gridSize + c, $event)"

                 :class="{'normal-cell' : !showHover && !showClickAnimation}">  

                 

                
            </div>
        </div> -->

        <!-- <div class="center-dot" v-if="showCenterDot"></div> -->

        <div id="settings-btn" @click="execDialog('mousemap')"></div>


        <div class="w3-modal"
             :class="[dialogShowed ? 'display-block' : 'display-none']">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="min-width: 350px; max-width: 600px;">
                <header class="w3-container w3-blue w3-center">
                    <h2>Mouse Tracking Test</h2>
                </header>

                <!-- <div class="w3-container w3-margin-top w3-center" v-if="mousemapTabVisible"> -->
                <div class="w3-container w3-margin-top w3-center"  v-if="mousemapTabVisible">
                    <canvas class="mouse-map"
                            width="300" height="300"
                            ref="mousemap_canvas">
                    </canvas>
                    <table class="w3-table-all w3-large">
                        <tr>
                            <td>Time</td>
                            <td>{{ stats.timeDiff() }}</td>
                        </tr>
                    </table>
                </div>
                <footer class="w3-container w3-light-grey w3-center" v-if="mousemapTabVisible">
                    <button type="button"
                            class="w3-btn w3-indigo w3-text-white w3-xlarge"
                            style="width: 80%; margin: 10px;"
                            @click="endGame(); saveCanvas()"
                            ref="btn">
                        End Test
                    </button>
                </footer>

                <div class="w3-container w3-margin-top w3-center"  v-if="!mousemapTabVisible">
                	<h4>
                	Welcome to mouse tracking test :) <br>
                	You are doing well so far so good!<br>
                	In this test <br>
                	You need to follow a random curve line by using iPad pen<br>
                    After you finish it, please click ESC to exit the test<br>
                	Click start and lets start the test! <br>
           			</h4>
                </div>


                <footer class="w3-container w3-light-grey w3-center" v-if="mousemapTabVisible == false">
                    <button type="button"
                            class="w3-btn w3-indigo w3-text-white w3-xlarge"
                            style="width: 80%; margin: 10px;"
                            @click="hideDialog(); startGame()"
                            ref="btn">
                        Start Test
                    </button>
                </footer>
            </div>
        </div>
    </div>

    <script src="js/mouse_tracking.js"></script>
    <script src="../js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
           
            // var canvas = this.$refs['mousemap_canvas']; // if mousemapTab visible           
            //  if (canvas) {

            //     var dataUrl=canvas.toDataURL();
            //     var userName = this.$refs['username'].innerText;
            //     var time = this.stats.timeDiff();
            //     // console.log(dataUrl);

            //     $.ajax({
            //         type: "POST",
            //         url: "mouse_tracking_store.php",
            //         dataType: "json",
            //         data: {username: userName,
            //             image: dataUrl,
            //             time: time},
            //         succuss: function(msg){
            //             // console.log(msg);
            //             window.location.href = "../../questionnaires/questionnaire_b.php";
            //         },
            //         error: function (XMLHttpRequest, textStatus, errorThrown) {
            //         // 状态码
            //         console.log(XMLHttpRequest.status);
            //         // 状态
            //         console.log(XMLHttpRequest.readyState);
            //         // 错误信息   
            //         console.log(textStatus);

            //         }
            //     });
            // }
    </script>
  
</body>
</html>