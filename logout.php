<?php
	// header("Location: index.php")
	// when the user logs out, the user will be directed to index.php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
?>
