<?php

session_start();

if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $true = "True";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username,$pwd) !== false){
        header("location: ../executiveLogin.php?error=emptyInput");
        exit();
    }

    else if($username != "executive@jnisiyc.com" || $pwd != "JNISExec@2021"){
        header("location:../executiveLogin.php?error=incorrectPassword");
    }
    else{
        $_SESSION["validExec"] = $true;
        header("location: ../executive.php");
    }
}
else{
    header("location: ../executiveLogin.php");
    exit();
}