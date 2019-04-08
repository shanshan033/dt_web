<?php
    include("../login/validation/dbConnection.php");

    if(!isset($_POST['username'])){
        echo json_encode(false);
    }else{

    // Obtain the value from form
    $total_correct_number = $_POST['total_correct_number'];
    $total_answer_time = $_POST['total_answer_time'];
    $name = $_POST['username'];
    session_start();
    $group_time = $_SESSION["group_dot"];

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    $clicks = $_POST['clicks'];
    
    foreach ( $clicks as $click){
        $answer_time = $click["time"];
        $answer_flag = $click["err"];
        $click_id = $click["click_id"];
         //Insert data into database
        $q="INSERT INTO dot_cancellation (user_id, user_name, user_gender, user_age, test_group, group_times, click_id, answer_flag, answer_time, total_correct_number, total_answer_time) VALUES ($id,'$name', $gender, $age, $test_times, $group_time, $click_id, $answer_flag, $answer_time, $total_correct_number, '$total_answer_time')";

        $reslut=mysqli_query($con, $q);
        if (!$reslut){
            die('Error: ' . mysqli_error($con));//Error warming
        }
    }

    mysqli_close($con);//Close database
    // Need to take 3 times
    if($group_time < 3){
        $_SESSION["group_dot"] = $_SESSION["group_dot"] + 1;
        echo json_encode(false);
     }else{
        $_SESSION["group_dot"] = 1;
        echo json_encode(true);
     }        

}


?>