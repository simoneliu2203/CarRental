
<!DOCTYPE html>
<html>
<head>
<title>Seahawk Rent-A-Car </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

 #table{
	 margin-top: 20px; 
	 margin-left: 20% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
	
 #boxc1{
	background-color: ghostwhite; 
	opacity: 0.8;
	 border-top-left-radius: 20px;
	 border-top-right-radius: 20px;
	}

 #boxc2{
	background-color: lightgray; 
	border: none;
	opacity: 0.9;
	}
#boxc3{
	background-color: dimgray; 
	text-decoration-color: black;
	border-bottom-left-radius: 20px;
	border-bottom-right-radius: 20px;
	}

</style>


<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.slider.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.slider.min.js"></script>
</head>

<form method="post" action="carListing.php">
<table width="400" height="300" border="1" id="table">
  <tbody>
    <tr>
      <td id="boxc1" colspan="3" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="8" color="red" align="center">Select date</td>
    </tr>
    <tr>
      <td id="boxc2" colspan="2"><strong>Pick-up: </strong></td>
      <td id="boxc2"><input style="text-align: center" type="text" name="pickup" placeholder="mm/dd/yyyy" id="Datepicker1" required="required"></td>
    </tr>
    <tr>
      <td id="boxc2" colspan="2"><strong> Drop-off:</strong></td>
      <td id="boxc2"><input style="text-align: center" type="text" name="dropoff" placeholder="mm/dd/yyyy" id="Datepicker2" required="required"></td>
    </tr>
    <tr>
      <td id="boxc3" colspan="3"><button style="background-color: black; color:white; border-color: white; width: 100px; font-size: 20px" type="submit" id="submit" name="search">Search</button></td>
    </tr>
  </tbody>
</table>
</form>


    
    
<script type="text/javascript">
$(function() {
	$( "#Slider1" ).slider(); 
});
</script>
</body>
<script type="text/javascript">
$(function() {
	$( "#Datepicker1" ).datepicker(); 
});
$(function() {
	$( "#Datepicker2" ).datepicker(); 
});
$(function() {
	$( "#Datepicker1" ).datepicker(); 
});
$(function() {
	$( "#Datepicker2" ).datepicker(); 
});
$(function() {
	$( "#Datepicker1" ).datepicker(); 
});
$(function() {
	$( "#Datepicker2" ).datepicker(); 
});
</script>
</html>
