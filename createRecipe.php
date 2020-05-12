<?php
    include "config.php";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // Check user login or not
	if(!isset($_SESSION['uid'])){
		header('Location: index.html');
	}
    
    $recipeName = $_POST["recipeName"];
    $ing1 = $_POST["ing1"];
    $ing2 = $_POST["ing2"];
    $ing3 = $_POST["ing3"];
    $ing4 = $_POST["ing4"];
    $ing5 = $_POST["ing5"];
    $ingq1 = $_POST["ingq1"];
    $ingq2 = $_POST["ingq2"];
    $ingq3 = $_POST["ingq3"];
    $ingq4 = $_POST["ingq4"];
    $ingq5 = $_POST["ingq5"];
    $recipeDetail = $_POST["recipe"];

    if($stmt = $conn->prepare("INSERT INTO Recipe(RecName, instructions)
    VALUES(?, ?)")){
        $stmt->bind_param("ss", $recipeName, $recipeDetail);
        $stmt->execute();
        $last_id = $conn->insert_id;

        if($stmt = $conn->prepare("INSERT INTO Upload(RID, UID) VALUES(?, ?)")){
            $stmt->bind_param("ii", $last_id, $_SESSION["uid"]);
            $stmt->execute();
        }


        if($stmt = $conn->prepare("INSERT INTO Contains(RID, IngName, Amount) VALUES (?, ?, ?)")){
            $stmt->bind_param("isi", $last_id, $ing1, $ingq1);
            $stmt->execute();
        }

        if(!empty($ing2)){
            if($stmt = $conn->prepare("INSERT INTO Contains(RID, IngName, Amount) VALUES (?, ?, ?)")){
                $stmt->bind_param("isi", $last_id, $ing2, $ingq2);
            $stmt->execute();
            }
        }

        if(!empty($ing3)){
            if($stmt = $conn->prepare("INSERT INTO Contains(RID, IngName, Amount) VALUES (?, ?, ?)")){
                $stmt->bind_param("isi", $last_id, $ing3, $ingq3);
            $stmt->execute();
            }
        }

        if(!empty($ing4)){
            if($stmt = $conn->prepare("INSERT INTO Contains(RID, IngName, Amount) VALUES (?, ?, ?)")){
                $stmt->bind_param("isi", $last_id, $ing4, $ingq4);
            $stmt->execute();
            }
        }

        if(!empty($ing5)){
            if($stmt = $conn->prepare("INSERT INTO Contains(RID, IngName, Amount) VALUES (?, ?, ?)")){
                $stmt->bind_param("isi", $last_id, $ing5, $ingq5);
            $stmt->execute();
            }
        }
		
		if($stmt = $conn->prepare("INSERT INTO SAVE (UID, RID) VALUES(?, ?)")){
            $stmt->bind_param("ii", $_SESSION["uid"], $last_id);
            $stmt->execute();
        }
        echo("Upload Success.");
        header('Location: home.php');
    }
?>