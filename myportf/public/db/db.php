<?php

    $dbServer = "localhost";
    $dbUsername = "root";
    $dbPassword = "rootroot";
    $dbName = "portf_mail";
    $dbTable = "mails";

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $mailAddress = $_POST['mail'];
    $message = $_POST['long_text'];

    $query = 
        "INSERT 
        INTO `mails`(`fname`, `sname`, `mail`, `message`) 
        VALUES ('$fname', '$sname', '$mailAddress', '$message' )
        ";
    
    $conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }     
    
    mysqli_query($conn, $query);

?>