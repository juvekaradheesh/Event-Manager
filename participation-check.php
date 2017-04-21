<?php

	if(!isset($_SESSION['email']))
	{
		echo "Login to register";
	}
	else
	{
		#get user id
		$get_user_id_sql = "SELECT user_id FROM user_profile WHERE email = '".$_SESSION['email']."'";
		$get_user_id_result = $conn->query($get_user_id_sql);
		$get_user_id_row = $get_user_id_result->fetch_assoc();
		$user_id = $get_user_id_row['user_id'];

		#get event id
		$event_id = $row['event_id'];

		#check participation
		$check_sql = "SELECT * FROM participation WHERE user_id = $user_id AND event_id = $event_id";
		$check_result = $conn->query($check_sql);
		if($check_result->num_rows == 0)
		{
			echo "<button class='btn btn-primary btn-sm' onclick='loadDoc(\"participate-insert.php?eid=".$event_id."\",\"btn-disp".$event_id."\")'>Participate</button>";
		}
		else
		{
			echo "You have already registered for this event";
		}
	}

?>