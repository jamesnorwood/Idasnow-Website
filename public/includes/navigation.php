<?php $thisPage="Navigation";
include 'includes/header.php';

//start a session if one hasnt been started yet. 
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}
 ?>
<body>
  <img src="images/header with title.png">
  <div id = "navigation">
	<ul>
      <li <?php if($thisPage == "Index"){ 
	   echo 'id="currentpage"'; } ?>>
	   <a href="index.php">Home</a>

		<li <?php if($thisPage == "Message") { 
	    echo 'id="currentpage"'; } ?>>
		<a href="message.php">Message Board</a>
		
		<li <?php if($thisPage == "Mobile") { 
	    echo 'id="currentpage"'; } ?>>
		<a href="mobile.php">Mobile</a>
		
	   <li class = "right" <?php if($thisPage == "Login") {
		echo 'id="currentpage"'; } ?>>
		<a href="login.php">Login</a>
		
	  </li>	
	</ul>
  </div>
  
  