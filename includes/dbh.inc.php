<?php

$servername="localhost";
$dbUsername="u429279072_iyc";
$dbPassword="InternationalYouth2021";
$dbName="u429279072_iyc2021";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Database Connection Failed:". mysqli_connect_error());
}