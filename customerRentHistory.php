<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		header("Location: index.php");
		die();
	}
	date_default_timezone_set('America/New_York');
?>

<div style="text-align:right; margin-right:20px; color: red">Login as: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<h2 align="center">Booking History</h2>

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
		
			$rented_car = mysqli_query($db,"SELECT * FROM get_quote natural join cars WHERE c_username = '$username'");
			
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
					if ($diff>=0 && $row['status']!='cancelled'){
						?> 
							<td>
								<button type="submit" name="cancel" value="<?php echo $row['vin'];?>" onclick='return confirmCancel()'>Cancel</button>
						   </td> 	
						<?php
						}
					else{
						echo  "<td>" . ' ' . "</td>"; 
					}

				}
			}
			else {
				echo "<p align='center'>You have not book any cars yet</p>";
			}

?>
</form>


<?php 	
	if(isset($_POST["cancel"])){
 		$vin = $_POST['cancel'];
		$query = "update booking set status = 'cancelled' where vin = '$vin'";
		mysqli_query($db, $query);
	}
?>


<script type='text/javascript'>
function confirmCancel()
{
	return confirm("Are you sure you want to cancel this?");
	window.opener.location.reload(true);
	window.close();
}
</script>