<?php

require_once("dashboardHeader.php");

?>

<container class="mainBody">
    <div class="grid-item registrationStatus">
        <h6 class="status">Registration:</h6><br>
            <?php if (isset($_SESSION["delName"])) {
                echo "<p>Complete</p>
            <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
            } else {
                echo "<p>Pending </p>
            <img src='img/pending.png' alt='caution' class='indicator complete'>
            <a href='completeRegistration.php'>
            <div class='registerFull'> Complete Registration </div>
        </a>";
            }

            ?>


            <h6 class="status">Committee Preference:</h6><br>
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

                <h6 class="status">Registration Fees:</h6><br>
                    <?php if (isset($_SESSION["paymentStatus"])) {
                        if ($_SESSION["paymentStatus"] === "complete") {
                            echo "<p>Paid </p>
                   <img src='img/complete.png' alt='green-tick' class='indicator complete'>";
                        } else if($_SESSION["paymentStatus"] === "processing"){
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


    <div class="grid-item resources">
        <h6 class="status"> Resources</h6>
        <!-- <?php

                $result = mysqli_query($conn, "SELECT * FROM deldata");
                if (!$result) {
                    die("Query to show fields from table failed");
                }

                $fields_num = mysqli_num_fields($result);


                echo "<table border='1'><tr>";
                // printing table headers
                for ($i = 0; $i < $fields_num; $i++) {
                    $field = mysqli_fetch_field($result);
                    echo "<td>{$field->name}</td>";
                }
                echo "</tr>\n";
                // printing table rows
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr>";


                    foreach ($row as $cell)
                        echo "<td>$cell</td>";

                    echo "</tr>\n";
                }
                echo "</table>"; ?> -->

    </div>
    <div class="grid-item">
        <h6 class="status"> Profile </h6>
        <?php

        
        if(isset($_SESSION["delId"])){
        $delId = $_SESSION["delId"];
        $sql = "SELECT * FROM deldata WHERE delId=?"; // SQL with parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delId);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $pId = $result->fetch_assoc(); // fetch the data  
        
        echo "<br><div class='center'>";
        echo "<p class='profile' >Name</p><p>".$pId["delName"]."</p><br>";
        echo "<p class='profile' >Email</p><p>".$_SESSION["email"]."</p><br>";
        echo "<p class='profile' >Phone</p><p>".$pId["delMobile"]."</p><br>";
        echo "<p class='profile' >School</p><p>".$pId["delSchool"]."</p><br>";
        echo "<p class='profile' >Grade</p><p>".$pId["delGrade"]."</p><br>";
        echo "<p class='profile' >Division</p><p>".$pId["delDivision"]."</p><br>";
        echo "<p class='profile' >MUN Experience</p><p>".$pId["delMunXP"]."</p><br>";
        echo "<p class='profile' >Committee</p><p>".$pId["committee"]."</p><br>";
        echo "<p class='profile' >Country</p><p>".$pId["country"]."</p><br>";
        echo "</div>";}
        else{
            echo "<p class='profile'> Please Complete Registration First </p>";
        }
        

        
        ?>

    </div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>

</container>



</container>
</body>

</html>