<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
</head>

<body>

<div class="profile">
        <div class="profile__container">
            <div class="profile__content">
    <form action="../includes/updateaccount.inc.php" method="post">
    <?php 
    include_once '../includes/connect.inc.php';
    
    if(isset($_SESSION["customerId"])) {
        $customerId = $_SESSION["customerId"];

        $sql = "SELECT * FROM customers WHERE customer_id = $customerId";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<h3>";
                echo "First Name:       " . "<br>". "<input type = 'text' name = 'firstname' value= '".$row['customer_first_name'] ."'required><br>";
                echo "<br>Last Name:   " . "<br>". "<input type = 'text' name = 'lastname' value= '".$row['customer_last_name'] ."'required><br>";
                echo "<br>User Name:   " . "<br>". "<input type = 'text' name = 'username' value= '".$row['user_name'] ."'required><br>";
                echo "<br>Customer ID#:  " . "<br>".$row['customer_id'] ."<br>";
                echo "<br>Email:        " . "<br>". "<input type = 'email' name = 'email' value= '".$row['customer_email'] ."'required><br>";
                echo "<br>Phone #:      " . "<br>". "<input type = 'tel' name = 'phone' value= '".$row['phone_number'] ."'required><br>";
                echo "</h3>";    
            }
        } else {
            echo "No information Avalible";
        }
    }
    ?>
        <br>
        <button type = 'reset'> Revert Changes </button>
        <br>
        <br>
        <button type = 'submit' name = 'update'> Update Account </button>
    </form>
    </div>
        </div>
    </div>
</body>
</html>

<?php
  if(isset($_GET["error"])) {
    if ($_GET["error"] == "stmtfailed") {
        echo "<p>Update Failed</p>";          
    } else if ($_GET["error"] == "none") 
        echo "<p>You have updated your account!</p>";
  }

    include_once 'footer.php';
?>


