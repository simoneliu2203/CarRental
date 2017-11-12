<?php 
	ob_start();
	include('employeeAccessControl.php');
?>

<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<style>
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

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid green;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid darkorange;
}

.button2:hover {
    background-color: orange;
    color: white;
}

</style>

<h2 align="center">Bookings</h2>


<?php 	
	if(isset($_POST["approved"])){
		$id = $_POST['approved'];
		$query = "update booking set status = 'approved' where booking_id = '$id'";
		mysqli_query($db, $query);
	}
	
	if(isset($_POST["declined"])){
		$id = $_POST['declined'];
		$query = "update booking set status = 'declined' where booking_id = '$id'";
		mysqli_query($db, $query);
	}
?>

<script type='text/javascript'>
function approveConfirm()
{
	return confirm("Are you sure you want to APPROVE this booking?");
	window.opener.location.reload(true);
	window.close();
};
	
function declineConfirm()
{
	return confirm("Are you sure you want to DECLINE this booking?");
	window.opener.location.reload(true);
	window.close();
}
</script>

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
		
			$rented_car = mysqli_query($db,"SELECT * FROM get_quote natural join cars");
			
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
						<button class="button button1" type="submit" name="approved" onclick='return approveConfirm()' value="<?php echo $row['booking_id']?>">Approved</button>
						<button class="button button2" type="submit" name="declined" onclick='return declineConfirm()' value="<?php echo $row['booking_id']?>">Declined</button>
				   </td> 	
				<?php						
				}			
			}
?>
</form>


