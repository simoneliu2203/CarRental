<?php
//this connects the php code to the mysql databases (called 'narayan10') using a webdev server
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'YOUR USERNAME GOES HERE');
define('DB_PASSWORD', 'YOUR PASSWORD GOES HERE');
define('DB_DATABASE', 'narayan10');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>


