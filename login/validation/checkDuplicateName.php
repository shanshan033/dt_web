<?php
    
    include("dbConnection.php");

    $valid_name = $_REQUEST['username'];
    
    // Detect duplicate username 
    $userNameSQL = "SELECT * FROM users WHERE user_name = '$valid_name'";
    $resultSet = mysqli_query($con, $userNameSQL);

    if (mysqli_num_rows($resultSet) > 0) {
        echo json_encode(false);
    }else{
        echo json_encode(true);
    }

?>