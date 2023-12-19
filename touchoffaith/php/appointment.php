<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- 
    <link rel="stylesheet" href="../CSS/account.css">
    -->
</head>

<body>

<div class="main">
    <div class="main__container">
        <div class="main__content">

    <div class="calendar">
        <form action="../includes/bookappointment.inc.php" method="POST">
            <h1> Book Appointment </h1>
            <br>
            <div>
                <label for="appointment_date"> Select date: </label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>
            <br>
            <div>
                <label for="Select_time"> Select a time:</label>
                <select type = "text" id="select_time" name="appointment_time" required>
                    <option value="12:00">12:00</option>
                    <option value="1:00">1:00</option>
                    <option value="2:00">2:00</option>
                    <option value="3:00">3:00</option>
                    <option value="4:00">4:00</option>
                    <option value="5:00">5:00</option>
                    <option value="6:00">6:00</option>
                </select>
            </div>
            <br>
            <div>
                <label for="appointment_type"> Select a style:</label>
                <select type = "number" id="appointment_type" name="appointment_type" required>
                    <option value="1">Hair Cut(Men) - 30 minutes</option>
                    <option value="2">Hair Cut(Womens) - 30 minutes</option>
                    <option value="3">Blowout - 30 minutes</option>
                    <option value="4">Color - 60 minutes</option>
                    <option value="5">Makeup - 30/60 minutes</option>
                    <option value="6">Nails - 30/60 minutes</option>
                    <option value="7">Brows/Lashes - 30/60 minutes</option>
                    
                </select>
            </div>
            <br>
            <div>
                <input class = "main__btn" type = "reset">
            </div> 
            <br>
            <div>
                <button class = "main__btn" type = "submit" name = "submit"> Book Appointment </button>
            </div>
        </form>    
    </div>

        </div>
    </div>
</div>

</body>
</html>

<?php 
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "AppointmentDateTaken") {
            echo "<p>Sorry! that Date and Time is Already Taken</p>";
        } else if ($_GET["error"] == " PleaseLogin") {
            echo "<p>YPlease Login or create an Account!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>Your appointment has been booked! See you soon!</p>";
        }
    }
   
    include_once 'footer.php';
?>