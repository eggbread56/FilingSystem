<?php
    include_once 'php/console-log.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filingsystem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        console_log('Connection to DB unsuccessful!');
        die("Connection failed: " . $conn->connect_error);
    }
    console_log('Connection to DB successful!');
?>