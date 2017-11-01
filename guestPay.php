<?php 
	ob_start();
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		include('header.php');
	}
	date_default_timezone_set('America/New_York');

?>


<?php 
	if (isset($_SESSION['username'])) {
		include('confirmPaying.php');
		include('confirmInfo.php'); 
	}
	else {
		header('location: login.php');
	}
	
?>


