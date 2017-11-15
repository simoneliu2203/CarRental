<?php 
	include('employeeAccessControl.php');
?>

<link rel="stylesheet" type="text/css" href="css/carlisting.css">

<?php	
	//Getting all the customer's info that the customer chose to book
	$c_username = $_GET['id'];
?>

<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<p style="color:red;font-size:36px">Customer Info</p>

<?php
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
		
			if (count($errors) == 0){
				echo "<div align='center'>Customer updated</div>";
				$query = "update customers set first = '$first', last = '$last', address = '$address', city = '$city', state = '$state', zipcode = '$zipcode', phone = '$phone', license = '$license', license_state = '$license_state' where c_username = '$c_username'";
				mysqli_query($db, $query);
			}
		}
		
?>

<script src="jQueryMask/src/jquery.maskedinput.js" type="text/javascript"></script>

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

<form enctype="multipart/form-data" action="" method="post">
<table width="400" height="600" border="1" bordercolor="white" align="center">
	  <tbody>
		
		<tr>
		  <td align="left">Username</td>
		  <td align="right"><?php 
	  $result=mysqli_query($db, "select c_username from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['c_username']);?></td>
		</tr>
		<tr>
		  <td align="left">First Name</td>
		  <td align="right"><input type="text" name="first" required="required" value="<?php 
	  $result=mysqli_query($db, "select first from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['first']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Last Name</td>
		  <td align="right"><input type="text" name="last" required="required" value="<?php 
	  $result=mysqli_query($db, "select last from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['last']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Address</td>
		  <td align="right"><input type="text" name="address" required="required" value="<?php 
	  $result=mysqli_query($db, "select address from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['address']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">City</td>
		  <td align="right"><input type="text" name="city" required="required" value="<?php 
	  $result=mysqli_query($db, "select city from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['city']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">State</td>
		  <td align="right"><input type="text" name="state" required="required" maxlength="2" value="<?php 
	  $result=mysqli_query($db, "select state from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['state']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Zipcode</td>
		  <td align="right"><input id="zipcode" type="text" name="zipcode" required="required" value="<?php 
	  $result=mysqli_query($db, "select zipcode from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['zipcode']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Phone</td>
		  <td align="right"><input id="phone" type="text" name="phone" required="required" value="<?php 
	  $result=mysqli_query($db, "select phone from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['phone']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">License</td>
		  <td align="right"><input type="text" name="license" required="required" value="<?php 
	  $result=mysqli_query($db, "select license from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['license']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">License State</td>
		  <td align="right"><input type="text" name="license_state" required="required" maxlength="2" value="<?php 
	  $result=mysqli_query($db, "select license_state from customers where c_username = '$c_username'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['license_state']);
	?>"></td>
		</tr>  
		<tr>
		 <td  colspan="2" align="center"><input type="submit" name="update" value="Update"></td>
		</tr>
	  </tbody>
	</table>
</form>


