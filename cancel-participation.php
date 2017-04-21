<?php

	session_start();
	include "functions/dataBaseConn.php";

	$user_id = $_GET['uid'];
	$event_id = $_GET['eid'];
	
	$delete_sql = "DELETE FROM participation WHERE user_id = $user_id AND event_id = $event_id";
	$delete_result = $conn->query($delete_sql);
	if($delete_result)
	{
		#to check if there are any users in waitlist
		$check_sql = "SELECT * FROM participation WHERE event_id = $event_id AND waiting = 1";
		$check_result = $conn->query($check_sql);
		if(!$check_result)
		{
			$update_waitlist_sql = "UPDATE participation SET waiting = 0 WHERE waiting = 1 LIMIT 1";
			$update_waitlist_result = $conn->query($update_waitlist_result);
		}
	}
	echo "<button class='btn btn-primary btn-sm' onclick='loadDoc(\"participate-insert.php?eid=".$event_id."\",\"btn-disp".$event_id."\")'>Participate</button>";

?>