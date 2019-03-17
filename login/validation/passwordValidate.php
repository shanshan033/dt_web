<?php

    include("dbConnection.php");

    $valid_name = $_REQUEST['username'];
    $valid_password = $_REQUEST['password'];
    $userNameSQL = "SELECT * FROM users WHERE user_name = '$valid_name' AND user_password = '$valid_password'";
    $resultSet = mysqli_query($con, $userNameSQL);
    if (mysqli_num_rows($resultSet) > 0)
        echo json_encode(true);
    else
        echo json_encode(false);
?>