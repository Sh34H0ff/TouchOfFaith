<?php 
session_start();

        if (isset($_POST["delete"])) {

            $appointmentId = $_POST['appointmentId'];

            require_once 'connect.inc.php';
            require_once 'functions.inc.php';
        
            deleteAppointment($conn, $appointmentId);
            header("Location: ../index.php");

        } else {
            header("Location: ../php/adminview.php");
        }