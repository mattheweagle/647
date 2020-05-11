<?php
	include "config.php";
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	$username = $_POST['uname'];
	$password = $_POST['psw'];
	
	if($stmt = $conn->prepare("SELECT * FROM User WHERE username=? AND password=?")){
		$stmt->bind_param('ss',$username,$password);
		$stmt->execute();
		$stmt->bind_result($uid,$username,$password);
		if($stmt->fetch()){			
			echo "Successful login";
			echo $username;
			session_start();
			$_SESSION['uid'] = $uid;
            header('Location: home.php');
		}
		else{
			echo "Invalid login";
			echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/login.html\";'>Try again</button>";
		}
	}
?>
