<?php 

    session_start();
    $name = $_SESSION["name"];
    include("../login/validation/dbConnection.php");
  
    if(isset($_POST['submitA']) || isset($_POST['submitB']) ){
        
        if (isset($_POST['submitA'])){
            $questionNumber = 9;
            $url = "../tests/welcome.php";
            $questionnaires = "A";
        }else if (isset($_POST['submitB'])){
            $questionNumber = 6;
            $url = "../tests/goodbye.php";
            $questionnaires = "B";
        }

        //Insert data into database
        // Search user id matching user name
        $q = "SELECT user_id, test_times FROM users WHERE user_name = '$name' ";
        $reslut = mysqli_query($con, $q);
        $row = mysqli_fetch_row($reslut);
        $id = $row[0];
        $test_times = $row[1];

        for ($i = 1; $i<$questionNumber; $i++){
            
            if(isset($_POST['q'.$i])){
                $question = 'q'.$i;
                $answer = $_POST['q'.$i];
                if(is_array($answer)){
                    $answer = implode(", ",$answer);
                }
                date_default_timezone_set("Asia/Shanghai");
                $time = date("Y-m-d h:i:sa");
                 // Insert questionnaires answer into 
                $q="INSERT INTO questionnaire (user_id, user_name, test_times, questionnaire_type, question, answer, answer_time) VALUES ( $id,'$name', $test_times, '$questionnaires', '$question', '$answer','$time')";
                $reslut=mysqli_query($con, $q);
                if (!$reslut){
                    die('Error: ' . mysqli_error($con));//Error warming
                }
            }else{
                exit("wrong excute");
            }

        }
        mysqli_close($con);//Close database
        header("Refresh:1; url=". $url);
}
?>