<?php

	session_start();

	require '../Database/database2.php';


// print_r($_POST);
// die();
$post = $_POST;

$id = $_POST['subjectId'];

if(!$id){

	$json['error'] = "Failed loading subject info.";

	$json['is_successful'] = false;

	echo json_encode($json, 201);

	die();

}

$query = "DELETE FROM tbl_subject WHERE fld_subjectID = '$id'";

$res = mysqli_query($conn,$query);

$json['message'] = "Subject successfully deleted!";

$json['success'] = true;

mysqli_close($conn);

echo json_encode($json, 200);

die();

?>