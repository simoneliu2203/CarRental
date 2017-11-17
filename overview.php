<?php 
	ob_start();
	include('employeeAccessControl.php');
?>

<div style="text-align:right; margin-right:20px; color: red">Employee: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="employeeMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to the Menu</a></div>

<?php 
	 if(isset($_REQUEST['booking_detail'])){
		 header('location: manageBooking.php');
	 }
	 if(isset($_REQUEST['vehicle_detail'])){
		 header('location: vehicleListing.php');
	 }
	 if(isset($_REQUEST['customer_detail'])){
		 header('location: editCustomer.php');
	 }
?>

<style>
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

.button1 {
    background-color: blueviolet; 
    color: white; 
    border: 2px solid blueviolet;
}

.button1:hover {
    background-color: whitesmoke;
    color: black;
	border: 2px solid blue;
}
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
	 border: 4px solid darkgray; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
 #boxc1{
	background-color: ghostwhite; 
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
	background-color: ghostwhite; 
	border: none;
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
</style>

<h2> Profit have made </h2>

<?php
	 $result=mysqli_query($db, "call totalProfit(@p0)");
	 $result2=mysqli_query($db, "select @p0 as 'total'");
	 $row=mysqli_fetch_assoc($result2); 
	 echo "<div align='center'; style='color:blue; font-size:40px;'>".'$'.$row['total']."</div>";
?>

<form method="post" action="">
  <table style="margin-top: 5px; margin-left: auto ; margin-right: auto; ">
    <tr>
	<!--First box-->
      <td>
        <table id="table" width="300" height="300" border="1" style="border-radius: 20px">
          <tbody>           
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Customers</td>
              </tr>
              
            <tr>
              <td id="boxc2">
				<?php 
				  $result=mysqli_query($db, "select customerCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['customerCount()'].'</font>';
				?>
			  </td>
              </tr>           
            <tr>
              <td id="boxc3" colspan="2"><input type="submit" name="customer_detail" value="Detail" class="button button1"></td>
            </tbody>
          </table>
        </td>
		
		<!--Second box-->
      <td>
        <table id="table" width="300" height="300" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Vehicles</td>
            </tr>
            <tr>
              <td id="boxc2">
				<?php 
				  $result=mysqli_query($db, "select vehicleCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['vehicleCount()'].'</font>';
				?>
			  </td>
            </tr>
                   
            <tr>
              <td id="boxc3" colspan="2"><input type="submit" name="vehicle_detail" value="Detail" class="button button1"></td>
              
          </table>
       </td>
	<!--Third box-->
      <td>
        <table id="table" width="300" height="300" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="5" color="green" align="center">Number of Bookings</td>
            </tr>
            <tr>
              <td id="boxc2">
				<?php 
				  $result=mysqli_query($db, "select bookingCount();");
				  $row=mysqli_fetch_assoc($result); 
				  echo '<font color=red size=10> '.$row['bookingCount()'].'</font>';
				?>
			  </td>
            </tr>
                   
            <tr>
              <td id="boxc3" colspan="2"><input type="submit" name="booking_detail" value="Detail" class="button button1"></td>
              
          </table>
       </td>
    </tr>
  </table>
</form>
