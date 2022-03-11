<?php
require ( 'functions.php' );

date_default_timezone_set('CST');


// Database Globals
define('DB_NAME', 'tgdlibrary');
define('DB_USER', 'adminhatch');
define('DB_PASSWORD', 'jackass68');
define('DB_HOST', 'prolibdb.projectlibertine.com');

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$db) 	
	die('Could not connect to Database:' . mysqli_error());
?>