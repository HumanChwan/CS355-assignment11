<?php 
    $db_host = "localhost";
    $db_username = "assign";
    $db_password = "pass";
    $db_name = "library_db11";

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Could not connect" . mysqli_connect_error());
    }
    echo "<script>console.log('db connected')</script>";
?>
