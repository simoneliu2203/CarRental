<?php 
	// once user starts session, link to headerLogin.php
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		include('headerLogin.php');
	}
	else {
		// if session hasn't started yet, then link to header.php
		include('header.php');
	}
?>

<!-- style format for image -->
<!-- links to search.php -->
<table bordercolor="white" width="100%" border="1">
  <tbody>
    <tr>
      <td><?php include("search.php"); ?></td>
      <td><img src="Images/2.PNG" width="500" height="350" alt=""/></td>
      
    </tr>
  </tbody>
</table>

<style>
/* style format for body of page */
body
{
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	min-height: 600px;
	min-width: 1000;
		
	background-image: url(); 
	background-repeat:no-repeat;
	background-position: 5% 100%;
	
}
</style>

<!-- style format for gif image at front of home page -->
<img src="Images/slider.gif" align="center" width="100%" height="337" alt=""/>

