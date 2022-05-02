<?php
	function emptyInputSignUp($name, $email, $username, $pwd, $pwd2){
		$results; 

		if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwd2)){
			$results = true; 
		}
		else{
			$results = false; 
		}
		return $results; 
	}

	function invalidUsername($username){
		$results; 

		if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			$results = true; 
		}
		else{
			$results = false; 
		}
		return $results; 
	}

	function invalidEmail($email){
		$results; 

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$results = true; 
		}
		else{
			$results = false; 
		}
		return $results; 
	}

	function pwdMatch($pwd, $pwd2){
		$results; 

		if($pwd !== $pwd2){
			$results = true; 
		}
		else{
			$results = false; 
		}
		return $results; 
	}

	function usernameExists($conn, $username) {
		//create sql query and prep statement 
		$query = "select * from authorized_user where user_username= ?;";
		$stmt = mysqli_stmt_init($conn);

		//if stmt fails then just go back to form page 
		if(!mysqli_stmt_prepare($stmt, $query)){
			header("location: ./sign_up_form.php?error=stmtFailed");
			exit();
		}

		//attach the parameters that you want for each ?
		mysqli_stmt_bind_param($stmt, 's', $username);
		
		//then execute the stmt 
		mysqli_stmt_execute($stmt);

		//get the results of the query at that specific username
		$resultsData = mysqli_stmt_get_result($stmt);

		//get the data as an associate array 
		//and check if there is any data 
		//a sample data should be name => tehila, username => traful 
		if($row = mysqli_fetch_assoc($resultsData)){
			return $row; 
			//return all data that comes back 
		}
		else{
			//if there is no data returned then 
			//means that username ? doesn't exist yet 
			//so return false 
			return false; 
		}
		mysqli_stmt_close($stmt);
	}

	function createUser($conn, $name, $email, $username, $pwd, $subscp, $referral){
		//echo "referral " . $referral; 
		//query to get id from the description 
		$sql = "select referral_id from referral_option where referral_desc = ?;";
		$stmt1 = mysqli_stmt_init($conn);

		//if stmt fails then just go back to form page 
		if(!mysqli_stmt_prepare($stmt1, $sql)){
			header("Location: ./sign_up_form.php?error=stmtFailed");
			exit();
		}
		
		//attach the parameters that you want for each ?
		mysqli_stmt_bind_param($stmt1, "s", $referral);
		
		//then execute the stmt 
		mysqli_stmt_execute($stmt1);		

		//get the referral_id from the query results 
		$resultsReferral = mysqli_stmt_get_result($stmt1);
		$row = mysqli_fetch_assoc($resultsReferral);
		$referral_id = (int) $row['referral_id'];
		
		//echo "referral_id ". $referral_id; 

		mysqli_stmt_close($stmt1);
	
		//create sql query and prep statement 
		$query = "insert into authorized_user(user_name, user_email, user_username, user_password, subscp_flg, referral_id, user_type_id) values(?,?,?,?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);

		//if stmt fails then just go back to form page 
		if(!mysqli_stmt_prepare($stmt, $query)){
			header("Location: ./sign_up_form.php?error=stmtFailed");
			exit();
		}

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 

		//assign all users through the web to be user_type 2 
		$userType = 2; 
		
		//attach the parameters that you want for each ?
		mysqli_stmt_bind_param($stmt, "sssssii", $name, $email, $username, $hashedPwd, $subscp, $referral_id, $userType);
		
		//then execute the stmt 
		mysqli_stmt_execute($stmt);		
		mysqli_stmt_close($stmt);

		exit();
	}

	function emptyInputLogin($username, $pwd){
		$results; 

		if(empty($username) || empty($pwd)){
			$results = true; 
		}
		else{
			$results = false; 
		}
		return $results; 
	}

	function loginUser($conn, $username, $pwd){
		//call the userExists function to check if the username exists
		//if returns false - then doesn't
		$userExists = usernameExists($conn, $username);
		if($userExists === false){
			header("Location: ./login_form.php?error=wrongLogin");
			exit();
		}
		//otherwise it returns the assoc array with the correct record 
		//so get the password of that record and make sure it matches
		//the hashed one in the db 
		$pwdHashed = $userExists['USER_PASSWORD'];
		$checkedPwd = password_verify($pwd, $pwdHashed);

		//if doesnt match - then wrong password
		if($checkedPwd === false){
			header("Location: ./login_form.php?error=wrongPassword");
			$_SESSION['loggedin'] = false; 
			exit();
		}
		else if($checkedPwd === true){
			session_start();
			setcookie('username', $userExists['USER_USERNAME']); 
			$_SESSION['loggedin'] = true; 

			header("Location: ./display_db.php");
			exit();
		}
	}

	function enterMessage($conn, $name, $email, $topic, $message){
		//query to get id from the description 
		$sql = "select topic_id from message_topic where topic_desc = ?;";
		$stmt1 = mysqli_stmt_init($conn);

		//if stmt fails then just go back to form page 
		if(!mysqli_stmt_prepare($stmt1, $sql)){
			header("Location: ./Machberos.php#contact?error=stmtFailed");
			exit();
		}
		
		//attach the parameters that you want for each ?
		mysqli_stmt_bind_param($stmt1, "s", $topic);
		
		//then execute the stmt 
		mysqli_stmt_execute($stmt1);		

		//get the referral_id from the query results 
		$resultsTopic = mysqli_stmt_get_result($stmt1);
		$row = mysqli_fetch_assoc($resultsTopic);
		$topic_id = (int) $row['topic_id'];

		mysqli_stmt_close($stmt1);
	
		//create sql query and prep statement 
		$query = "insert into message (message_name, message_email, message_topic_id, message_body) values(?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);

		//if stmt fails then just go back to form page 
		if(!mysqli_stmt_prepare($stmt, $query)){
			header("Location: ./Machberos.php#contact?error=stmtFailed");
			exit();
		}

		
		//attach the parameters that you want for each ?
		mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $topic_id, $message);
		
		//then execute the stmt 
		mysqli_stmt_execute($stmt);		
		mysqli_stmt_close($stmt);

		exit();
	}
