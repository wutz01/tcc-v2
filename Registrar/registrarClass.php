<?php
include_once '../Database/database.php';
require '../PHPMailer-master/PHPMailerAutoload.php';
class Registrar
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
    
    function sendMail($emailAddress, $subject, $body)
    {
        
        $mail = new PHPMailer;
        
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'lampofficetest@gmail.com'; // SMTP username
        $mail->Password   = 'dlsl1234'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        
        $mail->setFrom('Admin@tcc.edu.ph', 'TCC');
        $mail->addAddress($emailAddress); // Name is optional
        $mail->addReplyTo('Admin@tcc.edu.ph', 'TCC - Admin');
        
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

    function readAllApplicants($page){

        if($page == "submissionOfRequirements"){
            $dynamicQuery = " WHERE checklist.fld_examResult <> 'not done' AND checklist.fld_submissionOfRequirements = 'not done'";
        }else{
            $dynamicQuery = "";
        }

        $query = "SELECT DISTINCT applicant.fld_applicantID, applicant.fld_applicationDate, applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_homeAddress, applicant.fld_transferee, checklist.fld_status, checklist.fld_applicationForm, checklist.fld_submissionOfRequirements, checklist.fld_examResult
                  FROM tbl_applicant as applicant
                  JOIN tbl_applicantchecklist as checklist on (checklist.fld_applicantID = applicant.fld_applicantID)".$dynamicQuery;
                      
        $stmt = $this->importConn->prepare( $query );
        $stmt->execute();

        return $stmt;      
    }



    function readApplicantName($applicantID){
        
        $Status="";
        $prospectusStatus = 'Active';
        $getName = array();

        $query = "SELECT applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_recommendedProgram, applicant.fld_transferee, applicant.fld_working, prospectus.fld_prospectusName, prospectus.fld_maxUnits, connection.fld_studentNo, student.fld_yearLevel
                  FROM tbl_applicant as applicant
                  INNER JOIN tbl_prospectus as prospectus ON prospectus.fld_programID = applicant.fld_recommendedProgram
                  INNER JOIN tbl_connection as connection ON connection.fld_applicantID = applicant.fld_applicantID
                  INNER JOIN tbl_student as student ON student.fld_studentNo = connection.fld_studentNo
                  WHERE applicant.fld_applicantID = ? AND prospectus.fld_status = ? AND prospectus.fld_year = student.fld_yearLevel";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $prospectusStatus);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            
            if($fld_working == "Yes" || $fld_transferee == "Yes"){
                $Status="Irregular";
            }else{
                $Status="Regular";
            }

            $getName[0] = $fld_lastName.", ".$fld_firstName." ".$fld_middleName." (".$Status.")";
            $getName[1] = $fld_recommendedProgram;     
            $getName[2] = $Status;     
            $getName[3] = $fld_prospectusName; 
            $getName[4] = $fld_studentNo;
            $getName[5] = $fld_yearLevel;
            $getName[6] = $fld_maxUnits;
        }else{
            $query = "SELECT applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_recommendedProgram, applicant.fld_transferee, applicant.fld_yearLevel, applicant.fld_working, prospectus.fld_prospectusName, prospectus.fld_maxUnits
                  FROM tbl_applicant as applicant
                  INNER JOIN tbl_prospectus as prospectus ON prospectus.fld_programID = applicant.fld_recommendedProgram
                  WHERE applicant.fld_applicantID = ? AND prospectus.fld_status = ? AND prospectus.fld_year = applicant.fld_yearLevel";
                      
            $stmt = $this->importConn->prepare( $query );
                
            // bind parameters
            $stmt->bindParam(1, $applicantID);
            $stmt->bindParam(2, $prospectusStatus);
            $stmt->execute(); 

            if($stmt->rowCount() > 0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                extract($row);
                    
                if($fld_working == "Yes" || $fld_transferee == "Yes"){
                    $Status="Irregular";
                }else{
                    $Status="Regular";
                }

                $getName[0] = $fld_lastName.", ".$fld_firstName." ".$fld_middleName." (".$Status.")";
                $getName[1] = $fld_recommendedProgram;     
                $getName[2] = $Status;     
                $getName[3] = $fld_prospectusName; 
                $getName[4] = "n/a";
                $getName[5] = $fld_yearLevel;
                $getName[6] = $fld_maxUnits;
                $getName[7] = $fld_transferee;
            }else{
                $query = "SELECT applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_recommendedProgram, applicant.fld_transferee, applicant.fld_yearLevel, applicant.fld_working
                  FROM tbl_applicant as applicant
                  WHERE applicant.fld_applicantID = ?";
                      
                $stmt = $this->importConn->prepare( $query );
                    
                // bind parameters
                $stmt->bindParam(1, $applicantID);
                $stmt->execute();    

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                extract($row);
                    
                if($fld_working == "Yes" || $fld_transferee == "Yes"){
                    $Status="Irregular";
                }else{
                    $Status="Regular";
                }

                $getName[0] = $fld_lastName.", ".$fld_firstName." ".$fld_middleName." (".$Status.")";
                $getName[1] = $fld_recommendedProgram;     
                $getName[2] = $Status;  
                $getName[4] = "n/a";
                $getName[5] = $fld_yearLevel;
                $getName[7] = $fld_transferee;     
            }

        }
        return $getName;
    }

    function readSubDescription($subjectID){
        $query = "SELECT fld_description
                  FROM tbl_subject
                  WHERE fld_subjectID = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $subjectID);
            
        $stmt->execute();
            
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
                   
        return $fld_description;
    }

    function readProspectus(){
        $query = "SELECT fld_subCode, fld_subjectID
                  FROM tbl_subject";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $subCode);
            
        $stmt->execute();
                   
        return $stmt;
    }

    function creditSubjects($applicantID, $subCode, $subjectDescription, $units, $grades, $subjectID){
        
        //write query
        $query = "INSERT INTO tbl_creditedsubjects 
        SET 
        fld_applicantID = ?, 
        fld_coursecode = ?, 
        fld_coursedescription = ?,
        fld_units = ?, 
        fld_grades = ?, 
        fld_subjectID = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $subCode);
        $stmt->bindParam(3, $subjectDescription);
        $stmt->bindParam(4, $units);
        $stmt->bindParam(5, $grades);
        $stmt->bindParam(6, $subjectID);
        
        if (!$stmt->execute()) {
            return false;
        }       

        return true;
        
    }

    function changeSubmissionStatus($applicantID, $status, $listOfRequirements){      
        
        //write query
        $query = "INSERT INTO tbl_requirements 
        SET 
        fld_applicantID = ?, 
        fld_listOfRequirements = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $listOfRequirements);
        
        if (!$stmt->execute()) {
            return false;
        }  

        $query = "UPDATE tbl_applicantchecklist 
                  SET fld_submissionOfRequirements = ?
                  WHERE fld_applicantID = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $applicantID);
        
        if (!$stmt->execute()) {
            return false;
        } 

        $query = "SELECT fld_emailAddress
                  FROM tbl_applicant
                  WHERE fld_applicantID = ?";

        $stmt  = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $applicantID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $emailAddress = $fld_emailAddress;

        $subject = "Submission Of Requirements";
        $body =
            "Dear Applicant,<br><br>
            Good Day!<br><br>
            You are now one step closer to be part of Tanauan City Colleges.<br>
            You have submitted the following requirements:<br>";

        $lst = explode(",", $listOfRequirements);

        foreach($lst as $item) {
            $body .= "- $item <br>";
        }

        $body .= "
            You may now complete the requirements you have not yet submitted.<br><br>
            Thank you.<br><br><br>
            Best Regards,<br>
            ______________________________________________________________<br><br>
            Thank you. This is an automated response. PLEASE DO NOT REPLY.";


        if (!$this->sendMail($emailAddress, $subject, $body)) {
            return false;
        }

        return true;
        
    }
  
    function autoFillSubjects($studentNumber, $programID, $startsy, $endsy, $semester){

        $query = "SELECT * 
                  FROM tbl_prospectus 
                  WHERE fld_programID = ? AND fld_status = 'Active' AND fld_year = '1st' AND fld_semester ='First'";

        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $programID);

        $stmt->execute();
        $list = array();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $subjectList = $fld_subjlist;
        $list = explode(",", $subjectList);

        foreach($list as $subjID){
          
        $stmt2 = $this->importConn->query('SELECT tbl_availablecourse.fld_availableCourseID, tbl_availablecourse.fld_subjectID, tbl_availablecourse.fld_startTime, tbl_availablecourse.fld_endTime, tbl_availablecourse.fld_day, tbl_subject.fld_units, tbl_subject.fld_description, tbl_subject.fld_subCode, tbl_section.fld_sectionName
                                            FROM tbl_availablecourse
                                            INNER JOIN tbl_subject ON tbl_subject.fld_subjectID = tbl_availablecourse.fld_subjectID
                                            INNER JOIN tbl_section ON tbl_section.fld_sectionID = tbl_availablecourse.fld_sectionID
                                            WHERE tbl_subject.fld_subjectID =  '.$subjID.'' );

            $stmt2->execute();
            if($stmt2->rowCount() > 0){
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                extract($row2);
                $this->addSubject($studentNumber, $fld_availableCourseID, $startsy, $endsy, $semester);
            }
        }
        return true;

    }

    function addSubject($studentNumber, $getSubjectID, $startsy, $endsy, $semester){
        
        //write query
        $query = "INSERT INTO tbl_enrolledsubjects 
        SET 
        fld_studentNo = ?, 
        fld_subjectID = ?, 
        fld_startSY = ?,
        fld_endSY = ?, 
        fld_semester = ?";
            
        $stmt = $this->importConn->prepare($query);

        // bind values
        $stmt->bindParam(1, $studentNumber);
        $stmt->bindParam(2, $getSubjectID);
        $stmt->bindParam(3, $startsy);
        $stmt->bindParam(4, $endsy);
        $stmt->bindParam(5, $semester);
            
        if (!$stmt->execute()) {
            return false;
        }    
        return true;    
    }

    private function updateUserAccount($applicantID, $username, $fld_studentNo, $accesstype)
    {
        $query = "UPDATE tbl_users
        SET staffId = ?,
        accessType = ?
        WHERE staffId = ? AND accessType = 'Applicant'";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $fld_studentNo);
        $stmt->bindParam(2, $accesstype);
        $stmt->bindParam(3, $applicantID);
        
        if(!$stmt->execute())
        {
            return false;
        }

        return true;
    }

    function createUserAccount($username,$applicantID,$accesstype)
    {
        $cost       = 10;
        $pass       = "1234";
        $enc        = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt       = sprintf("$2a$%02d$", $cost) . $enc;
        $password   = md5($pass.$salt);
        $query      = "INSERT INTO tbl_users 
                        SET 
                        Username = ?, 
                        passwordPlain = ?,
                        passwordSalt = ?,
                        staffId = ?,
                        accessType = ?";

        $stmt       = $this->importConn->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->bindParam(3,$salt);
        $stmt->bindParam(4,$applicantID);
        $stmt->bindParam(5,$accesstype);
        
        if(!$stmt->execute()){
            return false;
        }

        return true;
    }

     function readApplicantDetails($applicantID){
        $query = "SELECT DISTINCT applicant.fld_applicantID, applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_homeAddress, applicant.fld_transferee, applicant.fld_yearLevel, applicant.fld_working, applicant.fld_mobilePhoneNo, applicant.fld_guardianName, applicant.fld_sex, program.fld_programCode, checklist.fld_status, checklist.fld_applicationForm, checklist.fld_submissionOfRequirements, checklist.fld_examResult
                  FROM tbl_applicant as applicant
                  JOIN tbl_applicantchecklist as checklist on (checklist.fld_applicantID = applicant.fld_applicantID)
                  JOIN tbl_program as program on (program.fld_programID = applicant.fld_recommendedProgram)
                  WHERE applicant.fld_applicantID = ?";
                      
        $stmt = $this->importConn->prepare( $query );
        $stmt->bindParam(1, $applicantID);
        $stmt->execute();

        return $stmt;      
    }

function readSubjectList($getStudentNo){

        $query = "SELECT *
                  FROM tbl_enrolledsubjects
                  WHERE fld_studentNo = ?";
                      
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $getStudentNo);

        $stmt->execute();
        return $stmt;
}
        
public function readAllSubjectListByStaffID($staffid)
    {
        $query = "SELECT course.fld_sectionID, course.fld_subjectID, subject.fld_subCode, section.fld_sectionName, course.fld_availableCourseID
        FROM tbl_availablecourse as course
        INNER JOIN tbl_subject as subject ON subject.fld_subjectID = course.fld_subjectID
        INNER JOIN tbl_section as section ON section.fld_sectionID = course.fld_sectionID
        WHERE course.fld_staffId = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $staffid);

        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

function readSubjectDetails($subjID){

        $stmt = $this->importConn->query('SELECT tbl_availablecourse.fld_subjectID, tbl_availablecourse.fld_room, tbl_availablecourse.fld_startTime, tbl_availablecourse.fld_endTime, tbl_availablecourse.fld_day, tbl_subject.fld_units, tbl_subject.fld_lecHrs, tbl_subject.fld_labHrs, tbl_subject.fld_description, tbl_subject.fld_subCode, tbl_section.fld_sectionName
                                            FROM tbl_availablecourse
                                            INNER JOIN tbl_subject ON tbl_subject.fld_subjectID = tbl_availablecourse.fld_subjectID
                                            INNER JOIN tbl_section ON tbl_section.fld_sectionID = tbl_availablecourse.fld_sectionID
                                            WHERE tbl_availablecourse.fld_availableCourseID =  '.$subjID.'');

            
        $stmt->execute();

        return $stmt;
       
 
    }
 

    function readAllStudents(){

        $query = "SELECT DISTINCT fld_studentNo
                  FROM tbl_connection";
                      
        $stmt = $this->importConn->prepare( $query );
            
        $stmt->execute();
     
        return $stmt;
    }

    function readStudentNo($applicantID){

        $query = "SELECT fld_studentNo
                  FROM tbl_connection
                  WHERE fld_applicantID = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $applicantID);
            
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
        $getStudentNo = $fld_studentNo;      
        return $getStudentNo;
    }

    function readStudentDetails($studentNo){
        $query = "SELECT student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_yearLevel, student.fld_sex, student.fld_homeAddress, student.fld_guardianName, student.fld_mobilePhoneNo, fld_programCode
                  FROM tbl_student AS student
                  JOIN tbl_program as program ON (program.fld_programID = student.fld_program )
                  WHERE fld_studentNo = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $studentNo);
            
        $stmt->execute();

        return $stmt;
    }

    function readStudentName($studentNo){

        $getName = array();

        $query = "SELECT fld_firstName, fld_middleName, fld_lastName
                  FROM tbl_student
                  WHERE fld_studentNo = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $studentNo);
            
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $getName[0] = $fld_lastName.", ".$fld_firstName." ".$fld_middleName;
     
        return $getName;
    }

    function readSchoolFees(){

        $stmt = $this->importConn->query('SELECT fld_feeName, fld_price FROM tbl_schoolfees');

        $stmt->execute();

        return $stmt;
    }

    function printPef($applicantid){
        
        $query = "INSERT INTO tbl_connection(fld_applicantID,fld_studentNo)
        SELECT ?,CONCAT('TCC-',LPAD((MAX(fld_connectionID)+1),6,'0'),'-',YEAR(CURDATE())) FROM tbl_connection";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $applicantid);

        if(!$stmt->execute())
        {
            return false;
        }


        $query = "INSERT INTO tbl_student (fld_studentNo, fld_firstName, fld_middleName, fld_lastName, fld_sex, fld_homeAddress, fld_guardianName, fld_mobilePhoneNo, fld_yearLevel, fld_program, fld_section, fld_prospectusName, fld_status)
                      SELECT c.fld_studentNo, a.fld_firstName, a.fld_middleName, a.fld_lastName, a.fld_sex, a.fld_homeAddress, a.fld_guardianName, a.fld_mobilePhoneNo , '1st', p.fld_programID, '', p.fld_prospectusName, 'active' 
                      FROM tbl_connection as c
                      JOIN tbl_applicant as a on (a.fld_applicantID = c.fld_applicantID)
                      JOIN tbl_prospectus as p on (p.fld_programID = a.fld_recommendedProgram)
                      WHERE c.fld_applicantID = ?
                      LIMIT 1";

            $stmt = $this->importConn->prepare($query);

            // bind values
            $stmt->bindParam(1, $applicantid);
            
            if (!$stmt->execute()) {
                return false;
            }

            $query = "SELECT student.fld_studentNo, student.fld_lastName, student.fld_firstName 
                  FROM tbl_student as student
                  JOIN tbl_connection as connection on (connection.fld_studentNo = student.fld_studentNo)
                  WHERE connection.fld_applicantID = ?";

            $stmt = $this->importConn->prepare( $query );

            // bind values
            $stmt->bindParam(1, $applicantid);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            extract($row);

            $username   = strtolower(str_replace(' ', '', ($fld_lastName.".".$fld_firstName)));

            $accesstype = "Student";

            $this->updateUserAccount($applicantid, $username, $fld_studentNo, $accesstype);


            $stmt = $this->importConn->prepare($query);

            $stmt->bindParam(1, $fld_studentNo);

            $stmt->execute();

            $query = "UPDATE tbl_enrolledsubjects
            SET fld_studentNo = ?
            WHERE fld_studentNo = ?";

            $stmt = $this->importConn->prepare($query);

            $stmt->bindParam(1, $fld_studentNo);
            $stmt->bindParam(2, $applicantid);

            $stmt->execute();

            $this->checkGrade($fld_studentNo);


            return $fld_studentNo;
    }

    function checkGrade($fld_studentNo)
    {
        $query = "SELECT b.fld_subjectID
            FROM tbl_enrolledsubjects as a
            INNER JOIN tbl_availablecourse as b ON b.fld_availableCourseID = a.fld_subjectID
            WHERE a.fld_studentNo = ?";

            $stmt = $this->importConn->prepare($query);

            $stmt->bindParam(1, $fld_studentNo);

            $stmt->execute();

            while($row2 = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                extract($row2);
                $this->addGrade($fld_studentNo,$fld_subjectID);
            }
    }

    function addGrade($fld_studentNo,$fld_subjectID)
    {
        $query = "INSERT INTO tbl_grades (fld_studentNo,fld_subjectID)
                         SELECT * FROM (SELECT ?,?) AS tmp
                         WHERE NOT EXISTS (
                         SELECT * FROM tbl_grades WHERE fld_studentNo = ? AND fld_subjectID = ?)
                         LIMIT 1";

                $stmt = $this->importConn->prepare($query);

                $stmt->bindParam(1, $fld_studentNo);
                $stmt->bindParam(2, $fld_subjectID);
                $stmt->bindParam(3, $fld_studentNo);
                $stmt->bindParam(4, $fld_subjectID);

                $stmt->execute();
    }

    function addCompliance($studentNo){
        
        //write query
        $query = "INSERT INTO tbl_compliance 
        SET 
        fld_studentNo = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $studentNo);
        $stmt->execute();
        
    }

function populateSubmittedGrades()
    {
        $query = "SELECT DISTINCT esubject.fld_subjectID, acourse.fld_staffId, staff.firstName, staff.middleName, staff.lastName, esubject.fld_startSY, esubject.fld_endSY, esubject.fld_semester, subject.fld_subCode, section.fld_sectionName, grade.fld_midPosted, grade.fld_finalPosted
            FROM tbl_enrolledsubjects as esubject
            JOIN tbl_availablecourse as acourse ON acourse.fld_availableCourseID = esubject.fld_subjectID
            JOIN tbl_subject as subject ON subject.fld_subjectID = acourse.fld_subjectID
            JOIN tbl_section as section ON section.fld_sectionID = acourse.fld_sectionID
            JOIN tbl_staffs as staff ON staff.staffId = acourse.fld_staffId
            JOIN tbl_grades as grade ON grade.fld_studentNo = esubject.fld_studentNo AND grade.fld_subjectID = acourse.fld_subjectID";
                    
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        
        return $result;
    }

    function readStudentGrade($courseID)
    {
        $query = "SELECT student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_studentNo, grade.fld_midtermGrade, grade.fld_finalsGrade, grade.fld_semestralGrade, grade.fld_numericalGrade, grade.fld_remarks, grade.fld_gradeID, course.fld_subjectID 
            FROM tbl_enrolledsubjects as enrolled 
            INNER JOIN tbl_availablecourse as course ON course.fld_availableCourseID = enrolled.fld_subjectID 
            INNER JOIN tbl_student as student ON student.fld_studentNo = enrolled.fld_studentNo 
            LEFT JOIN tbl_grades as grade ON grade.fld_studentNo = enrolled.fld_studentNo AND grade.fld_subjectID = course.fld_subjectID 
            WHERE enrolled.fld_subjectID = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $courseID);

        $stmt->execute();
        

        return $stmt;
    }


    function readCourseDetails($courseID)
    {
        $query = "SELECT course.fld_subjectID, course.fld_day, course.fld_startTime, course.fld_endTime, subject.fld_units, subject.fld_subCode, subject.fld_description, section.fld_sectionName, course.fld_room, staff.firstName, staff.middleName, staff.lastName
        FROM tbl_availablecourse as course
        INNER JOIN tbl_subject as subject ON subject.fld_subjectID = course.fld_subjectID
        JOIN tbl_section as section ON (section.fld_sectionID = course.fld_sectionID)
        JOIN tbl_staffs as staff ON staff.staffId = course.fld_staffId
        WHERE course.fld_availableCourseID = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $courseID);

        $stmt->execute();
        

        return $stmt;
    }

    function readGradesEncodingStatus()
    {
        $query = "SELECT term, status FROM tbl_activatorgrades";
        $stmt  = $this->importConn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    function validatePassword($username, $Password){

        $query= "SELECT * FROM tbl_users 
                WHERE Username = ?";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row        = $stmt->fetch();
            $password   = $row['passwordPlain'];
            $salt       = $row['passwordSalt'];
            $encrypted  = md5($Password.$salt);

            if($password == $encrypted)
            {
                return true;
            }
        }
        
        return false;                  
        }

        function changeGrade($gradeID, $midTermGrade, $finTermGrade, $semGrade, $numericalGrade, $remarks){

            $query = "UPDATE tbl_grades
                    SET fld_midtermGrade = ?, 
                    fld_finalsGrade = ?, 
                    fld_semestralGrade = ?, 
                    fld_numericalGrade = ?, 
                    fld_remarks = ?
                    WHERE fld_gradeID = ?";
        
            $stmt = $this->importConn->prepare($query);
            
            // bind values
            $stmt->bindParam(1, $midTermGrade);
            $stmt->bindParam(2, $finTermGrade);
            $stmt->bindParam(3, $semGrade);
            $stmt->bindParam(4, $numericalGrade);
            $stmt->bindParam(5, $remarks);
            $stmt->bindParam(6, $gradeID);
            
            if (!$stmt->execute()) {
                return false;
            } 

            return true;

        }


        function readLastCtrlNo(){
        $query = "SELECT MAX(fld_controlNo)+1 as maxID from tbl_gradelog";
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $lastRowID = $maxID;
        
        if($lastRowID == NULL){
            $lastRowID = 1;
        }

        return $lastRowID;
    }


        function saveGradeLog($gradeID, $ctrlNo){
        //write query
        $query = "INSERT INTO tbl_gradelog 
        SET
        fld_gradeID = ?,
        fld_controlNo = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $gradeID);
        $stmt->bindParam(2, $ctrlNo);
        
        if (!$stmt->execute()) {
            return false;
        }       

        return true;
        
    }

    function readGradesLog()
    {
        $query = "SELECT student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_studentNo, grade.fld_midtermGrade, grade.fld_finalsGrade, grade.fld_semestralGrade, grade.fld_numericalGrade, grade.fld_remarks, grade.fld_gradeID, subject.fld_subCode, log.fld_controlNo, log.fld_datetime, staff.firstName, staff.middleName, staff.lastName
            FROM tbl_enrolledsubjects as enrolled 
            INNER JOIN tbl_availablecourse as course ON course.fld_availableCourseID = enrolled.fld_subjectID
            INNER JOIN tbl_subject as subject ON subject.fld_subjectID = course.fld_subjectID
            INNER JOIN tbl_staffs as staff ON staff.staffId = course.fld_staffId
            INNER JOIN tbl_student as student ON student.fld_studentNo = enrolled.fld_studentNo 
            LEFT JOIN tbl_grades as grade ON grade.fld_studentNo = enrolled.fld_studentNo AND grade.fld_subjectID = course.fld_subjectID
            JOIN tbl_gradelog as log ON log.fld_gradeID = grade.fld_gradeID ORDER BY log.fld_controlNo";

        $stmt = $this->importConn->prepare( $query );

        $stmt->execute();
        

        return $stmt;
    }

    public function populateInfo()
    {
        $query = "SELECT * FROM tbl_staffs as staff
                JOIN tbl_users as user ON (user.staffId = staff.staffId)
                WHERE user.accessType = 'Faculty'";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }


        function transferLoad($transferTo, $subject){

            $query = "UPDATE tbl_availablecourse
                    SET fld_staffId = ?
                    WHERE fld_availableCourseID = ?";
        
            $stmt = $this->importConn->prepare($query);
            
            // bind values
            $stmt->bindParam(1, $transferTo);
            $stmt->bindParam(2, $subject);
            
            if (!$stmt->execute()) {
                return false;
            } 

            return true;

        }
}
?>
