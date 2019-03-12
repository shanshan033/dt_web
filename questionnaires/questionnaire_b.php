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
    <title>Image Survey HTML Form by templatemo</title>

    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!-- https://materializecss.com -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- Template Mo style -->
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tm-parallax"></div>
            </div>
        </div>
        <div class="row">
            <div class="tm-intro">
                <div class="col-sm-12 col-md-12 mb-md-0 mb-4 tm-intro-left">
                    <?php echo "<p class='mb-0'>Hello {$name},</br>
                        Thank you for your coorporation. This questionnaire is aimed at deeply understanding the relationship between multiple temperatures and focus level. All survey results is anonymous, please answer the following question in true. Thank you :)</p> ";?>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>

        <form action="questionnaires.php" method="post">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 1</h2>
                    <p>Please rate your current thermal sensation.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a1" required/>
                                <span>Cold</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a2" />
                                <span>Cool</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a4" />
                                <span>Warm</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a5" />
                                <span>Hot</span>
                            </div>
                        </label>

                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                 <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 2</h2>
                    <p>Please rate your current thermal comfort.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a1" required/>
                                <span>Very uncomfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a2" />
                                <span>Slightly uncomfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a4" />
                                <span>Slightly comfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a5" />
                                <span>Very comfortable</span>
                            </div>
                        </label>

                    </div>
                </div> <!-- col-12 -->


                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 3</h2>
                    <p>Do you think these attention tasks can reflect the level of your attention?</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q3" type="radio" value="q3_a1" required/>
                                <span>Yes</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q3" type="radio" value="q3_a2" />
                                <span>No</span>
                            </div>
                        </label>
                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 4</h2>
                    <p>Which of these tasks need improvement?</p>
                    <div class="tm-q-choice-container options">
                        <label class="tm-q-choice tm-q-choice-2-col">
                            <div class="mb-3">
                                <input type="checkbox" name="q4[]" class="filled-in tm-checkbox" value="q4_a1" required/>
                                <span>Stroop Testing (Task1)</span>
                            </div>
                            <img src="img/img-1x1-1.png" alt="Image" class="img-fluid" width = "200" height = "200">
                        </label>
                        <label class="tm-q-choice tm-q-choice-2-col">
                            <div class="mb-3">
                                <input type="checkbox" name="q4[]" class="filled-in tm-checkbox" value="q4_a2" required/>
                                <span>Trail Marking (Task2)</span>
                            </div>
                            <img src="img/img-1x1-2.png" alt="Image" class="img-fluid" width = "200" height = "200">
                        </label>
                        <label class="tm-q-choice tm-q-choice-2-col">
                            <div class="mb-3">
                                <input type="checkbox" name="q4[]" class="filled-in tm-checkbox" value="q4_a3" required/>
                                <span>Dot Cancellation Test (Task3)</span>
                            </div>
                            <img src="img/img-1x1-3.png" alt="Image" class="img-fluid" width = "200" height = "200">
                        </label>
                        <label class="tm-q-choice tm-q-choice-2-col">
                            <div class="mb-3">
                                <input type="checkbox" name="q4[]" class="filled-in tm-checkbox" value="q4_a4" required/>
                                <span>Mouse Tracking (Task 4)</span>
                            </div>
                            <img src="img/img-1x1-4.png" alt="Image" class="img-fluid" width = "200" height = "200">
                        </label>
                    </div>
                </div> <!-- col-12 -->
           

                <div class="col-12 tm-respondent-info">
                	<hr>
                	<h2 class="tm-question-header tm-question-header-mt">Do you have any suggestions</h2>
                    <div class="row">
                        <div class="col-md-12 col-lg-16">
                            <textarea class="p-3" name="message" id="message" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center tm-submit-container">
                    <button type="submit" name="submitB" class="btn btn-primary tm-btn-submit">Submit</button>
                </div>
                <div class="col-12">
                    <hr>
                </div>
            </div> <!-- row -->
        </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>

        // Parallax function
        // https://codepen.io/roborich/pen/wpAsm
        var background_image_parallax = function ($object, multiplier) {
            multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
            multiplier = 1 - multiplier;
            var $doc = $(document);
            $object.css({ "background-attatchment": "fixed" });
            $(window).scroll(function () {
                var from_top = $doc.scrollTop(),
                    bg_css = 'center ' + (multiplier * from_top - 200) + 'px';
                $object.css({ "background-position": bg_css });
            });
        };

        /**
         * detect IE
         * returns version of IE or false, if browser is not Internet Explorer
         */
        function detectIE() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf('MSIE ');
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            }

            var trident = ua.indexOf('Trident/');
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf('rv:');
                return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
            }

            // var edge = ua.indexOf('Edge/');
            // if (edge > 0) {
            //     // Edge (IE 12+) => return version number
            //     return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
            // }

            // other browser
            return false;
        }

        $(document).ready(function () {

            // Detect IE
            if (detectIE()) {
                alert('Please use the latest version of Chrome, Firefox, or Edge for best browsing experience.');
            }

            $('select').formSelect();
            // Parallax image background
            background_image_parallax($(".tm-parallax"), 0.40);

            // Darken image when its radio button is selected
            $(".tm-radio-group-1").click(function () {
                $('.tm-radio-group-1').parent().siblings("img").removeClass("darken");
                $(this).parent().siblings("img").addClass("darken");
            });

            $(".tm-radio-group-2").click(function () {
                $('.tm-radio-group-2').parent().siblings("img").removeClass("darken");
                $(this).parent().siblings("img").addClass("darken");
            });

            // Must select at least one checked box
            $(".tm-checkbox").click(function () {
                $(this).parent().siblings("img").toggleClass("darken");
                var requiredCheckboxes = $('.options :checkbox[required]');
                console.log(requiredCheckboxes);

                requiredCheckboxes.change(function(){
                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }});
            });
        });

    </script>
</body>

</html>