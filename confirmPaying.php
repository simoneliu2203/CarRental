<?php	
	//Getting all the car's info from the mysql database that the customer chose to book
	$car_id = $_GET['id'];
	$pickup=$_SESSION['pickup'];
	$dropoff=$_SESSION['dropoff'];
	$rate = $_GET['rate'];
	$new_pick = date_create($pickup);
	$new_drop = date_create($dropoff);	
	$diff = date_diff($new_drop,$new_pick);
	$days = $diff->days;	
	$dpickup = date('Y-m-d', strtotime($pickup));
    $ddropoff = date('Y-m-d', strtotime($dropoff));

	//Using query to get the car's info from database and print it out to the screen
	$search_car = "SELECT * FROM cars WHERE vin = '$car_id'";	
	$result=mysqli_query($db, $search_car);
	while($row = mysqli_fetch_assoc($result)){
		?>
		<div class="columns">
			<ul class="price">
				<!-- displays the car information for the car that the user picked, including the picture of the car -->
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
	//After customer confirms their booking, insert into the database the booking info 
	//this includes customer username, vin number, dates, and status (status by default always start with pending) 
	if(isset($_POST["confirm"])){
		$query = "INSERT INTO booking (c_username, vin, pickup, dropoff, status) 
				  VALUES('$username', '$car_id', '$pickup','$dropoff', 'pending')";
		mysqli_query($db, $query);
		
		$stotal = mysqli_query($db, "SELECT total from get_quote where c_username='$username' and vin='$car_id' and pickup='$dpickup' and dropoff='$ddropoff'");
		$stotal2 = mysqli_fetch_array($stotal);
		$total = $stotal2['total'];
				
		//Have the pop up notification to let the customer know their booking has been submitted for approval
		if (TRUE) {
			echo "<script type = \"text/javascript\">
			alert(\"Thank you for booking. Your payment is Being Verified. Once it is processed, we'll email additional details!\");
			window.location = (\"customerMenu.php\")
			</script>";
		}
	}
?>

<?php 
	//transaction process which connects to the mysql database

	$mysqli = $db;

	$mysqli->autocommit(false);

	//this updates the bankaccount database 
	$result1 = $mysqli->query("UPDATE bankaccount SET abalance = abalance-$total WHERE c_username='$username'");

	if ($result1 == false){
		$mysqli->rollback();
	}
	else {
		//this updates the profit database 
		$result2 = $mysqli->query("INSERT INTO profit (c_username, amount) values ('$username', $total)");

		if ($result2 == false){
			$mysqli->rollback();
		}

		else {
			$mysqli->commit();	
			
		}
	}
	$mysqli->autocommit(true);
?>