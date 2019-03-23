<?php

	session_start();

	require '../Database/database2.php';

$post = $_POST;

$id = $post['subjectId'];
$subjectName = $post['subjectName'];
$status = $post['statusSubject'];
$defaultSubject = $post['defaultSubject'];
if ($defaultSubject == 'YES') {
	$default = 1;
} else {
	$default = 0;
}


if(!$id){

	$json['error'] = "Failed loading subject info.";

	$json['success'] = false;

	echo json_encode($json, 201);

	die();

}

$query = "SELECT * FROM tbl_subjects_applicant WHERE id = '$id'";

$res = mysqli_query($conn,$query);

$stmt = mysqli_fetch_assoc($res);

$updateSubject = "UPDATE tbl_subjects_applicant SET fld_subject = '$subjectName', fld_status = '$status', fld_default = '$default' WHERE id = '$id'";
$stmt = $conn->prepare($updateSubject);

if($stmt->execute()){

	$json['message'] = "Subject successfully updated!";

	$json['success'] = true;

	mysqli_close($conn);

	echo json_encode($json, 200);

	die();

}

?>