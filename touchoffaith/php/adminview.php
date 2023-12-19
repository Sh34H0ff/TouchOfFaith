<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin view</title>
    
</head>

<body>


<?php 
include_once '../includes/connect.inc.php';

if(isset($_SESSION["customerId"])) {
    //$customerId = $_SESSION["customerId"];

    // Get current date
    $currentDate = date('Y-m-d');
    $datePlus1 = date('Y-m-d', strtotime('+1 day'));
    $datePlus2 = date('Y-m-d', strtotime('+2 day'));
    $datePlus3 = date('Y-m-d', strtotime('+3 day'));
    $datePlus4 = date('Y-m-d', strtotime('+4 day'));
    $datePlus5 = date('Y-m-d', strtotime('+5 day'));
    $datePlus6 = date('Y-m-d', strtotime('+6 day'));

    // Calculate 7 days from today
    ;
    $sevenDaysLater = date('Y-m-d', strtotime($currentDate . ' + 7 days'));

    $sql = "SELECT customers.customer_first_name, customers.customer_last_name, 
                    appointments.appointment_id, appointments.appointment_date, 
                    appointments.appointment_time, appointment_description.appointment_description
            FROM customers
            INNER JOIN appointments ON customers.customer_id = appointments.customers_id
            INNER JOIN appointment_description ON appointments.appointment_description_id = appointment_description.appointment_description_id
            AND appointments.appointment_date BETWEEN '$currentDate' AND '$sevenDaysLater'
            ORDER BY appointments.appointment_date, appointments.appointment_time";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $todaysDate = array($currentDate, $datePlus1, $datePlus2, 
                        $datePlus3, $datePlus4, $datePlus5,
                        $datePlus6);

    echo "<br><br><br> ";
    echo "<table bgcolor = 'black' align = 'center'> <tr bgcolor = #e8d2bb >";
        for ($i=0;$i<count($todaysDate); $i++) {
            echo "<th>{$todaysDate[$i]}</th>";
        }
            echo "</tr> ";
           
            $addDay = 0;
            $firstDate = $todaysDate[0]; 
            
            $htmlArray = array('','','','','','','');
            if($resultCheck > 0) {
                echo "<tr bgcolor='#fff' align='center'>";
                while($row = mysqli_fetch_assoc($result)) {
                    $displayApp = "";
                    $displayApp .= "First Name:   " . $row['customer_first_name'] . "<br>";
                    $displayApp .= "Last Name:    " . $row['customer_last_name'] . "<br>";
                    $displayApp .= "Appointment ID:  " . $row['appointment_id'] . "<br>";
                    $displayApp .= "Appointment Date: " . $row['appointment_date'] . "<br>";
                    $displayApp .= "Appointment Time: " . $row['appointment_time'] . "<br>";
                    $displayApp .= "Appointment Type: " . $row['appointment_description'] . "<br><br>";
                    
                    $indexNum = array_search($row['appointment_date'], $todaysDate);
                    $htmlArray[$indexNum] .= $displayApp;     
                }
                
                for($i=0;$i<count($htmlArray); $i++) {
                    echo "<td>";
                    if ($htmlArray[$i] == '') {
                        echo "No appointments today";
                    } else {
                        echo $htmlArray[$i];
                        echo "</td>";
                    }

                }
                echo "</tr>";   
                echo "</table>";
            } else {
                echo "No upcoming appointments available within the next 7 days.";
            }
        }
?>

        <form action="../includes/cancelappointment.inc.php" method="post">

            <h3> Cancel Appointment </h3>
            <label for="cancelAppointment"> Enter appointment ID#:</label>
            <input type="number" id="appointment" name="appointmentId" placeholder="Enter Appointement ID#" required>
            <br>
            <button type = "submit" name = "delete"> Delete Appointment </button>

        </form>
    </body>
</html>

<?php
  if(isset($_GET["error"])) {
    if ($_GET["error"] == "stmtfailed") {
        echo "<p>Removal Failed</p>";          
    } else if ($_GET["error"] == "none") 
        echo "<p>You have deleted the appointment!</p>";
  }
    include_once 'footer.php';
?>