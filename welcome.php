<h1 align="center">Welcome to webdev.cis.uncw.edu</h1>
<p align="center">To access the database, please login and choose the database</p>

<form method="post" action="">
<table width="200" border="1" align="center">
	  <tbody>
		<tr>
		  <td>Username</td>
		  <td><input type="text" name="user" required="required"></td>
		</tr>
		<tr>
		  <td>Password</td>
		  <td><input type="password" name="pass" required="required"></td>
		</tr>
		<tr>
		  <td>Database</td>
		  <td><input type="text" name="database" required="required"></td>
		</tr>
		<tr>
		  <td colspan="2" align="center"><button type="submit" formaction="connection.php">Login</button></td>
		</tr>
	  </tbody>
	</table>
</form>

<?php
	include("connection.php");
?>
