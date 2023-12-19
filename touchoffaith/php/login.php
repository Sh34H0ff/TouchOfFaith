<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--
    <link rel="stylesheet" href="../CSS/account.css">
-->
</head>
<body>
    <img src="../images/SquareLogo.jpg" 
                height = 300 width = 300 
                alt="Logo" title = "Logo"
                Style = "float: center;">
    <br>       
    
    <form action = "../includes/login.inc.php" method = "POST" >
       
        <h1> Login Here</h1>
        <div>
            <label for="username"> Enter Username:</label>
            <input type="text" id="username" name="username" placeholder="User name" required>
        </div>
        <br>
        <div>
            <label for="password"> Enter password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div> 
        <br>
            <div>
                <button type = "submit" name = "submit"> Login In </button>
            </div> 
    </form>
        <a href = "../php/createaccount.php" target=_self title="Create Account"> 
                <button Style = "float: right;font-size:25px; border-radius: 25px;"> 
                    Create Account </button>
            </a>

</body>
</html>

<?php 
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "wronglogin") {
            echo "<p>Username not found!</p>";
        } else if ($_GET["error"] == "wrongPassword") {
            echo "<p>Incorrect Password!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have logged in!</p>";
        }
    }
    
    include_once 'footer.php';
?>