<?php
  require('../config/db.php');
  $request = array_merge($_POST, $_GET);

  // print_r($request['emailAddress']);
  // print_r($request);
  // $dateApply = date("Y-m-d");
  // print_r($dateApply);
  // die();

$queryLastId = "SELECT fld_applicantID FROM tbl_applicant ORDER BY fld_applicantID DESC LIMIT 1";
$stmt = mysqli_query($conn, $queryLastId);
$result = mysqli_fetch_assoc($stmt);
$nextId = ($result ? (int) $result['fld_applicantID'] + 1 : 1);
$applicantNumber = "APPL-" . str_pad($nextId, 5, "0",STR_PAD_LEFT);

  $statusApplciant = 0;
  $dateApply = date("Y-m-d");
//Personal Info
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

//Family Background
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

//additionalQuestions
	if ($civilStatus == 'Married') {
		$spouseName = $request['spouseName'];
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
		$spouseName = '';
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
		$employerApplicantAddresss = '';
		$localAbroadApplicant = '';
	} else {
		$employerApplicant = $request['employerApplicant'];
		$employerApplicantAddresss = $request['employerApplicantAddresss'];
		$localAbroadApplicant = $request['localAbroadApplicant'];
	}

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

//Academic Info
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

  $collegeSchoolName = $request['collegeSchoolName'];
  $collegeSchoolType = $request['collegeSchoolType'];
  $collegeAward = $request['collegeAward'];
  $collegeAddress = $request['collegeAddress'];
  $collegeRegion = $request['collegeRegion'];
  $collegeYearGrad = $request['collegeYearGrad'];

  $vocationalSchoolName = $request['vocationalSchoolName'];
  $vocationalSchoolType = $request['vocationalSchoolType'];
  $vocationalAward = $request['vocationalAward'];
  $vocationalAddress = $request['vocationalAddress'];
  $vocationalRegion = $request['vocationalRegion'];
  $vocationalYearGrad = $request['vocationalYearGrad'];

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

$query = "INSERT INTO tbl_applicant (
	fld_applicationDate,
	fld_firstName,
	fld_middleName,
	fld_lastName,
	fld_homeAddress,
	fld_emailAddress,
	fld_birthPlace,
	fld_birthDate,
	fld_mobilePhoneNo,
	fld_telNo,
	fld_sex,
	fld_ageApplicant,
	fld_height,
	fld_bloodType,
	fld_civilStatus,
	fld_weight,
	fld_religion,
	fld_fatherStatus,
	fld_fatherName,
	fld_fatherAddress,
	fld_fatherOccupation,
	fld_fatherContactNumber,
	fld_fatherEducationalAttainment,
	fld_motherStatus,
	fld_motherName,
	fld_motherAddress,
	fld_motherOccupation,
	fld_motherContactNumber,
	fld_motherEducationalAttainment,
	fld_income,
	fld_siblingName,
	fld_siblingAge,
	fld_siblingEducationalAttainment,
	fld_siblingSchool,
	fld_siblingIncome,
	fld_siblingStatus,
	fld_spouseName,
	fld_spouseStatus,
	fld_spouseAddress,
	fld_spouseContactNo,
	fld_spouseOccupation,
	fld_spouseEmployer,
	fld_spouseEmployerAddress,
	fld_spouseOccupationLocation,
	fld_childrenName,
	fld_childrenSex,
	fld_childrenAge,
	fld_childrenBirthDate,
	fld_childrenBirthPlace,
	fld_childrenEducationalAttainment,
	fld_studentOccupation,
	fld_studentEmployer,
	fld_studentEmployerAddress,
	fld_studentOccupationLocation,
	fld_guardianName,
	fld_guardianRelation,
	fld_guardianAddress,
	fld_guardianZipCode,
	fld_guardianTelNo,
	fld_guardianMobileNo,
	fld_guardianEmailAddress,
	fld_elementaryName,
	fld_elementaryType,
	fld_elementaryAward,
	fld_elementaryAddress,
	fld_elementaryRegion,
	fld_elementaryGraduated,
	fld_secondaryName,
	fld_secondaryType,
	fld_secondaryAward,
	fld_secondaryAddress,
	fld_secondaryRegion,
	fld_secondaryGraduated,
	fld_collegeName,
	fld_collegeType,
	fld_collegeAward,
	fld_collegeAddress,
	fld_collegeRegion,
	fld_collegeGraduated,
	fld_vocationalName,
	fld_vocationalType,
	fld_vocationalAward,
	fld_vocationalAddress,
	fld_vocationalRegion,
	fld_vocationalGraduated,
	fld_discontinuanceOfStudy,
	fld_discontinuanceOfStudyReason,
	fld_academicProblemFail,
	fld_academicProblemFailReason,
	fld_academicProblemRepeat,
	fld_academicProblemRepeatReason,
	fld_disciplinaryRecord,
	fld_disciplinaryRecordReason,
	fld_transferee,
	fld_enrolledCourse,
	fld_yearLevel,
	fld_prefferedPrograms,
	fld_recommendedProgram,
	fld_working,
	fld_gender,
	fld_regionApplicant,
	fld_guardianName2,
	fld_guardianRelation2,
	fld_guardianAddress2,
	fld_guardianTelNo2,
	fld_guardianMobileNo2,
	fld_guardianEmailaddress2,
	fld_learnersData,
	fld_gwAverage,
	fld_reasonEntryTCC,
	fld_shsTrack,
	fld_shsTrackStrand,
	fld_reasonEntryTCCOther,
	fld_knowAboutCollege,
	fld_knowAboutCollegeOther,
	fld_otherReligion,
	fld_statusApplicant,
	fld_applicantGeneratedID)

	VALUES (
	'$dateApply',
	'$firstName',
	'$middleName',
	'$lastName',
	'$homeAddress',
	'$emailAddress',
	'$birthPlace',
	'$birthDate',
	'$mobileNo',
	'$telephoneNo',
	'$sexApplicant',
	'$age',
	'',
	'',
	'$civilStatus',
	'',
	-- '',
	'$religion',
	'$fatherStatus',
	'$fatherName',
	'$fatherAddress',
	'$fatherOccupation',
	'$fatherContact',
	'$fatherEducationalAttainment',
	'$motherStatus',
	'$motherName',
	'$motherAddress',
	'$motherOccupation',
	'$motherContact',
	'$motherEducationalAttainment',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'$spouseName',
	'$marriedStatus',
	'$spouseAddress',
	'$employerSpouseContact',
	'$employerSpouseOccupation',
	'$employerSpouseEmployer',
	'$employerApplicantAddresss',
	'$localAbroadSpouse',
	'$childrenName',
	'$childSex',
	'$childrenAge',
	'$childrenBirthDate',
	'$childrenBirthPlace',
	'$childrenEducationalAttainment',
	'$occupationApplicant',
	'$employerApplicant',
	'$employerApplicantAddress',
	'$localAbroadApplicant',
	'$guardianName',
	'$guardianRelation',
	'$guardianAddress',
	'',
	'$guardianTelno',
	'$guardianMobileno',
	'$guardianEmailAddress',
	'$elementarySchoolName',
	'$elementarySchoolType',
	'$elementaryAward',
	'$elementaryAddress',
	'$elementaryRegion',
	'$elementaryYearGrad',
	'$secondarySchoolName',
	'$secondarySchoolType',
	'$secondaryAward',
	'$secondaryAddress',
	'$secondaryRegion',
	'$secondaryYearGrad',
	'$collegeSchoolName',
	'$collegeSchoolType',
	'$collegeAward',
	'$collegeAddress',
	'$collegeRegion',
	'$collegeYearGrad',
	'$vocationalSchoolName',
	'$vocationalSchoolType',
	'$vocationalAward',
	'$vocationalAddress',
	'$vocationalRegion',
	'$vocationalYearGrad',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'',
	'$gender',
	'$region',
	'$guardianName2',
	'$guardianRelation2',
	'$guardianAddress2',
	'$guardianTelno2',
	'$guardianMobileno2',
	'$guardianEmailAddress2',
	'$learnersData',
	'$gwAverage',
	'$reasonEntryTCC',
	'$shsTrack',
	'$shsTrackStrand',
	'$reasonEntryTCCOther',
	'$knowAboutCollege',
	'$knowAboutCollegeOther',
	'$otherReligion',
	'$statusApplciant',
	'$applicantNumber')";


$res = mysqli_query($conn, $query);

if($res->execute()){

	$json['message'] = "Applied successfull!";

	$json['success'] = true;

	mysqli_close($conn);

	echo json_encode($json, 200);

	die();
}
?>
