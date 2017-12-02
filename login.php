<?php
	// links login.php to header.php
	include("header.php");
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
<table id="table" width="500" height="350" border="1" style="margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 20px">
  <tbody>
    <tr>
      <!-- style format for the title font for the Login table -->
       <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Login</td>
    </tr>
    <tr>
     <!-- style format for the Username option and box -->
      <td id="boxc2" align="right"><strong>Username</strong></td>
      <td id="boxc2"><input type="text" id="username" name="username"></td>
    </tr>
    <tr>
     <!-- style format for the Password option and box -->
      <td id="boxc2" align="right"><strong>Password</strong></td>
      <td id="boxc2"><input type="password" id="password" name="password"></td>
    </tr>
    <tr>
     <!-- set style for the submit button -->
      <td colspan="2"><input type="submit" name="login" id="submit" value="Login" class="button button1"></td>
    </tr>
    <tr>
     <!-- if user doesn't have an account, they are suggested to sign up, which is linked to register.php file -->
      <td colspan="2" id="boxc3"><font> Don't have an account? </font><a href="register.php">Sign up</a></td>
    </tr>
  </tbody>
</table>
</form>

<?php
	// links to loginHandler.php
	include("loginHandler.php");
?>



