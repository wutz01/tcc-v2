<?php
session_start();
	include '../Database/database2.php';
	// print_r($_POST);
	// die();
	$applicantID = $_POST['applicantId'];
	$studentNo = $_POST['studentNo'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$sexApplicant = $_POST['sexApplicant'];
	$homeAddress = $_POST['homeAddress'];
	$guardianName = $_POST['guardianName'];
	$mobileNo = $_POST['mobileNo'];
	$birthDate = $_POST['birthDate'];
	$passBirthDate = str_replace("-", "", $birthDate);

	// print_r($passBirthDate);
	// die();

	$cost = 10;
	$enc = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $enc;
	$pass = $passBirthDate;
	$password = md5($pass . $salt);

	$accessType = 'Student';
	$status = 'active';

	$statusApplicant = '4';

	$checkExist = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$studentNo'";
	$resCheckExist = mysqli_query($conn, $checkExist);
	// $stmtCheckExist = mysqli_fetch_assoc($resCheckExist);

	$checkExist1 = "SELECT * FROM tbl_users WHERE Username = '$studentNo'";
	$resCheckExist1 = mysqli_query($conn, $checkExist1);
	// $stmtCheckExist1 = mysqli_fetch_assoc($resCheckExist1);

	// print_r($resCheckExist);
	// die();


	if (mysqli_num_rows($resCheckExist) > 0) {
		$_SESSION['msgExist'] = $studentNo.' already exist!';
		header("Location: ../Admin/acceptedApplicant.php");
		die();
	} elseif (mysqli_num_rows($resCheckExist1) > 0) {
		$_SESSION['msgExist'] = $studentNo.' already exist!';
		header("Location: ../Admin/acceptedApplicant.php");
		die();
	} else {
		$queryUpdateApplicant = "SELECT * FROM tbl_applicant WHERE fld_applicantID = '$applicantId'";
		$resUpdate = mysqli_query($conn, $queryUpdateApplicant);
		$stmtUpdate = mysqli_fetch_assoc($resUpdate);

		$queryUpdate = "UPDATE tbl_applicant SET fld_statusApplicant = '$statusApplicant', fld_studentNo = '$studentNo' WHERE fld_applicantID = '$applicantID'";
		$stmt = $conn->prepare($queryUpdate);

		$queryStudent = "INSERT INTO tbl_student(fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex, fld_homeAddress, fld_guardianName, fld_mobilePhoneNo) VALUES('$studentNo', '$firstName', '$middleName', '$lastName', '$sexApplicant', 'homeAddress', 'guardianName', '$mobileNo')";
		$stmt2 = mysqli_query($conn, $queryStudent);

		$queryUser = "INSERT INTO tbl_users(Username, passwordPlain, passwordSalt, staffId, accessType, status) VALUES('$studentNo', '$password', '$salt', '$studentNo', '$accessType', '$status')";
		$stmt3 = mysqli_query($conn, $queryUser);

		if($stmt->execute()){

			$_SESSION['msgEnrolled'] = 'Successfully enrolled '.$lastName.', '.$firstName. ' '.$middleName;

			header('Location: ../Admin/acceptedApplicant.php');

			die();

		}
	}
?>