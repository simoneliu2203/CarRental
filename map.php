<?php 
	session_start();
	// if the user is in session, link map.php to headerLogin.php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		// else link map.php to header.php
		include('header.php');
	}
?>

<!-- style of setup and source and settings of display of map -->
<iframe 
style="margin-top: 10px;" 
src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d211076.31199567628!2d-77.9278408!3d34.2468244!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDE1JzU0LjEiTiA3N8KwNTQnMzUuNyJX!5e0!3m2!1sen!2sus!4v1506581306434" width="100%" height="550"  frameborder="0" style="border:0" allowfullscreen>
	
</iframe>