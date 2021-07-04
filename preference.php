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
            <div class="preferenceForm">
            <form action="includes/complete.inc.php" class="signup" method="POST" autocomplete="off">
                <h6 class="formTitle">Assign Preferences</h6>
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
                <select name="committee1" placeholder="1st Committee Preference" class="prefInput" required="">
                    <option disabled="" selected="">1st Preference [Committee] </option>
                    <option value = "g8">G8</option>
                    <option value = "g14">G14</option>
                    <option value = "g20">G20</option>
                    <option value = "gso">GSO</option>
                    <option value = "gmc">GMC</option>
                </select>
                <input type="text" name="mobile" placeholder="Mobile Number" class="prefInput item2">
                <input type="text" name="school" placeholder="School Name" class="prefInput item3">
                <input type="text" name="grade" placeholder="Grade" class="prefInput item4">
                <input type="text" name="division" placeholder="Division (JNIS ONLY)" class="prefInput item5">
                <textarea type="text" name="munXP" placeholder="MUN Experience" class="prefInput textbox"></textarea>
                <button class="submit inputField" type="submit" name="submit">Register</button>
                <p class="altAction"><a href="help.php"> Help</a> </p>
            </form>
            </div>


        </div>
    </container>
</body>

</html>