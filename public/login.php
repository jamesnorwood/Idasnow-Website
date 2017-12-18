<?php 
$thisPage="Login";
include 'includes/navigation.php'; 
require_once 'form-helper.php';
//var_dump($_SESSION);
?>

<form id = "login-form" method="POST" action="login-handler.php" autocomplete="off">
	<fieldset>
		<legend>Login</legend>
		<p>
			<label for="email">Email Address:</label>
			<input type="email" id="email" name="email" size="25" 
			value="<?= $_SESSION['presets']['email'] ?>">
			<?php displayError('email'); ?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" size="23">
			<?php displayError('password'); ?>
		</p>
		<p>		
		<a href="registration.php"> Not a member yet? Register here.</a>
		</p>
		<input type="submit" value="Login">
		
	</fieldset>
</form>

<?php include 'includes/footer.php';?>
