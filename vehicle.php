<?php 
	// links vehicle.php to employeeAccessControl.php
	include('employeeAccessControl.php');
?>

<!-- connecting to css files -->
<link rel="stylesheet" type="text/css" href="css/carlisting.css">

<?php	
	//Getting all the car's info that the customer chose to book
	$car_id = $_GET['id'];
?>

<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<?php
	$errors = array();
	if(isset($_REQUEST['update'])){
		// if user requests update, then retrieves info on car from mysql database
		$brand = mysqli_real_escape_string($db, $_POST['brand']);
		$model = mysqli_real_escape_string($db, $_POST['model']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$year = mysqli_real_escape_string($db, $_POST['year']);
		$color = mysqli_real_escape_string($db, $_POST['color']);
		$rate = mysqli_real_escape_string($db, $_POST['rate']);
		$mileage = mysqli_real_escape_string($db, $_POST['mileage']);
		$capacity = mysqli_real_escape_string($db, $_POST['capacity']);
		$available = mysqli_real_escape_string($db, $_POST['available']);		
		
		$file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);		
		
		
		if (empty($_FILES['img']['name'])){
			// once car is updated, the updated info gets sent to the mysql database
			echo "<div align='center'>Car Updated</div>";
			$query = "update cars set brand = '$brand', model = '$model', type = '$type', year = '$year', color = '$color',rate = '$rate', mileage = '$mileage', capacity = '$capacity', available = '$available' where vin = '$car_id'";
			mysqli_query($db, $query);
		}
		else{
			// the image has to be a size of less than 64kb, if it's too large, then an error message pops up
			if ($_FILES['img']['size'] > 64000) {
				echo "<div align='center'>The file is too large</div>";
				array_push($errors, 'File too large');
			}
			
			// the image has to be a certain type of image, such as jpg, png, gif, etc, if it's none of the allowed formats, then an error message pops up
			if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "gif" ){
				array_push($errors, 'extionsion not allowed');
				echo "<div align='center'>Only JPG, JPEG, PNG & GIF files are allowed</div>";
			}
			
			// if there are no errors, then updates the info to the database successfully 
			if (count($errors) == 0){
				$image = $_FILES['img']['tmp_name'];
				$imgContent = addslashes(file_get_contents($image));
				echo "<div align='center'>Car updated</div>";
				$query = "update cars set brand = '$brand', model = '$model', type = '$type', year = '$year', color = '$color',rate = '$rate', mileage = '$mileage', capacity = '$capacity', available = '$available', img = '$imgContent' where vin = '$car_id'";
				mysqli_query($db, $query);
			}
		}
		
	}	
?>

<?php
	//Using query to get the car's info from database and print it out to the screen
	$search_car = "SELECT * FROM cars WHERE vin = '$car_id'";	
	$result=mysqli_query($db, $search_car);
	while($row = mysqli_fetch_assoc($result)){
		?>
		<div align="center">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>'?>	
		</div>
	<?php
}
?>

<!-- fetch data, such as image, VIN, brand, etc., from the mysql database and print it out for the user to see -->
<!-- some fields are required -->
<form enctype="multipart/form-data" action="" method="post">
<table width="400" height="600" border="1" bordercolor="white" align="center">
	  <tbody>
		<tr>
		  <td align="left">Image</td>
		  <td align="right"><input type="file" name="img"></td>
		</tr>
		<tr>
		  <td align="left">VIN</td>
		  <td align="right"><?php 
	  $result=mysqli_query($db, "select vin from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['vin']);?></td>
		</tr>
		<tr>
		  <td align="left">Brand</td>
		  <td align="right"><input type="text" name="brand" required="required" value="<?php 
	  $result=mysqli_query($db, "select brand from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['brand']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Model</td>
		  <td align="right"><input type="text" name="model" required="required" value="<?php 
	  $result=mysqli_query($db, "select model from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['model']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Type</td>
		  <td align="right"><input type="text" name="type" required="required" value="<?php 
	  $result=mysqli_query($db, "select type from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['type']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Year</td>
		  <td align="right"><input type="text" name="year" required="required" value="<?php 
	  $result=mysqli_query($db, "select year from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['year']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Color</td>
		  <td align="right"><input type="text" name="color" required="required" value="<?php 
	  $result=mysqli_query($db, "select color from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['color']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Rate</td>
		  <td align="right"><input type="text" name="rate" required="required" value="<?php 
	  $result=mysqli_query($db, "select rate from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['rate']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Mileage</td>
		  <td align="right"><input type="text" name="mileage" required="required" value="<?php 
	  $result=mysqli_query($db, "select mileage from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['mileage']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Capacity</td>
		  <td align="right"><input type="text" name="capacity" required="required" value="<?php 
	  $result=mysqli_query($db, "select capacity from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['capacity']);
	?>"></td>
		</tr>
		<tr>
		  <td align="left">Available</td>
		  <td align="right"><input type="text" name="available" required="required" value="<?php 
	  $result=mysqli_query($db, "select available from cars where vin = '$car_id'");
	  $row=mysqli_fetch_assoc($result);
	  echo trim($row['available']);
	?>"></td>
		</tr>  
		<tr>
		<!-- set style for button -->
		 <td  colspan="2" align="center"><input type="submit" name="update" value="Update"></td>
		</tr>
	  </tbody>
	</table>
</form>


