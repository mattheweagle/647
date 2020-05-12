<?php
include "config.php";
	
	// Check user login or not
	if(!isset($_SESSION['uid'])){
		header('Location: index.html');
	}

	$rid = $_GET["rid"];
	$uid = $_SESSION["uid"];
	if($stmt = $conn->prepare("INSERT INTO SAVE (UID, RID) VALUES(?,?)")){
		$stmt->bind_param("ii", $uid, $rid);
		$stmt->execute();
		$stmt->close();
	} 
	echo "Recipe saved!<br>";
	echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/viewSavedRecipes.php\";'>View saved recipes</button>";
?>
