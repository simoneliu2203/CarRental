<?php
	session_start();	

	if(isset($_POST["login"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			echo "<div align='center'>Both fields are required.</div>";
		}else
		{
			$_SESSION ['username']=$_POST['username'];
			$username=$_POST['username'];
			$password=$_POST['password'];

			
			//Check username and password from database
			$result=mysqli_query($db,"SELECT username FROM users WHERE username='$username' and password = '$password'");
			
			//Get account type 
			$acc_type=mysqli_query($db, "SELECT acc_type FROM users WHERE username='$username'");
			
			$row = mysqli_fetch_assoc($acc_type);
		
			if(mysqli_num_rows($result) == 1)
			{	
				if($row['acc_type']=="customer")
					header("location: customerMenu.php");
				else if($row['acc_type']=="employee")
					header("location: employeeMenu.php");
			}
			else
			{
				echo "<div align='center'>Username and/or password is incorrect. Please try again or create a new account.</div>";
			}

		}
	}
		
?>