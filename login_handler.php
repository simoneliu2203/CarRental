<?php 
//get value from the login box
$username = $_POST['username'];
$username = $_POST['password'];

//prevent mysql injection
//$username = stripcslashes($username);
//$password = stripcslashes($password);
//$username = mysqli_real_escape_string($link,$username);
//$password = mysqli_real_escape_string($link,$password);

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"login");

//Query the database
$result = mysqli_query($link,"select * from users where username = '$username' and password = '$password'") 
	or die("Failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);
if ($row['username']==$username&& $row['password']==$password){
	echo "Login success!!! Welcome".$row['username'];
	
}else{
	echo "Failed";
}








?>
