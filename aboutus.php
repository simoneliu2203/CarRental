<?php 
	//If no user login, include the header which doesn't have Menu option
	//Otherwise, include the header that has Menu option for the user
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		include('header.php');
	}
?>

<style>
	/* Set up the style for the page with a background image */
	body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	min-height: 600px;
	min-width: 1000;
		
	background-image: url(Images/12.png); 
	background-repeat:no-repeat;
	background-size:cover;
	
}	

</style>


<!-- Description of the rental website --> 
<div align="center" id = "main">
	<h1>About Seahawk Rent-A-Car</h1>
		<p>Seahawk Rent-A-Car is bla bla bla.</p>
	<h1>About Us</h1>
	<p>Seahawk Rent-A-Car is currently owned by Simone, Yujiemi, Leo.</p>

	<p>Thank you!</p>
</div>