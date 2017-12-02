<?php 
	// links addCar.php to employeeAccessControl.php
	include('employeeAccessControl.php');
?>

<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<style>
/* button styles */
.button {
    border: none;
	border-radius: 12px;
    color: white;
    padding: 5px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* button style when mouse isn't hovered over it */
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid white;
}

/* button style when mouse is hovered over it */
.button1:hover {
    background-color: black;
    color: white;
	border: 2px solid black;
}
</style>

<?php
	/* connects the informaiton that the user inputs into the mysql database */
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

		$vinSQL=mysqli_query($db,"SELECT vin FROM cars WHERE vin='$vin'");				
		
		/* makes sure that the VIN is unique, if taken already, then an error message pops up */
		if (mysqli_num_rows($vinSQL) == 1){
			echo "<div align='center'>VIN '$vin' is already in the system</div>";
			array_push($errors, "VIN taken");
		}
		
		/* if the user doesn't select a picture when adding a car, an error message pops up */
		if (getimagesize($_FILES['img']['tmp_name'])==FALSE){
			echo "<div align='center'>Please select a picture</div>";
			array_push($errors, "No picture selected");
		}

		/* if the image that the user uploads is bigger than 64 kb, then an error message pops up */
		if ($_FILES['img']['size'] > 64000) {
			echo "<div align='center'>The file is too large</div>";
			array_push($errors, 'File too large');
		}
		
		$file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		
		/* makes sure that the file extension for the image is either a jpg, jpeg, png, or gif. If user submits a different file format, then an error message pops up */
		if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "gif" ){
			array_push($errors, 'extension not allowed');
			echo "<div align='center'>Only JPG, JPEG, PNG & GIF files are allowed</div>";
		}
		
		/* makes sure that there are no errors */
		if (count($errors) == 0) {			
			$image = $_FILES['img']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));

			/* when the user adds a car, the information will be sent to the cars database in mysql and all of the attributes will be recorded */
			$query = "INSERT INTO cars(vin, brand, model, type, year, color, rate, mileage, capacity, img, available) VALUES ('$vin', '$brand', '$model', '$type', '$year', '$color', '$rate', '$mileage', '$capacity','$imgContent', 'yes')";
			
			mysqli_query($db, $query);
			
			/* lets the user know that the car has been successfully added */
			echo "<div align='center'>Car added</div>";
		}

	}
		
?>

<style>
body
{
	/* sets the style of the addCar page */
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
	 /* sets the style of the table in which the user will input information */
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
 #boxc1{
	/* sets the style for the background behind the title within the input table */
	background-color: lightgray; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

 #boxc2{
	/* sets the style for the background behind the body of the table whithin the input table */
	background-color: ghostwhite; 
	border: none;
	opacity: 0.9;
	}
	
 #boxc3{
	/* sets the style for the background behind the add button at the bottom of the input table */
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}	
</style>

<!-- sets the style for the table as well as the title of the table,"Add a Car" --> 
<form enctype="multipart/form-data" method="post" action="">
<table id="table" width="600" height="800" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Add a Car</td>
    </tr>
    <tr>
     <!-- sets the inputs for each of the attributes (VIN, brand, model, etc) that the user will have to input into the system. Also makes the attributes required -->
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
     <!-- sets the style for the "add" button -->  
      <td colspan="2" id="boxc3"><input type="submit" name="submit" id="submit" value="Add" class="button button1"></td>
    </tr>
   
  </tbody>
</table>
</form>





