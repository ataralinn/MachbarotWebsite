<?php
include "header.php"; 
require_once "db.php"; 

function confirmUser($name, $email, $subscp){
	echo "<div class='w3-main' style='margin-left:340px;margin-right:40px'>";
    echo "<div class='w3-container' id='designers' style='margin-top:75px'>";
      echo "<h3 class='w3-xxxlarge w3-text-0066cc'><b>Thank you for signing up!</b></h3>"; 
		echo "Thank you ". $name . " for signing up. The email associated with this account is: ". $email. "</b>"; 
		
		if($row["subscp_flag"] != null){
			echo "Thank you for signing up for our subscriptions!";
		}

		echo '<div style="padding: 5px;"><a href="./login_form.php" class="btn btn-link" role="button" >Click Here to Log In</a>';
    echo "</div>";
echo "</div>";
}


/*

	// Create a query for the database
$query = "SELECT user_name, user_email, user_username, subscp_flag FROM authorized_user WHERE user_username = $username";


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
mysqli_close($conn);*/

include "footer.php"; 

?>

