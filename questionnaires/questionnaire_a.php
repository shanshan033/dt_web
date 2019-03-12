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
    <title>Questionaires A</title>

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
                    <?php echo "</br><p class='mb-0'> Hello {$name},</br> The aim of this project is to research what is the relationship between multiple temperatures and focus level. A website which contain a set of “attention level” tests will be designed and developed. The participants will be asked to complete the tests during a set of controlled experiments. All survey results is anonymous, please answer the following question in true. Thank you :)</p>";?>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>

        <form action="questionnaires.php" method="post" id="questionatireAForm">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-question-header">Question 1</h2>
                    <p>Do you have any cognitive deficits?</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a1" required/>
                                <span>Yes</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q1" type="radio" value="q1_a2" />
                                <span>No</span>
                            </div>
                        </label>
                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 2</h2>
                    <p>Have you attempted any attention-based experiment in the past?</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a1" required/>
                                <span>Yes</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q2" type="radio" value="q2_a2" />
                                <span>No</span>
                            </div>
                        </label>
                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 3</h2>
                    <p>Do you think temperature can affect the level of your attention?</p>
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
                    <p>Please rate your current thermal sensation.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q4" type="radio" value="q4_a1" required/>
                                <span>Cold</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q4" type="radio" value="q4_a2" />
                                <span>Cool</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q4" type="radio" value="q4_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q4" type="radio" value="q4_a4" />
                                <span>Warm</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q4" type="radio" value="q4_a5" />
                                <span>Hot</span>
                            </div>
                        </label>

                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 5</h2>
                    <p>Please rate your current thermal comfort.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q5" type="radio" value="q5_a1" required/>
                                <span>Very uncomfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q5" type="radio" value="q5_a2" />
                                <span>Slightly cncomfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q5" type="radio" value="q5_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q5" type="radio" value="q5_a4" />
                                <span>Slightly comfortable</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q5" type="radio" value="q5_a5" />
                                <span>Very comfortable</span>
                            </div>
                        </label>

                    </div>
                </div> <!-- col-12 -->


                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 6</h2>
                    <p>Please rate your current noise comfort.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q6" type="radio" value="q6_a1" required/>
                                <span>Very quiet</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q6" type="radio" value="q6_a2" />
                                <span>Slightly quiet</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q6" type="radio" value="q6_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q6" type="radio" value="q6_a4" />
                                <span>Slightly noisy</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q6" type="radio" value="q6_a5" />
                                <span>Very noisy</span>
                            </div>
                        </label>
                    </div>
                </div> <!-- col-12 -->

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h2 class="tm-question-header tm-question-header-mt">Question 7</h2>
                    <p>Please rate your current lighting comfort.</p>
                    <div class="tm-q-choice-container">
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q7" type="radio" value="q7_a1" required/>
                                <span>Very dim</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q7" type="radio" value="q7_a2" />
                                <span>Slightly dim</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                        <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q7" type="radio" value="q7_a3" />
                                <span>Natural</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q7" type="radio" value="q7_a4" />
                                <span>Slightly bright</span>
                            </div>
                        </label>
                        <label class="tm-q-choice">
                            <div class="mb-3">
                                <input class="tm-radio-group-1 with-gap" name="q7" type="radio" value="q7_a5" />
                                <span>Very bright</span>
                            </div>
                        </label>
                    </div>
                </div> <!-- col-12 -->
                
                <div class="col-12">
                	<hr>
                	<h2 class="tm-question-header tm-question-header-mt">Additional Opinions</h2>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <textarea class="p-3" name="message" id="message" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center tm-submit-container">
                    <input type="submit" value = "Submit" name = "submitA" class="btn btn-primary tm-btn-submit">
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


    </script>
</body>

</html>