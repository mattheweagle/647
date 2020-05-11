<?php
	session_start();
	$servername = "24.143.57.131:3306";
	$user = "remote";
	$sqlPassword = "647recipes";
	$database = "recipes";
	$conn = mysqli_connect($servername,$user,$sqlPassword, $database);
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>