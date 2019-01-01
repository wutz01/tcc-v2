<?php

	session_start();

	require '../Database/database2.php';


// print_r($_POST);
// die();
$post = $_POST;

$id = $_POST['subjectId'];
$subjectCode = $_POST['subjectCode'];
$subjectDes = $_POST['subjectDes'];
$subjectUnits = $_POST['subjectUnits'];
$subjectLecHrs = $_POST['subjectLecHrs'];
$subjectLabHrs = $_POST['subjectLabHrs'];
$subjectPreReq = $_POST['subjectPreReq'];


if(!$id){

	$json['error'] = "Failed loading subject info.";

	$json['is_successful'] = false;

	echo json_encode($json, 201);

	die();

}

$query = "SELECT * FROM tbl_subject WHERE fld_subjectID = '$id'";

$res = mysqli_query($conn,$query);

$stmt = mysqli_fetch_assoc($res);

$updateSubject = "UPDATE tbl_subject SET fld_subCode = '$subjectCode', fld_description = '$subjectDes', fld_units = '$subjectUnits', fld_lecHrs = '$subjectLecHrs', fld_labHrs = '$subjectLabHrs', fld_preReq = '$subjectPreReq' WHERE fld_subjectID = '$id'";
$stmt = $conn->prepare($updateSubject);

if($stmt->execute()){

	$json['message'] = "Subject successfully udpated!";

	$json['success'] = true;

	mysqli_close($conn);

	echo json_encode($json, 200);

	die();

}

?>