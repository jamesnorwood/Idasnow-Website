<?php
require_once 'form-helper.php';
//require_once 'session-helper.php';
require_once 'includes/Dao.php';

session_start();

//Extract all the variables from the $_POST superglobal array.
//$username = $_POST['username']; 
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$errors = array();

//email validation.
if(!valid_length($email, 1, 50)) {
	$errors['email'] = "Please enter your email.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
}

//password validation
if(!valid_length($password, 8, 128)) {
	$errors['password'] = "Please enter your password.";
}

$presets = ['email' => htmlspecialchars($email)];
$presets = ['password' => htmlspecialchars($password)];


//if all valid then redirect the user to the welcome page.
if(empty($errors)){
	try{
		$dao = new Dao();
		//1.Validate user exists and pw is correct.
		 $user = $dao->validateUser($email, $password);

		 //if($user) {
			 //2. Set access_granted flag in our session array so we 
			//remember our user
			 $_SESSION['access_granted'] = true;
			 session_regenerate_id(true);
			 //3. Remember some info about our user. 
			 $_SESSION['username'] = $user['user_name'];
			 //$_SESSION['user_id'] = $user['user_id'];
			 redirectSuccess("message.php");
		 //} else {
			//$errors['message'] = "Invalid username or password.";
			//redirectError("login.php", $errors, $presets);
		 //}	
	} catch (Exception $e) {
			echo $e->getMessage();
			$errors['message'] = "Something is not right. Please 
			come back later.";
			redirectError("login.php", $errors, $presets);
	}
} else {
	redirectError("login.php", $errors, $presets);
}		
?>	