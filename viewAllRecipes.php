<?php
include "config.php";

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	echo "<table>";
	$uid = $_SESSION['uid'];
	$lastName = "this will never be the name of the first recipe hopefully";
	if($stmt = $conn->prepare("SELECT Recipe.RID,Recipe.RecName, Recipe.instructions FROM Recipe")){
		$stmt->execute();
		$stmt->bind_result($rid,$RecName,$instructions);
		while($stmt->fetch()){
			if($RecName != $lastName){
				echo "</table>";
				echo "<br><br><br>";
				echo "<table>";
				echo "<tr><th>Recipe name</th><td><a href=\"/~m955e506/647/viewRecipe.php?rid=".$rid."\">".$RecName."</a></td></tr>";
				echo "<tr><th>Instructions</th><td>".$instructions."</td></tr>";
			}
		}	
		$stmt->close();
	}
	else{
		echo "fail";
	}
	echo "</table>";
	echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/home.php\";'>Go back</button>";
?>