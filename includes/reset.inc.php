<?php

if(isset($_POST["submit"])){

    $email = "pankhudi.mohan@jnis.ac.in";
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["rePwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email, $pwd, $pwdRepeat) !== false){
        header("location: ../passwordReset.php?error=emptyInput");
        exit();
    }



    else if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../passwordReset.php?error=pwdMatchError");
        exit();
    }


    else{
    passwordReset($conn, $email, $pwd);
    }


}
else{
    header("location: ../register");
    exit();
}