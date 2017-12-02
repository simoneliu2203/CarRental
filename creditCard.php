<?php
//Taking all the input from user, such as username, type, credit card, etc., and insert/update it back to the database
{
	$username = $_SESSION ['username'];
	$type = mysqli_real_escape_string($db, $_POST['type']);
	$creditcard =  mysqli_real_escape_string($db, $_POST['creditcard']);
	$cvv = mysqli_real_escape_string($db, $_POST['cvv']);
	$exp_date = date('Y-m-d',strtotime($_POST['exp_date']));
	$name = mysqli_real_escape_string($db, $_POST['name']);
	
	$today = date("Y-m-d");
	/*if ($exp_date <= $today){
		array_push($errors, "Invalid date");
		echo "<div align='center'>Invalid expiration date</div>";
	}*/
	
	//Catch error, if any input is empty, print out message
	if(empty($_POST["type"]) || empty($_POST["creditcard"]) || empty($_POST["cvv"]) || empty($_POST["exp_date"]) || empty($_POST["name"])){
		array_push($errors, "All fields are required");
		echo "<div align='center'>All fields are required</div>";
	}
	
	//Catch error, if the card is already in the system, do not let them use it
	$creditSQL=mysqli_query($db,"SELECT creditcard FROM bankaccount WHERE c_username!='$username' and creditcard='$creditcard'");				

	if (mysqli_num_rows($creditSQL) == 1){
		echo "<div align='center'>Credit card number '$creditcard' is already in the system</div>";
		array_push($errors, "Credit card taken");
	}
	
	//If there is no error, update the new credit card info back to the database
	if (count($errors) == 0) {
		$query = "update bankaccount set type = '$type', creditcard = '$creditcard', cvv = '$cvv', exp_date = '$exp_date', name = '$name' where c_username = '$username'";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
	}
							
}
?>