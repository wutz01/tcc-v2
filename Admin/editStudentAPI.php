<?php

	session_start();

	require '../Database/database2.php';

	// print_r($_POST);
	// die();

	$staffId = $_POST['staffId'];

	$firstName = $_POST['firstName'];

	$middleName = $_POST['middleName'];

	$lastName = $_POST['lastName'];

	$sexStudent = $_POST['sexStudent'];

	$homeAddress = $_POST['homeAddress'];

	$guardianName = $_POST['guardianName'];

	$mobileNo = $_POST['mobileNo'];

	$yearLevel = $_POST['yearLevel'];

	$course = $_POST['course'];

	$section = $_POST['section'];

	$admissionStatus = $_POST['admissionStatus'];

	$academicStatus = $_POST['academicStatus'];

	$userName = $_POST['userName'];

	$statusUser = $_POST['statusUser'];

	$status = $_POST['status'];

	$prospectusName = $_POST['prospectusName'];


	if(isset($staffId)) {

		$query = "SELECT * FROM tbl_student WHERE fld_studentNo = '$staffId'";

		$res = mysqli_query($conn, $query);

		$user = mysqli_fetch_assoc($res);



		$sql = "UPDATE tbl_student SET 
			fld_firstName = '$firstName',
			fld_middleName = '$middleName',
			fld_lastName = '$lastName',
			fld_sex = 'sexStudent',
			fld_homeAddress = '$homeAddress',
			fld_guardianName = '$guardianName',
			fld_mobilePhoneNo = '$mobileNo',
			fld_yearLevel = '$yearLevel',
			fld_program = '$course',
			fld_section = '$section',
			fld_prospectusName = '$prospectusName',
			fld_status = 'status',
			fld_admissionStatus = '$admissionStatus',
			fld_academicStatus = '$academicStatus'
		WHERE fld_studentNo='$staffId'";

	    

	    // Prepare statement

	    $stmt = $conn->prepare($sql);



	    // execute the query

		if($stmt->execute()){

			$_SESSION['msgUpdate'] = 'Successfully updated!';

			header('Location: students.php');

			die();

		}

	}



?>