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

	// print_r($salt);
	// die();

	$queryApplicant = "INSERT INTO tbl_applicant(fld_applicationDate, fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex, fld_gender, fld_ageApplicant, fld_birthDate, fld_birthPlace, fld_statusApplicant) VALUES('$dateAdd','$studentNo', '$firstName', '$middleName', '$lastName', '$sexStudent', '$genderStudent', '$dateOfBirth', '$statusAdd')";
	$stmt1 = mysqli_query($conn, $queryApplicant);

	$queryStudent = "INSERT INTO tbl_student(fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex) VALUES('$studentNo', '$firstName', '$middleName', '$lastName', '$sexStudent')";
	$stmt2 = mysqli_query($conn, $queryStudent);

	$queryUser = "INSERT INTO tbl_users(Username, passwordPlain, passwordSalt, staffId, accessType, status) VALUES('$studentNo', '$password', '$salt', '$studentNo', '$accessType', '$status')";
	$stmt3 = mysqli_query($conn, $queryUser);

	$json['success'] = true;

	$json['message'] = "Student successfully added!";

	mysqli_close($conn);

	echo json_encode($json, 200);
	exit();
	

?>