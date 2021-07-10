<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

require_once 'header.php';

if (!isset($_SESSION["userId"])) {
    header("location:register.php");
}

$delData = getStatus($conn);


if ($delData !== null) {
    $_SESSION["delId"] = $delData["delId"];
    $_SESSION["delName"] = $delData["delName"];
    $_SESSION["paymentStatus"] = $delData["paymentStatus"];
    $_SESSION["discordStatus"] = $delData["discordStatus"];
    if ($data = getPreference($conn, $delData["delId"])) {
        $_SESSION["pId"] = $data["pId"];
    }
};


?>

<container class="dashboard">
    <div class='mainNav'>
        <?php
        if (isset($_SESSION["delName"])) {
            echo "<div class='navDiv'> Welcome, " . $_SESSION["delName"] . "</div>";
        } else {
            echo "<div class='navDiv'> Please Complete Registration </div>";
        }
        ?>
        <div class='navDiv'> IYC Home</div>
        <div class='navDiv '> Profile</div>
        <a href="includes/logout.inc.php">
            <div class='navDiv '> Logout</div>
        </a>

    </div>