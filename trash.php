<?php 
	include('customerAccessControl.php');
?>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>


<div style="text-align:right; margin-right:20px; color: red">Login as: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<?php
		$errors = array();
	    if(isset($_REQUEST['update1'])){
			include('profile.php');
		}	
?>

<?php
		$errors = array();
	    if(isset($_REQUEST['update2'])){
			include('creditCard.php');
		}
?>
<input type="text" id="Datepicker1">
<script type="text/javascript">
$(function() {
	$("#cvv").mask("999");
	$("#datedate").mask("99/99/9999");
	$("#zipcode").mask("99999");
	$("#creditcard").mask("9999 9999 9999 9999");
	$("#phone").mask("(999) 999-9999");
	$( "#Datepicker1" ).datepicker({minDate:0}); 
});
</script>


<style>
.button {
    border: none;
	border-radius: 12px;
    color: white;
    padding: 5px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: black; 
    color: white; 
    border: 2px solid black;
}

.button1:hover {
    background-color: black;
    color: antiquewhite;
	border: 2px solid white;
}
body
{
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	min-width: 1000px;
	min-height: 600px;
		
	background-image: url(); 
	background-repeat:no-repeat;
	background-size: cover;
	
}	
	
 #table{
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
 #boxc1{
	background-color: lightgray; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

 #boxc2{
	background-color: ghostwhite; 
	border: none;
	opacity: 0.9;
	}
	
 #boxc3{
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
</style>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">

<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>


<script src="jQueryMask/src/jquery.maskedinput.js" type="text/javascript"></script>

