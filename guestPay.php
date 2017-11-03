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
		$_SESSION ['car_id']=$_GET['id'];
		$_SESSION ['rate']=$_GET['rate'];
		$car_id = $_SESSION['car_id'];
		$rate = $_SESSION['rate'];
		$pickup=$_SESSION['pickup'];
		$dropoff=$_SESSION['dropoff'];
		header('location: login.php');
	}
	
?>


