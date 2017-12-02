<!-- link register.php to header.php -->
<?php include("header.php");
$username = "";
$email    = "";
$errors = array(); 

ob_start();
session_start();



?>

<style>
	
/* sets the style for the buttons */
.button {
    border: none;
	border-radius: 12px;
    color: white;
    padding: 5px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: white; 
    color: darkblue; 
    border: 2px solid lightgray;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: white;
    color: blue;
	border: 2px solid black;
}
	
/* sets the style for the body of the page */
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
	
/* sets the style of the table */
 #table{
	 margin-top: 50px; 
	 margin-left: 5% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}
	
/* sets the style for the background behind the title within the input table */
 #boxc1{
	background-color: lightgray; 
	opacity: 1;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	}

/* sets the style for the background behind the body of the table whithin the input table */
 #boxc2{
	background-color: ghostwhite; 
	border: none;
	opacity: 0.9;

	}

/* sets the style for the background behind the button at the bottom of the input table */
 #boxc3{
	background-color: palegreen; 
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	}
	
	
</style>

<!-- style format for the table -->
<form method="post" action="">
<table id="table" width="500" height="400" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
      <!-- style format for the title font for the Register table -->
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Register</td>
    </tr>
    <tr>
     <!-- style format for the Username option and box -->
      <td id="boxc2" align="right"><strong>Username</strong></td>
      <td id="boxc2"><input type="text" id="username" name="username"></td>
    </tr>
    <tr>
     <!-- style format for the Email option and box -->
      <td id="boxc2" align="right"><strong>Email</strong></td>
      <td id="boxc2"><input type="text" id="email" name="email"></td>
    </tr>
    <tr>
     <!-- style format for the Password option and box -->
      <td id="boxc2" align="right"><strong>Password</strong></td>
      <td id="boxc2"><input type="password" id="password_1" name="password_1"></td>
    </tr>
    <tr>
     <!-- style format for the Confirm Password option and box -->
      <td id="boxc2" align="right"><strong>Confirm Password</strong></td>
      <td id="boxc2"><input type="password" id="password_2" name="password_2"></td>
    </tr>
    <tr>
     <!-- set style for the sign up button -->
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Sign up" class="button button1"></td>
    </tr>
    <tr>
     <!-- if user already has an account, then they can click 'Sign in' and be redirected to the sign in page -->
      <td colspan="2" id="boxc3"><font> Already a member? </font><a href="login.php">Sign in</a></td>
    </tr>
  </tbody>
</table>
</form>

<?php
// REGISTER USER
if (isset($_POST['submit'])) {
	// receive all input values from the mysql database
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$pass_encrypted = md5($password_1);
	$acc_type = "customer";

	// form validation: ensure that the form is correctly filled, which also means no missing info
	if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password_1"]) || empty($_POST["password_2"])) {
		array_push($errors, "Missing info");
		echo "<div align='center'>Missing info</div>";
	}
	
	// if the user enters anythign other than letters and numbers, then an error message pops up
	if (!ctype_alnum($username)){
		array_push($errors, "Invalid username");
		echo "<div align='center'>Invalid username. Username should only contain letters and numbers</div>";
	}
	
	// if the user enters an invalid email format, then an error message pops up
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($errors, "Invalid email format");
		echo "<div align='center'>Invalid email format</div>";
    }

	// if the passwords do not match, then an error message pops up
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
		echo "<div align='center'>Passwords do not match</div>";
	}
	
		// connect to mysql database to see usernames
		$usernameSQL=mysqli_query($db,"SELECT username FROM users WHERE username='$username'");	
		$emailSQL=mysqli_query($db,"SELECT username FROM users WHERE email='$email'");

	// usernames are unique, so if a username is already taken, an error message pops up
	if (mysqli_num_rows($usernameSQL) == 1){
		echo "<div align='center'>Username '$username' is already taken</div>";
		array_push($errors, "Uername taken");
	}

	// emails are unique, so if an email is already taken, an error message pops up
	if (mysqli_num_rows($emailSQL) == 1){
		echo "<div align='center'>Email '$email' is already taken</div>";
		echo "<br>";
		array_push($errors, "Email taken");
	}	
			

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//$password = md5($password_1);//encrypt the password before saving in the database
		
		//$query = "INSERT INTO users (username, email, password, acc_type) 
				 // VALUES('$username', '$email', '$pass_encrypted','customer')";
		
		$query = "INSERT INTO users (username, email, password, acc_type) 
				  VALUES(?,?,?,?)";
		$statement = $db->prepare($query);
		$statement->bind_param("ssss", $username, $email, $pass_encrypted, $acc_type);
		
		//$statement->bind_result($username, $email, $pass_encrypted);
		$statement->execute();
	   
		//mysqli_query($db, $query);
		
		// confirmation message pops up once user has completed registration
		$_SESSION['username'] = $username;
		echo "<div align='center'>You're a member now! Please Sign in!</div>";
	}

}
?>

