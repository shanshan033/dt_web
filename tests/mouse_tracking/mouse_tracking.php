<?php 
session_start();
if(empty($_SESSION["name"]))               //判断session里面是不是存储到值，如果没有存储，让其跳转到登录界面
{
    header("location:../../login/login.html");
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

        html {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div id="app" class="wrapper w3-container w3-padding-0 w3-margin-0"
         tabindex="-1"
         @mousemove="appendMouseMove($event)"
         @keyup.esc="dialogShowed ? hideDialog() : execDialog('mousemap')"
         v-focus v-cloak>
        
        <div class="w3-container w3-margin-top w3-center"
             id = "mainContent">
            <canvas style="border:1px solid #ccc; margin:20px auto;display: block; min-width: 350px; max-width: 100%;"
                    width="1024" height="568"
                    ref="picture_canvas">
            </canvas>

            <b style="width: 70%; margin: 10px;">
                    Tips: Follow a curve line by using touch bar. After finishing following the line, please click "ESC" button ASAP! 
            </b>

        </div>

        <div class="footer">
            <div class="footer-name" >
                <p id="nameFooter" ref="username"><?php echo "{$name}";?></p>
            </div>
        </div>

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
                        <b>INSTRUCTION</b> <br>
                	    Follow a curve line by using computer mouse or touch bar<br>
                        No need to hold the right click, just move your mouse or finger<br>
                        <b>After following the line, please click "ESC" button ASAP! </b><br>
                        There is no time limitation.<br>
                        Just try your best!<br>
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
        // document.body.addEventListener('touchmove' , function(e){
        //  e.preventDefault();
        // });

        // document.ondragstart = function(event) {
        //     return false;
        // };
    </script>
</body>
</html>