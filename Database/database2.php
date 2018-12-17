<?php
	$servername = 'localhost';
	$username = 'root';
	$pass = '';
	$db = 'tanauaud_tcc';

	$GLOBALS['conn'] = $conn = mysqli_connect($servername, $username, $pass, $db);

	if (mysqli_connect_errno()) {
		echo 'Failed to connect to database'.mysqli_connect_error();
		die();
	}
?>