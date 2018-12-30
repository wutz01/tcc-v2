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

$queryStaff = "DELETE FROM tbl_student WHERE fld_studentNo = '$id'";

$result = mysqli_query($conn,$queryStaff);

$json['message'] = "Student successfully deleted!";

$json['success'] = true;

mysqli_close($conn);

echo json_encode($json, 200);

die();

?>