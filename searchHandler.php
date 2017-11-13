<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		include('header.php');
	}
	date_default_timezone_set('America/New_York');

?>
 
 <style>
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    color: white;
    font-size: 25px;
	height: 150px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

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

<h2>Car Selection</h2>
<p>To rent a car, please login</p>

<?php				
	if(isset($_POST["search"])){
		$pickup = date('Y-m-d',strtotime($_POST['pickup']));
		$dropoff = date('Y-m-d',strtotime($_POST['dropoff']));
		$_SESSION ['pickup']=$pickup;
		$_SESSION ['dropoff']=$dropoff;
		
		
		$sorted = $_POST['sorted'];
		
		$search_car = "SELECT * FROM cars WHERE available = 'yes' AND vin NOT IN (SELECT vin FROM  booking WHERE (pickup <= '$pickup' AND dropoff >= '$pickup' AND status <> 'cancelled' AND status <> 'declined') OR (pickup < '$dropoff' AND dropoff >= '$dropoff' AND status <> 'cancelled' AND status <> 'declined') OR ('$pickup' <= pickup AND '$dropoff' >= pickup AND status <> 'cancelled' AND status <> 'declined')) ORDER BY $sorted";		
		
		$result=mysqli_query($db, $search_car);

		while($row = mysqli_fetch_assoc($result)){
			?>
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
							<li class="grey"><a href="customerPay.php?id=<?php echo $row['vin']?>&rate=<?php echo $row['rate']?>">Book Now</a><?php
						}
						else {
							?><li class="grey"><a href="guestPay.php?id=<?php echo $row['vin']?>&rate=<?php echo $row['rate']?>">Book Now</a><?php
						}
					
					?>					
					
				</ul>
				</div>
			<?php
		}
	}
?>

	


