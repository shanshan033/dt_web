<?php

    session_start();
    $name = $_SESSION["name"];  
    $group_time = $_SESSION["group_schutle"];

    include("../../login/validation/dbConnection.php");
  
    // Save each try
    if(isset($_POST['clicks'])){
        // Obtain the value from form


    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];

    $total_time = $_POST['total_time'];
    $correct_clicks = intval($_POST['correctClicks']);
    $wrong_clicks = intval($_POST['wrongClicks']);

    $clicks = $_POST['clicks'];

    foreach ($clicks as $click){
        $answer_number = $click["number"];
        $answer_flag = $click['err'] === "false" ? "true" : "false";
        $answer_time = $click['time'];

            //Insert data into database
        $q="INSERT INTO schulte_table (user_name, user_id, user_gender, user_age, test_group, group_times, answer_number, answer_flag, answer_time, total_time, correct_clicks, wrong_clicks) VALUES ('$name', $id, $gender, $age, $test_times, $group_time, '$answer_number', '$answer_flag', '$answer_time', '$total_time', $correct_clicks, $wrong_clicks)";

        $reslut=mysqli_query($con, $q);
        if (!$reslut){
            die('Error: ' . mysqli_error($con));//Error warming
        }  
    }

    mysqli_close($con);//Close database
    if($group_time < 3){
        $_SESSION["group_schutle"] = $_SESSION["group_schutle"] + 1;
        echo json_encode(false);
    }else{
        $_SESSION["group_schutle"] = 1;
        echo json_encode(true);
    }


    }
?>