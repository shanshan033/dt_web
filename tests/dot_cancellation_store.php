<?php
    include("../login/validation/dbConnection.php");

    if(!isset($_POST['username'])){
        echo json_encode(false);
    }else{

    // Obtain the value from form
    $click_id = $_POST['click_id'];
    $answer_flag = $_POST['answer_flag'];
    $correct_number = $_POST['correct_number'];
    $error_number = $_POST['error_number'];
    $total_correct_number = $_POST['total_correct_number'];
    $answer_time = $_POST['answer_time'];
    $total_answer_time = $_POST['total_answer_time'];
    $name = $_POST['username'];

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    //Insert data into database
    $q="INSERT INTO dot_cancellation (user_id, user_name, user_gender, user_age, test_group, click_id, answer_flag, answer_time, correct_number, error_number, total_correct_number, total_answer_time) VALUES ($id,'$name', $gender, $age, $test_times, $click_id, $answer_flag, $answer_time, $correct_number, $error_number, $total_correct_number, '$total_answer_time')";

    $reslut=mysqli_query($con, $q);
    
    if (!$reslut){
        die('Error: ' . mysqli_error($con)); // Error warming
    }else{
        mysqli_close($con); // Close database
        if($correct_number == $total_correct_number){
            echo json_encode(false);
        }else{
            echo json_encode(true);
        }   
    }
}


?>