<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'login');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<?php
	//session_start();
	//echo "lala";
	//if(isset($_POST["login"])){
	//	$user = $_POST['user'];
	//	$pass = $_POST['pass'];
	//	$database = $_POST['database'];
	//	echo "123";
	//	echo $user;
	//	echo $database;
		
	//	define('DB_SERVER', 'webdev.cislabs.uncw.edu');
	//	define('DB_USERNAME', '$user');
	//	define('DB_PASSWORD', '$pass');
	//	define('DB_DATABASE', 'database');
	//	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	//}
		
?>


