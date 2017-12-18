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
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}
}
