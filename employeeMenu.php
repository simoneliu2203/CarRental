<?php 
	ob_start();
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		header("Location: index.php");
		die();
	}
?>


<h5>Employee</h5>


<style>
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

.button1 {
    background-color: black; 
    color: white; 
    border: 2px solid black;
}

.button1:hover {
    background-color: black;
    color: antiquewhite;
	border: 2px solid white;
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
	opacity: 0.9;
	border: none;
	padding-left: 25%;
	}
	
 #boxc3{
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
	
</style>

<form method="post" action="">
<table id="table" width="400" height="400" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Options</td>
    </tr>
    <tr>
    	<td id="boxc2" colspan="2" align="left" ><input type="radio" name="option" value="vehicle"><label >Add Vehicles</label></input><br><br></td>
    </tr>
    <tr>
		<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="customer"><label >View/Update Customers</label></input><br><br>
    </tr>
    <tr>
    	<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="booking"><label >Manage Bookings</label></input><br><br>
    </tr>
    <tr>
      <td id="boxc3" colspan="2"><input type="submit" name="submit" class="button button1" value="Submit" ></td>
    </tr>
  </tbody>
</table>
</form>



<?php
		if(isset($_POST['option']) && ($_POST['option']) == "vehicle")
			header("location: addCar.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "customer")
			header("location: #");
		else if(isset($_POST['option']) && ($_POST['option']) == "booking")
			header("location: manageBooking.php");
?>


