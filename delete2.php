<?php
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
	$idnum = $_GET['id'];
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		$query_del = "DELETE FROM doctor WHERE IDnum = $idnum";
		echo "$query_del";
		
		mysqli_query($con, $query_del);
		mysqli_close($con);
		header('Location: adminpage.php');
		
		
	}
?>