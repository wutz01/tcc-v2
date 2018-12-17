<?php
	session_start();
	require '../Database/database2.php';

$post = $_POST;
if(!$post['id']){
	$json['error'] = "Failed loading user info.";
	$json['is_successful'] = false;
	echo json_encode($json, 201);
	die();
}
$id = $post['id'];

$query = "DELETE FROM tbl_users WHERE staffId = '$id'";
$res = mysqli_query($conn,$query);
$queryStaff = "DELETE FROM tbl_staffs WHERE staffId = '$id'";
$result = mysqli_query($conn,$queryStaff);
$json['message'] = "User successfully deleted!";
$json['is_successful'] = true;
mysqli_close($conn);
echo json_encode($json, 200);
die();
?>