<?php 
	// links editCustomer.php to employeeAccessControl.php
	ob_start();
	include('employeeAccessControl.php');
?>

<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<!-- style of title of page -->
<p style="color:red;font-size:36px">Customers</p>


<?php 
	// links editCustomer.php to customer.php if user requests update
	if(isset($_REQUEST['update'])){
		 header('location: customer.php');
	 }
	
?>

<!-- style of table and attributes listed within the table -->
<form method="post" action="">
<?php 
	echo "<table border=2 align=center width='90%'>
			<tr>
			
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Username</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>First Name</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Last Name</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Address</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>City</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>State</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Zipcode</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>Phone Number</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>License Number</th>
			<th width='10%' bgcolor=black style='color:white; padding:15px'>License State</th>
		    <th width='10%' bgcolor=black style='color:white; padding:15px'>Update</th>

			</tr>";
		
			// connect the mysql database to the code
			$rented_car = mysqli_query($db,"SELECT * FROM customers");
			
			// display attributes of customer
			$today =  date_create();
			if (mysqli_num_rows($rented_car) != 0){
				while($row = mysqli_fetch_assoc($rented_car)){
					echo "<tr>" ;
					echo  "<td>" . $row['c_username'] . "</td>"; 
					echo  "<td>" . $row['first'] . "</td>"; 
					echo  "<td>" . $row['last'] . "</td>"; 
					echo  "<td>" . $row['address'] . "</td>"; 
					echo  "<td>" . $row['city'] . "</td>"; 
					echo  "<td>" . $row['state'] . "</td>"; 
					echo  "<td>" . $row['zipcode'] . "</td>"; 
					echo  "<td>" . $row['phone'] . "</td>"; 
					echo  "<td>" . $row['license'] . "</td>"; 
					echo  "<td>" . $row['license_state'] . "</td>";
					
	?>	
					<td>
						<!-- link to customer.php if user wants to update customer info -->
						<a href="customer.php?id=<?php echo $row['c_username']?>">Update</a>
				   </td> 	
				<?php						
				}			
			}
?>
</form>