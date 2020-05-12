<?php
include "config.php";

	// Check user login or not
	if(!isset($_SESSION['uid'])){
		header('Location: index.html');
	}

	// logout
	if(isset($_POST['but_logout'])){
		session_destroy();
		header('Location: index.html');
	}
?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Homepage</h1>
		<a href="/~m955e506/647/restrictions.php">View my restrictions</a>
		<br>
		<a href="/~m955e506/647/createRecipe.html">Upload a recipe</a>
		<br>
		<a href="/~m955e506/647/viewSavedRecipes.php">View my saved recipes</a>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html>