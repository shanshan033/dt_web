<?php

    session_start();
    $name = $_SESSION["name"];  

    include("../../login/validation/dbConnection.php");
  
    // Save each try
    if(isset($_POST['answer_number'])){
        // Obtain the value from form
    $answer_number = $_POST['answer_number'];
    $answer_flag = $_POST['answer_flag'];
    $answer_time = $_POST['time'];
    $total_time = $_POST['total_time'];
    $correct_clicks = intval($_POST['correctClicks']);
    $wrong_clicks = intval($_POST['wrongClicks']);

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    //Insert data into database
    $q="INSERT INTO schulte_table (user_name, user_id, user_gender, user_age, test_group, answer_number, answer_flag, answer_time, total_time, correct_clicks, wrong_clicks) VALUES ('$name', $id, $gender, $age, $test_times, '$answer_number', '$answer_flag', '$answer_time', '$total_time', $correct_clicks, $wrong_clicks)";

    $reslut=mysqli_query($con, $q);

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
        echo json_encode(true);
    }
}
?>