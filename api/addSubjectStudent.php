<?php
session_start();
	include '../Database/database2.php';
	// print_r($_POST);
	// die();
	$subjectCode = $_POST['subjectCode'];
	$subjectDesc = $_POST['subjectDesc'];
	$subjectUnits = $_POST['subjectUnits'];
 	$subjectLecHrs = $_POST['subjectLecHrs'];
 	$subjectLabHrs = $_POST['subjectLabHrs'];
	$subjectPreReq = $_POST['subjectPreReq'];

	if (!isset($subjectCode) || $subjectCode === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	if (!isset($subjectDesc) || $subjectDesc === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	if (!isset($subjectUnits) || $subjectUnits === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	if (!isset($subjectLecHrs) || $subjectLecHrs === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	if (!isset($subjectLabHrs) || $subjectLabHrs === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	if (!isset($subjectPreReq) || $subjectPreReq === "") {
		$json['message'] = "Field can't be empty.";
		echo json_encode($json, 200);
		exit();
	}

	// print_r($_POST);
	// die();         

	$query = "INSERT INTO tbl_subject(fld_subCode, fld_description, fld_units, fld_lecHrs, fld_labHrs, fld_preReq) VALUES('$subjectCode', '$subjectDesc', '$subjectUnits', '$subjectLecHrs', '$subjectLabHrs', '$subjectPreReq')";
	$stmt = mysqli_query($conn, $query);

	$json['success'] = true;
	$json['message'] = "Subject has been added.";
	echo json_encode($json, 200);
	exit();

?>