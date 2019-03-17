<?php 

    include "validation/dbConnection.php";
    
    if(!isset($_POST['submit'])){
        exit("Wrong execute");
    }else{

    // Obtain the value from form
    $name = $_POST['username'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    //Insert data into database
    $q="INSERT INTO users (user_name,user_password, user_age, user_gender) VALUES ('$name','$password', $age, $gender)";

    $reslut=mysqli_query($con, $q);

    if (!$reslut){
        die('Error: ' . mysqli_error($con));//Error warming
    }else{
        mysqli_close($con); //Close database
        header("Refresh:1; url=login.html");// Redirect login page after refreshing 1 second
    }
}


?>