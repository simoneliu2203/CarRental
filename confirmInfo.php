<!-- Import libraries using jQuery library --> 
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
<script src="jQueryMask/src/jquery.maskedinput.js" type="text/javascript"></script>

<script type="text/javascript">
   	// Format the input from user so that only a certain number of values can be inputted by the user for certain attributes
	$(function() {
		$("#cvv").mask("999");
		$("#date").mask("99/99/9999");
		$("#zipcode").mask("99999");
        $("#creditcard").mask("9999 9999 9999 9999");
		$("#phone").mask("(999) 999-9999");
		$( "#datepick" ).datepicker({
			minDate:0,
			changeMonth:true,
			changeYear:true
		}); 
    });
	
</script>

<style>
	.ui-datepicker .ui-datepicker-title select {
		color: #000;
	}
</style>

<!-- Create table for customer profile and credit card info --> 
<!-- Print out customers' information and credit card info from database --> 
<!-- Using query to look for the customer in SQL --> 
<!-- User cannot go to the next step if inputs are empty --> 
<!-- 1st step: Customers info --> 
<!-- 2nd step: Customers billing info --> 
<!-- 3rd step: Confirm booking info --> 
<div>
	<?php if (empty($_POST) || $_POST['update']==='Previous'){ ?>
	<!-- First Step -->
	<!-- Profile table -->
	
			<!-- set style for profile table -->
			<form action="" method="post">
			<table width="400" height="600" border="1" bordercolor="white" align="center">
				  <tbody>
					<tr>
				  	  <!-- set title of table -->
					  <td colspan="2"><h2>General Information</h2></td>
					</tr>
					<tr>
				  <!-- these are attributes that the user can input into the general information table, such as first name, last name, address, etc. -->
				  <!-- the info inputted will be sent to the mysql database with its corresponding attributes -->
				  <!-- if there's already information on the customer in the system, then it fetches the info of the customer from the mysql database and displays it -->
				  <!-- all of the fields will be required before the user continues -->
					  <td align="left">First Name</td>
					  <td align="right"><input type="text" name="first" required="required" value="<?php 
				  $result=mysqli_query($db, "select first from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo trim($row['first']);
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Last Name</td>
					  <td align="right"><input type="text" name="last" required="required" value="<?php 
				  $result=mysqli_query($db, "select last from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['last'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Address</td>
					  <td align="right"><input type="text" name="address" required="required" value="<?php 
				  $result=mysqli_query($db, "select address from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['address'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">City</td>
					  <td align="right"><input type="text" name="city" required="required" value="<?php 
				  $result=mysqli_query($db, "select city from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['city'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">State</td>
					  <td align="right"><input type="text" name="state" required="required" maxlength="2" value="<?php 
				  $result=mysqli_query($db, "select state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['state'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Zipcode</td>
					  <td align="right"><input id="zipcode" type="text" name="zipcode" required="required" value="<?php 
				  $result=mysqli_query($db, "select zipcode from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['zipcode'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Phone Number</td>
					  <td align="right"><input id="phone" type="text" name="phone" required="required" value="<?php 
				  $result=mysqli_query($db, "select phone from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['phone'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">License Number</td>
					  <td align="right"><input type="text" name="license" required="required" value="<?php 
				  $result=mysqli_query($db, "select license from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">License State</td>
					  <td align="right"><input type="text" name="license_state" required="required" maxlength="2" value="<?php 
				  $result=mysqli_query($db, "select license_state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license_state'];
				?>"></td>
					</tr>
					<tr>
					<!-- setup for the "next" button to update inputted values -->
					 <td  colspan="2" align="right"><input type="submit" name="update" value="Next"></td>
					</tr>
				  </tbody>
				</table>			
				
  			</form>
	

	<!-- Second Step -->
	<!-- Billing info table-->
	<?php }elseif ($_POST['update']==='Next'){ ?>
		
			<!-- set style for billing info table -->
			<form action="" method="post">
			<table width="400" height="500" border="1" bordercolor="white" align="center">
				  <tbody>
					<tr>
				  	  <!-- set title of table -->
					  <td colspan="2"><h2>Billing Information</h2></td>
					</tr>
					<tr>

				  <!-- these are attributes that the user can input into the billing information table, such as card type, credit card number, CVV, etc. -->
				  <!-- the info inputted will be sent to the mysql database with its corresponding attributes -->
				  <!-- if there's already information on the customer in the system, then it fetches the info of the customer from the mysql database and displays it -->
				  <!-- all of the fields will be required before the user continues -->
					  <td align="left">Card Type (Master, Visa, eg.)</td>
					  <td align="right"><input type="text" name="type" required="required" value="<?php 
				  $result=mysqli_query($db, "select type from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['type'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Credit Card Number</td>
					  <td align="right"><input id="creditcard" type="text" name="creditcard" required="required" value="<?php 
				  $result=mysqli_query($db, "select creditcard from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['creditcard'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">CVV </td>
					  <td align="right"><input id="cvv" type="text" name="cvv" required="required" value="<?php 
				  $result=mysqli_query($db, "select cvv from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['cvv'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Expiration Date</td>
					  <td align="right"><input type="text" id="datepick" name="exp_date" size="20" required="required" onkeydown="return false" value="<?php 
				  $result=mysqli_query($db, "select date_format(exp_date, '%m/%d/%Y') as fdate from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['fdate'];
				?>"></td>
					</tr>
					<tr>
					  <td align="left">Name on Card</td>
					  <td align="right"><input type="text" name="name" required="required" value="<?php 
				  $result=mysqli_query($db, "select name from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['name'];
				?>"></td>
					</tr>
					<tr>
					<!-- setup for the "previous" and "complete" buttons for if the user wants to go back to the previous input table or if they want to complete their processing -->
					 <td align="left"><input type="submit" name="update" value="Previous"></td>
					 <td align="right"><input type="submit" name="update" value="Complete"></td>
					</tr>
				  </tbody>
				</table>
  			</form>
 
	<!-- Third Step --> 
	<!-- when the "next" button is hit, the overview for the car rental info is presented to the user for confirmation, such as booking summary, pick-up date, drop-off date, etc -->
	<?php }elseif ($_POST['update']==='Complete'){ ?>
			<form action="" method="post">
			<!-- set style for the table holding information -->
			<table width="400" height="500" border="1" bordercolor="white" align="center">
			  <tbody>
				<tr>
			  	<!-- set title of table -->
				  <td colspan="2"><h2>Booking Summary</h2></td>
				</tr>
				<tr>
			  	<!-- setup information for bill for the user, which calculates for them their base price, tax, total, etc. -->
				  <td align="left">Pick-up: <?php echo $pickup?></td>
				  <td align="right">Drop-off: <?php echo $dropoff?></td>
				</tr>
				<tr>
				  <td align="left">Days:</td>
				  <td align="right"><?php echo $diff->days;?></td>
				</tr>
				<tr>
				  <td align="left">Base Price: </td>
				  <td align="right"><?php echo "$".$days*$rate?></td>
				</tr>
				<tr>
				  <td align="left">Tax (7%)</td>
				  <td align="right"><?php echo "$".$days*$rate*0.07?></td>
				</tr>
				<tr>
				  <td align="left">Total</td>
				  <td align="right"><?php echo "$".($rate*$days+$days*$rate*0.07) ?></td>
				</tr>
				<tr>
			  	<!-- set up for the "previous" and "confirm" buttons for the user to click on to either go back to the previous page, or confirm their booking request -->
				  <td align="left"><input type="submit" name="update" value="Previous"></td>
				  <td align="right"><input type="submit" name="confirm" value="Confirm"></td>      
				</tr>
			  </tbody>
			</table>
				
			</form>
<?php }?>

</div>


<?php
//Nested if statements
//If user clicks "next" or "complete", call page profile.php or creditCard.php 
//this handles updating the profile and credit card info back to the database

if(isset($_POST['update'])){
    if($_POST['update'] == "Next"){
		$errors = array();
        include('profile.php');
    };
 
    if($_POST['update'] == "Complete"){
		$errors = array();
		include('creditCard.php');
    }
}
		
?>
