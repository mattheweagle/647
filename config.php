<?php
	session_start();
	$servername = "mysql.eecs.ku.edu";
	$user = "x534z011";
	$sqlPassword = "jee4Aey9";
	$database = "x534z011";
	$conn = mysqli_connect($servername,$user,$sqlPassword, $database);
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
// $servername = "mysql.eecs.ku.edu"
// $username = "x534z011"
// $password = "jee4Aey9"
// db names:
// Contains: Contains
// Ingredient: Ingredient
// Recipe: Recipe
// Upload: Upload
// User: User
// UserRestriction: UserRistriction
?>
