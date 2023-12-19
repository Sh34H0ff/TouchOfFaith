<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Information</title>
</head>
<body>

<div class="main">
        <div class="main__container">
            <div class="main__content">

<?php 
include_once '../includes/connect.inc.php';

if(isset($_SESSION["customerId"])) {
    $customerId = $_SESSION["customerId"];

    $sql = "SELECT customers.customer_first_name, customers.customer_last_name, 
                    appointments.appointment_id, appointments.appointment_date, 
                    appointments.appointment_time 
            FROM customers
            INNER JOIN appointments ON customers.customer_id = appointments.customers_id
            WHERE customers.customer_id = $customerId";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "First Name:   " . $row['customer_first_name'] . "<br>";
            echo "Last Name:    " . $row['customer_last_name'] . "<br>";
            echo "Appointment ID:  " . $row['appointment_id'] . "<br>";
            echo "Appointment Date: " . $row['appointment_date'] . "<br>";
            echo "Appointment Time: " . $row['appointment_time'] . "<br><br>";
        }
    } else {
        echo "No appointment scheduled";
    }
}
?>

            </div>
        </div>
    </div>
  
</body>
</html>

<?php
include_once 'footer.php';
?>