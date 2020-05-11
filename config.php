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
// $servername = "mysql.eecs.ku.edu";
// $username = "x534z011";
// $password = "jee4Aey9";
// $dbname = "x534z011";
// table names:
// Contains: Contains
// Ingredient: Ingredient
// Recipe: Recipe
// Upload: Upload
// User: User
// UserRestriction: UserRistriction
?>
