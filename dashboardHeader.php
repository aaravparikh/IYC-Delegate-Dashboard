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
    $_SESSION["committee"] = $delData["committee"];
    $_SESSION["country"] = $delData["country"];
    $_SESSION["paymentStatus"] = $delData["paymentStatus"];
    $_SESSION["discordStatus"] = $delData["discordStatus"]; 
    if ($data = getPreference($conn, $delData["delId"])) {
        $_SESSION["pId"] = $data["pId"];
    }
};
?>
    <!-- (A) MENU WRAPPER -->
<nav id="hamnav">
    
  <!-- (B) THE HAMBURGER -->
  <label for="hamburger">&#9776;</label>
  <input type="checkbox" id="hamburger"/>
 
  <!-- (C) MENU ITEMS -->

  <div id="hamitems">
  
    <a href="index.php#profile"><?php
        if (isset($_SESSION["delName"])) { 
            echo "Welcome, ".$_SESSION["delName"];
        } else {
            echo "Please Complete Registration";
        }
        ?> </a>
    <a href="index.php">Dashboard</a>
    <a href="muntools.php">Resources & Chat</a>
    <a href="https://jnisiyc.com">IYC Home</a>
    <a href="includes/logout.inc.php">Logout</a>
  </div>
</nav>