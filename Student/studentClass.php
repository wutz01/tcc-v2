<?php
include_once '../Database/database.php';
class Student
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

    public function getsubjectList($ProgramID)
    {
        $query = "SELECT * 
                  FROM tbl_prospectus as prosepectus
                  WHERE prosepectus.fld_prospectusName = ? AND prosepectus.fld_status = 'Active'";

        $stmt = $this->importConn->prepare($query);
            
        // bind values
        $stmt->bindParam(1, $ProgramID);

        $stmt->execute();
        $list = array();
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);

        $subjectList='';
        foreach($row as $record){

            if($record['fld_subjlist'] != ''){
                if($subjectList == ''){
                    $subjectList .= $record['fld_subjlist'];                    
                }else{
                    $subjectList .= ','.$record['fld_subjlist'];                       
                }
            }
        }
        $list = explode(",", $subjectList); 
      
        $list2 = array();
        foreach($list as $subjID){

            $stmt2 = $this->importConn->query("SELECT tbl_availablecourse.fld_availableCourseID, tbl_availablecourse.fld_subjectID,tbl_availablecourse.fld_startTime, tbl_availablecourse.fld_endTime,tbl_availablecourse.fld_day,
                                                      tbl_subject.fld_units,tbl_subject.fld_description,tbl_subject.fld_subCode,
                                                      tbl_section.fld_sectionName
                                               FROM tbl_availablecourse
                                               INNER JOIN tbl_subject ON tbl_subject.fld_subjectID = tbl_availablecourse.fld_subjectID
                                               INNER JOIN tbl_section ON tbl_section.fld_sectionID = tbl_availablecourse.fld_sectionID
                                               WHERE tbl_subject.fld_subjectID = '$subjID' AND NOT EXISTS
                                              (SELECT fld_subjectID FROM tbl_creditedsubjects 
                                              WHERE tbl_creditedsubjects.fld_subjectID = '$subjID')");
            // bind values
            // $stmt2->bindParam(1, $subjID);
         
            $stmt2->execute();
            if($stmt2->rowCount() > 0){
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                array_push($list2, $row2);
            }
        }
  
        return $list2;
    }

    public function getSubject($studentnumber,$startSY,$endSY,$semester)
    {
        $query = "SELECT * 
                  FROM tbl_enrolledsubjects as enrolled
                  WHERE enrolled.fld_studentNo = ? 
                  AND enrolled.fld_startSY = ?
                  AND enrolled.fld_endSY = ?
                  AND enrolled.fld_semester = ?";

        $stmt = $this->importConn->prepare($query);
            

        // bind values
        $stmt->bindParam(1, $studentnumber);
        $stmt->bindParam(2, $startSY);
        $stmt->bindParam(3, $endSY);
        $stmt->bindParam(4, $semester);

        $stmt->execute();
        $list = array();
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);

        $subjectList='';
        foreach($row as $record){

            if($record['fld_subjectID'] != ''){
                if($subjectList == ''){
                    $subjectList .= $record['fld_subjectID'];                    
                }else{
                    $subjectList .= ','.$record['fld_subjectID'];                       
                }
            }
        }
        $list = explode(",", $subjectList); 
      
        $list2 = array();
        foreach($list as $subjID){

            $stmt2 = $this->importConn->query("SELECT tbl_availablecourse.fld_availableCourseID, tbl_availablecourse.fld_subjectID,tbl_availablecourse.fld_startTime, tbl_availablecourse.fld_endTime,tbl_availablecourse.fld_day,
                                                      tbl_subject.fld_units,tbl_subject.fld_description,tbl_subject.fld_subCode,
                                                      tbl_section.fld_sectionName
                                               FROM tbl_availablecourse
                                               INNER JOIN tbl_subject ON tbl_subject.fld_subjectID = tbl_availablecourse.fld_subjectID
                                               INNER JOIN tbl_section ON tbl_section.fld_sectionID = tbl_availablecourse.fld_sectionID
                                               WHERE tbl_availablecourse.fld_availableCourseID = '$subjID' ");
            // bind values
            // $stmt2->bindParam(1, $subjID);
         
            $stmt2->execute();
            if($stmt2->rowCount() > 0){
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                array_push($list2, $row2);
            }
        }
  
        return $list2;
    }

    public function getUnits($yearlevel,$programid)
    {
        $query = "SELECT * FROM tbl_prospectus
        WHERE fld_prospectusName = ? AND fld_status = ? AND fld_year = ?";

        $stmt = $this->importConn->prepare($query);

        $stat = "Active";
        $stmt->bindParam(1, $programid);
        $stmt->bindParam(2 , $stat);
        $stmt->bindParam(3, $yearlevel);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        return $row->fld_maxUnits;

    }

    public function screenSubject($courseid,$studentnumber,$startSY,$endSY,$semester,$programid,$yearlevel)
    {
        $query     = "SELECT * FROM tbl_availablecourse
        WHERE fld_availableCourseID = ?";

        $stmt      = $this->importConn->prepare($query);
        $stmt->bindParam(1, $courseid);
        $stmt->execute();

        $row       = $stmt->fetch(PDO::FETCH_OBJ);
        $subjectid = $row->fld_subjectID;

        $gradestatus = $this->gradeStatus($subjectid,$studentnumber);
        if($gradestatus != 1)
        {
            $prereqstatus = $this->checkPrerequisite($subjectid,$studentnumber);
            if($prereqstatus != 1)
            {
                return "You should pass the subject's prerequisite first before enrolling.";
            }else{
                $subjectexist = $this->checkExisting($courseid,$studentnumber);
                if($subjectexist != 1)
                {
                    $unitsexceed = $this->checkMaxunits($subjectid,$studentnumber,$startSY,$endSY,$semester,$programid,$yearlevel);
                    if($unitsexceed != 1)
                    {
                        return $this->addSubject($courseid,$studentnumber,$startSY,$endSY,$semester);
                    }else{
                        return "Maximum Units Exceeded";
                    }
                }else{
                    return "Subject already encoded.";
                }
                
            }
            
        }else{
            return "You already took this subject!";
        }

    }

    private function checkMaxunits($subjectid,$studentnumber,$startSY,$endSY,$semester,$programid,$yearlevel)
    {
        $query = "SELECT enroll.*, SUM(subject.fld_units) as totunits
        FROM tbl_enrolledsubjects as enroll
        INNER JOIN tbl_availablecourse as courses ON courses.fld_availableCourseID = enroll.fld_subjectID
        INNER JOIN tbl_subject as subject ON subject.fld_subjectID = courses.fld_subjectID 
        WHERE enroll.fld_studentNo = ? AND enroll.fld_startSY = ? AND enroll.fld_endSY = ? AND enroll.fld_semester = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $studentnumber);
        $stmt->bindParam(2, $startSY);
        $stmt->bindParam(3, $endSY);
        $stmt->bindParam(4, $semester);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxunits = $row['totunits'];

        $query = "SELECT * FROM tbl_subject
        WHERE fld_subjectID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $subjectid);
        $stmt->execute();

        $row2 = $stmt->fetch(PDO::FETCH_OBJ);

        $maxunits += $row2->fld_units;

        $query = "SELECT * FROM tbl_prospectus
        WHERE fld_prospectusName = ? AND fld_status = ? AND fld_year = ?";

        $stmt = $this->importConn->prepare($query);
        $stat = "Active";

        $stmt->bindParam(1, $programid);
        $stmt->bindParam(2, $stat);
        $stmt->bindParam(3, $yearlevel);

        $stmt->execute();
        $row3 = $stmt->fetch(PDO::FETCH_OBJ);
        if($row3->fld_maxUnits < $maxunits)
        {
            return true;
        }

        return false;

    }

    private function gradeStatus($subjectid,$studentnumber)
    {
        $fcg = 4;
        $query = "SELECT * FROM tbl_grades
        WHERE fld_subjectID = ? AND fld_studentNo = ? AND fld_finalcourseGrade < ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $subjectid);
        $stmt->bindParam(2, $studentnumber);
        $stmt->bindParam(3, $fcg);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return true;
        }else{
            return false;
        }

    }

    private function checkPrerequisite($subjectid,$studentnumber)
    {
        $query = "SELECT * FROM tbl_subject
        WHERE fld_subjectID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $subjectid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $prereqcode = $row->fld_preReq;
        if($prereqcode == 'None')
        {
            return true;
        }else{
            $prereqid = $this->getSubjectid($row->fld_preReq);
            return $this->gradestatus($prereqid,$studentnumber);
        }
    }

    private function checkExisting($courseid,$studentnumber)
    {
        $query = "SELECT * FROM tbl_enrolledsubjects
        WHERE fld_studentNo = ? AND fld_subjectID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $studentnumber);
        $stmt->bindParam(2, $courseid);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return true;
        }else{
            return false;
        }
    }

    private function getSubjectid($subjectcode)
    {
        $query = "SELECT * FROM tbl_subject
        WHERE fld_subCode = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $subjectcode);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        return $row->fld_subjectID;
    }

    private function updateUserAccount($applicantID, $username, $fld_studentNo, $accesstype)
    {
        $query = "UPDATE tbl_users
        SET staffId = ?,
        accessType = ?
        WHERE staffId = ? AND Username = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $fld_studentNo);
        $stmt->bindParam(2, $accesstype);
        $stmt->bindParam(3, $applicantID);
        $stmt->bindParam(4, $username);
        
        if(!$stmt->execute())
        {
            return false;
        }

        return true;
    }
    
    private function createUserAccount($username,$applicantID,$accesstype)
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

    function assignSection($applicantID, $yearlevel){

        $query = "SELECT section.fld_sectionID 
        FROM tbl_section as section 
        JOIN tbl_applicant as applicant on (applicant.fld_recommendedProgram = section.fld_programID) 
        WHERE applicant.fld_applicantID = ? AND section.fld_yearLevel = ? AND section.fld_maxNoOfStudents > 0
        LIMIT 1";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $yearlevel);
            
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
     
        return $fld_sectionID;
    }

    private function deductSectionCap($sectionID)
    {
        $query = "UPDATE tbl_section
        SET fld_maxNoOfStudents = fld_maxNoOfStudents - 1
        WHERE fld_sectionID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $sectionID);
        
        if(!$stmt->execute())
        {
            return false;
        }

        return true;
    }

    private function addSubject($courseid,$studentnumber,$startSY,$endSY,$semester)
    {
        $query = "INSERT INTO tbl_enrolledsubjects(fld_studentNo,fld_subjectID,fld_startSY,fld_endSY,fld_semester)
        VALUES(?,?,?,?,?)";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $studentnumber);
        $stmt->bindParam(2, $courseid);
        $stmt->bindParam(3, $startSY);
        $stmt->bindParam(4, $endSY);
        $stmt->bindParam(5, $semester);

        if($stmt->execute())
        {
            return $this->minusSlots($courseid);
        }else{
            return false;
        }
    }


    public function removeSubject($courseid,$studentnumber)
    {
        $query = "DELETE FROM tbl_enrolledsubjects
        WHERE fld_studentNo = ? AND fld_subjectID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $studentnumber);
        $stmt->bindParam(2, $courseid);
        if($stmt->execute())
        {
            return $this->addSlots($courseid);
        }else{
            return false;
        }

    }

    private function addSlots($courseid)
    {
        $query = "UPDATE tbl_availablecourse
        SET fld_availableSlots = fld_availableSlots + 1
        WHERE fld_availableCourseID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $courseid);
        if(!$stmt->execute())
        {
            return false;
        }

        return true;
    }

    private function minusSlots($courseid)
    {
        $query = "UPDATE tbl_availablecourse
        SET fld_availableSlots = fld_availableSlots - 1
        WHERE fld_availableCourseID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $courseid);
        if(!$stmt->execute())
        {
            return false;
        }

        return true;
    }


     function readStudentDetails($studentNo){
        $query = "SELECT DISTINCT student.fld_studentNo, student.fld_lastName, student.fld_firstName, student.fld_middleName, program.fld_programName, section.fld_sectionName
                  FROM tbl_student as student
                  JOIN tbl_program as program on (program.fld_programID = student.fld_program)
                  JOIN tbl_section as section on (section.fld_sectionID = student.fld_section)
                  WHERE student.fld_studentNo = ?";
                      
        $stmt = $this->importConn->prepare( $query );
        $stmt->bindParam(1, $studentNo);
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
        

function readSubjectDetails($subjID){

        $stmt = $this->importConn->query('SELECT tbl_availablecourse.fld_subjectID, tbl_availablecourse.fld_startTime, tbl_availablecourse.fld_endTime, tbl_availablecourse.fld_day, tbl_subject.fld_units, tbl_subject.fld_description, tbl_subject.fld_subCode, tbl_section.fld_sectionName
                                            FROM tbl_availablecourse
                                            INNER JOIN tbl_subject ON tbl_subject.fld_subjectID = tbl_availablecourse.fld_subjectID
                                            INNER JOIN tbl_section ON tbl_section.fld_sectionID = tbl_availablecourse.fld_sectionID
                                            WHERE tbl_availablecourse.fld_availableCourseID =  '.$subjID.'');

            
        $stmt->execute();

        return $stmt;
       
 
    }
    
function readMyGradesSY($studentNo){

        $query = "SELECT acourse.fld_subjectID, subject.fld_subCode, subject.fld_description, subject.fld_units, esubject.fld_startSY, esubject.fld_endSY, esubject.fld_semester
                    FROM tbl_enrolledsubjects AS esubject
                    JOIN tbl_availablecourse AS acourse ON (acourse.fld_availableCourseID = esubject.fld_subjectID)
                    JOIN tbl_subject AS subject ON (subject.fld_subjectID = acourse.fld_subjectID)
                 WHERE esubject.fld_studentNo = ?";

        $stmt  = $this->importConn->prepare($query);

        // bind values
        $stmt->bindParam(1, $studentNo);
        
        $stmt->execute();

        return $stmt;
    }

    function readMyGrades($studentNo, $fld_subjectID){

        $query = "SELECT grades.fld_midtermGrade, grades.fld_finalsGrade, grades.fld_semestralGrade, grades.fld_numericalGrade 
                    FROM tbl_grades AS grades
                    WHERE grades.fld_studentNo = ? AND grades.fld_subjectID = ?";

        $stmt  = $this->importConn->prepare($query);

        // bind values
        $stmt->bindParam(1, $studentNo);
        $stmt->bindParam(2, $fld_subjectID);
        
        $stmt->execute();

        return $stmt;
    }

    function readTermGradesSY($studentNo, $startsy, $endsy, $semester){

        $query = "SELECT acourse.fld_subjectID, subject.fld_subCode, subject.fld_description, subject.fld_units, esubject.fld_startSY, esubject.fld_endSY, esubject.fld_semester
                    FROM tbl_enrolledsubjects AS esubject
                    JOIN tbl_availablecourse AS acourse ON (acourse.fld_availableCourseID = esubject.fld_subjectID)
                    JOIN tbl_subject AS subject ON (subject.fld_subjectID = acourse.fld_subjectID)
                 WHERE esubject.fld_studentNo = ? AND esubject.fld_startSY = ? AND esubject.fld_endSY = ? AND esubject.fld_semester = ? ";

        $stmt  = $this->importConn->prepare($query);

        // bind values
        $stmt->bindParam(1, $studentNo);
        $stmt->bindParam(2, $startsy);
        $stmt->bindParam(3, $endsy);
        $stmt->bindParam(4, $semester);
        
        $stmt->execute();

        return $stmt;
    }

    function countResidencySemester($studentNo){

        $query = "SELECT COUNT(*) as yearsOfResidency
        FROM (SELECT DISTINCT e.fld_startSY, e.fld_endSY, e.fld_semester
        FROM tbl_enrolledsubjects as e
        WHERE e.fld_studentNo = ?) as student";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $studentNo);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        return $yearsOfResidency;

    }

    function readYearsOfResidency($studentNo){

        $query = "SELECT DISTINCT e.fld_startSY, e.fld_endSY, e.fld_semester
                FROM tbl_enrolledsubjects as e
                WHERE e.fld_studentNo = ?";

        $stmt  = $this->importConn->prepare($query);

        // bind values
        $stmt->bindParam(1, $studentNo);
        
        $stmt->execute();

        return $stmt;
    }


    public function readGrades($prospectusName, $studentNumber, $yearLevel)
    {
        $query = "SELECT * 
                  FROM tbl_prospectus as prospectus
                  WHERE prospectus.fld_prospectusName = ? AND prospectus.fld_year = ?";

        $stmt = $this->importConn->prepare($query);
            
        // bind values
        $stmt->bindParam(1, $prospectusName);
        $stmt->bindParam(2, $yearLevel);            
        $stmt->execute();
        $list = array();
        $row = $stmt->fetchAll(PDO::FETCH_BOTH);
        $subjectList='';
        foreach($row as $record){
            

            if($record['fld_subjlist'] != ''){
                if($subjectList == ''){
                    $subjectList .= $record['fld_subjlist'];                    
                }else{
                    $subjectList .= ','.$record['fld_subjlist'];                       
                }
            }
        }
        $list = explode(",", $subjectList);
        
        $list2 = array();
        foreach($list as $subjID){

            $query1 = "SELECT prospectus.fld_semester, prospectus.fld_subjlist 
                  FROM tbl_prospectus as prospectus
                  WHERE prospectus.fld_prospectusName = ? AND prospectus.fld_year = ? AND prospectus.fld_subjlist LIKE '%$subjID%'";

            $stmt1 = $this->importConn->prepare($query1);
                
            // bind values
            $stmt1->bindParam(1, $prospectusName);
            $stmt1->bindParam(2, $yearLevel);
            $stmt1->execute();

            $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

            $semester = $row1['fld_semester'];

            $stmt2 = $this->importConn->query("SELECT grades.fld_semestralGrade, subject.fld_units, subject.fld_preReq, subject.fld_description, subject.fld_subCode, '$semester' as semester
                                               FROM tbl_subject as subject
                                               LEFT  JOIN tbl_grades as grades ON grades.fld_subjectID = subject.fld_subjectID AND (grades.fld_studentNo ='$studentNumber')
                                               WHERE subject.fld_subjectID = '$subjID'");
            // bind values
            // $stmt2->bindParam(1, $subjID);
            //$stmt2->bindParam(1, $studentNumber);
            $stmt2->execute();
            if($stmt2->rowCount() > 0){
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                array_push($list2, $row2);
            }
        }
  
        return $list2;
    }
}