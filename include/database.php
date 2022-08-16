<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "angular_posts";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8");
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
		echo "dupa";
	}
	// echo "Pomyślnie połączono z bazą!";
?>


