
<?php
ob_start();
require 'PHPMailer-master/PHPMailerAutoload.php';
require_once "db.php"; 
require_once "functions.php";
  include "header.php";


if(isset($_POST['submit'])){
    
    //get data from form 
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$topic = $_POST['Topic'];
	$message = $_POST['Message'];

    //validate the email address
    if(invalidEmail($email) !== false){
		header("Location: ./Machberos.php#contact?error=invalidEmail", false);
		exit();
	  }

    //send mail to company email 
	$mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'ContactMachbarot@gmail.com';
    $mail->Password = 'touro2021';
    
    $mail->isHTML(true); 
    $mail->setFrom($email, $name);
    $mail->addAddress('ContactMachbarot@gmail.com');
    $mail->Subject = ("$email($topic)");
    $mail->Body = $message;

  
    echo "<div class='w3-main' style='margin-left:340px;margin-right:40px'>
		<div class='w3-container' id='sign_up' style='margin-top:75px'>";

    //send the message, check for errors
    if (!$mail->send()) {
        //echo "ERROR: " . $mail->ErrorInfo;
        echo "<h3 class='w3-xlarge w3-text-0066cc'><b>Something went wrong</b></h3>";				
		echo '<div style="padding: 5px;"><a href="././Machberos.php#contact" class="btn btn-link" role="button" >Click Here to Try Again </a>';
		echo "</div>";
    } 
    else {
       // echo "SUCCESS";

       
        //display to user 
        echo "<h1 class='w3-xxxlarge w3-text-#0066cc'><b>Thank you</b></h1>";
                echo "Thank you " . $_POST['Name'] . " for reaching out. </br> We have received your message and will contact you shortly at ". $_POST['Email'] .".<br>";
                echo '<div style="padding: 5px;"><a href="././Machberos.php" class="btn btn-link" role="button" >Back to Home Page </a>';
        echo "</div>";
    }
    
    echo "</div>";
    echo "</div>";
    include "footer.php"; 
     //successfully sent, adding to database
	 enterMessage($conn, $name, $email, $topic, $message);
 
   
}

else{
    header("Location: ./Machberos.php#contact");
    exit();
}

