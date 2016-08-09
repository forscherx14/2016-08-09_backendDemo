<?php

	$db;
	$servername = "localhost";
	$username 	= 'root';
	$password	= '';
	$dbname   	= 'olsen_demo';


	$db = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($db->connect_error) {
 		die("Connection failed: " . $conn->connect_error);
	}else{
	 	//echo "Successfully connected";
	}
	



?>