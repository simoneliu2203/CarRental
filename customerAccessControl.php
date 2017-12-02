<?php 
	//if user is logged in as a customer, makes sure that the customer settings are in session
	session_start(); 
	if (!isset($_SESSION['customer']))
	{
		header('location: index.php');
	}
	//fetches information about style of the login header from headerLogin.php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		//fetches information about style of header from index.php
		header("Location: index.php");
		die();
	}
	//sets the default date and time
	date_default_timezone_set('America/New_York');
?>