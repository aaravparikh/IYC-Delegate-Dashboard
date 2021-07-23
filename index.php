<?php

require_once("dashboardHeader.php");

?>
<br>


</container>

<div class="contentHolder">
    <div class="container">
        <div class="gridItem registerStatus">Registration Status<br>
            <div class="registerIndicator">
                <?php if (isset($_SESSION["delName"])) {
                    echo "<br><p>Complete</p>
                <img src='img/complete.png' alt='green-tick' class='indicator complete'></div>";
                } else {
                    echo "<p>Pending </p>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php'>
                <div class='registerFull'> Complete Registration </div>
            </a></div>";
                }

                ?>

            </div>
            <div class="gridItem statusIndicators">
                <div class="message">
                    <?php 
                    ?>
                    <img src='img/IYC Logo.png' alt='IYC' class='logo'>

                    <div class='messageContent'>
                        <h7>Dear delegates, <br>
                        Welcome to registration. <br>
                        The decisions you make in this registration allow us to better understand your preferences in Committee & Country- at the diplomat's table, the rest of the world turns blurry- no country remains too small, or too insignificant.</h7>
                    </div>
                </div>
            </div>
            <div class="gridItem profile" id='profile'>
                <p>Profile</p>
                <?php
                if (isset($_SESSION["delId"])) {
                    $delId = $_SESSION["delId"];
                    $sql = "SELECT * FROM deldata WHERE delId=?"; // SQL with parameters
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $delId);
                    $stmt->execute();
                    $result = $stmt->get_result(); // get the mysqli result
                    $pId = $result->fetch_assoc();
                    $_SESSION["committee"] = $pId["committee"];
                    echo "

                
                <br>
                <table class='demo'>

                    <tbody>
                        <tr>
                            <td>Full Name</td>
                            <td>" . $pId["delName"] . "</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>" . $_SESSION["email"] . "</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>" . $pId["delMobile"] . "</td>
                        </tr>
                        <tr>
                            <td>School</td>
                            <td>" . $pId["delSchool"] . "</td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td>" . $pId["delGrade"] . "</td>
                        </tr>
                        <tr>
                            <td>Division</td>
                            <td>" . $pId["delDivision"] . "</td>
                        </tr>
                        <tr>
                            <td>MUN Experience</td>
                            <td>" . $pId["delMunXP"] . "
                        <tr>
                            <td>Committee</td>
                            <td>" . $pId["committee"] . "</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>" . $pId["country"] . "</td>
                        </tr>
                    <tbody>
                </table>";
                } else {
                    echo "<br><div> Please Complete Registration to View Profile</div>";
                } ?>
            </div>
            <div class="gridItem techManual">Tech Manual
                <a href='resources/techManual.pdf'>
                    <img src="img/pdf.png" class='techpdf' alt=""><br>
                    IYC Tech Manual.pdf
                </a>
            </div>
            <div class="gridItem links">

                <?php
                if (isset($_SESSION["paymentStatus"]) && $_SESSION["paymentStatus"] === 'complete') {
                    echo "
                        
                        <table class='conferenceLinks'>
                            <tr>
                                <td colspan='2'> Opening Ceremony</td>
                            </tr>
                            <tr>
                                <td> Session 1</td>
                                <td> Session 2</td>
                            </tr> 
                            <tr>
                                <td colspan='2'> Break </td>
                            </tr>
                            <tr>
                                <td> Session 3</td>
                                <td> Session 4</td>
                            </tr>
                            <tr>
                                <td colspan='2'> Break </td>
                            </tr>
                            <tr>
                                <td colspan='2'> Night Crisis </td>
                            </tr>
                        </table>

                    ";
                } else {
                    echo "<p>Please Register First</p>";
                }
                ?>

            </div>


            <div class="gridItem welcomeMessage">

                <div class="statusInd">
                    <h6 class="status">Committee <br> Preference:</h6>
                    <?php if (isset($_SESSION["pId"])) {
                        echo "<p>Selected </p>
            <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
                    } else if (isset($_SESSION["delId"])) {
                        echo "<p>Not Selected </p>
            <img src='img/pending.png' alt='caution' class='indicator complete'>
            <a href='preference.php'>
            <div class='registerFull'> Select Preference </div>
            </a>";
                    } else {
                        echo "<p>Registration Incomplete</p>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php'>
                    <div class='registerFull'> Complete Registration </div>
                </a>";
                    }

                    ?>
                </div>

                <div class="statusInd">
                    <h6 class="status">Registration<br> Fees:</h6>
                    <?php if (isset($_SESSION["paymentStatus"])) {
                        if ($_SESSION["paymentStatus"] === "complete") {
                            echo "<p>Paid </p>
                   <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
                        } else if ($_SESSION["paymentStatus"] === "processing") {
                            echo "<p>Processing </p><br>
                    <img src='img/processing.png' alt='processing' height='110px' width='110px'>";
                        } else {
                            echo "<p>Pending </p>
                    <img src='img/pending.png' alt='caution' class='indicator complete'>
                    <a href=' includes/payment.inc.php'>
                    <div class='registerFull'> Complete Payment </div>
                    </a>";
                        }
                    } else {
                        echo "<p>Registration Incomplete</p>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php' method='POST' value = 'submit'>
                    <div class='registerFull'> Complete Registration </div>
                </a>";
                    }

                    ?>
                </div>

                <div class='statusInd'>
                    <h6 class="status">Delegate<br>chat:</h6>
                    <?php if (isset($_SESSION["discordStatus"])) {
                        if ($_SESSION["discordStatus"] === "complete") {
                            echo "<p>Activated </p>
                   <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
                        } else if ($_SESSION["discordStatus"] === "clicked") {
                            echo "<p>Chat Not Joined </p><br>
                    <img src='img/processing.png' alt='processing' height='110px' width='110px'>
                    <a href=' includes/discord.inc.php'>    
                    <div class='registerFull'> Join Chat </div>
                    </a>";
                        } else {
                            echo "<p>Not Activated </p>
                    <img src='img/pending.png' alt='caution' class='indicator complete'>
                    <a href=' includes/discord.inc.php'>   
                    <div class='registerFull'> Create Account </div>
                    </a>";
                        }
                    } else {
                        echo "<p>Registration Incomplete</p>
                <img src='img/pending.png' alt='caution' class='indicator complete'>
                <a href='completeRegistration.php' method='POST' value = 'submit'>
                    <div class='registerFull'> Complete Registration </div>
                </a>";
                    }

                    ?>
                </div>




            </div>