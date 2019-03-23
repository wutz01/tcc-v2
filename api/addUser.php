<?php
	include '../Database/database2.php';

	// print_r($_POST);
	// die();

	$dateAdd = date("Y-m-d");

	$studentNo = $_POST['studentNo'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$sexStudent = $_POST['sexStudent'];
	$genderStudent = $_POST['genderStudent'];
	$dateOfBirth = $_POST['birthDate'];
	// $age = $_POST['age'];
	// $placeOfBirth= $_POST['bithPlace'];
	$newBirthDate = str_replace("-", "", $dateOfBirth);

	$cost = 10;
	$enc = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $enc;
	$cPassword = $newBirthDate;
	$pass = $newBirthDate;
	$password = md5($pass . $salt);

	$accessType = 'Student';
	$status = 'active';

	$statusAdd = '4';

	$prospectusName = $_POST['course'];
	$yearLevel = $_POST['yearLevel'];

	// print_r($salt);
	// die();

	if (!isset($studentNo) || $studentNo === "") {
		$_SESSION['msgExist'] = 'Enter required field';
		die();
	}
	if (!isset($firstName) || $firstName === "") {
		$_SESSION['msgExist'] = 'Enter firstname';
		die();
	}
	if (!isset($lastName) || $lastName === "") {
		$_SESSION['msgExist'] = 'Enter lastname';
		die();
	}
	if (!isset($dateOfBirth) || $dateOfBirth === "") {
		$_SESSION['msgExist'] = 'Choose birthdate';
		die();
	}
	// $age = $_POST['age'];
	$checkExist = "SELECT * FROM tbl_student WHERE fld_studentNo = '$studentNo'";
	$resCheckExist = mysqli_query($conn, $checkExist);

	$checkExist1 = "SELECT * FROM tbl_users WHERE staffId = '$studentNo'";
	$resCheckExist1 = mysqli_query($conn, $checkExist1);

	if (mysqli_num_rows($resCheckExist) > 0) {

		$json['success'] = false;

		$json['message'] = $studentNo. " already exist!";

		mysqli_close($conn);

		echo json_encode($json, 200);
		
		exit();

	} elseif (mysqli_num_rows($resCheckExist1) > 0) {
		$json['success'] = false;

		$json['message'] = $studentNo. " already apc_exists(keys)!";

		mysqli_close($conn);

		echo json_encode($json, 200);
		
		exit();
	} else {

		$queryApplicant = "INSERT INTO tbl_applicant(fld_applicationDate, fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex, fld_gender, fld_birthDate, fld_statusApplicant) VALUES('$dateAdd', '$studentNo', '$firstName', '$middleName', '$lastName', '$sexStudent', '$genderStudent', '$dateOfBirth', '$statusAdd')";
		$stmt1 = mysqli_query($conn, $queryApplicant);

		$queryStudent = "INSERT INTO tbl_student(fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex, fld_yearLevel, fld_prospectusName) VALUES('$studentNo', '$firstName', '$middleName', '$lastName', '$sexStudent', '$yearLevel', '$prospectusName')";
		$stmt2 = mysqli_query($conn, $queryStudent);

		$queryUser = "INSERT INTO tbl_users(Username, passwordPlain, passwordSalt, staffId, accessType, status) VALUES('$studentNo', '$password', '$salt', '$studentNo', '$accessType', '$status')";
		$stmt3 = mysqli_query($conn, $queryUser);

		$json['success'] = true;

		$json['message'] = "Student successfully added!";

		mysqli_close($conn);

		echo json_encode($json, 200);
		
		exit();

	}

?>