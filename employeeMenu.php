<?php 
	// links employeeMenu.php to employeeAccessControl.php
	ob_start();
	include('employeeAccessControl.php');
?>

<!-- shows that the user is logged in as an employee -->
<h5>Employee</h5>


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
    font-size: 20px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: black; 
    color: white; 
    border: 2px solid black;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: black;
    color: antiquewhite;
	border: 2px solid white;
}
	
/* sets the style of the table */
 #table{
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
	
/* sets the style for the background behind the title within the input table */
 #boxc1{
	background-color: lightgray; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

/* sets the style for the background behind the body of the table whithin the input table */
 #boxc2{
	background-color: ghostwhite; 
	opacity: 0.9;
	border: none;
	padding-left: 25%;
	}
	
/* sets the style for the background behind the button at the bottom of the input table */
 #boxc3{
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
	
</style>

<!-- style format for the table -->
<form method="post" action="">
<table id="table" width="400" height="400" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
       <!-- style format for the title font for the Options table -->
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Options</td>
    </tr>
	<tr>
   		<!-- style format for the font for the Overview option -->
    	<td id="boxc2" colspan="2" align="left" ><input type="radio" name="option" value="overview"><label >Overview</label></input><br><br></td>
    </tr>
    <tr>
       	<!-- style format for the font for the Add Vehicles option -->
    	<td id="boxc2" colspan="2" align="left" ><input type="radio" name="option" value="add"><label >Add Vehicles</label></input><br><br></td>
    </tr>
    <tr>
    	<!-- style format for the font for the Update Customers option -->
		<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="customer"><label >Update Customers</label></input><br><br>
    </tr>
    <tr>
    	<!-- style format for the font for the Manage Bookings option -->
    	<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="booking"><label >Manage Bookings</label></input><br><br>
    </tr>
    <tr>
      <!-- set style for the submit button -->
      <td id="boxc3" colspan="2"><input type="submit" name="submit" class="button button1" value="Submit" ></td>
    </tr>
  </tbody>
</table>
</form>



<?php

	// links employeeMenu.php to addCar.php, overview.php, editCustomer.php, and manageBooking.php
		if(isset($_POST['option']) && ($_POST['option']) == "add")
			header("location: addCar.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "overview")
			header("location: overview.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "customer")
			header("location: editCustomer.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "booking")
			header("location: manageBooking.php");
?>


