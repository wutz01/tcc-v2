<?php

	session_start();

	require '../Database/database2.php';


// print_r($_POST);
// die();
$post = $_POST;

$id = $_POST['userName'];

if(!$id){

	$json['error'] = "Failed loading user info.";

	$json['is_successful'] = false;

	echo json_encode($json, 201);

	die();

}

$query = "DELETE FROM tbl_users WHERE Username = '$id'";

$res = mysqli_query($conn,$query);

$queryRemark = "DELETE FROM tbl_students_remarks WHERE student_Id = '$id'";

$resRemark = mysqli_query($conn,$queryRemark);

$querySubject = "DELETE FROM tbl_enrolledsubjects WHERE fld_studentNo = '$id'";

$resSubject = mysqli_query($conn,$querySubject);
// print_r($queryRemark);
// die();
$queryStaff = "DELETE FROM tbl_student WHERE fld_studentNo = '$id'";

$result = mysqli_query($conn,$queryStaff);

$json['message'] = "Student successfully deleted!";

$json['success'] = true;

mysqli_close($conn);

echo json_encode($json, 200);

die();

?>