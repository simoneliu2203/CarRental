<?php 
	session_start();
	// if user is in session, then link searchHandler.php to headerLogin.php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		// else link to header.php
		include('header.php');
	}
	// set default time zone
	date_default_timezone_set('America/New_York');

?>
 
 <style>
* {
    box-sizing: border-box;
}

/* sets style to .columns */
.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

/* sets style to .price when there's not a cursor hovering over it */
.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

/* sets style to .price when there's a cursor hovering over it */ 
.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* sets style to .price .header */
.price .header {
    color: white;
    font-size: 25px;
	height: 150px;
}

/* sets style to .price li */
.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

/* sets style to .price .grey */
.price .grey {
    background-color: #eee;
    font-size: 20px;
}

/* sets style to buttons */
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>

<!-- set style to title and subtitle -->
<h2>Car Selection</h2>
<p>To rent a car, please login</p>

<?php
	// settings for pick up and drop off
	if(isset($_POST["search"])){
		$pickup = date('Y-m-d',strtotime($_POST['pickup']));
		$dropoff = date('Y-m-d',strtotime($_POST['dropoff']));
		$_SESSION ['pickup']=$pickup;
		$_SESSION ['dropoff']=$dropoff;
		
		
		$sorted = $_POST['sorted'];
		
		// search for cars that are available during the specified dates that the user has requested in the mysql database
		$search_car = "SELECT * FROM cars WHERE available = 'yes' AND vin NOT IN (SELECT vin FROM  booking WHERE (pickup <= '$pickup' AND dropoff >= '$pickup' AND status <> 'cancelled' AND status <> 'declined') OR (pickup < '$dropoff' AND dropoff >= '$dropoff' AND status <> 'cancelled' AND status <> 'declined') OR ('$pickup' <= pickup AND '$dropoff' >= pickup AND status <> 'cancelled' AND status <> 'declined')) ORDER BY $sorted";		
		
		$result=mysqli_query($db, $search_car);

		while($row = mysqli_fetch_assoc($result)){
			?>
			<!-- show attributes -->
			<div class="columns">
				<ul class="price">
					<li class="header"> <?php echo '<img src="data:image;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>'?></li>
					<li class="grey"><?php echo "\$". $row['rate']."/day"?></li>
					<li><?php echo "Brand: ".$row['brand'] ?></li>	
					<li><?php echo "Model: ".$row['model'] ?></li>	
					<li><?php echo "Type: ".$row['type'] ?></li>	
					<li><?php echo "Year: ".$row['year'] ?></li>	
					<li><?php echo "Capacity: ".$row['capacity'] ?></li>
					<?php 
						if (isset($_SESSION['username'])) {
							$username = $_SESSION['username']; ?>
							<!-- if the user is logged into the system, then they will be directed to customerPay.php -->
							<li class="grey"><a href="customerPay.php?id=<?php echo $row['vin']?>&rate=<?php echo $row['rate']?>">Book Now</a><?php
						}
						else {
							// if the user is not logged into the system, then they will be directed to guestPay.php
							?><li class="grey"><a href="guestPay.php?id=<?php echo $row['vin']?>&rate=<?php echo $row['rate']?>">Book Now</a><?php
						}
					
					?>					
					
				</ul>
				</div>
			<?php
		}
	}
?>

	


