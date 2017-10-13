<?php
	include("header.php");
	include("loginHandler.php");
	$username=$_SESSION['username'];
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
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">

<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>

<form method="post" action="">
  <table style="margin-top: 10px; margin-left: auto ; margin-right: auto; ">
    <tr>
      <td>
        <table id="table" width="600" height="550" border="1" style="border-radius: 20px">
          <tbody>
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Profile</td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>First name</strong></td>
              <td id="boxc2"><input size="40" type="text" name="first" value="
               <?php 
				  $result=mysqli_query($db, "select first from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['first'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Last name</strong></td>
              <td id="boxc2"><input size="40" type="text" name="last" value="
               <?php 
				  $result=mysqli_query($db, "select last from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['last'];
				?>"></td>
              </tr>
       		
            <tr>
              <td id="boxc2" align="right"><strong>Email</strong></td>
              <td id="boxc2"><input size="40" type="text" name="email" value="
               <?php 
				  $result=mysqli_query($db, "select email from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['email'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Address</strong></td>
              <td id="boxc2"><input size="40" type="text" rows="2" name="address" value="
               <?php 
				  $result=mysqli_query($db, "select address from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['address'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>License Number</strong></td>
              <td id="boxc2"><input size="40" type="text" name="license" value="
              <?php 
				  $result=mysqli_query($db, "select license from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>License State</strong></td>
              <td id="boxc2"><input size="40" type="text" name="state" value="
              <?php 
				  $result=mysqli_query($db, "select license_state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license_state'];
				?>"></td>
              </tr>
            
            <tr>
              <td id="boxc3" colspan="2"><input type="submit" name="update1" value="Update" style="background-color: black; font-size: 20px; width: 100px; color: white"></td>
              
            </tbody>
          </table>
        </td>
      <td>
        <table id="table" width="600" height="550" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Payment Information</td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Type (Visa, Master, eg.)</strong></td>
              <td id="boxc2"><input size="30" type="text" name="type" value="
              <?php 
				  $result=mysqli_query($db, "select type from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['type'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Credit card number</strong></td>
              <td id="boxc2"><input size="30" type="text" name="credit" placeholder="xxxx-xxxx-xxxx-xxxx" value="
              <?php 
				  $result=mysqli_query($db, "select creditcard from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['creditcard'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>CVV (3 digits)</strong></td>
              <td id="boxc2"><input size="30" type="text" name="cvv" value="
              <?php 
				  $result=mysqli_query($db, "select cvv from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['cvv'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Expire Date (mm/dd/yyyy)</strong></td>              
              <td id="boxc2"><input type="text" id="Datepicker1" name="date" size="30" value="
              <?php 
				  $result=mysqli_query($db, "select date_format(exp_date, '%m/%d/%Y') as fdate from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['fdate'];
				?>">                
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Name on Card</strong></td>
              <td id="boxc2"><input size="30" type="text" name="name" value="
              <?php 
				  $result=mysqli_query($db, "select name from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['name'];
				?>"></td>
            </tr>
            
            <tr>
              <td id="boxc3" colspan="2"><input type="submit" name="update2" value="Update" style="background-color: black; font-size: 20px; width: 100px; color: white"></td>
              
          </table>
        </td>
    </tr>
  </table>
</form>




<script type="text/javascript">
$(function() {
	$( "#Datepicker1" ).datepicker(); 
});
</script>
