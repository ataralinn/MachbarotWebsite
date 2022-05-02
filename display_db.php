<?php
	include "header.php";
	require_once('./db.php');

		echo "<div class='w3-main' style='margin-left:340px;margin-right:40px'>
			<div class='w3-container' id='sign_up' style='margin-top:75px'>
				<h3 class='w3-xlarge w3-text-0066cc'><b>Accounts</b></h3>
				<p style='color:Tomato'>**You can only view this page in this window. Once you redirect to a different page you will no longer have access.
				You will need to relogin to view again.**</p>";		
		

// Create a query for the database
$query = "SELECT user_name, user_email, user_username, user_password FROM authorized_user";


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Username</b></td>
<td align="left"><b>Password</b></td>
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['user_name'] . '</td><td align="left">' .
$row['user_email'] . '</td><td align="left">' . 
$row['user_username'] . '</td><td align="left">' .
$row['user_password'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

// Close connection to the database
mysqli_close($conn);
	
	echo "</div>
		</div>";
include "footer.php"; 
?>