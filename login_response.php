<?php ob_start(); ?>
<?php
	include "header.php"; 
	require_once "db.php"; 
	require_once "functions.php";

	if(isset($_POST['submit'])){
		$username = $_POST['Username'];
		$pwd = $_POST['Password'];

		if(emptyInputLogin($username, $pwd) !== false){
			header("Location: ./sign_up_form.php?error=emptynInput");
			exit();
		}

		loginUser($conn, $username, $pwd); 
	}
	else {
		header("Location: ./login_form.php");
		exit();
	}
	
	include "footer.php"; 
