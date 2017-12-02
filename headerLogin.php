<?php
	// links headerLogin.php to localhost
	include("/home/yml4331/connection.php")
?>

<!DOCTYPE html>
<!-- style for title in html -->
<html>
<head>
<title>Seahawk Rent-A-Car </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin:0;}

/* sets style of the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: black;
}

/* sets style of .topnav when not hovered over by a cursor */
.topnav a {
  float: right;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  background-color: black;
  text-decoration: none;
  font-size: 18px;
}

/* sets style of .topnav when hovered over by a cursor */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* sets style of .topnav */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}



</style>
<!-- connects to css files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
</head>

<!-- style format for text in upper right corner of the page -->
<i><font size="6" align="center"><i><font size="6" align="center">
<div class="row" style="background-color:white;padding:1px hspace=20">
  <div class="col-lg-3"><img src="Images/logo.png" width="350" height="80" align="left"></div>
  <div class="col-lg-5"><i><font size="5" align="center"><br/></br/></div>
  <div class="col-lg-4"><i><font size="3" align="center">Contact: (000)123-4567<br/>Location: Somewhere in Wilmington</br/></div>
</div>

<!-- style format for menu options in top navigation bar -->
<div class="topnav">
  <a href="logout.php" class="titleButton" style="color: greenyellow">Logout?</a>
  <a href="aboutus.php" class="titleButton">About us</a>
  <a href="map.php" class="titleButton">Map</a>
	<?php 
	// different menu options based on type of user (customer or employee) based on username
	if (isset($_SESSION['username'])) { 
		$result=mysqli_query($db,"SELECT username FROM users WHERE username='$username'");

		$user_type=mysqli_query($db, "SELECT acc_type FROM users WHERE username='$username'");			
		$row = mysqli_fetch_assoc($user_type);
		if(mysqli_num_rows($result) == 1)
			{	?>
				<!-- different Menu reference buttons based on account type -->
				<!-- if user is a customer, then Menu option links to customerMenu.php -->
				<!-- if user is an employee, then Menu option links to employeeMenu.php -->
				<?php if($row['acc_type']=="customer") { ?>
						<a href="customerMenu.php" class="titleButton">Menu</a>
				<?php } else { ?>
						<a href="employeeMenu.php" class="titleButton">Menu</a>
				<?php } ?> <?php
			}
	
	}
	?>
<!-- style format for menu option Home in top navigation bar -->	
  <a href="index.php" class="titleButton">Home</a>
</div> 
    
    
</body>

</html>