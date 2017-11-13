<?php
{
		$username = $_SESSION ['username'];
		$first = mysqli_real_escape_string($db, $_POST['first']);
		$last = mysqli_real_escape_string($db, $_POST['last']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$license = mysqli_real_escape_string($db, $_POST['license']);
		$license_state = mysqli_real_escape_string($db, $_POST['license_state']);

		if(empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["address"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["zipcode"]) || empty($_POST["phone"]) || empty($_POST["license"]) || empty($_POST["license_state"])){
			array_push($errors, "All fields are required");
			echo "<div align='center'>All fields are required</div>";
		}

		$licenseSQL=mysqli_query($db,"SELECT license FROM customers WHERE c_username!='$username' and license='$license'");				

		if (mysqli_num_rows($licenseSQL) == 1){
			echo "<div align='center'>License number '$license' is already in the system</div>";
			array_push($errors, "License taken");
		}

		if (count($errors) == 0) {
			$query = "update customers set first = '$first', last = '$last', address = '$address', city = '$city', state = '$state', zipcode = '$zipcode',phone = '$phone', license = '$license', license_state = '$license_state' where c_username = '$username'";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
		}
							
}
?>