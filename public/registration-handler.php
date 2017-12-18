<?php
include 'form-helper.php';
include 'includes/Dao.php';
session_start();

$dao = new Dao();


//Extract all the variables from the $_POST superglobal array.
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass_match = $_POST['pass_match'];
//show any regisration errors.
$errors = array();

//username validation
if(!valid_length($username, 1, 50)) {
	$errors['username'] = "Username is a required field";
}

//email validation.
if(!valid_length($email, 1, 50)) {
	$errors['email'] = "Email is required and must be less than 50 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
}

//password validation
if(!valid_length($password, 8, 128)) {
	$errors['password'] = "Password must be >= length of 8.";
}
//check for matching passwords.
if($password != $pass_match) {
	$errors['pass_match'] = "Passwords do not match. Try again.";
}

//If all valid then redirect to login page.
if (empty($errors)) {
	
	//if user already exists
	if ($dao->userExists($email)) {
		$_SESSION['errors']['userExists'] = 
		"Can't add user. They already have an account.";
		header('Location: registration.php');
	} else {		
		if($dao->addUser($username, $password, $email)) {
			echo "Successfully added user: $username";	
		} else {
			$_SESSION['errors']['dberror'] = 
			"Something unexpected happened. 
			Unable to add user to db.";
		}
	} 
	//redirect to login and store session vars.
	$_SESSION['presets'] = array(
	'email' =>htmlspecialchars($email),
	'username' => htmlspecialchars($username));
	header('Location: login.php');
	
	
} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['presets'] = array(
			'email' =>htmlspecialchars($email),
			'username' => htmlspecialchars($username));
			header('Location: registration.php');
}
?>