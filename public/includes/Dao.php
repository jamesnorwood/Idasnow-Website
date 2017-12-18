<?php
require_once("../database/config.php");
class Dao


{
	/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
	private function getConnection()
	{
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$host = $url["host"];
		$db   = substr($url["path"], 1);
		$user = $url["user"];
		$pass = $url["pass"];
		$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		// Turn on exceptions for debugging. Comment this out for
		// production or make sure to use try-catch statements.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn; 
	}
	
	/**
	 * Return all rows in the user table. No suer input.
	 */
	 public function getUsers() 
	 {
		 $conn = $this->getConnection();
		 return $conn-> query("SELECT * FROM users");
	 }
	
	/**
	 *Returns all usernames in the list.
	 */
	public function getUsernameList()
	{
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT user_name FROM users");
		return $stmt->fetchAll();
	}

	/**
	 *Returns all resorts info from sqlDB.
	 */
	public function getResorts() {
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT * FROM resorts");
		return $stmt->fetchAll();
	}
	
	/**
	 *Returns true or false if the user exists in the 
	 * database or not.
	 */
	public function userExists($user_email)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :user_email");
		$stmt->bindParam(':user_email', $user_email);
		$stmt->execute();
		
		if($stmt->fetch()) {
			return true;
		} else {
			return false;;
		}
	}
	
	public function validateUser($user_email, $user_pass)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT user_id, user_pass, user_name
								FROM users WHERE user_email 
								= :user_email");
		$stmt->bindParam(':user_email', $user_email);
		$stmt->execute();
		
		if($user=$stmt->fetch()) {
			$digest = $user['$user_pass'];
			if(password_verify($user_pass, $digest)) {
				return array('user_name' => $user['user_name'],
							 'user_id' => $user['user_id']);  
			}
		}
		return false; 
		
		
		/* $row = $stmt->fetch();
		if(!$row) {
			return false;
		}		
		$digest = $row['user_pass'];
		
		var_dump($user_pass);
		var_dump($digest);
		
		return password_verify($user_pass, $digest); */
	}
	
	/**
	 *Adds the user with the given email, password, and name.
	 * @param email The email.
	 * @param password the password.
	 * @param name the Name. 
	 */
	public function addUser($user_name, $user_pass, $user_email)
	{
		$conn = $this->getConnection();
		//Hash the password.
		$digest = password_hash($user_pass, PASSWORD_DEFAULT);
		
		If(!$digest) {
				throw new Exception("Password could not be hashed.");
		}
		
		
		$query = "INSERT INTO users(user_name, user_pass, user_email) 
				VALUES (:user_name, :user_pass, :user_email)";
		$stmt = $conn->prepare($query);		
		$stmt->bindParam(':user_name', $user_name);
		$stmt->bindParam(':user_pass', $digest);
		$stmt->bindParam(':user_email', $user_email);
		
		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e){
			//log message $e->getMessage();
			return false;
		}
	}
	
	public function filterPostsByKey($key, $value)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT u.user_name, p.post_content, 
		p.post_topic, p.post_date FROM posts AS p JOIN users AS
		u ON p.post_id = u.user_id WHERE $key = :value");
		
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt;
	}
	
	public function getPostsJoinUserName() {
		$conn = $this->getConnection();
		return $conn->query("SELECT u.user_name, p.post_id, 
		p.post_topic, p.post_content,p.post_date FROM posts 
		AS p JOIN users AS u ON p.post_id = u.user_id");
	}
	
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}
}
