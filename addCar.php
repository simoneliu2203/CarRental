<?php 
	include('employeeAccessControl.php');
?>

<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<?php
	$errors = array();
	if(isset($_REQUEST['submit'])){
		$vin = mysqli_real_escape_string($db, $_POST['vin']);
		$brand = mysqli_real_escape_string($db, $_POST['brand']);
		$model = mysqli_real_escape_string($db, $_POST['model']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$year = mysqli_real_escape_string($db, $_POST['year']);
		$color = mysqli_real_escape_string($db, $_POST['color']);
		$rate = mysqli_real_escape_string($db, $_POST['rate']);
		$mileage = mysqli_real_escape_string($db, $_POST['mileage']);
		$capacity = mysqli_real_escape_string($db, $_POST['capacity']);
		$img = $_POST['img'];
		

		$vinSQL=mysqli_query($db,"SELECT vin FROM cars WHERE vin='$vin'");				
		
		if (mysqli_num_rows($vinSQL) == 1){
			echo "<div align='center'>VIN '$vin' is already in the system</div>";
			array_push($errors, "VIN taken");
		}

		
		if ($_FILES[$img]["size"] > 64000) {
			echo "Sorry, the file is too large.";
			array_push($errors, 'File too large');
		}
		
		if (count($errors) == 0) {
			$query = "INSERT INTO cars(vin, brand, model, type, year, color, rate, mileage, capacity, img, available) VALUES ('$vin', '$brand', '$model', '$type', '$year', '$color', '$rate', '$mileage', '$capacity','$img', 'yes')";
			
			mysqli_query($db, $query);
			
			echo "<div align='center'>Car added</div>";
		}

	}
		
?>

<style>
body
{
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	min-width: 1000px;
	min-height: 600px;
		
	background-image: url(); 
	background-repeat:no-repeat;
	background-size: cover;
	
}	
	
 #table{
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
 #boxc1{
	background-color: lightgray; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

 #boxc2{
	background-color: ghostwhite; 
	border: none;
	opacity: 0.9;
	}
	
 #boxc3{
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
	
</style>

<form method="post" action="">
<table id="table" width="600" height="800" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Add a car</td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>VIN</strong></td>
      <td id="boxc2"><input type="text" id="vin" name="vin" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Brand</strong></td>
      <td id="boxc2"><input type="text" id="brand" name="brand" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Model</strong></td>
      <td id="boxc2"><input type="text" id="model" name="model" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Type</strong></td>
      <td id="boxc2"><input type="text" id="type" name="type" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Year</strong></td>
      <td id="boxc2"><input type="text" id="year" name="year" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Color</strong></td>
      <td id="boxc2"><input type="text" id="color" name="color" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Rate</strong></td>
      <td id="boxc2"><input type="text" id="rate" name="rate" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Mileage</strong></td>
      <td id="boxc2"><input type="text" id="mileage" name="mileage" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Capacity</strong></td>
      <td id="boxc2"><input type="text" id="capacity" name="capacity" size="25" required='required'></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Image</strong></td>
      <td id="boxc2" align="center"><input type="file" name="img" required='required'></td>
    </tr>
    <tr>     
      <td colspan="2" id="boxc3"><input type="submit" name="submit" id="submit" value="Add" style="background-color: white; font-size: 20px; width: 100px; color: blue"></td>
    </tr>
   
  </tbody>
</table>
</form>





