<?php
	session_start();
	require '../Database/database2.php';

	// print_r($_POST);
	// die();

	$applicantID = $_POST['applicantUserID'];

	foreach($_POST['grade'] as $subjectId => $grade) {
		if ((!isset($grade) || $grade === '')) {
			$json['success'] = true;
			$json['message'] = "Enter grade.";
			echo json_encode($json, 200);
			exit();
		}	else {
			$searchQuery = "SELECT * FROM tbl_grades_applicant WHERE fld_applicantID = $applicantID AND fld_subjectID = $subjectId";
			$ret = mysqli_query($conn, $searchQuery);
			$sub = mysqli_fetch_assoc($ret);
			if ($sub) {
				$id = $sub['id'];
				$query = "UPDATE tbl_grades_applicant SET fld_applicantID = '$applicantID' , fld_subjectID = '$subjectId', fld_grade = '$grade' WHERE id = $id";
			} else {
				$query = "INSERT INTO tbl_grades_applicant (fld_applicantID, fld_subjectID, fld_grade) VALUES ('$applicantID', '$subjectId', '$grade')";	
			}
			
		$test = mysqli_query($conn, $query);
		}
		
	}
	
	$json['success'] = true;
	$json['message'] = "Grades has been saved.";
	echo json_encode($json, 200);
	exit();
?>