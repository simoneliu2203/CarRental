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
	/* Set up the style for the page */
	body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	min-height: 600px;
	min-width: 1000;
	
	/* background image set up*/	
	background-image: url(Images/12.png); 
	background-repeat:no-repeat;
	background-size:cover;
	
}	

</style>


<!-- Description of the rental website and about the owners of the website --> 
<div align="center" id = "main">
	<h1>About Seahawk Rent-A-Car</h1>
		<font size="4.5">Seahawk Rent-A-Car aims to revolutionize the car rental industry by providing an updated, streamlined software to manage the car rental process and all of the details it involves. Through seamless integration of client, inventory, and business operations databases, our product will provide a user experience that is fast and easy to use on both the client and administrative ends, while constantly providing the rental agency with up-to-date information on daily operations.</font>
	<h1>About Us</h1>
	<font size="4.5">Seahawk Rent-A-Car is currently owned by Simone "Y" Liu, Yujiemi Chisholm, Jacob Pifer, and Zachary Cappellini.</font>
    
	<p><font size="4.5">Thank you!</font>
</div>