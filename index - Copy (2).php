<?php
?>

<!DOCTYPE html>
<html>
<head>
<title>Seahawk Rent-A-Car </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin:0;}


.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav a {
  float: right;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  background-color: black;
  text-decoration: none;
  font-size: 18px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}

body
{
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%
	min-width: 1000px;
	min-height: 600px;
		
	background-image: url(6.jpg); 
	background-repeat:no-repeat;
	background-size: cover;
	
}
	
th {
    background-color: #4CAF50;
    color: white;
}

 #boxc1{
	background-color: antiquewhite; 
	opacity: 1;
	}

 #boxc2{
	background-color: skyblue; 
	opacity: 0.8;
	}

</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
</head>

<i><font size="6" align="center"><i><font size="6" align="center">
<div class="row" style="background-color:white;padding:1px hspace=20">
  <div class="col-lg-3"><img src="logo.png" width="300" height="80" align="left"></div>
  <div class="col-lg-5"><i><font size="5" align="center">WELCOME TO<br/>SEAHAWK RENT-A-CAR</br/></div>
  <div class="col-lg-4"><i><font size="3" align="center">Contact: (000)123-4567<br/>Location: Somewhere in Wilmington</br/>  </div>
</div>


<div class="topnav">
  <a href="AboutUs.php" class="titleButton">About us</a>
  <a href="#" class="titleButton">Maps</a>
  <a href="#" class="titleButton">Login/Register</a>
  <a href="index.php" class="titleButton">Home</a>
</div>


<table width="600" height="400" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto">
  <tbody>
    <tr>
      <td id="boxc1" colspan="3"><font size="8" color="orange" align="center">Select date</td>
    </tr>
    <tr>
      <td id="boxc2" colspan="2"><strong>Pick-up: </strong></td>
      <td id="boxc2"><input type="text" id="Datepicker1"> (mm/dd/yyyy)</td>
    </tr>
    <tr>
      <td id="boxc2" colspan="2"><strong> Drop-off:</strong></td>
      <td id="boxc2"><input type="text" id="Datepicker2"> (mm/dd/yyyy)</td>
    </tr>
    <tr>
      <td  colspan="3"><button style="background-color: orange; border: none; font-size: 20px" type="submit">Search</button></td>
    </tr>
  </tbody>
</table>






 
    
    
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
