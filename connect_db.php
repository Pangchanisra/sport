<?php
    $user="flookdxd";
    $pass="Flook@012345";
    $db="university";
    $host="localhost";

    $conn=mysqli_connect($host,$user,$pass,$db);
    // Check connection
    mysqli_query($conn, "SET NAMES UTF8");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>