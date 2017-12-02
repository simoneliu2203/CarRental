<?php 
	// links overview.php to employeeAccessControl.php
	ob_start();
	include('employeeAccessControl.php');
?>

<!-- shows that the user is logged in as an employee -->
<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<!-- takes user back to the employee main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<?php 
	// if user requests booking detail, then link to manageBooking.php
	 if(isset($_REQUEST['booking_detail'])){
		 header('location: manageBooking.php');
	 }
	// if user requests vehicle detail, then link to vehicleListing.php
	 if(isset($_REQUEST['vehicle_detail'])){
		 header('location: vehicleListing.php');
	 }
	// if user requests customer detail, then link to editCustomer.php
	 if(isset($_REQUEST['customer_detail'])){
		 header('location: editCustomer.php');
	 }
?>

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
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: blueviolet; 
    color: white; 
    border: 2px solid blueviolet;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: whitesmoke;
    color: black;
	border: 2px solid blue;
}

/* sets the style for the body of the page */
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

/* sets the style of the table */
 #table{
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid darkgray; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
	
/* sets the style for the background behind the title within the input table */
 #boxc1{
	background-color: ghostwhite; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

/* sets the style for the background behind the body of the table whithin the input table */
 #boxc2{
	background-color: ghostwhite; 
	border: none;
	opacity: 0.9;
	}

/* sets the style for the background behind the button at the bottom of the input table */	
 #boxc3{
	background-color: ghostwhite; 
	border: none;
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
</style>

<!-- set title of the page -->
<h2> Total Profit Made </h2>

<?php
	// call stored procedure totalProfit() from the mysql database
	 $result=mysqli_query($db, "call totalProfit(@p0)");
	 $result2=mysqli_query($db, "select @p0 as 'total'");
	 $row=mysqli_fetch_assoc($result2); 
	 echo "<div align='center'; style='color:blue; font-size:40px;'>".'$'.$row['total']."</div>";
?>

<!-- set style of page -->
<form method="post" action="">
  <table style="margin-top: 5px; margin-left: auto ; margin-right: auto; ">
    <tr>
	<!--First box-->
      <td>
       <!-- set style of box -->
        <table id="table" width="300" height="300" border="1" style="border-radius: 20px">
          <tbody>           
            <tr>
             <!-- set style of title of the box -->
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Customers</td>
              </tr>
              
            <tr>
              <td id="boxc2">
				<?php 
				  // call stored function customerCount() from the mysql database to show total number of customers in the system
				  $result=mysqli_query($db, "select customerCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['customerCount()'].'</font>';
				?>
			  </td>
              </tr>           
            <tr>
             <!-- set style of submit button -->
              <td id="boxc3" colspan="2"><input type="submit" name="customer_detail" value="Detail" class="button button1"></td>
            </tbody>
          </table>
        </td>
		
		<!--Second box-->
      <td>
       <!-- set style of box -->
        <table id="table" width="300" height="300" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
             <!-- set style of title of the box -->
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Vehicles</td>
            </tr>
            <tr>
              <td id="boxc2">
				<?php 
				  // call stored function vehicleCount() from the mysql database to show total number of vehicles in the system
				  $result=mysqli_query($db, "select vehicleCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['vehicleCount()'].'</font>';
				?>
			  </td>
            </tr>
                   
            <tr>
             <!-- set style of submit button -->
              <td id="boxc3" colspan="2"><input type="submit" name="vehicle_detail" value="Detail" class="button button1"></td>
              
          </table>
       </td>
	<!--Third box-->
      <td>
       <!-- set style of box -->
        <table id="table" width="300" height="300" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
             <!-- set style of title of the box -->
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Bookings</td>
            </tr>
            <tr>
              <td id="boxc2">
				<?php 
				  // call stored function vehicleCount() from the mysql database to show total number of vehicles in the system
				  $result=mysqli_query($db, "select bookingCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['bookingCount()'].'</font>';
				?>
			  </td>
            </tr>
                   
            <tr>
             <!-- set style of submit button -->
              <td id="boxc3" colspan="2"><input type="submit" name="booking_detail" value="Detail" class="button button1"></td>
              
          </table>
       </td>
    </tr>
  </table>
</form>
