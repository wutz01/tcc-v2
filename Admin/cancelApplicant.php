<?php
	session_start();
	require '../Database/database2.php';

if(isset($_GET["id"])) {
	$id = $_GET['id'];
	// print_r($id);
	// die();
	$status = 2;
	$query = "SELECT * FROM tbl_applicant WHERE fld_applicantID = $id";
	$res = mysqli_query($conn, $query);
	$user = mysqli_fetch_assoc($res);


	$sql = "UPDATE tbl_applicant SET fld_statusApplicant = '$status' WHERE fld_applicantID='$id'";
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // print_r($sql);
    // die();
    // execute the query
    
	if($stmt->execute()){
		$_SESSION['msg_cancel'] = $user['fld_lastName'].", ".$user['fld_firstName']." ".$user['fld_middleName']. ' application has been cancelled!';
		header('Location: applicantList.php');
		die();
	}
}
?>