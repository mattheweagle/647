<?php
include "config.php";
	
	// Check user login or not
	if(!isset($_SESSION['uid'])){
		header('Location: index.html');
	}

	$rid = $_GET["rid"];

	if($stmt = $conn->prepare("SELECT RecName, instructions FROM Recipe WHERE RID=?")){
		$stmt->bind_param("i", $rid);
		$stmt->execute();
		$stmt->bind_result($RecName,$instructions);
		$stmt->fetch();
		echo "<table>";
		echo "<tr><th>Recipe name</th><td>".$RecName."</td></tr>";
		echo "<tr><th>Instructions</th><td>".$instructions."</td></tr>";
		echo "<tr><th>Ingredient</th><th>Amount</th></tr>";	
		$stmt->close();
	}
	if($stmt = $conn->prepare("SELECT IngName, Amount FROM Contains WHERE RID=?")){
		$stmt->bind_param("i", $rid);
		$stmt->execute();
		$stmt->bind_result($IngName,$Amount);
		while($stmt->fetch()){
			echo "<tr><td>".$IngName."</td><td>".$Amount."</td></tr>";
		}
		$stmt->close();
	}
	echo "<form action=\"saveRecipe.php?rid=".$rid."\" method=\"post\">";
    echo "<input type=\"submit\" name=\"saveRecipe\" value=\"Save Recipe\" />";
    echo "</form>";
?>
