<?php
	include("header.php");
	include("loginHandler.php");
	$username=$_SESSION['username'];
	
?><head>
	<link rel="stylesheet" type="text/css" href="css/carlisting.css">
	<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
</head>



<div style="text-align:right; margin-right:auto"><a href="logout.php" style="color:coral; font-size:18px;margin-right:5px">Logout?</a></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<?php	
	$car_id = $_GET['id'];
	//echo 	parse_str($_SERVER['QUERY_STRING']);
	$pickup = $_GET['pickup'];
	$dropoff = $_GET['dropoff'];
	$rate = $_GET['rate'];
	$new_pick = date_create($pickup);
	$new_drop = date_create($dropoff);	
	$diff = date_diff($new_drop,$new_pick);
	$days = $diff->days;	


	$search_car = "SELECT * FROM cars WHERE vin = '$car_id'";	
	$result=mysqli_query($db, $search_car);
	while($row = mysqli_fetch_assoc($result)){
		?>
		<div class="columns">
			<ul class="price">
				<li><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>'?>	</li>
				<li class="grey"><?php echo "\$". $row['rate']."/day"?></li>
				<li><?php echo "Brand: ".$row['brand'] ?></li>	
				<li><?php echo "Model: ".$row['model'] ?></li>	
				<li><?php echo "Type: ".$row['type'] ?></li>	
				<li><?php echo "Year: ".$row['year'] ?></li>	
				<li><?php echo "Capacity: ".$row['capacity'] ?></li>	
			</ul>
		</div>
	<?php
}
?>

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
		  <td align="right"><?php echo "$".$days*$rate*8/100?></td>
		</tr>
		<tr>
		  <td align="left">Total</td>
		  <td align="right"><?php echo "$".($rate*$days+$days*$rate*8/100) ?></td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="confirm" value="Confirm"></td>      
		</tr>
	  </tbody>
	</table>
</form>

<?php
	if(isset($_POST["confirm"])){
		$query = "INSERT INTO booking (c_username, vin, pickup, dropoff) 
				  VALUES('$username', '$car_id', '$pickup','$dropoff')";
		
		mysqli_query($db, $query);
		//echo "Your booking is done";
		if (TRUE) {
			echo "<script type = \"text/javascript\">
			alert(\"Thank you for booking. Your payment is Being Verified. Once it is processed, we'll email additional details!\");
			window.location = (\"customerMenu.php\")
			</script>";
		}
	}
?>


