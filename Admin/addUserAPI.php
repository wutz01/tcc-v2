<?php

	session_start();

	require '../Database/database2.php';

	include_once "../Applicant/applicantClass.php";



	$cost     = 10;

	$firstName = $_POST['firstName'];

	$middleName = $_POST['middleName'];

	$lastName = $_POST['lastName'];

	$emailAddress = $_POST['emailAddress'];

	$employmentType = $_POST['employmentType'];

	$maxUnits = $_POST['maxUnits'];

	$schedules = $_POST['schedule'];
	$schedule = implode("", $schedules);

	$userName = $_POST['userName'];

	$accessType = $_POST['accessType'];

	$statusUser = $_POST['statusUser'];


	$enc = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

	$salt = sprintf("$2a$%02d$", $cost) . $enc;

	$cPassword = $_POST['cPassword'];

	$pass = $_POST['password'];

	$password = md5($pass . $salt);

	// $newId = new Applicant();

	// $generatedId = $newId->getLastIdUsers();

	$queryLastId = "SELECT fld_usersID FROM tbl_users ORDER BY fld_usersID DESC LIMIT 1";
	$stmt = mysqli_query($conn, $queryLastId);
	$result = mysqli_fetch_assoc($stmt);
	$nextId = ($result ? (int) $result['fld_usersID'] + 1 : 1);
	$applicantNumber = "TCCN" . str_pad($nextId, 5, "0",STR_PAD_LEFT);

	if (!isset($_POST['firstName']) || $_POST['firstName'] === "") {

		$_SESSION['msgNot'] = "Enter Firstname";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['middleName']) || $_POST['middleName'] === "") {

		$_SESSION['msgNot'] = "Enter Middlename";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['lastName']) || $_POST['lastName'] === "") {

		$_SESSION['msgNot'] = "Enter Lastname";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['emailAddress']) || $_POST['emailAddress'] === "") {

		$_SESSION['msgNot'] = "Enter Email Address";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['employmentType']) || $_POST['employmentType'] === "") {

		$_SESSION['msgNot'] = "Enter Employment Type";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['maxUnits']) || $_POST['maxUnits'] === "") {

		$_SESSION['msgNot'] = "Enter Max Units";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['schedule']) || $_POST['schedule'] === "") {

		$_SESSION['msgNot'] = "Enter Schedule";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['userName']) || $_POST['userName'] === "") {

		$_SESSION['msgNot'] = "Enter username";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['password']) || $_POST['password'] === "") {

		$_SESSION['msgNot'] = "Enter password";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['cPassword']) || $_POST['cPassword'] === "") {

		$_SESSION['msgNot'] = "Enter password";

		header("Location: users.php");

		die();

	}

	if ($_POST['password'] !== $_POST['cPassword']) {

		$_SESSION['msgNot'] = "Password not match";

		header("Location: users.php");

		die();

	}

	if (!isset($_POST['schedule']) || $_POST['schedule'] === "") {

		$_SESSION['msgNot'] = "Select schedule/s";

		header("Location: users.php");

		die();

	}	

	$sql = "SELECT * FROM tbl_users WHERE Username = '$userName'";

	$result = mysqli_query($conn,$sql);

	// print_r($result);

	// die();

	if(mysqli_num_rows($result)>=1){

		$_SESSION['msgError'] = $userName."  already exist";

		header("Location: users.php");

		die();

	}

	else {

		$query = "INSERT INTO tbl_users(Username, passwordPlain, passwordSalt, staffId, accessType, status) VALUES ('$userName', '$password', '$salt', '$applicantNumber', '$accessType', '$statusUser')";

		$test = mysqli_query($conn, $query);

		$queryStaff = "INSERT INTO tbl_staffs(staffId, firstName, middleName, lastName, emailAddress, employmentType, maxUnits, availableSchedule) VALUES ('$applicantNumber', '$firstName', '$middleName', '$lastName', '$emailAddress', '$employmentType', '$maxUnits', '$schedule')";

		$testStaff = mysqli_query($conn, $queryStaff);

		$_SESSION['msgAdd'] = $userName." successfully Added";

		header("Location: users.php");

		die();

	}

?>