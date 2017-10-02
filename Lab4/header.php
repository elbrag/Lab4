<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="css/main.css">

	    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans:300,400,600|Roboto:300,400,600,700|Bree+Serif:300,400,700" rel="stylesheet">
	</head>

	<body>
		<main>
	<header>
		<a href="login.php" id="headerlogin">Log in</a><br />
		<img src="img/logo.jpg" id="logo" /><h1>The Book Butler</h1>
	</header>
	<nav id="mainmenu">
		<ul>
			<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a></li>
			<li><a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>" href="about.php">About us</a></li>
			<li><a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>" href="browse.php">Browse books</a></li>
			<li><a class="<?php echo ($current_page == 'books.php') ? 'active' : NULL ?>" href="books.php">My books</a></li>
			<li><a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">Gallery</a></li>
			<li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a></li>
		</ul>
	</nav>

	<div id="content">


            
     