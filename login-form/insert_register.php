<?php

	include "../functions/dataBaseConn.php";
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$insert_sql = "INSERT INTO user_profile(user_name,email,password) VALUES('$name','$username','$password')";
	if ($conn->query($insert_sql) === TRUE)
	{
	    echo "You now have an account";
    }
    else
    {
    	echo "error".$conn->error;
    }
    header("Location:index.html");

?>