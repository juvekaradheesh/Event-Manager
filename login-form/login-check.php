<?php
	
	session_start();
	include "../functions/dataBaseConn.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$login_sql = "SELECT * FROM user_profile";
	$login_result = $conn->query($login_sql);
	$flag = 0;
	while($row = $login_result->fetch_assoc())
	{
		if($row['email'] == $username && $row['password']==$password)
		{
			
			$_SESSION['email'] = $row['email'];
			$flag=1;
			header("Location:../events.php");
			exit;
		}
	}
	if(!$flag)
	{
		echo "Wrong username or password";
	}

?>