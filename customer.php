<?php 
	// links customer.php to employeeAccessControl.php
	include('employeeAccessControl.php');
?>

<!-- this references to carlisting.css -->
<link rel="stylesheet" type="text/css" href="css/carlisting.css">

<?php	
	//Getting all the customer's info that the customer chose to book
	$c_username = $_GET['id'];
?>

<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<!-- style of title of page -->
<p style="color:red;font-size:36px">Customer Info</p>

<?php
	/* connects the informaiton that the user inputs into the mysql database */
	$errors = array();
	if(isset($_REQUEST['update'])){
		$first = mysqli_real_escape_string($db, $_POST['first']);
		$last = mysqli_real_escape_string($db, $_POST['last']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$license = mysqli_real_escape_string($db, $_POST['license']);
		$license_state = mysqli_real_escape_string($db, $_POST['license_state']);				
		
		/* if there are no errors when updating the customer's information, then print 'Customer Updated' and send new information inputted into the mysql database */
			if (count($errors) == 0){
				echo "<div align='center'>Customer Updated</div>";
				$query = "update customers set first = '$first', last = '$last', address = '$address', city = '$city', state = '$state', zipcode = '$zipcode', phone = '$phone', license = '$license', license_state = '$license_state' where c_username = '$c_username'";
				mysqli_query($db, $query);
			}
		}
		
?>

<script src="jQueryMask/src/jquery.maskedinput.js" type="text/javascript"></script>

<!-- Format the input from user so that only a certain number of values can be inputted by the user for certain attributes -->
<script type="text/javascript">
$(function() {
	$("#cvv").mask("999");
	$("#datedate").mask("99/99/9999");
	$("#zipcode").mask("99999");
	$("#creditcard").mask("9999 9999 9999 9999");
	$("#phone").mask("(999) 999-9999");
	$( "#datepick" ).datepicker({minDate:0}); 
});
</script>

<!-- style of customer table -->
<form enctype="multipart/form-data" action="" method="post">
<table width="400" height="600" border="1" bordercolor="white" align="center">
	  <tbody>
	
	<!-- style of table and what will be put in each column and row, such as username, first name, last name, etc. -->	
		<tr>
	  	<!-- fetches the usernames of customers from the mysql database and displays them in the table -->
		  <td align="left">Username</td>
		  <td align="right"><?php 
	  $result=mysqli_query($db, "select c_username from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['c_username']);?></td>
		</tr>
		<tr>
	  	<!-- fetches the first names of customers from the mysql database and displays them in the table -->
		  <td align="left">First Name</td>
		  <td align="right"><input type="text" name="first" required="required" value="<?php 
	  $result=mysqli_query($db, "select first from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['first']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the last names of customers from the mysql database and displays them in the table -->
		  <td align="left">Last Name</td>
		  <td align="right"><input type="text" name="last" required="required" value="<?php 
	  $result=mysqli_query($db, "select last from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['last']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the addresses of customers from the mysql database and displays them in the table -->
		  <td align="left">Address</td>
		  <td align="right"><input type="text" name="address" required="required" value="<?php 
	  $result=mysqli_query($db, "select address from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['address']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the cities of customers from the mysql database and displays them in the table -->
		  <td align="left">City</td>
		  <td align="right"><input type="text" name="city" required="required" value="<?php 
	  $result=mysqli_query($db, "select city from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['city']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the states of customers from the mysql database and displays them in the table -->
		  <td align="left">State</td>
		  <td align="right"><input type="text" name="state" required="required" maxlength="2" value="<?php 
	  $result=mysqli_query($db, "select state from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['state']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the zipcodes of customers from the mysql database and displays them in the table -->
		  <td align="left">Zipcode</td>
		  <td align="right"><input id="zipcode" type="text" name="zipcode" required="required" value="<?php 
	  $result=mysqli_query($db, "select zipcode from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['zipcode']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the phone numbers of customers from the mysql database and displays them in the table -->
		  <td align="left">Phone Number</td>
		  <td align="right"><input id="phone" type="text" name="phone" required="required" value="<?php 
	  $result=mysqli_query($db, "select phone from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['phone']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the license numbers of customers from the mysql database and displays them in the table -->
		  <td align="left">License Number</td>
		  <td align="right"><input type="text" name="license" required="required" value="<?php 
	  $result=mysqli_query($db, "select license from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['license']);
	?>"></td>
		</tr>
		<tr>
	  <!-- fetches the license states of customers from the mysql database and displays them in the table -->
		  <td align="left">License State</td>
		  <td align="right"><input type="text" name="license_state" required="required" maxlength="2" value="<?php 
	  $result=mysqli_query($db, "select license_state from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['license_state']);
	?>"></td>
		</tr>  
		<tr>
		<!-- update option is available to user in the table -->
		 <td  colspan="2" align="center"><input type="submit" name="update" value="Update"></td>
		</tr>
	  </tbody>
	</table>
</form>


