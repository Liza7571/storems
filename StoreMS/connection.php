<?php
	$hostname = 'localhost';
	$user = 'root';
	$password = '';
	$dbname  = 'store_db';
	
	$conn = new mysqli($hostname, $user, $password, $dbname);
	
	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}
?>