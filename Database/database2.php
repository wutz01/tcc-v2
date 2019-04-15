<?php
	$servername = 'production';
	if ($env === 'production') {
		$user = 'u984568706_admin';
		$pass = 'RxV6QRBmVVam';
		$db = 'u984568706_tcc';
	} else {
		$user = 'root';
		$pass = '';
		$db = 'tanauaud_tcc';
	}


	$GLOBALS['conn'] = $conn = mysqli_connect($servername, $user, $pass, $db);
	if (mysqli_connect_errno()) {
		echo 'Failed to connect to database '. mysqli_connect_error();
		die();
	}
?>
