<?php
    
    include("../../login/validation/dbConnection.php");
    
    if(!isset($_POST["image"])){
        echo json_encode(false);
    }else{

    $image = $_POST["image"];
    $name = $_POST["username"];
    $answer_time = $_POST["time"];

    $q = "SELECT * FROM users WHERE user_name = '$name' ";
    $reslut = mysqli_query($con, $q);
    $row = mysqli_fetch_row($reslut);
    $id = $row[0];
    $age = $row[3];
    $gender = $row[4];
    $test_times = $row[5];
   

    //Insert data into database
    $q="INSERT INTO mouse_tracking (user_name, user_id, user_gender, user_age, test_group, image, answer_time) VALUES ('$name', $id, $gender, $age, $test_times, '$image', '$answer_time')";

    $reslut=mysqli_query($con, $q);

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con);//Close database
        echo json_encode(true);   
    }

}

?>