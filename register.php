<?php
    include_once("header.php")
?>




    <container class="pageHolder">

        <div class="signup-form background-graphic-dark"></div>

        <div class="signup-form background-graphic">

        </div>

        <div class="signup-form">
            <div class="imgholder">
                <img src="img/IYC Logo.png" alt="" class="logo">
            </div>
            <form action="includes/signup.inc.php" class="signup" method="POST">
                <h6 class="formTitle">Delegate Registration</h6>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput") {
                        echo "<p> Please fill all fields</p>";
                    } else if ($_GET["error"] == "invalidEmail") {
                        echo "<p> Please enter valid email</p>";
                    } else if ($_GET["error"] == "pwdMatchError") {
                        echo "<p> Passwords do not match</p>";
                    } else if ($_GET["error"] == "emailAlreadyRegistered") {
                        echo "<p>This email has already been registered</p>";
                    } else if ($_GET["error"] == "stmtFailure") {
                        echo "<p>Something went wrong! Please try again or contact the tech team</p>";
                    } else if ($_GET["error"] == "nonExistentUser") {
                        echo "<p>User does not exist. Please register instead</p>";
                    }
                }
                ?>
                <input type="text" name="email" placeholder="Email ID" class="inputField">
                <input type="password" name="pwd" placeholder="Password" class="inputField">
                <input type="password" name="rePwd" placeholder="Re-enter Password" class="inputField">
                <button class="submit inputField" type="submit" name="submit">Register</button>
                <p class="altAction"><a href="login.php"> Log In Instead? </a></p>
                <p class="altAction"><a href="help.php"> Help</a> </p>
            </form>



        </div>
    </container>
</body>

</html>