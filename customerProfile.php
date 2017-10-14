<?php
	include("header.php");
	include("loginHandler.php");
	$username=$_SESSION['username'];
?>

<div style="text-align:right; margin-right:auto"><a href="logout.php" style="color:coral; font-size:18px;margin-right:5px">Logout?</a></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<?php
		$errors = array();
	    if(isset($_REQUEST['update1']))
		{
			$username = $_SESSION ['username'];
			$first = mysqli_real_escape_string($db, $_POST['first']);
			$last = mysqli_real_escape_string($db, $_POST['last']);
			$address = mysqli_real_escape_string($db, $_POST['address']);
			$phone = mysqli_real_escape_string($db, $_POST['phone']);
			$license = mysqli_real_escape_string($db, $_POST['license']);
			$state = mysqli_real_escape_string($db, $_POST['state']);

			if(empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["address"]) || empty($_POST["phone"]) || empty($_POST["license"]) || empty($_POST["state"])){
				array_push($errors, "All fields are required");
				echo "<div align='center'>All fields are required</div>";
			}
			
			$licenseSQL=mysqli_query($db,"SELECT license FROM customers WHERE c_username!='$username' and license='$license'");				
			
			if (mysqli_num_rows($licenseSQL) == 1){
				echo "<div align='center'>License number '$license' is already in the system</div>";
				array_push($errors, "License taken");
			}
	
			if (count($errors) == 0) {
				$query = "update customers set first = '$first', last = '$last', address = '$address', phone = '$phone', license = '$license', state = '$state' where c_username = '$username'";
				mysqli_query($db, $query);
				$_SESSION['username'] = $username;
				echo "<p align=center>Updated!</p> ";
			}
							
		}
	?>

<?php
		$errors = array();
	    if(isset($_REQUEST['update2']))
		{
			$username = $_SESSION ['username'];
			$type = mysqli_real_escape_string($db, $_POST['type']);
			$creditcard =  mysqli_real_escape_string($db, $_POST['creditcard']);
			$cvv = mysqli_real_escape_string($db, $_POST['cvv']);
			$exp_date = date('Y-m-d',strtotime($_POST['exp_date']));
			$name = mysqli_real_escape_string($db, $_POST['name']);

			if(empty($_POST["type"]) || empty($_POST["creditcard"]) || empty($_POST["cvv"]) || empty($_POST["exp_date"]) || empty($_POST["name"])){
				array_push($errors, "All fields are required");
				echo "<div align='center'>All fields are required</div>";
			}
			
			$creditSQL=mysqli_query($db,"SELECT creditcard FROM bankaccount WHERE c_username!='$username' and creditcard='$creditcard'");				
			
			if (mysqli_num_rows($creditSQL) == 1){
				echo "<div align='center'>Credit card number '$creditcard' is already in the system</div>";
				array_push($errors, "Credit card taken");
			}
	
			if (count($errors) == 0) {
				$query = "update bankaccount set type = '$type', creditcard = '$creditcard', cvv = '$cvv', exp_date = '$exp_date', name = '$name' where c_username = '$username'";
				mysqli_query($db, $query);
				$_SESSION['username'] = $username;
				echo "<p align=center>Updated!</p> ";
			}
							
		}
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
  <table style="margin-top: 5px; margin-left: auto ; margin-right: auto; ">
    <tr>
      <td>
        <table id="table" width="600" height="550" border="1" style="border-radius: 20px">
          <tbody>
            <tr>
              <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Profile</td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>First name</strong></td>
              <td id="boxc2"><input size="45" type="text" name="first" value="<?php 
				  $result=mysqli_query($db, "select first from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo trim($row['first']);
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Last name</strong></td>
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
              <td id="boxc2" align="right"><strong>Phone number</strong></td>
              <td id="boxc2"><input size="45" type="text" rows="2" name="phone" value="<?php 
				  $result=mysqli_query($db, "select phone from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['phone'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>License number</strong></td>
              <td id="boxc2"><input size="45" type="text" name="license" value="<?php 
				  $result=mysqli_query($db, "select license from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['license'];
				?>"></td>
              </tr>
            <tr>
              <td id="boxc2" align="right"><strong>License state</strong></td>
              <td id="boxc2"><input size="45" type="text" name="state" value="<?php 
				  $result=mysqli_query($db, "select state from cus_info where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['state'];
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
              <td id="boxc2"><input size="30" type="text" name="type" value="<?php 
				  $result=mysqli_query($db, "select type from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['type'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Credit card number</strong></td>
              <td id="boxc2"><input size="30" type="text" name="creditcard" placeholder="xxxx-xxxx-xxxx-xxxx" value="<?php 
				  $result=mysqli_query($db, "select creditcard from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['creditcard'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>CVV (3 digits)</strong></td>
              <td id="boxc2"><input size="30" type="text" name="cvv" value="<?php 
				  $result=mysqli_query($db, "select cvv from bankaccount where c_username = '$username' ");
				  $row=mysqli_fetch_assoc($result);
				  echo $row['cvv'];
				?>"></td>
            </tr>
            <tr>
              <td id="boxc2" align="right"><strong>Expire Date (mm/dd/yyyy)</strong></td>              
              <td id="boxc2"><input type="text" id="Datepicker1" name="exp_date" size="30" value="<?php 
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




