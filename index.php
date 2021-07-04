<?php

require_once("dashboardHeader.php");

?>

<container class="mainBody">
    <div class="grid-item registrationStatus">
        <h6 class="status">Registration:<br>
            <?php if (isset($_SESSION["delName"])) {
                echo "Complete </h6>
            <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
            } else {
                echo "Pending </h6>
            <img src='img/pending.png' alt='caution' class='indicator complete'>
            <a href='completeRegistration.php'>
            <div class='registerFull'> Complete Registration </div>
        </a>";
            }

            ?>

    </div>
    <div class="grid-item ">
        <h6 class="status">Committee Preference: <br>
            <?php if (isset($_SESSION["pId"])) {
                echo "Assigned </h6>
            <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
            } else if (isset($_SESSION["delId"])) {
                echo "Not Assigned </h6>
            <img src='img/pending.png' alt='caution' class='indicator complete'>
            <a href='preference.php'>
            <div class='registerFull'> Assign Preference </div>
            </a>";
            } else {
                echo "Registration Incomplete</h6>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php'>
                    <div class='registerFull'> Complete Registration </div>
                </a>";
            }

            ?>

    </div>
    <div class="grid-item ">
        <h6 class="status">Registration Fees:<br>
            <?php if (isset($_SESSION["paymentStatus"])) {
                if ($_SESSION["paymentStatus"] !== "pending") {
                    echo "Paid </h6>
                   <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
                } else {
                    echo "Pending </h6>
                    <img src='img/pending.png' alt='caution' class='indicator complete'>
                    <a href='payment.inc.php?submit=true'>
                    <div class='registerFull'> Complete Payment </div>
                    </a>";
                }
            } else {
                echo "Registration Incomplete</h6>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php'>
                    <div class='registerFull'> Complete Registration </div>
                </a>";
            }

            ?>

    </div>


    <div class="grid-item resources">
        <h6 class="status"> Resources</h6>
    </div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>

</container>



</container>
</body>

</html>