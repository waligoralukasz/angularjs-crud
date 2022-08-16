<?php 

class Database
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "angular_posts";

	public $conn;

	// Create connection
	public function getConnection(){
		$conn = new mysqli($this -> servername, $this-> username, $this->password, $this->dbname);
		$conn->set_charset("utf8");
		return $this->conn;
		
		

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	// echo "Pomyślnie połączono z bazą!";
	}
}
?>


