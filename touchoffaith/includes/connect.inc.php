<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "salondatabase";

$conn = mysqli_connect('localhost', 'root', '', 'salondatabase');

if ($conn->connect_error) {
    //echo "createaccount.inc.php";
    die('Connection Failed: ' . $conn->connect_error);
}