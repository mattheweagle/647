<?php
	include "config.php";
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	$username = $_POST['username'];
	$password = $_POST['psw'];
	$passwordRepeat = $_POST['psw-repeat'];
	$diet = $_POST['restrictionDiet'];
	
	#check if user already exists in user table
	if($stmt = $conn->prepare("SELECT * FROM User WHERE username=?")){
		$stmt->bind_param('s',$username);
		$stmt->execute();
		if($stmt->fetch()){			
			echo "User already exists";
			echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/createAccount.html\";'>Try again</button>";
		}
		else{
			if($password == $passwordRepeat){
				#add user to users table
				if($stmt = $conn->prepare("INSERT INTO User (username,password) VALUES (?, ?)")){
					$stmt->bind_param('ss',$username,$password);
					$stmt->execute();
					$stmt->close();
				}
				else{
					echo "error";
				}
				
				$uid = 0;
				
				#retrieve UID from newly created account
				if($stmt = $conn->prepare("SELECT UID FROM User WHERE username=?")){
					$stmt->bind_param('s',$username);
					$stmt->execute();
					$stmt->bind_result($uid);
					$stmt->fetch();
					$stmt->close();
				}
				echo "Account successfully created";
				
				
				#add restrictions to userrestriction table
				if($diet == "Vegetarian"){
					$restriction = "Vegetarian";
					if($stmt = $conn->prepare("INSERT INTO UserRestriction (UID, restriction) VALUES (?, ?)")){
						$stmt->bind_param('is',$uid,$restriction);
						$stmt->execute();
						$stmt->close();
					}
				}
				else if($diet == "Vegan"){
					$restriction = "Vegan";
					if($stmt = $conn->prepare("INSERT INTO UserRestriction (UID, restriction) VALUES (?, ?)")){
						$stmt->bind_param('is',$uid,$restriction);
						$stmt->execute();
						$stmt->close();
					}
				}
				
				#loop through restriction checkboxes
				if(!empty($_POST['restriction_list'])){
					foreach($_POST['restriction_list'] as $currentRestriction){
						if($stmt = $conn->prepare("INSERT INTO UserRestriction (UID, restriction) VALUES (?, ?)")){
							$stmt->bind_param('is',$uid,$currentRestriction);
							$stmt->execute();
							$stmt->close();
						}
					}
				}
				echo "<br><button type='button' class='goBack' onclick='window.location.href = \"https://people.eecs.ku.edu/~m955e506/647/\";'>Go back</button>";
			}
			else{
				echo "Passwords don't match";
			}
		}
	}

	
?>
