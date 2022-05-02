<?php
	include "header.php"; 
	require_once "db.php"; 
	require_once "functions.php";
	//$_SESSION['loggedin'] = false;

	//echo "response";
	if(isset($_POST['submit'])){
		//echo "response 2";
		//get data from form 
		$name = $_POST['name'];
		$email = $_POST['Email'];
		$username = $_POST['Username'];
		$pwd = $_POST['Password'];
		$pwd2 = $_POST['Password2'];
		$referral = $_POST['Referral'];
		$subscp = 'N';

		if($_POST['subscp'] != null){
			$subscp = $_POST['subscp']; 
		}
		
		 //changed data column to allow nulls 

		echo "<div class='w3-main' style='margin-left:340px;margin-right:40px'>
			<div class='w3-container' id='sign_up' style='margin-top:75px'>
				<h3 class='w3-xlarge w3-text-0066cc'><b>Thank you for signing up!</b></h3>";
					echo "<p>Thank you ". $name . " for signing up. The email associated with this account is <b>". $email. "</b>.</p>";
				
				if($subscp !== 'N'){
					echo "Look out for your subscriptions!";
				}
				
				echo '<div style="padding: 5px;"><a href="./login_form.php" class="btn btn-link" role="button" >Click Here to Log In</a>';
			echo "</div>
		</div>";
			

		if(emptyInputSignUp($name, $email, $username, $pwd, $pwd2) !== false){
			header("Location: ./sign_up_form.php?error=emptyInput");
			exit();
		}

		if(invalidUsername($username) !== false){
			header("Location: ./sign_up_form.php?error=invalidUsername");
			exit();
		}

		if(invalidEmail($email) !== false){
			header("Location: ./sign_up_form.php?error=invalidEmail");
			exit();
		}

		if(pwdMatch($pwd, $pwd2) !== false){
			header("Location: ./sign_up_form.php?error=pwdXMatch");
			exit();
		}

		if(usernameExists($conn, $username) !== false){
			header("Location: ./sign_up_form.php?error=usernameTaken");
			exit();
		}
		
		//passed all validation 
		createUser($conn, $name, $email, $username, $pwd, $subscp, $referral);

		
	
		
	} 
	else {
		//didnt click submit 
		header("Location: ./sign_up_form.php");
		exit();
		
	}
/*
	// Create a query for the database
$query = "SELECT user_name, user_email, user_username, subscp_flg FROM authorized_user WHERE user_username = '{$username}'";


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);

// If the query executed properly proceed
if($response){

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo "Thank you". $row['user_name'] . 
	"for signing up. The email associated with this account is: ". $row['user_email']; 

	if($row["subscp_flag"] != null){
		echo "Thank you for signing up for our subscriptions!";
	}

	echo '<div style="padding: 5px;"><a href="./login_form.php" class="btn btn-success" role="button" >Click Here to Log In</a>';
}


} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

// Close connection to the database
mysqli_close($conn);
*/
include "footer.php"; 




		



