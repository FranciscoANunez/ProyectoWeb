<?php
	$servername = "localhost:3306";
	$username = "userProject";
	$password = "PASSWORD";
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	$db=$conn->select_db('auditorio');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    exit();
	}
?>