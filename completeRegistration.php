<?php
    include_once("header.php");
    if (!isset($_SESSION["userId"])) {
        header("location:register.php");
    }
?>




    <container class="pageHolder">

        <div class="signup-form background-graphic-dark"></div>

        <div class="signup-form background-graphic">

        </div>

        <div class="signup-form">
            <div class="imgholder">
                <img src="img/IYC Logo.png" alt="" class="logo">
            </div>
            <form action="includes/complete.inc.php" class="signup" method="POST" autocomplete="off">
                <h6 class="formTitle">Complete Registration</h6>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput") {
                        echo "<p> Please fill all fields</p>";                    
                    } else if ($_GET["error"] == "stmtFailure") {
                        echo "<p>Something went wrong! Please try again or contact the tech team</p>";
                    } else if ($_GET["error"] == "invalidMobile"){
                        echo "<p> Please enter valid mobile number</p>";
                    }
                }
                ?>
                <input type="text" name="name" placeholder="Name" class="inputField">
                <input type="text" name="mobile" placeholder="Mobile Number" class="inputField">
                <input type="text" name="school" placeholder="School Name" class="inputField">
                <input type="text" name="grade" placeholder="Grade" class="inputField">
                <input type="text" name="division" placeholder="Division (JNIS ONLY)" class="inputField">
                <textarea type="text" name="munXP" placeholder="MUN Experience" class="inputField long"></textarea>
                <button class="submit inputField" type="submit" name="submit">Register</button>
                <p class="altAction"><a href="help.php"> Help</a> </p>
            </form>



        </div>
    </container>
</body>

</html>