<?php

function emptyInputSignup($email, $pwd, $pwdRepeat)
{
    $result;

    if ( empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($email, $pwd)
{
    $result;

    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputComplete($name, $mobile, $school, $grade, $munXP)
{
    $result;

    if ( empty($name) || empty($mobile) || empty($school) || empty($grade) || empty($munXP)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidMobile($mobile)
{
    $result;

    if (strlen($mobile)!==10) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;

    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../register.php?error=stmtFailure");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $pwd)
{
    $sql = "INSERT INTO users  (userEmail, userPwd ) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../register.php?error=stmtFailure");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location:../login.php");
}

function completeRegistration($conn, $name, $mobile, $school, $grade, $division, $munXP, $userId)
{
    $sql = "INSERT INTO deldata (delName, delMobile, delSchool, delGrade, delDivision, delMunXP, userId ) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../completeRegistration.php?error=stmtFailure");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssissi", $name, $mobile,$school, $grade, $division, $munXP, $userId);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../index.php?error=none");
    
    $_SESSION["delName"] = $name;
    exit();
}

function loginUser($conn, $email, $pwd){
    $emailExists = emailExists($conn, $email);

    if($emailExists === false){
        header("location: ../register.php?error=nonExistentUser");
        exit();
    }

    $dbPass = $emailExists["userPwd"];

    if($pwd!==$dbPass){
        header("location:../login.php?error=incorrectPassword");
        exit();
    }
    else if($dbPass==$pwd){
        session_start();
        $_SESSION["userId"] = $emailExists["userId"];
        header("location:../index.php");
        exit();
    }

}

function getStatus($conn){
    $sql = "SELECT * FROM deldata WHERE userId=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $userId = $_SESSION["userId"];
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch the data  
    return $user;
}



