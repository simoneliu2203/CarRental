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

<div style="text-align:right; margin-right:20px; color: red">Login as: <?php echo $username?></div>

<style>
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
	padding-left: 30%;
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
    	<td id="boxc2" colspan="2" align="left" ><input type="radio" name="option" value="profile"><label >View/Update Profile</label></input><br><br></td>
    </tr>
    <tr>
		<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="rent"><label >Rent a car</label></input><br><br>
    </tr>
    <tr>
    	<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="history"><label >View rental history</label></input><br><br>
    </tr>
    <tr>
      <td id="boxc3" colspan="2"><input type="submit" name="submit" value="Submit" style="background-color: black; font-size: 20px; width: 100px; color: white"></td>
    </tr>
  </tbody>
</table>
</form>



<?php
		if(isset($_POST['option']) && ($_POST['option']) == "profile")
			header("location: customerInfo.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "rent")
			header("location: customerRent.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "history")
			header("location: customerRentHistory.php");
?>


