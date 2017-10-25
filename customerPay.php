<?php
	include("headerLogin.php");
	include("loginHandler.php");
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	else{		
	}
?><head>
	<link rel="stylesheet" type="text/css" href="css/carlisting.css">
	<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
</head>


<div style="text-align:right; margin-right:20px; color: red">Login as: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<?php	
	$car_id = $_GET['id'];
	$pickup=$_SESSION['pickup'];
	$dropoff=$_SESSION['dropoff'];
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

<?php include('infoConfirm.php') ?>


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


