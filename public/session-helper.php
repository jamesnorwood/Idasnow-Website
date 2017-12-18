<?php

function loginUser($user) {
	//Set access_granted flag in our session array so we remember our user. 
	$_SESSION['access_granted'] = true;
	$_SESSION['username'] = $user['user_name'];
	$_SESSION['userid'] = $user['user_id'];
	session_regenerate_id[true];
}

//Return true is user is authenticated, false otherwise. 
function isAccessGranted() {
	if(isset($_SESSION['access_granted'])  && ($_SESSION['access_granted'] === true)) {
		return true;
	} else {
		return false;
	}
}


?>