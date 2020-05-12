<?php
include "config.php";
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	echo "<table>";
	$uid = $_SESSION['uid'];
	$lastName = "this will never be the name of the first recipe hopefully";
	if($stmt = $conn->prepare("SELECT Recipe.RecName, Recipe.instructions, Contains.IngName, Contains.Amount FROM SAVE INNER JOIN Contains ON Contains.RID = SAVE.RID INNER JOIN Recipe ON Recipe.RID = SAVE.RID AND SAVE.UID=? GROUP BY Recipe.RecName")){
		$stmt->bind_param('i',$uid);
		$stmt->execute();
		$stmt->bind_result($RecName,$instructions,$IngName,$Amount);
		while($stmt->fetch()){
			if($RecName != $lastName){
				echo "</table>";
				echo "<br><br><br>";
				echo "<table>";
				echo "<tr><th>Recipe name</th><td>".$RecName."</td></tr>";
				echo "<tr><th>Instructions</th><td>".$instructions."</td></tr>";
				echo "<tr><tr><tr><tr>";
				echo "<tr><th>Ingredient</th><th>Amount</th></tr>";
				$lastName = $RecName;
			}
			echo "<tr><td>".$IngName."</td><td>".$Amount."</td></tr>";
		}	
		$stmt->close();
	}
	else{
		echo "fail";
	}
	echo "</table>";
	echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/home.php\";'>Go back</button>";
?>