<?php

	session_start();
	include "functions/dataBaseConn.php";

	#get user id
	$get_user_id_sql = "SELECT user_id FROM user_profile WHERE email = '".$_SESSION['email']."'";
	$get_user_id_result = $conn->query($get_user_id_sql);
	$get_user_id_row = $get_user_id_result->fetch_assoc();
	$user_id = $get_user_id_row['user_id'];

	$event_id = $_GET['eid'];
	
	#check waitlist
	$check_waitlist_sql = "SELECT * FROM events WHERE event_id = $event_id";
	$check_waitlist_result = $conn->query($check_waitlist_sql);
	$check_waitlist_row = $check_waitlist_result->fetch_assoc();

	#insert into participation
	if($check_waitlist_row['capacity'] == $check_waitlist_row['filled'])
		$insert_sql = "INSERT INTO participation VALUES('$user_id','$event_id','1')";	//1 signifies that the user is in waitlist
	else if($check_waitlist_row['capacity'] > $check_waitlist_row['filled'])
		$insert_sql = "INSERT INTO participation VALUES('$user_id','$event_id','0')";	//1 signifies that the user is NOT in waitlist
	if($insert_result = $conn->query($insert_sql))
	{
		echo "Thank you for Registering";
	}

?>