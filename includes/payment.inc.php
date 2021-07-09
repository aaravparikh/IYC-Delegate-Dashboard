<?php

session_start();
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $delId = $_SESSION["delId"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $query = "UPDATE  deldata SET paymentStatus = 'processing' WHERE delId =".$delId;
    if ($conn->query($query)) {
        header("location: https://www.schoolpay.co.in/form_generator/view.php?id=31370");
    } else {
        echo $conn->error;
    }

