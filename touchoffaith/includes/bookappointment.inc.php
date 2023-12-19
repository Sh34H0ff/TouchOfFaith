<?php

session_start();

if (isset($_POST["submit"]) && isset($_SESSION["customerId"])) {
    $customerId = $_SESSION["customerId"];
    
    if (isset($_POST['appointment_date'], $_POST['appointment_time'], $_POST['appointment_type'])) {
        $appointmentDate = $_POST['appointment_date'];
        $appointmentTime = $_POST['appointment_time'];
        $appointmentDescriptionId = $_POST['appointment_type'];

        require_once 'connect.inc.php';
        require_once 'functions.inc.php';

        if(checkAppoinment($conn, $appointmentDate, $appointmentTime) !== false){
            header("Location: ../php/appointment.php?error=AppointmentDateTaken");
            exit();
        }

        bookAppointment($conn, $customerId, $appointmentDate, $appointmentTime, $appointmentDescriptionId);
        header("Location: ../php/appointment.php?error=AppointmentBooked");
        
    } else {
        echo "Error: One or more required fields are missing.";
    }
} else {
    header("Location: ../php/appointment.php?error=PleaseLogin");
}

