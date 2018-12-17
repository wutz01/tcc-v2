<?php
	session_start();
	require '../Database/database2.php';

	$subjectName = $_POST['subjectName'];
	$statusSubject = $_POST['statusSubject'];
	$defaultSubject = $_POST['defaultSubject'];

	if (!isset($_POST['subjectName']) || $_POST['subjectName'] === "") {
		$_SESSION['msgNot'] = "Enter subject name first";
		header("Location: addSubject.php");
		die();
	}
	$default = ($defaultSubject == 'YES' ? true : false);	

	$query = "INSERT INTO tbl_subjects_applicant(fld_subject, fld_status, fld_default) VALUES ('$subjectName', '$statusSubject', '$default')";
	$test = mysqli_query($conn, $query);
	$_SESSION['msgAdd'] = $subjectName." successfully Added";
	header("Location: addSubject.php");
	die();
?>