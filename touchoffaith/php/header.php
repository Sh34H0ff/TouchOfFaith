<?php
    session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Touch of Faith</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="../css/styles.css">
</head>
     <!--This is how to leave a comment-->
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="https://instagram.com/a.touchof.faith?igshid=MzRlODBiNWFlZA==" id="navbar__logo"> 
                Touch of Faith</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="options.php" class="navbar__links"> See Styles </a>
                </li>
                <?php
                    if(isset($_SESSION["customerId"]) && $_SESSION["customer_is_admin"] == true) {
                            echo "
                            <li class='navbar__item'>
                            <a href='adminview.php' class='navbar__links'> Admin Calander </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='userprofile.php' class='navbar__links'> User profile </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='../includes/logout.inc.php' class='button'> Log Out </a>
                            </li>";
                         
                    } else if (isset($_SESSION["customerId"]) && $_SESSION["customer_is_admin"] == false){
                            echo "
                            <li class='navbar__item'>
                            <a href='seeappointment.php' class='navbar__links'> See Appointments </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='userprofile.php' class='navbar__links'> User profile </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='../includes/logout.inc.php' class='button'> Log Out </a>
                            </li>";
                    
                        } else {
                            echo "
                            <li class='navbar__item'>
                            <a href='../html/bio.html' class='navbar__links'> About Faith </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='login.php' class='navbar__links'> Login </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='createaccount.php' class='button'> Create Account </a>
                            </li>";
                        }
                ?>
            </ul>
        </div>
    </nav>
    <script src="../js/app.js"></script>