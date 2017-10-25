<?php 
//http://codingcyber.com/creating-multistep-form-processing-using-php-228/
session_start();
if(isset($_POST['sign_up'])){
    if($_POST['sign_up'] == "Search"){
        $_SESSION['zip_code'] = $_POST['zip_code'];
    }
 
    if($_POST['sign_up'] == "Submit"){
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['school_name'] = $_POST['school_name'];
    }
 
    if($_POST['sign_up'] == "Select"){
        echo $sql = "INSERT INTO `test` (zip_code, state, school_name, student_name)
        VALUES ('{$_SESSION['zip_code']}', '{$_SESSION['state']}', '{$_SESSION['school_name']}', '{$_POST['student_name']}')";
    }
}
?>
</html>
<head>
<title>Multi Step form Processing</title>
</head>
<body>
 
<div id="innr_bx">
	<?php if (empty($_POST)){ ?>
			<!-- First Step -->
			<form action="" method="post">
			<label>Zip Code :</label><input type="text" name="zip_code" />
			<input type="submit" name="sign_up" value="Search" />
			</form>
 
<!-- Second Step -->
	<?php }elseif ($_POST['sign_up'] === 'Search'){ ?>
			<form action="" method="post">
			<label>Zip Code :</label><input type="text" name="zip_code" value="<?php echo $_SESSION['zip_code'] ?>" />
			<label>District :</label><input type="text" name="state" />
			<label>School :</label><input type="text" name="school_name" /></pre>
			<input type="submit" name="sign_up" value="Submit" />
			</form>
 
<!-- Third Step --> 
	<?php }elseif($_POST['sign_up'] === 'Submit'){ ?>
			<form action="" method="post"></form>
			<label>Zip Code :</label><input type="text" name="zip_code" value="<?php echo $_SESSION['zip_code'] ?>" />
			<label>District :</label><input type="text" name="state" value="<?php echo $_SESSION['state'] ?>"/>
			<label>School :</label><input type="text" name="school_name" value="<?php echo $_SESSION['school_name'] ?>"/>
			<label>Student Name :</label>
			<input type="text" name="student_name" value="" />
			<input type="submit" name="sign_up" value="Select" />
			<?php }?></div>
</body>
</html>









<form method="post" action="">
	<table width="400" height="500" border="1" bordercolor="white" align="center">
	  <tbody>
		<tr>
		  <td colspan="2"><h2>Booking summary</h2></td>
		</tr>
		<tr>
		  <td align="left">Pick-up: <?php echo $pickup?></td>
		  <td align="right">Drop-off: <?php echo $dropoff?></td>
		</tr>
		<tr>
		  <td align="left">Days:</td>
		  <td align="right"><?php echo $diff->days;?></td>
		</tr>
		<tr>
		  <td align="left">Base price: </td>
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
		  <td colspan="2"><input type="submit" name="confirm" value="Confirm"></td>      
		</tr>
	  </tbody>
	</table>
</form>