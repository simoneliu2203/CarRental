<?php include("header.php");
$username = "";
$email    = "";
$errors = array(); 
//$_SESSION['success'] = "";

session_start();



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
      <td id="boxc2"><input type="text" id="username" name="vin" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Brand</strong></td>
      <td id="boxc2"><input type="text" id="email" name="brand" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Model</strong></td>
      <td id="boxc2"><input type="text" id="email" name="model" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Type</strong></td>
      <td id="boxc2"><input type="text" id="email" name="type" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Year</strong></td>
      <td id="boxc2"><input type="text" id="email" name="year" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Color</strong></td>
      <td id="boxc2"><input type="text" id="email" name="color" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Rate</strong></td>
      <td id="boxc2"><input type="text" id="email" name="rate" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Mileage</strong></td>
      <td id="boxc2"><input type="text" id="email" name="mileage" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Capacity</strong></td>
      <td id="boxc2"><input type="text" id="email" name="capacity" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Availability</strong></td>
      <td id="boxc2"><input type="text" id="email" name="avail" size="25"></td>
    </tr>
    <tr>
      <td id="boxc2" align="right"><strong>Image</strong></td>
      <td id="boxc2" align="center"><input type="file"></td>
    </tr>
    <tr>     
      <td colspan="2" id="boxc3"><input type="submit" name="submit" id="submit" value="Add" style="background-color: white; font-size: 20px; width: 100px; color: blue"></td>
    </tr>
   
  </tbody>
</table>
</form>

<?php