<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "tanauaud_tcc";

	$conn = new mysqli($servername, $username, $password, $db);
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
	}

if(isset($_GET["id"])) {
	$id = $_GET['id'];
	// print_r($id);
	// die();
	$status = 1;
	$query = "SELECT * FROM tbl_applicant WHERE fld_applicantID = $id";
	$res = mysqli_query($conn, $query);
	$user = mysqli_fetch_assoc($res);

	$sql = "UPDATE tbl_applicant SET fld_statusApplicant = '$status' WHERE fld_applicantID='$id'";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
	if($stmt->execute()){
		$_SESSION['msg_approved'] = $user['fld_lastName'].", ".$user['fld_firstName']." ".$user['fld_middleName']. ' application has been approved!';
		header('Location: applicantList.php');
		die();
	}
}
?>