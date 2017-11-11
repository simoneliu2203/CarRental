<?php 
	session_start(); 
	if (!isset($_SESSION['employee']))
	{
		exit('NICE TRY!');
	}
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		header("Location: index.php");
		die();
	}
	date_default_timezone_set('America/New_York');
?>