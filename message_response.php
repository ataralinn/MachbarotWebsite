
<?php
include "header.php"; 
require_once "db.php"; 

echo "<div class='w3-main' style='margin-left:340px;margin-right:40px'>";
    echo "<div class='w3-container' id='designers' style='margin-top:75px'>";
        echo "<h1 class='w3-xxxlarge w3-text-red'><b>Thank you</b></h1>";
                echo "Thank you " . $_POST['Name'] . " for reaching out. We have received your message and will contact you shortly at ". $_POST['Email'] .".<br>";
                echo "Topic: " . $_POST['Topic']  . "<br>";
                echo "Message: " . $_POST['Message']  . "<br>";
    echo "</div>";
echo "</div>";
include "footer.php"; 
?>