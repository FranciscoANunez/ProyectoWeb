<?php
	$servername = "localhost";
	$username = "root";
	$password = "yolo1";
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	$db=$conn->select_db('kardex');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    exit();
	}
?>