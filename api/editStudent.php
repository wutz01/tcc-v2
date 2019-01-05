<?php
	include '../Database/database2.php';
	// print_r($_POST);
	// die();
	//Personal Info
	$request = array_merge($_POST, $_GET);

	$firstName = $request['firstName'];
	$middleName = $request['middleName'];
	$lastName = $request['lastName'];
	$homeAddress = $request['homeAddress'];
	$emailAddress = $request['emailAddress'];
	$birthDate = $request['birthDate'];
	$birthPlace = $request['birthPlace'];
	$mobileNo = $request['mobileNo'];
	$telephoneNo = $request['telephoneNo'];
	$sexApplicant = $request['sexApplicant'];
	$gender = $request['gender'];
	$region = $request['region'];
	$civilStatus = $request['civilStatus'];
	$age = $request['age'];
	$religion = $request['religion'];
	$otherReligion = $request['otherReligion'];

	if ($civilStatus == 'Married') {
		$spouseNames = $request['spouseName'];
		$marriedStatus = $request['marriedStatus'];
		$spouseAddress = $request['spouseAddress'];
		$employerSpouseContact = $request['employerSpouseContact'];
		$employerSpouseOccupation = $request['employerSpouseOccupation'];
		$employerSpouseEmployer = $request['employerSpouseEmployer'];
		$employerApplicantAddress = $request['employerApplicantAddress'];
		$localAbroadSpouse = $request['localAbroadSpouse'];

		$childrenName1 = $request['childrenName'];
		$childrenName=  implode(", ", $childrenName1);

		$childSex1 = $request['childrenSex'];
		$childSex =  implode(", ", $childSex1);

		$childrenAge1 = $request['childrenAge'];
		$childrenAge=  implode(", ", $childrenAge1);

		$childrenBirthDate1 = $request['childrenBirthDate'];
		$childrenBirthDate=  implode(", ", $childrenBirthDate1);

		$childrenBirthPlace1 = $request['childrenBirthPlace'];
		$childrenBirthPlace=  implode(", ", $childrenBirthPlace1);

		$childrenEducationalAttainment1 = $request['childrenEducationalAttainment'];
		$childrenEducationalAttainment=  implode(",", $childrenEducationalAttainment1);
	} else {
		$spouseNames = '';
		$marriedStatus = '';
		$spouseAddress = '';
		$employerSpouseContact = '';
		$employerSpouseOccupation = '';
		$employerSpouseEmployer = '';
		$employerApplicantAddress = '';
		$localAbroadSpouse = '';
		$childrenName = '';
		$childSex = '';
		$childrenAge =  '';
		$childrenBirthDate = '';
		$childrenBirthPlace = '';
		$childrenEducationalAttainment = '';
	}

	$occupationApplicant = $request['occupationApplicant'];
	if($occupationApplicant == ''){
		$employerApplicant = '';
		$employerApplicantAddress = '';
		$localAbroadSpouse = '';
	} else {
		$employerApplicant = $request['employerApplicant'];
		$employerApplicantAddress = $request['employerApplicantAddress'];
		$localAbroadSpouse = $request['localAbroadApplicant'];
	}
	// print_r($localAbroadSpouse);
	// die();
	$collegeSchoolName = $request['collegeSchoolName'];
	  if($collegeSchoolName == ''){
		$collegeSchoolType = '';
		$collegeAward = '';
		$collegeAddress = '';
		$collegeRegion = '';
		$collegeYearGrad = '';
	  } else {
	  	$collegeSchoolType = $request['collegeSchoolType'];
		$collegeAward = $request['collegeAward'];
		$collegeAddress = $request['collegeAddress'];
		$collegeRegion = $request['collegeRegion'];
		$collegeYearGrad = $request['collegeYearGrad'];
	  }

	$vocationalSchoolName = $request['vocationalSchoolName'];
	if($vocationalSchoolName === ''){
		$vocationalSchoolType = '';
		$vocationalAward = '';
		$vocationalAddress = '';
		$vocationalRegion = '';
		$vocationalYearGrad = '';
		} else {
		$vocationalSchoolType = $request['vocationalSchoolType'];
		$vocationalAward = $request['vocationalAward'];
		$vocationalAddress = $request['vocationalAddress'];
		$vocationalRegion = $request['vocationalRegion'];
		$vocationalYearGrad = $request['vocationalYearGrad'];
	}

	$fatherStatus = $request['fatherStatus'];
	$motherStatus = $request['motherStatus'];
	$fatherName = $request['fatherName'];
	$motherName = $request['motherName'];
	$fatherAddress = $request['fatherAddress'];
	$motherAddress = $request['motherAddress'];
	$fatherOccupation = $request['fatherOccupation'];
	$motherOccupation = $request['motherOccupation'];
	$fatherContact = $request['fatherContact'];
	$motherContact = $request['motherContact'];
	$fatherEducationalAttainment = $request['fatherEducationalAttainment'];
	$motherEducationalAttainment = $request['motherEducationalAttainment'];

	$guardianName = $request['guardianName'];
	$guardianRelation = $request['guardianRelation'];
	$guardianAddress = $request['guardianAddress'];
	$guardianEmailAddress = $request['guardianEmailAddress'];
	$guardianMobileno = $request['guardianMobileno'];
	$guardianTelno = $request['guardianTelno'];

	$guardianName2 = $request['guardianName2'];
	$guardianRelation2 = $request['guardianRelation2'];
	$guardianAddress2 = $request['guardianAddress2'];
	$guardianEmailAddress2 = $request['guardianEmailAddress2'];
	$guardianMobileno2 = $request['guardianMobileno2'];
	$guardianTelno2 = $request['guardianTelno2'];

	$elementarySchoolName = $request['elementarySchoolName'];
	$elementarySchoolType = $request['elementarySchoolType'];
	$elementaryAward = $request['elementaryAward'];
	$elementaryAddress = $request['elementaryAddress'];
	$elementaryRegion = $request['elementaryRegion'];
	$elementaryYearGrad = $request['elementaryYearGrad'];

	$secondarySchoolName = $request['secondarySchoolName'];
	$secondarySchoolType = $request['secondarySchoolType'];
	$secondaryAward = $request['secondaryAward'];
	$secondaryAddress = $request['secondaryAddress'];
	$secondaryRegion = $request['secondaryRegion'];
	$secondaryYearGrad = $request['secondaryYearGrad'];

	$learnersData = $request['learnersData'];
	$shsTrack = $request['shsTrack'];
	$reasonEntryTCC = $request['reasonEntryTCC'];
	$reasonEntryTCCOther = $request['reasonEntryTCCOther'];
	$gwAverage = $request['gwAverage'];
	$knowAboutCollege = $request['knowAboutCollege'];
	$knowAboutCollegeOther = $request['knowAboutCollegeOther'];
	if($shsTrack == 'Academic'){
		$shsTrackStrand = $request['shsTrackAcademic'];
	} elseif($shsTrack == 'Technology Vocational Livelihood') {
		$shsTrackStrand = $request['shsTrackTVL'];
	}	else {
		$shsTrackStrand = '';
	}

	$studentNo = $_POST['studentNo'];
	$query = "SELECT * FROM tbl_applicant WHERE fld_StudentNo = '$studentNo'";
	$res = mysqli_query($conn, $query);
	$stmt = mysqli_fetch_assoc($res);

	$queryStudent = "SELECT * FROM tbl_student WHERE fld_StudentNo = '$studentNo'";
	$resStudent = mysqli_query($conn, $queryStudent);
	$stmtStudent = mysqli_fetch_assoc($resStudent);

	$update = "UPDATE tbl_applicant SET
		fld_firstName = '$firstName',
		fld_middleName = '$middleName',
		fld_lastName = '$lastName',
		fld_homeAddress = '$homeAddress',
		fld_emailAddress = '$emailAddress',
		fld_birthPlace = '$birthPlace',
		fld_birthDate = '$birthDate',
		fld_mobilePhoneNo = '$mobileNo',
		fld_telNo = '$telephoneNo',
		fld_sex = '$sexApplicant',
		fld_gender = '$gender',
		fld_regionApplicant = '$region',
		fld_religion = '$religion',
		fld_civilStatus = '$civilStatus',
		fld_ageApplicant = '$age',
		fld_fatherStatus = '$fatherStatus',
		fld_fatherName = '$fatherName',
		fld_fatherAddress = '$fatherAddress',
		fld_fatherOccupation = '$fatherOccupation',
		fld_fatherContactNumber = '$fatherContact',
		fld_fatherEducationalAttainment = '$fatherEducationalAttainment',
		fld_motherStatus = '$motherStatus',
		fld_motherName = '$motherName',
		fld_motherAddress = '$motherAddress',
		fld_motherOccupation = '$motherOccupation',
		fld_motherContactNumber = '$motherContact',
		fld_motherEducationalAttainment = '$motherEducationalAttainment',
		fld_guardianName = '$guardianName',
		fld_guardianRelation = '$guardianRelation',
		fld_guardianAddress = '$guardianAddress',
		fld_guardianTelNo = '$guardianTelno',
		fld_guardianMobileNo = '$guardianMobileno',
		fld_guardianEmailAddress = '$guardianEmailAddress',
		fld_guardianName2 = '$guardianName2',
		fld_guardianRelation2 = '$guardianRelation2',
		fld_guardianAddress2 = '$guardianAddress2',
		fld_guardianTelNo2 = '$guardianTelno2',
		fld_guardianMobileNo2 = '$guardianMobileno2',
		fld_guardianEmailAddress2 = '$guardianEmailAddress2',
		fld_elementaryName = '$elementarySchoolName',
		fld_elementaryType = '$elementarySchoolType',
		fld_elementaryAward = '$elementaryAward',
		fld_elementaryAddress = '$elementaryAddress',
		fld_elementaryRegion = '$elementaryRegion',
		fld_elementaryGraduated = '$elementaryYearGrad',
		fld_secondaryName = '$secondarySchoolName',
		fld_secondaryType = '$secondarySchoolType',
		fld_secondaryAward = '$secondaryAward',
		fld_secondaryAddress = '$secondaryAddress',
		fld_secondaryRegion = '$secondaryRegion',
		fld_secondaryGraduated = '$secondaryYearGrad',
		fld_collegeName = '$collegeSchoolName',
		fld_collegeType = '$collegeSchoolType',
		fld_collegeAward = '$collegeAward',
		fld_collegeAddress = '$collegeAddress',
		fld_collegeRegion = '$collegeRegion',
		fld_collegeGraduated = '$collegeYearGrad',
		fld_vocationalName = '$vocationalSchoolName',
		fld_vocationalType = '$vocationalSchoolType',
		fld_vocationalAward = '$vocationalAward',
		fld_vocationalAddress = '$vocationalAddress',
		fld_vocationalRegion = '$vocationalRegion',
		fld_vocationalGraduated = '$vocationalYearGrad',
		fld_learnersData = '$learnersData',
		fld_shsTrack = '$shsTrack',
		fld_shsTrackStrand = '$shsTrackStrand',
		fld_reasonEntryTCC = '$reasonEntryTCC',
		fld_reasonEntryTCCOther = '$reasonEntryTCCOther',
		fld_gwAverage = '$gwAverage',
		fld_knowAboutCollege = '$knowAboutCollege',
		fld_knowAboutCollegeOther = '$knowAboutCollegeOther',

		fld_spouseName = '$spouseNames',
		fld_spouseStatus = '$marriedStatus',
		fld_spouseAddress = '$spouseAddress',
		fld_spouseContactNo = '$employerSpouseContact',
		fld_spouseOccupation = '$employerSpouseOccupation',
		fld_spouseEmployer = '$employerSpouseEmployer',
		fld_spouseEmployerAddress = '$employerApplicantAddress',
		fld_spouseOccupationLocation = '$localAbroadSpouse',

		fld_childrenName = '$childrenName',
		fld_childrenSex = '$childSex',
		fld_childrenAge = '$childrenAge',
		fld_childrenBirthDate = '$childrenBirthDate',
		fld_childrenBirthPlace = '$childrenBirthPlace',
		fld_childrenEducationalAttainment = '$childrenEducationalAttainment',
		fld_studentOccupation  = '$occupationApplicant',
		fld_studentEmployer  = '$employerApplicant',
		fld_studentEmployerAddress  = '$employerApplicantAddress',
		fld_studentOccupationLocation  = '$localAbroadSpouse'


	WHERE fld_StudentNo = '$studentNo'";

	$stmtUpdate = $conn->prepare($update);

	$queryUpdateStudent = "UPDATE tbl_student SET 
	fld_firstName = '$firstName',
	fld_middleName = '$middleName',
	fld_lastName = '$lastName',
	fld_sex = '$sexApplicant',
	fld_homeAddress = '$homeAddress',
	fld_guardianName = '$guardianName',
	fld_mobilePhoneNo = '$mobileNo'

	WHERE fld_StudentNo = '$studentNo'";

	$stmtUpdateStudent = $conn->prepare($queryUpdateStudent);
	// print_r($update);
	// die();
	if($stmtUpdate->execute()){

		if($stmtUpdateStudent->execute()){

		$json['message'] = "Updated successfully.";

		$json['success'] = true;

		mysqli_close($conn);

		echo json_encode($json, 200);

		die();
		
		}	

	}

?>