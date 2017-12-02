<?php 
	// links customerRent.php to customerAccessControl.php
	include('customerAccessControl.php');
?>

<?php 
	// if customer decides to cancel their booking, then the information will be updated in the mysql database
	if(isset($_POST["cancel"])){
 		$id = $_POST['cancel'];
		$query = "update booking set status = 'cancelled' where booking_id = '$id'";
		mysqli_query($db, $query);
	}
?>


<script type='text/javascript'>
function confirmCancel()
{
	// notification asking customer if they really want to cancel
	return confirm("Are you sure you want to cancel this?");
	window.opener.location.reload(true);
	window.close();
}
</script>

<!-- shows that the user is logged in as a customer -->
<div style="text-align:right; margin-right:20px; color: red">Logged in as: <?php echo $username?></div>
<!-- takes user back to the customer main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<!-- style of title of page -->
<h2 align="center">Booking History</h2>

<!-- style of table and attributes listed within the table -->
<form method="post" action="">
<?php echo "<table border=2 align=center width='90%'>
			<tr>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Image</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Brand</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Model</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Type</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Year</th>
		    <th width='10%' bgcolor=black style='color:white; padding:15px'>Rate</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Pick-up</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Drop-off</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Total</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Status</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Option</th>

			</tr>";
		
			// connect the mysql database to the code using username and fetch all of the info that comes with the username
			$rented_car = mysqli_query($db,"SELECT * FROM get_quote natural join cars WHERE c_username = '$username'");
			
			// display attributes of booking
			$today =  date_create();
			if (mysqli_num_rows($rented_car) != 0){
				while($row = mysqli_fetch_assoc($rented_car)){
					echo "<tr>" . "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="100" width="100"/>'. "</td>";
					echo  "<td>" . $row['brand'] . "</td>"; 
					echo  "<td>" . $row['model'] . "</td>"; 
					echo  "<td>" . $row['type'] . "</td>"; 
					echo  "<td>" . $row['year'] . "</td>"; 
					echo  "<td>" . "$".$row['rate']."/day" . "</td>";
					echo  "<td>" . $row['pickup'] . "</td>";
					echo  "<td>" . $row['dropoff'] . "</td>";
					echo  "<td>" . "$". $row['total'] . "</td>";
					echo  "<td>" . $row['status'] . "</td>"; 
					$pick = date('Y-m-d',strtotime($row['pickup']));
					$new_pick = date_create($pick);
					
					$diff = date_diff($today,$new_pick) ->format("%r%a days");;
					if ($diff>=0 && $row['status']!='cancelled' && $row['status']!='declined'){
						?> 
							<td>
								<!-- style for cancel button -->
								<button type="submit" name="cancel" value="<?php echo $row['booking_id']?>" onclick='return confirmCancel()'>Cancel</button>
						   </td> 	
						<?php
						}
					else{
						echo  "<td>" . ' ' . "</td>"; 
					}

				}
			}
			else {
				// notification letting user know that they have not booked a car yet if they have not yet
				echo "<p align='center'>You have not booked any cars yet</p>";
			}

?>
</form>


