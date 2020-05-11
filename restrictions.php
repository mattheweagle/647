<?php
include "config.php";
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	echo "<table>";
	$uid = $_SESSION['uid'];
	if($stmt = $conn->prepare("SELECT restriction FROM UserRestriction WHERE UID=?")){
		$stmt->bind_param('i',$uid);
		$stmt->execute();
		$stmt->bind_result($restriction);
		while($stmt->fetch()){
			echo "<tr><td>".$restriction."</td></tr>";
		}
		$stmt->close();
	}
	echo "</table>";
	echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/home.php\";'>Go back</button>";
?>
