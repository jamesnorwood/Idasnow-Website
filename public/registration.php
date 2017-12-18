<?php
$thisPage="Registration";
include 'includes/navigation.php';
require_once 'form-helper.php';

//var_dump($_SESSION);
?>

<html>

<form method="POST" action="registration-handler.php">
	<fieldset>
		<legend>Registration</legend>
		<p>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username">
		</p>
		<p>
			<label for="email">Email Address:</label>
			<input type="text" id="email" name="email"
			value="<?= $_SESSION['presets']['email'] ?>">
			<?php displayError('email'); ?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			<?php displayError('password'); ?>
		</p>
		<p>
			<label for="pass_match">Password again:</label>
			<input type="password" id="pass_match" name="pass_match">
			<?php displayError('pass_match'); ?>

		</p>
		<input type="submit" value="Register">
	</fieldset>
</form>

</html>

<?php include 'includes/footer.php';?>