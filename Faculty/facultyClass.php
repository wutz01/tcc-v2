<?php
include_once '../Database/database.php';
class Faculty
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

    function readAllStudents($staffID){

        if($staffID == NULL){
            $query = "SELECT DISTINCT student.fld_studentNo, student.fld_lastName, student.fld_firstName, student.fld_middleName 
            FROM tbl_student as student
            JOIN tbl_section as section on (section.fld_sectionID = student.fld_section)";
                      
            $stmt = $this->importConn->prepare( $query );

        }else{
            $query = "SELECT DISTINCT student.fld_studentNo, student.fld_lastName, student.fld_firstName, student.fld_middleName 
            FROM tbl_student as student
            JOIN tbl_section as section on (section.fld_sectionID = student.fld_section)
            WHERE section.fld_staffId = ?";
                      
            $stmt = $this->importConn->prepare( $query );

            // bind parameters
            $stmt->bindParam(1, $staffID);
        }

        $stmt->execute();

        return $stmt;      
    }

    function readStudentDetails($studentNo){
        
        $getName = array();
        $prospectusStatus = 'Active';

        $query = "SELECT student.fld_lastName, student.fld_firstName, student.fld_middleName, student.fld_program, student.fld_yearLevel, prospectus.fld_prospectusName, prospectus.fld_maxUnits 
        FROM tbl_student as student 
        INNER JOIN tbl_prospectus as prospectus ON prospectus.fld_programID = student.fld_program 
        WHERE fld_studentNo = ? AND prospectus.fld_status = ? AND prospectus.fld_year = student.fld_yearLevel";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $studentNo);
        $stmt->bindParam(2, $prospectusStatus);
            
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
 
        $getName[0] = $fld_lastName.", ".$fld_firstName." ".$fld_middleName;
        $getName[1] = $fld_program;         
        $getName[2] = $fld_prospectusName; 
        $getName[3] = $fld_yearLevel;
        $getName[4] = $fld_maxUnits;       
        return $getName;
    }

    function readSubjectList($staffid)
    {
        $query = "SELECT course.fld_sectionID, course.fld_subjectID, subject.fld_subCode, section.fld_sectionName, course.fld_availableCourseID
        FROM tbl_availablecourse as course
        INNER JOIN tbl_subject as subject ON subject.fld_subjectID = course.fld_subjectID
        INNER JOIN tbl_section as section ON section.fld_sectionID = course.fld_sectionID
        WHERE course.fld_staffId = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $staffid);

        $stmt->execute();
        

        return $stmt;
    }

    function getStudentList($courseid){
        $query = "SELECT student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_studentNo, grade.fld_midtermGrade, grade.fld_finalsGrade, grade.fld_semestralGrade, grade.fld_numericalGrade, grade.fld_remarks, grade.fld_gradeID, course.fld_subjectID, grade.fld_midPosted, grade.fld_finalPosted
            FROM tbl_enrolledsubjects as enrolled 
            INNER JOIN tbl_availablecourse as course ON course.fld_availableCourseID = enrolled.fld_subjectID 
            INNER JOIN tbl_student as student ON student.fld_studentNo = enrolled.fld_studentNo 
            LEFT JOIN tbl_grades as grade ON grade.fld_studentNo = enrolled.fld_studentNo AND grade.fld_subjectID = course.fld_subjectID 
            WHERE enrolled.fld_subjectID = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $courseid);

        $stmt->execute();

        $subjectlist = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($subjectlist, $row);
        }

        return $subjectlist;
    }

    function countStudents($courseID)
    {
        
        $countOfStudents = array();

        $query = "SELECT  
        SUM(CASE WHEN fld_remarks = 'Failed' THEN 1 ELSE 0 END) as failed, 
        SUM(CASE WHEN fld_midtermGrade >= 75 THEN 1 ELSE 0 END) as passedMid,
        SUM(CASE WHEN fld_midtermGrade >= 75 THEN 1 ELSE 0 END) as passedFinal,
        SUM(CASE WHEN fld_semestralGrade >= 75 THEN 1 ELSE 0 END) as passedSEM 
    
        FROM tbl_enrolledsubjects as enrolled 
        INNER JOIN tbl_availablecourse as course ON course.fld_availableCourseID = enrolled.fld_subjectID 
        INNER JOIN tbl_student as student ON student.fld_studentNo = enrolled.fld_studentNo 
        LEFT JOIN tbl_grades as grade ON grade.fld_studentNo = enrolled.fld_studentNo AND grade.fld_subjectID = course.fld_subjectID 
        WHERE enrolled.fld_subjectID = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $courseID);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($countOfStudents, $row);
        }
        
        return $countOfStudents;
        
    }
    function readGradesEncodingStatus()
    {
        $query = "SELECT term, status FROM tbl_activatorgrades";
        $stmt  = $this->importConn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    function saveGrade($rowID, $midGrade, $finalGrade, $semGrade, $numericalGrade, $remarks, $term, $status)
    {
        if($term =="1"){ $gradeType = "fld_midPosted"; }
        else if($term =="2"){ $gradeType = "fld_finalPosted"; }
        $query = "UPDATE tbl_grades
        SET fld_midtermGrade = ?, fld_finalsGrade = ?, fld_semestralGrade = ?, fld_numericalGrade = ?, fld_remarks = ?, $gradeType = ?
        WHERE fld_gradeID = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $midGrade);
        $stmt->bindParam(2, $finalGrade);
        $stmt->bindParam(3, $semGrade);
        $stmt->bindParam(4, $numericalGrade);
        $stmt->bindParam(5, $remarks);
        $stmt->bindParam(6, $status);
        $stmt->bindParam(7, $rowID);

        if(!$stmt->execute()){
            return false;
        }

        return true;

    }

    function getcourseDetails($courseid)
    {
        $query = "SELECT course.fld_subjectID, course.fld_day, course.fld_startTime, course.fld_endTime, subject.fld_units, subject.fld_subCode, subject.fld_description, section.fld_sectionName, course.fld_room
        FROM tbl_availablecourse as course
        INNER JOIN tbl_subject as subject ON subject.fld_subjectID = course.fld_subjectID
        JOIN tbl_section as section ON (section.fld_sectionID = course.fld_sectionID)
        WHERE course.fld_availableCourseID = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $courseid);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);  

        $courseDetails = array();

        $courseDetails[0] = $fld_subCode;
        $courseDetails[1] = $fld_description;
        $courseDetails[2] = $fld_day.", ".$fld_startTime." - ".$fld_endTime;
        $courseDetails[3] = $fld_units;
        $courseDetails[4] = $fld_sectionName;
        $courseDetails[5] = $fld_room;

        return $courseDetails;

    }


    function getcourseGradeType($courseid)
    {
        $query = "SELECT DISTINCT grade.fld_midPosted, grade.fld_finalPosted 
            FROM tbl_enrolledsubjects as enrolled 
            INNER JOIN tbl_availablecourse as course ON course.fld_availableCourseID = enrolled.fld_subjectID
            LEFT JOIN tbl_grades as grade ON grade.fld_studentNo = enrolled.fld_studentNo AND grade.fld_subjectID = course.fld_subjectID 
            WHERE enrolled.fld_subjectID = ?";
                      
        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $courseid);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);  

        $gradeType = array();

        $gradeType[0] = $fld_midPosted;
        $gradeType[1] = $fld_finalPosted;

        return $gradeType;
    }
    

    function readFacultyCourse($staffID)
    {
        $query = "SELECT DISTINCT subject.fld_subjectID, acourse.fld_staffId, staff.firstName, staff.middleName, staff.lastName, esubject.fld_startSY, esubject.fld_endSY, esubject.fld_semester, subject.fld_subCode, section.fld_sectionName, grade.fld_midPosted, grade.fld_finalPosted
            FROM tbl_enrolledsubjects as esubject
            JOIN tbl_availablecourse as acourse ON acourse.fld_availableCourseID = esubject.fld_subjectID
            JOIN tbl_subject as subject ON subject.fld_subjectID = acourse.fld_subjectID
            JOIN tbl_section as section ON section.fld_sectionID = acourse.fld_sectionID
            JOIN tbl_staffs as staff ON staff.staffId = acourse.fld_staffId
            JOIN tbl_grades as grade ON grade.fld_studentNo = esubject.fld_studentNo AND grade.fld_subjectID = acourse.fld_subjectID
            WHERE staff.staffId = ?";

        $stmt = $this->importConn->prepare( $query );

        $stmt->bindParam(1, $staffID);

        $stmt->execute();
        

        return $stmt;
    }


    function readCourseStudents($courseID)
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


    
}