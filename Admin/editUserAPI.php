<?php
	session_start();
	require '../Database/database2.php';

	$staffId = $_POST['staffId'];
	$userName = $_POST['userName'];
	$accessType = $_POST['accessType'];
	$statusUser = $_POST['statusUser'];

	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$emailAddress = $_POST['emailAddress'];
	$employmentType = $_POST['employmentType'];
	$maxUnits = $_POST['maxUnits'];
	$schedule = $_POST['schedule'];

	if(isset($staffId))
	{
		$query = "SELECT * FROM tbl_users WHERE staffId = $staffId";
		$res = mysqli_query($conn, $query);
		$user = mysqli_fetch_assoc($res);

		$queryStaff = "SELECT * FROM tbl_staffs WHERE staffId = $staffId";
		$resStaff = mysqli_query($conn, $queryStaff);
		$userStaff = mysqli_fetch_assoc($resStaff);



		$sql = "UPDATE tbl_users SET Username = '$userName', accessType = '$accessType', status = '$statusUser' WHERE staffId ='$staffId'";
	    $stmt = $conn->prepare($sql);

	    $sqla = "UPDATE tbl_staffs SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', emailAddress = '$emailAddress', employmentType = '$employmentType', maxUnits = '$maxUnits', availableSchedule = '$schedule' WHERE staffId ='$staffId'";
	    $stmta = $conn->prepare($sqla);

	    // execute the query
		if($stmt->execute()){
			if($stmta->execute()){
			$_SESSION['msgUpdate'] = 'Successfully updated!';
			header('Location: users.php');
			die();
		}
		}
	}

?>