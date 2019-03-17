<?php 
    
    include("validation/dbConnection.php");
    
    if(!isset($_POST['submit'])){
        exit("Wrong execute");
    }

    $name = $_POST['username'];
    $password = $_POST['password'];

    //Insert data into database
    $q="SELECT * FROM users WHERE user_name = '$name' AND user_password = '$password' ";

    $reslut=mysqli_query($con, $q);
 
    if (!$reslut){
        die('Error: ' . mysqli_error($con));// Error warming
    }else{
        if (mysqli_num_rows($reslut) > 0){
             // Create session
            session_start();
            $_SESSION["name"] = $name;

            mysqli_close($con); //Close database
            header("Refresh:1; url=../questionnaires/questionnaire_a.php"); // Redirect questionnaire page after refreshing 1 second
        }else{
            header("Refresh:1; url=login.html");
            // echo json_encode(false);
        }
    }
?>