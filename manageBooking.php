<?php 
	// links manageBooking.php to employeeAccessControl.php
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
    font-size: 14px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid green;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: #4CAF50;
    color: white;
}

/* sets the style for another button when it's not hovered over by the cursor */
.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid darkorange;
}

/* sets the style for another button when it's hovered over by the cursor */
.button2:hover {
    background-color: orange;
    color: white;
}

</style>

<!-- sets style for title -->
<h2 align="center">Bookings</h2>


<?php 	
	// if the status of a booking is approved, then the booking status will be updated in the mysql database as well
	if(isset($_POST["approved"])){
		$id = $_POST['approved'];
		$query = "update booking set status = 'approved' where booking_id = '$id'";
		mysqli_query($db, $query);
	}
	
	// if the status of a booking is approved, then the booking status will be updated in the mysql database as well
	if(isset($_POST["declined"])){
		$id = $_POST['declined'];
		$query = "update booking set status = 'declined' where booking_id = '$id'";
		mysqli_query($db, $query);
	}
?>

<script type='text/javascript'>
function approveConfirm()
{
	// if the user wants to approve a certain booking, then a message pops up to make sure that the user wants to do this
	return confirm("Are you sure you want to APPROVE this booking?");
	window.opener.location.reload(true);
	window.close();
};
	
function declineConfirm()
{
	// if the user wants to decline a certain booking, then a message pops up to make sure that the user wants to do this
	return confirm("Are you sure you want to DECLINE this booking?");
	window.opener.location.reload(true);
	window.close();
}
</script>

<!-- style of table and attributes listed within the table -->
<form method="post" action="">
<?php echo "<table border=2 align=center width='90%'>
			<tr>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Image</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Brand</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Model</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Type</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>BookingID</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Customer</th>
		    <th width='10%' bgcolor=black style='color:white; padding:15px'>Rate</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Pick-up</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Drop-off</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Total</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Status</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Option</th>
			</tr>";
		
			// connect the mysql database to the code
			$rented_car = mysqli_query($db,"SELECT * FROM get_quote natural join cars");
			
			// display attributes of customer
			$today =  date_create();
			if (mysqli_num_rows($rented_car) != 0){
				while($row = mysqli_fetch_assoc($rented_car)){
					echo "<tr>" . "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="100" width="100"/>'. "</td>";
					echo  "<td>" . $row['brand'] . "</td>"; 
					echo  "<td>" . $row['model'] . "</td>"; 
					echo  "<td>" . $row['type'] . "</td>"; 
					echo  "<td>" . $row['booking_id'] . "</td>"; 
					echo  "<td>" . $row['c_username'] . "</td>"; 
					echo  "<td>" . "$".$row['rate']."/day" . "</td>";
					echo  "<td>" . $row['pickup'] . "</td>";
					echo  "<td>" . $row['dropoff'] . "</td>";
					echo  "<td>" . "$". $row['total'] . "</td>";
					echo  "<td>" . $row['status'] . "</td>"; 
	?>	

					<td>
						<!-- settings for approve and decline buttons -->
						<button class="button button1" type="submit" name="approved" onclick='return approveConfirm()' value="<?php echo $row['booking_id']?>">Approved</button>
						<button class="button button2" type="submit" name="declined" onclick='return declineConfirm()' value="<?php echo $row['booking_id']?>">Declined</button>
				   </td> 	
				<?php						
				}			
			}
?>
</form>