<?php
	session_start();
	require '../Database/database2.php';

	$subjectID = $_POST['subjectID'];
	$subjectName = $_POST['subjectName'];
	$statusSubject = $_POST['statusSubject'];
	$defaultSubject = $_POST['defaultSubject'];

	if ($defaultSubject == 'YES') {
		$defaultSubjectFinal = 1;
	} else {
		$defaultSubjectFinal = 0;
	}

	if(isset($subjectID))
	{
		$query = "SELECT * FROM tbl_subjects_applicant WHERE id = $subjectID";
		$res = mysqli_query($conn, $query);
		$user = mysqli_fetch_assoc($res);

		$sql = "UPDATE tbl_subjects_applicant SET fld_subject = '$subjectName', fld_status = '$statusSubject', fld_default = '$defaultSubjectFinal' WHERE id='$subjectID'";
	    
	    // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
		if($stmt->execute()){
			$_SESSION['msgUpdate'] = 'Successfully updated!';
			header('Location: addSubject.php');
			die();
		}
	}

?>