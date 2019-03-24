<?php
$con = mysqli_connect("localhost", "root", "", "cake");
    if(mysqli_connect_error()) {
        echo "Can't connect to database... Check your database connection...";
    }
?>