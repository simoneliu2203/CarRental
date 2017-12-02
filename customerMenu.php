<?php 
	// links customerMenu.php to customerAccessControl.php
	ob_start();
	include('customerAccessControl.php');
?>

<!-- shows that the user is logged in as a customer -->
<div style="text-align:right; margin-right:20px; color: red">Logged in as: <?php echo $username?></div>

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
	padding-left: 30%;
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
    	<!-- style format for the font for the View/Update Profile option -->
    	<td id="boxc2" colspan="2" align="left" ><input type="radio" name="option" value="profile"><label >View/Update Profile</label></input><br><br></td>
    </tr>
    <tr>
    	<!-- style format for the font for the Rent a Car option -->
		<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="rent"><label >Rent a Car</label></input><br><br>
    </tr>
    <tr>
    	<!-- style format for the font for the View Rental History option -->
    	<td id="boxc2" colspan="2" align="left"><input type="radio" name="option" value="history"><label >View Rental History</label></input><br><br>
    </tr>
    <tr>
     <!-- set style for the submit button -->
      <td id="boxc3" colspan="2"><input type="submit" name="submit" value="Submit" class="button button1"></td>
    </tr>
  </tbody>
</table>
</form>



<?php
	
	// links customerMenu.php to customerInfo.php, customerRent.php, and customerRentHistory.php
		if(isset($_POST['option']) && ($_POST['option']) == "profile")
			header("location: customerInfo.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "rent")
			header("location: customerRent.php");
		else if(isset($_POST['option']) && ($_POST['option']) == "history")
			header("location: customerRentHistory.php");
?>


