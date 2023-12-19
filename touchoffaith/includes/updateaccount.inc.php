<?php 
session_start();

if(isset($_SESSION["customerId"])) {
    $customerId = $_SESSION["customerId"];
    
        if (isset($_POST["update"])) {

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];


            require_once 'connect.inc.php';
            require_once 'functions.inc.php';
        
            updateUser($conn, $customerId, $firstname, $lastname, $username, $email, $phone);
            header("Location: ../index.php");

        } else {
            header("Location: ../php/userprofile.php");
        }
}

