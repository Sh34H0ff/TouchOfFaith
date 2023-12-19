<?php
    session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Touch of Faith</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/styles.css">
    <!--
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" 
    rel="stylesheet">
    -->
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
                    <a href="./php/options.php" class="navbar__links"> See Styles </a>
                </li>
                <?php
                    if(isset($_SESSION["customerId"]) && $_SESSION["customer_is_admin"] == true) {
                            echo "
                            <li class='navbar__item'>
                            <a href='./php/adminview.php' class='navbar__links'> Admin Calander </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='./php/userprofile.php' class='navbar__links'> User profile </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='./includes/logout.inc.php' class='button'> Log Out </a>
                            </li>";
                         
                    } else if (isset($_SESSION["customerId"]) && $_SESSION["customer_is_admin"] == false){
                            echo "
                            <li class='navbar__item'>
                            <a href='./php/seeappointment.php' class='navbar__links'> See Appointments </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='./php/userprofile.php' class='navbar__links'> User profile </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='./includes/logout.inc.php' class='button'> Log Out </a>
                            </li>";
                    
                        } else {
                            echo "
                            <li class='navbar__item'>
                            <a href='./html/bio.html' class='navbar__links'> About Faith </a>
                            </li>
                            <li class='navbar__item'>
                            <a href='./php/login.php' class='navbar__links'> Login </a>
                            </li>";
                            echo "
                            <li class='navbar__btn'>
                            <a href='./php/createaccount.php' class='button'> Create Account </a>
                            </li>";
                        }
                ?>
            </ul>
        </div>
    </nav>
    <script src="./js/app.js"></script>
   
    <div class="main">
        <div class="main__container">
            <div class="main__content">
                <h1>Cosmetologist</h1>
                <h2>SALON</h2>
                <p>Beauty, cosmetic & personal care</p>
                <button class="main__btn"><a href="./php/appointment.php">Book Appointment</a></button>
            </div>
            <div class="main__img--container">
                <img src="images/SquareLogo.jpg" alt="Logo" id="main__img">
            </div>
        </div>
    </div>
</body>

<!--Footer-->
<div class="footer__container">
    <div class="footer__links">
        <div class="footer__link--wrapper">
            <div class="footer__link--items">
                <a href="https://instagram.com/a.touchof.faith?igshid=MzRlODBiNWFlZA=="> 
                <img src="images/Instagram_logo_2022.svg" height = "50" alt="Instagram" id="footer__link--items">
                </a>
                <h2>©Touch of Faith 2023</h2>
            </div>
        </div>
    </div>
</div>

</html>