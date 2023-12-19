<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function passwordCheck($password, $passwordRepeat) {
    $result;
    if($password !== $passwordRepeat) {
        $result = true;
    } else {
        header("location: ../php/createaccount.php?error=usernametaken");
        $result = false;
    }
    return $result;
}

function checkUser($conn, $username, $email) {
    $sql = "SELECT * FROM customers WHERE user_name = ? OR customer_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/createaccount.php?error=usernametaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function checkAppoinment($conn, $appointmentDate, $appointmentTime) {
    $sql = "SELECT * FROM appointments WHERE appointment_date = ? AND appointment_time = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/appointment.php?error=TimeAndDateTaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $appointmentDate, $appointmentTime);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function bookAppointment($conn, $customerId, $appointmentDate, $appointmentTime, $appointmentDescriptionId) {
    $sql = "INSERT INTO appointments                 
        (appointment_date, appointment_time, 
        appointment_description_id, customers_id) 
        VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/appointment.php?error=stmtfailed");
        exit();
    }
                            
    mysqli_stmt_bind_param($stmt, "ssii", $appointmentDate, $appointmentTime, 
                                $appointmentDescriptionId, $customerId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../php/appointment.php?error=none");
    exit(); 
}

function createUser($conn, $fullname, $firstname, $lastname, $username, $password, $email,  $phone) {
    $sql = "INSERT INTO customers 
    (customer_name, user_name, user_password, 
    customer_first_name, customer_last_name, 
    phone_number, customer_email, customer_is_admin)  
    VALUES (?, ?, ?, ?, ?, ?, ?, 0)";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../php/createaccount.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $username, $password, 
    $firstname, $lastname, $phone, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../php/createaccount.php?error=none");
    exit();  
}

function loginUser($conn, $username, $password) {
    $userNameFound = checkUser($conn, $username, $password);
    var_dump($userNameFound);

    if($userNameFound === false) {
        header("Location: ../php/login.php?error=wronglogin");
        exit();
    }

    $loginPassword = $userNameFound["user_password"];

    if($loginPassword != $password) {
        header("Location: ../php/login.php?error=wrongPassword");
        exit();
    } else if ($loginPassword === $password) {
        session_start();
        $_SESSION["customerId"] = $userNameFound["customer_id"];
        $_SESSION["customer_is_admin"] = $userNameFound["customer_is_admin"];
        $_SESSION["customerName"] = $userNameFound["customer_name"];
        header("Location: ../index.php");
        exit();
    }
}

function updateUser($conn, $customerId, $firstname, $lastname, $username, $email, $phone) {
    $sql = "UPDATE customers 
            SET customer_first_name = ?, 
                customer_last_name = ?, 
                user_name = ?, 
                customer_email = ?, 
                phone_number = ? 
            WHERE customer_id = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/userprofile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $firstname, $lastname, $username, $email, $phone, $customerId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../php/userprofile.php?error=none");
    exit();
}

function deleteAppointment($conn, $appointmentId) {
    $sql = "DELETE FROM appointments 
            WHERE appointment_id = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/adminview.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $appointmentId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../php/adminview.php?error=none");
    exit();
}

