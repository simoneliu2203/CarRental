<?php 
	// links customerinfo.php to customerAccessControl.php
	include('customerAccessControl.php');
?>

<!-- shows that the user is logged in as a customer -->
<div style="text-align:right; margin-right:20px; color: red">Logged in as: <?php echo $username?></div>
<!-- takes user back to the customer main menu once they click on it -->
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<?php
	
//If user clicks "update," call page profile.php or creditCard.php 
//this handles updating the profile and credit card info back to the database
		$errors = array();
	    if(isset($_REQUEST['update1'])){
			include('profile.php');
		}	
?>

<?php
		$errors = array();
	    if(isset($_REQUEST['update2'])){
			include('creditCard.php');
		}
?>


<style>
.ui-datepicker .ui-datepicker-title select {
	color: #000;
}

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
body
{
/* sets the style for the body of the page */
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

/* sets the style of the table in which the user will input information */
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
	border: none;
	opacity: 0.9;
	}
	
/* sets the style for the background behind the 'update' button at the bottom of the input table */
 #boxc3{
	background-color: dimgray; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
</style>
<!-- connects to the css files -->
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">

<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>


<script src="jQueryMask/src/jquery.maskedinput.js" type="text/javascript"></script>

<script type="text/javascript">

// Format the input from user so that only a certain number of values can be inputted by the user for certain attributes
$(function() {
	$("#cvv").mask("999");
	$("#datedate").mask("99/99/9999");
	$("#zipcode").mask("99999");
	$("#creditcard").mask("9999 9999 9999 9999");
	$("#phone").mask("(999) 999-9999");
	$( "#datepick" ).datepicker({
		changeMonth:true,
		changeYear:true,
		minDate:0
	}); 
});
</script>

<!-- style format for the input tables -->
<form method="post" action="">
  <table style="margin-top: 5px; margin-left: auto ; margin-right: auto; ">
    <tr>
      <td>
        <table id="table" width="600" height="550" border="1" style="border-radius: 20px">
          <tbody>
           
            <tr>
             <!-- style format for the font and title of the Profile table -->
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Profile</td>
              </tr>
            
            <!-- style format for the input values -->
            <!-- these are attributes that the user can input into the profile table, such as first name, last name, address, etc. -->
			<!-- the info inputted will be sent to the mysql database with its corresponding attributes -->
			<!-- if there's already information on the customer in the system, then it fetches the info of the customer from the mysql database and displays it -->  
            <tr>
              <td id="boxc2" align="right"><strong>First Name</strong></td>
              <td id="boxc2"><input size="45" type="text" name="first" value="<?php 
				  $result=mysqli_query($db, "select first from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo trim($row['first']);
				?>"></td>
              </tr>
              
            <tr>
              <td id="boxc2" align="right"><strong>Last Name</strong></td>
              <td id="boxc2"><input size="45" type="text" name="last" value="<?php 
				  $result=mysqli_query($db, "select last from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['last'];
				?>"></td>
              </tr> 
                    		       
            <tr>
              <td id="boxc2" align="right"><strong>Address</strong></td>
              <td id="boxc2"><input size="45" type="text" rows="2" name="address" value="<?php 
				  $result=mysqli_query($db, "select address from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['address'];
				?>"></td>
              </tr>
              
            <tr>
              <td id="boxc2" align="right"><strong>City</strong></td>
              <td id="boxc2"><input size="45" type="text" rows="2" name="city" value="<?php 
				  $result=mysqli_query($db, "select city from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['city'];
				?>"></td>
              </tr>  
              
             <tr>
              <td id="boxc2" align="right"><strong>State (NC, CA, etc.)</strong></td>
              <td id="boxc2"><input size="45" type="text" rows="2" name="state" maxlength="2" value="<?php 
				  $result=mysqli_query($db, "select state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['state'];
				?>"></td>
              </tr>
              
             <tr>
              <td id="boxc2" align="right"><strong>Zipcode</strong></td>
              <td id="boxc2"><input size="45" id="zipcode" type="text" rows="2" name="zipcode" value="<?php 
				  $result=mysqli_query($db, "select zipcode from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['zipcode'];
				?>"></td>
              </tr>              
              
 			<tr>
              <td id="boxc2" align="right"><strong>Phone Number</strong></td>
              <td id="boxc2"><input size="45" id="phone" type="text" rows="2" name="phone" value="<?php 
				  $result=mysqli_query($db, "select phone from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['phone'];
				?>"></td>
              </tr>
              
            <tr>
              <td id="boxc2" align="right"><strong>License Number</strong></td>
              <td id="boxc2"><input size="45" type="text" name="license" value="<?php 
				  $result=mysqli_query($db, "select license from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license'];
				?>"></td>
              </tr>
              
            <tr>
              <td id="boxc2" align="right"><strong>License State</strong></td>
              <td id="boxc2"><input size="45" type="text" name="license_state" maxlength="2" value="<?php 
				  $result=mysqli_query($db, "select license_state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license_state'];
				?>"></td>
              </tr>
             
            
            <tr>
             <!-- set style for the update button -->
              <td id="boxc3" colspan="2"><input type="submit" name="update1" value="Update" class="button button1"></td>
              
            </tbody>
          </table>
        </td>
      <td>
       <!-- style format for the input tables -->
        <table id="table" width="600" height="550" border="1" style="margin-left: 80px; border-radius: 20px">
          <tbody>
            <tr>
             <!-- style format for the font and title of the Profile table -->
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Payment Information</td>
            
            <!-- style format for the input values -->
            <!-- these are attributes that the user can input into the profile table, such as first name, last name, address, etc. -->
			<!-- the info inputted will be sent to the mysql database with its corresponding attributes -->
			<!-- if there's already information on the customer in the system, then it fetches the info of the customer from the mysql database and displays it -->  
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Card Type (Visa, Master, eg.)</strong></td>
              <td id="boxc2"><input size="30" type="text" name="type" value="<?php 
				  $result=mysqli_query($db, "select type from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['type'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Credit Card Number</strong></td>
              <td id="boxc2"><input size="30" type="text" id="creditcard" name="creditcard" placeholder="xxxx xxxx xxxx xxxx" value="<?php 
				  $result=mysqli_query($db, "select creditcard from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['creditcard'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>CVV (3 digits)</strong></td>
              <td id="boxc2"><input size="30" id="cvv" type="text" name="cvv" value="<?php 
				  $result=mysqli_query($db, "select cvv from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['cvv'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Expiration Date (mm/dd/yyyy)</strong></td>              
              <td id="boxc2">
                <input size="30" type="text" id="datepick" name="exp_date" placeholder="mm/dd/yyyy" id="datepick" required="required" onkeydown="return false" value="<?php 
				  $result=mysqli_query($db, "select date_format(exp_date, '%m/%d/%Y') as fdate from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['fdate'];
				?>">                
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Name on Card</strong></td>
              <td id="boxc2"><input size="30" type="text" name="name" value="<?php 
				  $result=mysqli_query($db, "select name from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['name'];
				?>"></td>
            </tr>            
            <tr>
             <!-- set style for the update button -->
              <td id="boxc3" colspan="2"><input type="submit" name="update2" value="Update" class="button button1"></td>
              
          </table>
        </td>
    </tr>
  </table>
</form>


