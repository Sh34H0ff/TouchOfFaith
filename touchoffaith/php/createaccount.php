<?php
    include_once 'header.php';
?>
<!-- 
    <link rel="stylesheet" href="../CSS/account.css">
    -->

    <div class="profile">
        <div class="profile__container">
            <div class="profile__content">
    <form action="../includes/createaccount.inc.php" method="post">
        <h1>Create Account</h1>
                <div>
                    <label for="fullname"> Enter full name:</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required 
                    value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="firstname"> Enter first name:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required
                    value="<?php echo isset($_GET['firstname']) ? $_GET['firstname'] : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="lastname"> Enter last name:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last name" required
                    value="<?php echo isset($_GET['lastname']) ? $_GET['lastname'] : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="username"> Create username:</label>
                    <input type="text" id="username" name="username" placeholder="user name" required
                    value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="password"> Create password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div> 
                <br>
                <div>
                    <label for="passwordRepeat"> Retype password:</label>
                    <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="passwordRepeat" required>
                </div> 
                <br>
                <div>
                    <label for="email"> Enter email:</label>
                    <input type="email" id="email" name="email"  placeholder="email@gmail.com"required
                    value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="phone"> Enter phone #:</label>
                    <input type="tel" id="phone" name="phone" placeholder="(123)-456-7890" required
                    value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
                </div>
                <br>
                <div>
                    <input type = "reset">
                </div> 
                <br>
                <div>
                    <button type = "submit" name = "submit"> Create Account </button>
                 </div>
                 <br>
                 </div>
                 <div class="profile__img--container">
                <img src="../images/HairCut.jpg" height = "100" alt="Logo" id="main__img">
            </div>
    </form>
   
        </div>
    </div>
<?php 
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords do not match</p>";
        } else if ($_GET["error"] == "usernametaken") {
            echo "<p>User name is taken!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
    }

    include_once 'footer.php';
?>
           