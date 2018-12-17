<?php
include_once '../Database/database.php';
require '../PHPMailer-master/PHPMailerAutoload.php';
class Applicant
{
    
    // database connection and table name
    private $conn;
    protected $importConn;
    
    
    public function __construct()
    {
        $database         = new Database();
        $this->conn       = $database->getConnection();
        $this->importConn = $database->getConnection();
    }
    
    public function __destruct()
    {
        $this->conn       = null;
        $this->importConn = null;
    }
    
// $endorsement = self::orderBy('id','desc')->first();
// $nextId = ($endorsement ? (int) $endorsement->id + 1 : 1);
// return $endorsementNumber = "WBI-E" . str_pad($nextId, 5, "0",STR_PAD_LEFT);
    
    function sendMail($emailAddress, $subject, $body)
    {
        
        $mail = new PHPMailer;
        
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'mail.tanauancitycollege.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'admin@tanauancitycollege.com'; // SMTP username
        $mail->Password   = 'DoUoIYotiQvk4'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 25; // TCP port to connect to
        
        $mail->setFrom('tanauancitycoll@gmail.com', 'TCC');
        $mail->addAddress($emailAddress); // Name is optional
        $mail->addReplyTo('tanauancitycoll@gmail.com', 'TCC - Admin');
        
        $mail->isHTML(true); // Set email format to HTML
        
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
        
    }
    function addApplicant(
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
            ){
        //write query
        $query = "INSERT INTO tbl_applicant 
        SET 
        
        fld_firstName = ?, 
        fld_middleName = ?, 
        fld_lastName  = ?, 
        fld_homeAddress  = ?,
        fld_emailAddress  = ?,
        fld_birthPlace = ?, 
        fld_birthDate = ?,
        fld_mobilePhoneNo  = ?, 
        fld_telNo = ?, 
        fld_sex = ?, 
        fld_ageApplicant = ?,
        fld_height = ?,
        fld_bloodType = ?,
        fld_civilStatus = ?,
        fld_weight = ?,
        fld_religion = ?,
        fld_fatherStatus = ?,
        fld_fatherName = ?,
        fld_fatherAddress = ?,
        fld_fatherOccupation = ?,
        fld_fatherContactNumber = ?,
        fld_fatherEducationalAttainment = ?,
        fld_motherStatus = ?,
        fld_motherName = ?,
        fld_motherAddress = ?,
        fld_motherOccupation = ?,
        fld_motherContactNumber = ?,
        fld_motherEducationalAttainment = ?,
        fld_income = ?,
        fld_siblingName = ?,
        fld_siblingAge = ?,
        fld_siblingEducationalAttainment = ?,
        fld_siblingSchool = ?,
        fld_siblingIncome = ?,
        fld_siblingStatus = ?,
        fld_spouseName = ?,
        fld_spouseStatus = ?,
        fld_spouseAddress = ?,
        fld_spouseContactNo = ?,
        fld_spouseOccupation = ?,
        fld_spouseEmployer = ?,
        fld_spouseEmployerAddress = ?,
        fld_spouseOccupationLocation = ?,
        fld_childrenName = ?,
        fld_childrenSex = ?,
        fld_childrenAge = ?,
        fld_childrenBirthDate = ?,
        fld_childrenBirthPlace = ?,
        fld_childrenEducationalAttainment = ?,
        fld_studentOccupation = ?,
        fld_studentEmployer = ?,
        fld_studentEmployerAddress = ?,
        fld_studentOccupationLocation = ?,
        fld_guardianName = ?,
        fld_guardianRelation = ?,
        fld_guardianAddress = ?,
        fld_guardianZipCode = ?,
        fld_guardianTelNo = ?,
        fld_guardianMobileNo = ?,
        fld_guardianEmailAddress = ?,
        fld_elementaryName = ?,
        fld_elementaryType = ?,
        fld_elementaryAward = ?,
        fld_elementaryAddress = ?,
        fld_elementaryRegion = ?,
        fld_elementaryGraduated = ?,
        fld_secondaryName = ?,
        fld_secondaryType = ?,
        fld_secondaryAward = ?,
        fld_secondaryAddress = ?,
        fld_secondaryRegion = ?,
        fld_secondaryGraduated = ?,
        fld_collegeName = ?,
        fld_collegeType = ?,
        fld_collegeAward = ?,
        fld_collegeAddress = ?,
        fld_collegeRegion = ?,
        fld_collegeGraduated = ?,
        fld_vocationalName = ?,
        fld_vocationalType = ?,
        fld_vocationalAward = ?,
        fld_vocationalAddress = ?,
        fld_vocationalRegion = ?,
        fld_vocationalGraduated = ?,
        fld_discontinuanceOfStudy = ?,
        fld_discontinuanceOfStudyReason = ?,
        fld_academicProblemFail = ?,
        fld_academicProblemFailReason = ?,
        fld_academicProblemRepeat = ?,
        fld_academicProblemRepeatReason = ?,
        fld_disciplinaryRecord = ?,
        fld_disciplinaryRecordReason = ?,
        fld_applicationDate = ?,
        fld_prefferedPrograms = ?,
        fld_transferee = ?,
        fld_enrolledCourse = ?,
        fld_gender = ?,
        fld_regionApplicant = ?,
        fld_guardianName2 = ?,
        fld_guardianRelation2 = ?,
        fld_guardianAddress2 = ?,
        fld_guardianTelNo2 = ?,
        fld_guardianMobileNo2 = ?,
        fld_guardianEmailaddress2 = ?,
        fld_learnersData = ?,
        fld_gwAverage = ?,
        fld_reasonEntryTCC = ?,
        fld_shsTrack = ?,
        fld_shsTrackStrand = ?,
        fld_reasonEntryTCCOther = ?,
        fld_knowAboutCollege = ?,
        fld_knowAboutCollegeOther = ?,
        fld_otherReligion = ?,
        fld_statusApplicant = 0,
        fld_applicantGeneratedID = ?
        ";

        $stmt = $this->importConn->prepare($query);
        $dateToday = date("Y-m-d");

        // bind values
        $stmt->bindParam(1, $firstName);
        $stmt->bindParam(2, $middleName);
        $stmt->bindParam(3, $lastName);
        $stmt->bindParam(4, $homeAddress);
        $stmt->bindParam(5, $emailAddress);
        $stmt->bindParam(6, $birthPlace);
        $stmt->bindParam(7, $birthDate);
        $stmt->bindParam(8, $mobilePhoneNo);
        $stmt->bindParam(9, $telNo);
        $stmt->bindParam(10, $Sex);
        $stmt->bindParam(11, $ageApplicant);
        $stmt->bindParam(12, $Height);
        $stmt->bindParam(13, $bloodType);
        $stmt->bindParam(14, $civilStatus);
        $stmt->bindParam(15, $weight);
        $stmt->bindParam(16, $religion);
        $stmt->bindParam(17, $fatherStatus);
        $stmt->bindParam(18, $fatherName);
        $stmt->bindParam(19, $fatherAddress);
        $stmt->bindParam(20, $fatherOccupation);
        $stmt->bindParam(21, $fatherContactNumber);
        $stmt->bindParam(22, $fatherEducationalAttainment);
        $stmt->bindParam(23, $motherStatus);
        $stmt->bindParam(24, $motherName);
        $stmt->bindParam(25, $motherAddress);
        $stmt->bindParam(26, $motherOccupation);
        $stmt->bindParam(27, $motherContactNumber);
        $stmt->bindParam(28, $motherEducationalAttainment);
        $stmt->bindParam(29, $income);
        $stmt->bindParam(30, $siblingName);
        $stmt->bindParam(31, $siblingAge);
        $stmt->bindParam(32, $siblingEducationalAttainment);
        $stmt->bindParam(33, $siblingSchool);
        $stmt->bindParam(34, $siblingIncome);
        $stmt->bindParam(35, $siblingStatus);
        $stmt->bindParam(36, $spouseName);
        $stmt->bindParam(37, $spouseStatus);
        $stmt->bindParam(38, $spouseAddress);
        $stmt->bindParam(39, $spouseContactNo);
        $stmt->bindParam(40, $spouseOccupation);
        $stmt->bindParam(41, $spouseEmployer);
        $stmt->bindParam(42, $spouseEmployerAddress);
        $stmt->bindParam(43, $spouseOccupationLocation);
        $stmt->bindParam(44, $childrenName);
        $stmt->bindParam(45, $childrenSex);
        $stmt->bindParam(46, $childrenAge);
        $stmt->bindParam(47, $childrenBirthDate);
        $stmt->bindParam(48, $childrenBirthPlace);
        $stmt->bindParam(49, $childrenEducationalAttainment);
        $stmt->bindParam(50, $studentOccupation);
        $stmt->bindParam(51, $studentEmployer);
        $stmt->bindParam(52, $studentEmployerAddress);
        $stmt->bindParam(53, $studentOccupationLocation);
        $stmt->bindParam(54, $guardianName);
        $stmt->bindParam(55, $guardianRelation);
        $stmt->bindParam(56, $guardianAddress);
        $stmt->bindParam(57, $guardianZipCode);
        $stmt->bindParam(58, $guardianTelNo);
        $stmt->bindParam(59, $guardianMobileNo);
        $stmt->bindParam(60, $guardianEmailAddress);
        $stmt->bindParam(61, $elementaryName);
        $stmt->bindParam(62, $elementaryType);
        $stmt->bindParam(63, $elementaryAward);
        $stmt->bindParam(64, $elementaryAddress);
        $stmt->bindParam(65, $elementaryRegion);
        $stmt->bindParam(66, $elementaryGraduated);
        $stmt->bindParam(67, $secondaryName);
        $stmt->bindParam(68, $secondaryType);
        $stmt->bindParam(69, $secondaryAward);
        $stmt->bindParam(70, $secondaryAddress);
        $stmt->bindParam(71, $secondaryRegion);
        $stmt->bindParam(72, $secondaryGraduated);
        $stmt->bindParam(73, $collegeName);
        $stmt->bindParam(74, $collegeType);
        $stmt->bindParam(75, $collegeAward);
        $stmt->bindParam(76, $collegeAddress);
        $stmt->bindParam(77, $collegeRegion);
        $stmt->bindParam(78, $collegeGraduated);
        $stmt->bindParam(79, $vocationalName);
        $stmt->bindParam(80, $vocationalType);
        $stmt->bindParam(81, $vocationalAward);
        $stmt->bindParam(82, $vocationalAddress);
        $stmt->bindParam(83, $vocationalRegion);
        $stmt->bindParam(84, $vocationalGraduated);
        $stmt->bindParam(85, $discontinuanceOfStudy);
        $stmt->bindParam(86, $discontinuanceOfStudyReason);
        $stmt->bindParam(87, $academicProblemFail);
        $stmt->bindParam(88, $academicProblemFailReason);
        $stmt->bindParam(89, $academicProblemRepeat);
        $stmt->bindParam(90, $academicProblemRepeatReason);
        $stmt->bindParam(91, $disciplinaryRecord);
        $stmt->bindParam(92, $disciplinaryRecordReason);
        $stmt->bindParam(93, $dateToday);
        $stmt->bindParam(94, $prefferedPrograms);
        $stmt->bindParam(95, $transferee);
        $stmt->bindParam(96, $enrolledCourse);
        $stmt->bindParam(97, $getGender);
        $stmt->bindParam(98, $getregionApplicant);
        $stmt->bindParam(99, $guardianName2);
        $stmt->bindParam(100, $guardianRelation2);
        $stmt->bindParam(101, $guardianAddress2);
        $stmt->bindParam(102, $guardianTelNo2);
        $stmt->bindParam(103, $guardianMobileNo2);
        $stmt->bindParam(104, $guardianEmailaddress2);
        $stmt->bindParam(105, $learnersData);
        $stmt->bindParam(106, $gwAverage);
        $stmt->bindParam(107, $reasonEntryTCC);
        $stmt->bindParam(108, $shsTrack);
        $stmt->bindParam(109, $shsTrackStrand);
        $stmt->bindParam(110, $reasonEntryTCCOther);
        $stmt->bindParam(111, $knowAboutCollege);
        $stmt->bindParam(112, $knowAboutCollegeOther);
        $stmt->bindParam(113, $otherReligion);
        $stmt->bindParam(114, $nextId);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo "<pre>";
            echo $e;
            die();
        }

        // if (!$stmt->execute()) {
        //     return false;
        // }       

        $query = "INSERT INTO tbl_applicantchecklist (fld_applicantID, fld_applicationForm, fld_submissionOfRequirements, fld_examResult, fld_interviewResultVPAA, fld_interviewResultGuidance, fld_status)
                SELECT tbl_applicant.fld_applicantID, ?, ?, ?, ?, ?, ? FROM tbl_applicant ORDER BY fld_applicantID DESC LIMIT 0, 1";
        
        $stmt = $this->importConn->prepare($query);
        
        $applicationForm            = "done";
        $submissionOfRequirements   = "not done";
        $examResult                 = "not done";
        $interviewResultVPAA        = "not done";
        $interviewResultGuidance    = "not done";
        $status                     = "Pending";
        
        // bind values
        $stmt->bindParam(1, $applicationForm);
        $stmt->bindParam(2, $submissionOfRequirements);
        $stmt->bindParam(3, $examResult);
        $stmt->bindParam(4, $interviewResultVPAA);
        $stmt->bindParam(5, $interviewResultGuidance);
        $stmt->bindParam(6, $status);
        
        if (!$stmt->execute()) {
            return false;
        }

        $subject = "Application";
        $body =
            "Dear Applicant,<br><br>
            Good Day!<br><br>
            You are now one step closer to be part of Tanauan City College.<br>
            You may now complete your application by proceeding to the Admissions Office for the list of requirements.<br><br>
            Thank you.<br><br><br>
            Best Regards,<br>
            ______________________________________________________________<br><br>
            Thank you. This is an automated response. PLEASE DO NOT REPLY.";

        if (!$this->sendMail($emailAddress, $subject, $body)) {
            return false;
        }
        
        return true;
        
    }

    public function readAllPrograms()
    {
        $query = "SELECT fld_programID, fld_programName
                  FROM tbl_program";

        $stmt       = $this->importConn->prepare($query);
        
        $stmt->execute();

        return $stmt;
    }
    public function getLastId() {
        
        $query = "SELECT fld_applicantID FROM tbl_applicant ORDER BY fld_applicantID DESC LIMIT 1";
        $stmt = $this->conn->query($query);
        $res = $stmt->fetch();
        $nextId = ($res ? (int) $res['fld_applicantID'] + 1 : 1);
        $applicantNumber = "APPL-" . str_pad($nextId, 5, "0",STR_PAD_LEFT);
        return $applicantNumber;
    }
}
?>