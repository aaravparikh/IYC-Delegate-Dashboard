<?php

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["rePwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email,$pwd,$pwdRepeat) !== false){
        header("location: ../register.php?error=emptyInput");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidEmail");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../register.php?error=pwdMatchError");
        exit();
    }

    if(emailExists($conn, $email) !== false){
        header("location: ../register.php?error=emailAlreadyRegistered");
        exit();
    }

    createUser($conn, $email, $pwd);
    


}
else{
    header("location: ../register.php");
    exit();
}