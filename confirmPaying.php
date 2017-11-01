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




<?php
	if(isset($_POST["confirm"])){
		$query = "INSERT INTO booking (c_username, vin, pickup, dropoff, status) 
				  VALUES('$username', '$car_id', '$pickup','$dropoff', 'pending')";
		
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


