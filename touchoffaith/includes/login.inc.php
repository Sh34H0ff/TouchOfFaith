<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    loginUser($conn, $username, $password);

}