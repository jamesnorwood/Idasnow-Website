<?php
	require_once 'includes/Dao.php';
	$dao = new Dao();
//	echo $dao->getConnectionStatus();
	
	$exists = $dao->userExists('dude@sweet.com');
	var_dump($exists);
	
	$user_email = "norwood_18@hotmail.com"; 
	$user_pass  = "pepper123";
	$user_name = "James Norwood";
	
	if($dao->validateUser($user_email, $user_pass)) {
		echo   "I wonder if this will work..";
	}
//	if (!$dao->addUser($user_email, $user_pass, $user_name)) {
//		echo "User already exists!";
//	}
	
//	if user with email exists
//		populate an error and redirect user back to form
//	else user does not exist 
//		add the user to database (user table)				
//	1.query to check if user exists
//	2. add user to users table.
	
	if($dao->userExists($user_email)) {
		echo "Can't add user. Already exists.";
	} else {
		if($dao->addUser($user_email, $user_pass, $user_name)) {
			echo "Successfully added user: $user_name";
		} else {
			echo "Oh no! Something unexpected happened.";
		}
	}
?>