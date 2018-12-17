<?php  
include_once "applicantClass.php";

// add an Applicant

$newId = new Applicant();
$generatedId = $newId->getLastId();
$applicant = new Applicant();

if($_POST['getfunctionName'] == "studentApplication"){

    $firstName = $_POST['getfirstName'];
    $middleName = $_POST['getmiddleName'];
    $lastName = $_POST['getlastName'];
    $homeAddress = $_POST['gethomeAddress'];
    $emailAddress = $_POST['getemailAddress'];
    $birthPlace = $_POST['getbirthPlace'];
    $birthDate = $_POST['getbirthDate'];
    $mobilePhoneNo = $_POST['getmobilePhoneNo'];
    $telNo = $_POST['gettelNo'];
    $Sex = $_POST['getSex'];
    $ageApplicant = $_POST['getAgeApplicant'];
    $Height = "";
    $bloodType = 0;
    $civilStatus = $_POST['getcivilStatus'];
    $weight = "";
    $religion = $_POST['getreligion'];
    $fatherStatus = $_POST['getfatherStatus'];
    $fatherName = $_POST['getfatherName'];
    $fatherAddress = $_POST['getfatherAddress'];
    $fatherOccupation = $_POST['getfatherOccupation'];
    $fatherContactNumber = $_POST['getfatherContactNumber'];
    $fatherEducationalAttainment = $_POST['getfatherEducationalAttainment'];
    $motherStatus = $_POST['getmotherStatus'];
    $motherName = $_POST['getmotherName'];
    $motherAddress = $_POST['getmotherAddress'];
    $motherOccupation = $_POST['getmotherOccupation'];
    $motherContactNumber = $_POST['getmotherContactNumber'];
    $motherEducationalAttainment = $_POST['getmotherEducationalAttainment'];
    $income = "";
    $siblingName = "";
    $siblingAge = "";
    $siblingEducationalAttainment = "";
    $siblingSchool = "";
    $siblingIncome = "";
    $siblingStatus = "";
    $spouseName = $_POST['getspouseName'];
    $spouseStatus = $_POST['getspouseStatus'];
    $spouseAddress = $_POST['getspouseAddress'];
    $spouseContactNo = $_POST['getspouseContactNo'];
    $spouseOccupation = $_POST['getspouseOccupation'];
    $spouseEmployer = $_POST['getspouseEmployer'];
    $spouseEmployerAddress = $_POST['getspouseEmployerAddress'];
    $spouseOccupationLocation = $_POST['getspouseOccupationLocation'];
    $childrenName = $_POST['getchildrenName'];
    $childrenSex = $_POST['getchildrenSex'];
    $childrenAge = $_POST['getchildrenAge'];
    $childrenBirthDate = $_POST['getchildrenBirthDate'];
    $childrenBirthPlace = $_POST['getchildrenBirthPlace'];
    $childrenEducationalAttainment = $_POST['getchildrenEducationalAttainment'];
    $studentOccupation = $_POST['getstudentOccupation'];
    $studentEmployer = $_POST['getstudentEmployer'];
    $studentEmployerAddress = $_POST['getstudentEmployerAddress'];
    $studentOccupationLocation = $_POST['getstudentOccupationLocation'];
    $guardianName = $_POST['getguardianName'];
    $guardianRelation = $_POST['getguardianRelation'];
    $guardianAddress = $_POST['getguardianAddress'];
    $guardianZipCode = "";
    $guardianTelNo = $_POST['getguardianTelNo'];
    $guardianMobileNo = $_POST['getguardianMobileNo'];
    $guardianEmailAddress = $_POST['getguardianEmailAddress'];
    $elementaryName = $_POST['getelementaryName'];
    $elementaryType = $_POST['getelementaryType'];
    $elementaryAward = $_POST['getelementaryAward'];
    $elementaryAddress = $_POST['getelementaryAddress'];
    $elementaryRegion = $_POST['getelementaryRegion'];
    $elementaryGraduated = $_POST['getelementaryGraduated'];
    $secondaryName = $_POST['getsecondaryName'];
    $secondaryType = $_POST['getsecondaryType'];
    $secondaryAward = $_POST['getsecondaryAward'];
    $secondaryAddress = $_POST['getsecondaryAddress'];
    $secondaryRegion = $_POST['getsecondaryRegion'];
    $secondaryGraduated = $_POST['getsecondaryGraduated'];
    $collegeName = $_POST['getcollegeName'];
    $collegeType = $_POST['getcollegeType'];
    $collegeAward = $_POST['getcollegeAward'];
    $collegeAddress = $_POST['getcollegeAddress'];
    $collegeRegion = $_POST['getcollegeRegion'];
    $collegeGraduated = $_POST['getcollegeGraduated'];
    $vocationalName = $_POST['getvocationalName'];
    $vocationalType = $_POST['getvocationalType'];
    $vocationalAward = $_POST['getvocationalAward'];
    $vocationalAddress = $_POST['getvocationalAddress'];
    $vocationalRegion = $_POST['getvocationalRegion'];
    $vocationalGraduated = $_POST['getvocationalGraduated'];
    $discontinuanceOfStudy = "";
    $discontinuanceOfStudyReason = "";
    $academicProblemFail = "";
    $academicProblemFailReason = "";
    $academicProblemRepeat = "";
    $academicProblemRepeatReason = "";
    $disciplinaryRecord = "";
    $disciplinaryRecordReason = "";
    $prefferedPrograms  = "";
    $transferee         = "";
    $enrolledCourse         = "";
    $getGender = $_POST['getGender'];
    $getregionApplicant = $_POST['getregionApplicant'];
    $guardianName2 = $_POST['getguardianName2'];
    $guardianRelation2 = $_POST['getguardianRelation2'];
    $guardianAddress2 = $_POST['getguardianAddress2'];
    $guardianTelNo2 = $_POST['getguardianTelNo2'];
    $guardianMobileNo2 = $_POST['getguardianMobileNo2'];
    $guardianEmailaddress2 = $_POST['getguardianEmailAddress2'];
    $learnersData = $_POST['getlearnersData'];
    $gwAverage = $_POST['getgwAverage'];
    $reasonEntryTCC = $_POST['reasonEntryTCC'];
    $shsTrack = $_POST['shsTrack'];
    $shsTrackStrand = $_POST['shsTrackStrand'];
    $reasonEntryTCCOther = $_POST['reasonEntryTCCOther'];
    $knowAboutCollege = $_POST['knowAboutCollege'];
    $knowAboutCollegeOther = $_POST['knowAboutCollegeOther'];
    $otherReligion = $_POST['otherReligion'];
    $nextId = $generatedId;
    $date_today = date("Y-m-d");
        try {
            $applicant->addApplicant(
                $firstName,
                $middleName,
                $lastName,
                $homeAddress,
                $emailAddress,
                $birthPlace,
                $birthDate,
                $mobilePhoneNo,
                $telNo,
                $Sex,
                $ageApplicant,
                $Height,
                $bloodType,
                $civilStatus,
                $weight,
                $religion,
                $fatherStatus,
                $fatherName,
                $fatherAddress,
                $fatherOccupation,
                $fatherContactNumber,
                $fatherEducationalAttainment,
                $motherStatus,
                $motherName,
                $motherAddress,
                $motherOccupation,
                $motherContactNumber,
                $motherEducationalAttainment,
                $income,
                $siblingName,
                $siblingAge,
                $siblingEducationalAttainment,
                $siblingSchool,
                $siblingIncome,
                $siblingStatus,
                $spouseName,
                $spouseStatus,
                $spouseAddress,
                $spouseContactNo,
                $spouseOccupation,
                $spouseEmployer,
                $spouseEmployerAddress,
                $spouseOccupationLocation,
                $childrenName,
                $childrenSex,
                $childrenAge,
                $childrenBirthDate,
                $childrenBirthPlace,
                $childrenEducationalAttainment,
                $studentOccupation,
                $studentEmployer,
                $studentEmployerAddress,
                $studentOccupationLocation,
                $guardianName,
                $guardianRelation,
                $guardianAddress,
                $guardianZipCode,
                $guardianTelNo,
                $guardianMobileNo,
                $guardianEmailAddress,
                $elementaryName,
                $elementaryType,
                $elementaryAward,
                $elementaryAddress,
                $elementaryRegion,
                $elementaryGraduated,
                $secondaryName,
                $secondaryType,
                $secondaryAward,
                $secondaryAddress,
                $secondaryRegion,
                $secondaryGraduated,
                $collegeName,
                $collegeType,
                $collegeAward,
                $collegeAddress,
                $collegeRegion,
                $collegeGraduated,
                $vocationalName,
                $vocationalType,
                $vocationalAward,
                $vocationalAddress,
                $vocationalRegion,
                $vocationalGraduated,
                $discontinuanceOfStudy,
                $discontinuanceOfStudyReason,
                $academicProblemFail,
                $academicProblemFailReason,
                $academicProblemRepeat,
                $academicProblemRepeatReason,
                $disciplinaryRecord,
                $disciplinaryRecordReason,
                $date_today,
                $prefferedPrograms,
                $transferee,
                $enrolledCourse,
                $getGender,
                $getregionApplicant,
                $guardianName2,
                $guardianRelation2,
                $guardianAddress2,
                $guardianTelNo2,
                $guardianMobileNo2,
                $guardianEmailaddress2,
                $learnersData,
                $gwAverage,
                $reasonEntryTCC,
                $shsTrack,
                $shsTrackStrand,
                $reasonEntryTCCOther,
                $knowAboutCollege,
                $knowAboutCollegeOther,
                $otherReligion,
                $nextId
            );
            echo "success";
        } catch (Exception $e) {
            echo "<pre>";
            echo $e;
            echo "</pre>error";
        }
    // if(){
    //     echo "success";
    // }else{
    //     echo "error";
    // }
}
?>