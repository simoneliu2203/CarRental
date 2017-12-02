<?php 
	// links vehicleListing.php to employeeAccessControl.php
	ob_start();
	include('employeeAccessControl.php');
?>
<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<style>
	
/* sets the style for the buttons */
.button {
    border: none;
	border-radius: 12px;
    color: white;
    padding: 5px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid blue;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: blue;
    color: white;
	border: 2px solid blue;
}

/* sets the style for another button when it's not hovered over by the cursor */
.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid orange;
}

/* sets the style for another button when it's hovered over by the cursor */
.button2:hover {
    background-color: orangered;
    color: white;
	border: 2px solid orangered;
}
</style>

<!-- sets style for title font -->
<p style="color:red;font-size:36px">Vehicles</p>

<!-- sets style for add a car button -->
<form method="post" action="">
	<div style="text-align:center">  
		<input class="button button2" type="submit" name="add" value="Add a Car" />  
	</div> 
</form>

<?php 
	// if user requests to add a car, then link to addCar.php
	if(isset($_REQUEST['add'])){
		 header('location: addCar.php');
	 }
	// if user requests to update a car, then link to vehicle.php
	if(isset($_REQUEST['update'])){
		 header('location: vehicle.php');
	 }
	
?>
<form method="post" action="">
<?php 
	// style of table and attributes listed within the table 
	echo "<table border=2 align=center width='90%'>
			<tr>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Image</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Vin</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Brand</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Model</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Type</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Year</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Color</th>
		    <th width='10%' bgcolor=black style='color:white; padding:15px'>Rate</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Mileage</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Capacity</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Available</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Options</th>

			</tr>";
		
			// connect the mysql database to the code
			$rented_car = mysqli_query($db,"SELECT * FROM cars");
			
			// display attributes of vehicle
			$today =  date_create();
			if (mysqli_num_rows($rented_car) != 0){
				while($row = mysqli_fetch_assoc($rented_car)){
					echo "<tr>" . "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="100" width="100"/>'. "</td>";
					echo  "<td>" . $row['vin'] . "</td>"; 
					echo  "<td>" . $row['brand'] . "</td>"; 
					echo  "<td>" . $row['model'] . "</td>"; 
					echo  "<td>" . $row['type'] . "</td>"; 
					echo  "<td>" . $row['year'] . "</td>"; 
					echo  "<td>" . $row['color'] . "</td>"; 
					echo  "<td>" . "$".$row['rate']."/day" . "</td>";
					echo  "<td>" . $row['mileage'] . "</td>";
					echo  "<td>" . $row['capacity'] . "</td>";
					echo  "<td>" . $row['available'] . "</td>"; 
	?>	
					<td>
						<!-- settings for update button -->
						<a href="vehicle.php?id=<?php echo $row['vin']?>">Update</a>
				   </td> 	
				<?php						
				}			
			}
?>
</form>
