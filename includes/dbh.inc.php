<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="iyc2021";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Database Connection Failed:". mysqli_connect_error());
}