<?php
	// if user is in session, then session starts
    if(!isset($_SESSION)) 
    { 
		ob_start();
        session_start(); 
    } 	

	// this goes through any possibility of any errors that the program may encounter
	$errors = array();
	if(isset($_POST["login"])){
		// if the username or password entries are left blank by the user and they try to submit, then an error message pops up
		if(empty($_POST["username"]) || empty($_POST["password"])){
			echo "<div align='center'>Both fields are required.</div>";
		}else{
			// else it fetches the data from the mysql database and looks to see if there is an account with the specified username and password that the user provided
			$_SESSION ['username']=$_POST['username'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$pass_encrypted = md5($password);
			
			// if the username doesn't match up with any usernames in the mysql database, then an error message pops up
			if (!ctype_alnum($username)){
				array_push($errors, "Invalid username");
				echo "<div align='center'>Invalid username. Username should only contain letters and numbers</div>";
			}
			
			if (count($errors) == 0) {
				// Check username and password from database
				$result=mysqli_query($db,"SELECT username FROM users WHERE username='$username' and password = '$pass_encrypted'");

				// Get account type 
				$acc_type=mysqli_query($db, "SELECT acc_type FROM users WHERE username='$username'");

				$row = mysqli_fetch_assoc($acc_type);

				// if user is logging in as a customer and they were previously trying to rent a car from the home page, then the user will be directed to customerPay.php when logging in
				if(mysqli_num_rows($result) == 1){	
					if($row['acc_type']=="customer"){
						if (isset($_SESSION['car_id'])) {
							$car_id = $_SESSION['car_id'];
							$rate = $_SESSION['rate'];
							$_SESSION['customer']=true;
							header("location: customerPay.php?id=$car_id&rate=$rate");
						}
						else{
							// if the user was not renting a car before logging in, then the user will be directed to customerMenu.php
							$_SESSION['customer']=true;
							header("location: customerMenu.php");
						}					
					}
					// if user logs in as an employee, then the user is directed to employeeMenu.php
					else if($row['acc_type']=="employee"){
						$_SESSION['employee']=true;
						header("location: employeeMenu.php");
					}					
				}
				else{
					// if username or password entered by the user is incorrect, then an error message pops up
					echo "<div align='center'>Username and/or password is incorrect. Please try again or create a new account.</div>";
				}
			}			
		}
	}
		
?>

