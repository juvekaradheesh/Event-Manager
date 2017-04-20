<?php
	//Database configuration
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "hackathon";

	$conn = new mysqli($servername, $username, $password, $db);

	if($conn->connect_error)
	{
		die("Connection Failed".$conn->connect_error);
	}
?>