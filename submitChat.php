<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';


session_start();

$delData = getStatus($conn);

    $message = $_POST["message"];
    $receiverCountry= $_GET["location"];
    $_SESSION["position"] = $_GET["position"];
    $author = $_SESSION["country"];
    $receiverCommittee = $_SESSION["committee"];

    print $message; 
    print $receiverCommittee; 
    print $receiverCountry;
    print $author;


    
    sendMessage($conn, $author, $receiverCommittee, $receiverCountry, $message);



