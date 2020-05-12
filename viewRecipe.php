<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uid'])){
    header('Location: index.html');
}

$rid = $_GET["rid"];

$sql = "SELECT RecName, instruction FROM Recipe WHERE RID = ?";

if($stmt = $conn->prepare($sql)){
    $stmt->bind_param("i", $rid);
    $result = $stmt->execute();
}
?>

<!doctype html>
<html>
    <?php
    $headertext = $result["RecName"];
    $instructiontext = $result["instruction"];
    echo "<h1>".$headertext."</h1><br>";

    $sql = "SELECT IngName, Amount FROM Contains WHERE RID = ?";

    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $rid);
        $result = $stmt->execute();

        if($result->num_rows > 0){
            echo "<h2>Ingredients        Quantity</h2><br>";
            while($row = $result->fetch_assoc()){
                echo "".$row["IngName"]."    ".$row["Amount"]."<br>";
            }
        }
    }
    ?>


</html>