<?php 

if (isset($_POST["submit"])) {

    $fullname = $_POST['fullname'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    require_once 'connect.inc.php';
    require_once 'functions.inc.php';
  
    if(passwordCheck($password, $passwordRepeat) !== false){
        header("Location: ../php/createaccount.php?error=passwordsdontmatch");
        exit();
    }
    if(checkUser($conn, $username, $email) !== false){
        header("Location: ../php/createaccount.php?error=usernametaken&fullname=$fullname&firstname=$firstname&lastname=$lastname&username=$username&email=$email&phone=$phone");
        exit();
    }

    createUser($conn, $fullname, $firstname, $lastname, $username, $password, $email,  $phone);
    header("Location: ../index.php");

} else {
    header("Location: ../php/createaccount.php");
}