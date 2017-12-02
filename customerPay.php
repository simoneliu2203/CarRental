<?php 
	// links customerPay.php to customerAccessControl.php
	include('customerAccessControl.php');
?>

<!-- connects to the css files -->
<link rel="stylesheet" type="text/css" href="css/carlisting.css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>

<!-- shows that the user is logged in as a customer -->
<div style="text-align:right; margin-right:20px; color: red">Logged in as: <?php echo $username?></div>
<!-- takes user back to the customer main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>


<?php 
	// links customerPay.php to confirmPaying.php and confirmInfo.php
	include('confirmPaying.php');
	include('confirmInfo.php'); 		
?>
