<?php $thisPage="Message"; 
include 'includes/navigation.php';
require_once 'form-helper.php';
require_once 'session-helper.php';
require_once 'includes/Dao.php';

//session_start();
//var_dump($_SESSION);
//session_regenerate_id(true);

$dao = new Dao();

//redirect user to login page if no access to message board.
if (!isAccessGranted()) {
	$errors['message'] = "You must login first.";
	//header('Location: login.php');
	redirectError("login.php", $errors);	
}

$username = $_SESSION['user_name']; 


//TODO: Still need to fix login issue. Reference, 
// php/sessions/login for correct login.

try {
	//If the username param is set, then fileter posts 
	//by given username, else just retrieve all posts
	// from the database. 
	if(isset($username)) {
		$posts = $dao->filterPostsByKey("username", $username);
	} else {
		$posts = $dao->getPostsJoinUserName();
	}
} catch (PDOException $e) {
	echo "<p> Failed to retrieve posts.</p>";
	die;
}
?>

<!--This section should contain the posts on the page. -->
<main>
	<h1> Welcome <?=$username ?>!</h1>
	<form id = "message-filter" action="message-handler.php" method="GET">
			<fieldset>
				<legend> Filter Posts</legend>
					<label for="username">Filter by (username):</label>
					<input type="text" id="user_name" name="user_name" />
					<input type="submit" name="filterButton" value="Filter" />
					<?php if(isset($user_name)) { // only display clear if filter is set ?>
					<input type="submit" name="clearButton" 
					value="Clear Filter" />
				<?php } ?>
				<?php if(isset($_GET['error'])) { ?>
					<span class="error"><?= $_GET['error'] ?></span>
				<?php } ?>
		</fieldset>
	</form>

<!-- Message results table.-->
	<table>
		<thead>
			<tr>
			  <th>User</th>
			  <th>Date</th>
			  <th>Topic</th>
			  <th>Message</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($posts as $post) { ?>
			<tr>
				<td><?= $post['post_by'] ?></td>
				<td><?= $post['post_date']; ?></td>
				<td><?= $post['post_topic']; ?></td>
				<td><?= $post['post_content']; ?></td>
				<td>
				 <?php # only show options for current user.
				 if($userName == $post['post_by']) { ?>
					<form name="postForm" action="message-handler.php" method="POST">
						<input type="hidden" name="id" value="<?= $post['post_id']; ?>">
						<span>
							<input type="submit" name="deleteButton" value="Delete">
							<input type="submit" name="modifyButton" value="Modify">
						</span>
					</form>
				 <?php } ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>	
	
	<form id="add-post" action="message-handler.php" method="POST">
	<fieldset>
		<legend>Add Post</legend>
			<!-- Instead of using hidden input, would want to use username
				stored in $_SESSION. People can still modify hidden inputs.-->
			<input type="hidden" name="username" value="<?= $userName ?>">
			<label for="message">Message:</label>
			<textarea name="message" id="message"></textarea>
			<input type="submit" name="postButton" value="Post" />
	</fieldset>
	</form>
</main>
<?php include 'includes/footer.php';?>