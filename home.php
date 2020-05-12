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
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
    <h1>Home</h1>
	<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/~m955e506/647/restrictions.html">View my restrictions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/~m955e506/647/createRecipe.html">Upload a recipe</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="/~m955e506/647/viewSavedRecipes.html">View my saved recipes</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="/~m955e506/647/viewAllRecipes.html">Browse all recipes</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="/~m955e506/647/index.html">Log out</a>
    </li>
  </ul>
</nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <script src="design.js"></script>
  </body>
</html>