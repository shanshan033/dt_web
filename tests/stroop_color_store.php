<?php
    include("../login/validation/dbConnection.php");

    if(!isset($_POST['clicks'])){
        echo json_encode(false);
    }else{

    $name = $_POST['username'];

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    // Obtain the value from form
    $clicks = $_POST['clicks'];

    foreach ( $clicks as $click){
        $answer_time = $click["time"];
        $answer_flag = $click["err"];
        $question_id = $click["question"];
        $total_answer_time = $_POST['total_answer_time'];
         //Insert data into database
        $q="INSERT INTO stroop_color (user_name, user_id, user_gender, user_age, test_group, question_id, answer_time, total_answer_time, answer_flag) VALUES ('$name', $id, $gender, $age, $test_times, $question_id, '$answer_time', '$total_answer_time', $answer_flag)";

        $reslut=mysqli_query($con, $q);
        if (!$reslut){
            die('Error: ' . mysqli_error($con));//Error warming
        }
    }
        mysqli_close($con);//Close database
        echo json_encode(true);
    }

?>