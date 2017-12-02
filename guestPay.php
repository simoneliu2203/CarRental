<?php 
	ob_start();
	session_start();
	// links guestPay.php to headerLogin.php if username in session
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		// links guestPay.php to header.php if username not in session
		include('header.php');
	}

	// sets default time
	date_default_timezone_set('America/New_York');

?>


<?php 
	// links guestPay.php to confirmPaying.php and confirmInfo.php if username in session
	if (isset($_SESSION['username'])) {
		include('confirmPaying.php');
		include('confirmInfo.php'); 
	}
	else {
		// fetches info of attributes
		$_SESSION ['car_id']=$_GET['id'];
		$_SESSION ['rate']=$_GET['rate'];
		$car_id = $_SESSION['car_id'];
		$rate = $_SESSION['rate'];
		$pickup=$_SESSION['pickup'];
		$dropoff=$_SESSION['dropoff'];
		header('location: login.php');
	}
	
?>


