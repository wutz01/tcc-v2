<?php
include_once '../Database/database.php';
require '../PHPMailer-master/PHPMailerAutoload.php';

class Admin
{
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

    public function populateInfo()
    {
        $query = "SELECT * FROM tbl_staffs s
        WHERE NOT EXISTS
        (SELECT 1 FROM tbl_users u
        WHERE u.staffId  = s.staffId)";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    public function populateSubject()
    {
        $query = "SELECT * FROM tbl_subject";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    public function populateSection()
    {
        $query = "SELECT * FROM tbl_section";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    public function populateFaculty()
    {
        $access = "Faculty";
        
        $query = "SELECT a.*, b.Username FROM tbl_staffs a
        INNER JOIN tbl_users b
        ON a.staffId = b.staffId
        WHERE b.accessType = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $access);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    public function validateUser($Username, $id, $accesstype, $employmenttype, $maxunits, $availableschedule)
    {
        $query = "SELECT * FROM tbl_users
        WHERE
        Username = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $Username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return $this->addUser($Username, $id, $accesstype, $employmenttype, $maxunits, $availableschedule);
        }
    }
    
    private function addUser($Username, $id, $accesstype, $employmenttype, $maxunits, $availableschedule)
    {
        $cost     = 10;
        $pass     = $id;
        $enc      = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt     = sprintf("$2a$%02d$", $cost) . $enc;
        $password = md5($pass . $salt);
        $query    = "INSERT INTO tbl_users 
        (Username,passwordPlain,passwordSalt,staffId,accessType)
        VALUES
        (?,?,?,?,?)";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $Username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $salt);
        $stmt->bindParam(4, $id);
        $stmt->bindParam(5, $accesstype);
        $stmt->execute();
        $this->updateFaculty($id, $employmenttype, $maxunits, $availableschedule);
        
        
        return true;
    }
    
    private function updateFaculty($id, $employmenttype, $maxunits, $availableschedule)
    {
        $query = "UPDATE tbl_staffs SET
        employmentType = ?, maxUnits = ?, availableSchedule = ?
        WHERE staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $employmenttype);
        $stmt->bindParam(2, $maxunits);
        $stmt->bindParam(3, $availableschedule);
        $stmt->bindParam(4, $id);
        $stmt->execute();
        
    }
    
    public function validateSchedule($subjectcode, $sectioncode, $facultyid, $numberofslots, $starttime, $endtime, $scheduleday, $room)
    {
        $units = $this->getUnits($facultyid) + $this->subjectUnit($subjectcode);
        
        $query = "SELECT * FROM tbl_staffs
        WHERE maxUnits > ? AND staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $units);
        $stmt->bindParam(2, $facultyid);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row  = $stmt->fetch();
            $type = $row['employmentType'];
            
            if ($type == 2) {
                $day   = "%" . $scheduleday . "%";
                $query = "SELECT * FROM tbl_staffs 
                WHERE staffId = ?";
                // " AND availableSchedule LIKE ?";
                
                $stmt = $this->importConn->prepare($query);
                $stmt->bindParam(1, $facultyid);
                // $stmt->bindParam(2,$day);
                $stmt->execute();
                
                if ($stmt->rowCount() == 0) {
                    return "Faculty not available at that day!";
                }
            }
            
            return $this->addSchedule($subjectcode, $sectioncode, $facultyid, $numberofslots, $starttime, $endtime, $scheduleday, $room);
            
        } else {
            return "Faculty exceeded his/her maximum units!";
        }
    }
    
    private function getUnits($facultyid)
    {
        $query = "SELECT SUM(fld_Unit) AS unit_sum FROM tbl_availablecourse
        WHERE fld_staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $facultyid);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $sum = $row->unit_sum;
        
        return $sum;
    }
    
    private function subjectUnit($subjectcode)
    {
        $query = "SELECT fld_units AS subject_unit FROM tbl_subject
        WHERE fld_subjectID = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $subjectcode);
        $stmt->execute();
        
        $row  = $stmt->fetch(PDO::FETCH_OBJ);
        $unit = $row->subject_unit;
        
        return $unit;
    }
    
    public function addSchedule($subjectcode, $sectioncode, $facultyid, $numberofslots, $starttime, $endtime, $scheduleday, $room)
    {
        // $unit       = $this->subjectUnit($subjectcode);
        $query = "INSERT INTO tbl_availablecourse(fld_subjectID,fld_sectionID,fld_staffId,fld_availableSlots,fld_startTime,fld_endTime,fld_day,fld_room)
        VALUES(?,?,?,?,?,?,?,?)";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $subjectcode);
        $stmt->bindParam(2, $sectioncode);
        $stmt->bindParam(3, $facultyid);
        $stmt->bindParam(4, $numberofslots);
        $stmt->bindParam(5, $starttime);
        $stmt->bindParam(6, $endtime);
        $stmt->bindParam(7, $scheduleday);
        $stmt->bindParam(8, $room);
        $stmt->execute();
        
        return true;
    }

    public function updateSchedule($courseID, $subjectcode, $sectioncode, $facultyid, $numberofslots, $starttime, $endtime, $scheduleday, $room)
    {
        $query = "UPDATE tbl_availablecourse
                SET 
                fld_subjectID = ?,
                fld_sectionID = ?,
                fld_staffId = ?,
                fld_availableSlots = ?,
                fld_startTime = ?,
                fld_endTime = ?,
                fld_day = ?,
                fld_room = ?
                WHERE fld_availableCourseID = ?";
                
        $stmt = $this->importConn->prepare($query);
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $subjectcode);
        $stmt->bindParam(2, $sectioncode);
        $stmt->bindParam(3, $facultyid);
        $stmt->bindParam(4, $numberofslots);
        $stmt->bindParam(5, $starttime);
        $stmt->bindParam(6, $endtime);
        $stmt->bindParam(7, $scheduleday);
        $stmt->bindParam(8, $room);
        $stmt->bindParam(9, $courseID);
        $stmt->execute();
        
        return true;
    }
    
    public function removeSchedule($courseID)
    {
        $query = "DELETE FROM tbl_availablecourse
        WHERE fld_availableCourseID = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $courseID);

        if($stmt->execute())
        {
            return true;
        }else{
            return false;
        }

    }
    public function populateSchedule()
    {
        $query = "SELECT a.fld_subCode, b.fld_sectionName, c.firstName, c.middleName, c.lastName, d.* FROM tbl_availablecourse d
        INNER JOIN tbl_subject a
        ON d.fld_subjectID = a.fld_subjectID
        INNER JOIN tbl_section b
        ON d.fld_sectionID = b.fld_sectionID
        INNER JOIN tbl_staffs c
        ON d.fld_staffId = c.staffId";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    public function readAllPrograms()
    {
        $query = "SELECT fld_programID, fld_programName, fld_programCode
                  FROM tbl_program";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
    
    public function readAllSections()
    {
        $query = "SELECT section.fld_sectionName, section.fld_sectionID, section.fld_yearLevel, section.fld_maxNoOfStudents, section.fld_staffId, program.fld_programName
                  FROM tbl_section as section
                  JOIN tbl_program as program on (program.fld_programID = section.fld_programID)";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getApplicantList()
    {
        $query = "SELECT * FROM tbl_applicant WHERE fld_statusApplicant = 0 AND fld_applicantGeneratedID !='' ";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getAcceptedApplicantList()
    {
        $query = "SELECT * FROM tbl_applicant WHERE fld_statusApplicant = 1";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getApplicantSubject()
    {
        $query = "SELECT * FROM tbl_subjects_applicant";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getUsersList()
    {
        $query = "SELECT * FROM tbl_users WHERE accesstype != 'Student'";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getApplicantSubjectDefault()
    {
        $query = "SELECT * FROM tbl_subjects_applicant WHERE fld_status = 'ACTIVE' AND fld_default = 1";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function getApplicantSubjectNotDefault()
    {
        $query = "SELECT * FROM tbl_subjects_applicant WHERE fld_status = 'ACTIVE' AND fld_default = 0";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function addSection($sectionName, $programID, $capacity, $yearLevel)
    {
        
        //write query
        $query = "INSERT INTO tbl_section 
        SET 
        fld_sectionName = ?, 
        fld_programID = ?, 
        fld_maxNoOfStudents = ?, 
        fld_yearLevel = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $sectionName);
        $stmt->bindParam(2, $programID);
        $stmt->bindParam(3, $capacity);
        $stmt->bindParam(4, $yearLevel);
        
        if (!$stmt->execute()) {
            return false;
        }
        
        return true;
    }
    
    public function addProspectus($subcode, $description, $units, $lec, $lab, $prereq, $prospec, $year, $sem, $program)
    {
        $query = "SELECT * FROM tbl_prospectus
        WHERE fld_prospectusName = ? AND fld_year = ? AND fld_semester = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->bindParam(1, $prospec);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $sem);
        $stmt->execute();
        
        $this->addSubject($subcode, $description, $units, $lec, $lab, $prereq);
        
        if ($stmt->rowCount() > 0) {
            $row          = $stmt->fetch(PDO::FETCH_OBJ);
            $subjlist     = $row->fld_subjlist;
            $prospectusid = $row->fld_prospectusID;
            $this->addOnList($subcode, $prospectusid, $subjlist);
        } else {
            $this->addCurriculum($subcode, $description, $units, $lec, $lab, $prereq, $prospec, $year, $sem, $program);
        }
        
        return true;
        
    }
    
    private function addCurriculum($subcode, $description, $units, $lec, $lab, $prereq, $prospec, $year, $sem, $program)
    {
        $status = "Active";
        $query  = "SELECT * FROM tbl_program
        WHERE fld_programName = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->bindParam(1, $program);
        if ($stmt->execute()) {
            $row       = $stmt->fetch(PDO::FETCH_OBJ);
            $programid = $row->fld_programID;
            
            $query = "INSERT INTO tbl_prospectus(fld_prospectusName,fld_programID,fld_status,fld_year,fld_semester)
            VALUES(?,?,?,?,?)";
            
            $stmt = $this->importConn->prepare($query);
            
            $stmt->bindParam(1, $prospec);
            $stmt->bindParam(2, $programid);
            $stmt->bindParam(3, $status);
            $stmt->bindParam(4, $year);
            $stmt->bindParam(5, $sem);
            
            if ($stmt->execute()) {
                $this->addProspectus($subcode, $description, $units, $lec, $lab, $prereq, $prospec, $year, $sem);
            }
        }
    }
    
    private function addOnList($subcode, $prospectusid, $subjlist)
    {
        $query = "SELECT * FROM tbl_subject
        WHERE fld_subCode = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->bindParam(1, $subcode);
        if ($stmt->execute()) {
            $row   = $stmt->fetch(PDO::FETCH_OBJ);
            $subid = "%" . $row->fld_subjectID . "%";
            
            $query = "SELECT * FROM tbl_prospectus
            WHERE fld_prospectusID = ? AND fld_subjlist LIKE ?";
            
            $stmt = $this->importConn->prepare($query);
            
            $stmt->bindParam(1, $prospectusid);
            $stmt->bindParam(2, $subid);
            $stmt->execute();
            
            if ($stmt->rowCount() == 0) {
                if ($subjlist == '') {
                    $subjid = $row->fld_subjectID;
                } else {
                    $subjid = "," . $row->fld_subjectID;
                }
                
                $query = "UPDATE tbl_prospectus
                SET fld_subjlist  = CONCAT(fld_subjlist,?)
                WHERE fld_prospectusID = ?";
                
                $stmt = $this->importConn->prepare($query);
                
                $stmt->bindParam(1, $subjid);
                $stmt->bindParam(2, $prospectusid);
                
                $stmt->execute();
            }
        }
    }
    
    private function addSubject($subcode, $description, $units, $lec, $lab, $prereq)
    {
        $query = "SELECT * FROM tbl_subject
        WHERE fld_subCode = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->bindParam(1, $subcode);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0) {
            $query = "INSERT INTO tbl_subject(fld_subCode,fld_description,fld_units,fld_lecHrs,fld_labHrs,fld_preReq)
            VALUES(?,?,?,?,?,?)";
            
            $stmt = $this->importConn->prepare($query);
            
            $stmt->bindParam(1, $subcode);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $units);
            $stmt->bindParam(4, $lec);
            $stmt->bindParam(5, $lab);
            $stmt->bindParam(6, $prereq);
            
            $stmt->execute();
        }
    }
    
    function getSectionID($sectionName)
    {
        
        $query = "SELECT fld_sectionID 
                  FROM tbl_section
                  WHERE fld_sectionName = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $sectionName);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);
        
        return $fld_sectionID;
    }
    
    function getSubjectID($subCode)
    {
        
        $query = "SELECT fld_subjectID 
                  FROM tbl_subject
                  WHERE fld_subCode = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $subCode);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);
        
        return $fld_subjectID;
    }
    
    function getProgramID($programName)
    {
        
        $query = "SELECT fld_programID 
                  FROM tbl_program
                  WHERE fld_programName = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $programName);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);
        
        return $fld_programID;
    }
    
    function getFacultyID($facultyFullName)
    {
        
        $query = "SELECT staffId 
                  FROM tbl_staffs
                  WHERE firstName = ? AND lastName = ? ";
        
        $stmt = $this->importConn->prepare($query);
        
        $name = array();
        $name = explode(" ", $facultyFullName);
        
        // bind values
        $stmt->bindParam(1, $name[0]);
        $stmt->bindParam(2, $name[1]);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);
        
        return $staffId;
    }
    
    function addFaculty($employeeNo, $firstname, $middlename, $lastname, $suffix)
    {
        $query = "INSERT INTO tbl_staffs(staffId, firstName, middleName, lastName, suffix)
            VALUES(?,?,?,?,?)";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->bindParam(1, $employeeNo);
        $stmt->bindParam(2, $firstname);
        $stmt->bindParam(3, $middlename);
        $stmt->bindParam(4, $lastname);
        $stmt->bindParam(5, $suffix);
        
        $stmt->execute();
        
        return true;
        
    }
    
    function generateUsername($staffId)
    {
        
        $query = "SELECT firstName, lastName
                  FROM tbl_staffs
                  WHERE staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $staffId);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
        $username = strtolower(str_replace(' ', '', ($firstName . "." . $lastName)));
        
        return $username;
    }
    
    function readSchoolYear()
    {
        $query = "SELECT fld_startSY, fld_endSY, fld_semester,fld_status FROM tbl_activatorsy";
        $stmt  = $this->importConn->prepare($query);
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
    
    
    function updateSchoolYear($getSemester, $getStartSY, $getEndSY, $getAction)
    {
        
        $this->catchSemester = $getSemester;
        $this->catchStartSY  = $getStartSY;
        $this->catchEndSY    = $getEndSY;
        $this->action        = $getAction;
        
        
        $query = "SELECT fld_startSY, fld_endSY, fld_semester,fld_status FROM tbl_activatorsy";
        $stmt  = $this->importConn->prepare($query);
        $stmt->execute();
        
        // posted values
        $this->catchSemester = htmlspecialchars(strip_tags($this->catchSemester));
        $this->catchStartSY  = htmlspecialchars(strip_tags($this->catchStartSY));
        $this->catchEndSY    = htmlspecialchars(strip_tags($this->catchEndSY));
        
        if ($this->action == "ACTIVATE") {
            
            $this->status = "ACTIVATED";
            $this->status = htmlspecialchars(strip_tags($this->status));
            
            if ($stmt->rowCount() > 0) {
                $query = "UPDATE tbl_activatorsy SET fld_startSY = :fld_startSY, fld_endSY = :fld_endSY, fld_semester = :fld_semester,fld_status = :fld_status";
                $stmt  = $this->importConn->prepare($query);
                
                // bind parameters
                $stmt->bindParam(':fld_startSY', $this->catchStartSY);
                $stmt->bindParam(':fld_endSY', $this->catchEndSY);
                $stmt->bindParam(':fld_semester', $this->catchSemester);
                $stmt->bindParam(':fld_status', $this->status);
            } else {
                $query = "INSERT INTO tbl_activatorsy SET fld_startSY = ?, fld_endSY = ?, fld_semester = ?, fld_status = ?";
                $stmt  = $this->importConn->prepare($query);
                
                // bind values
                $stmt->bindParam(1, $this->catchStartSY);
                $stmt->bindParam(2, $this->catchEndSY);
                $stmt->bindParam(3, $this->catchSemester);
                $stmt->bindParam(4, $this->status);
                
            }
            
        } //end of if activate
        
        else if ($this->action == "DEACTIVATE") {
            
            $this->status = "DEACTIVATED";
            $this->status = htmlspecialchars(strip_tags($this->status));
            
            $query = "UPDATE tbl_activatorsy SET fld_status = :fld_status";
            $stmt  = $this->importConn->prepare($query);
            
            // bind parameters
            $stmt->bindParam(':fld_status', $this->status);
        }
        
        
        if ($stmt->execute()) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }
        
        
        
    }
    
    function updateGradesEncodingStatus($getTerm, $getAction)
    {

        $this->catchTerm     = $getTerm;
        $this->action        = $getAction;
        
        
        if ($this->action == "ACTIVATE") {

            $subject = "Grades Encoding Acticated";
            $body =
            "To: All Faculty Members<br><br>
            Good Day!!<br><br>
            Please be reminded that your account is already activated. You may start checking your account.<br>
            Thank you.<br><br><br>
            TCC VP for Acad<br>
            ______________________________________________________________<br><br>
            Thank you. This is an automated response. PLEASE DO NOT REPLY.";

            $query = "SELECT emailAddress
            FROM tbl_staffs
            WHERE emailAddress != ''";

            $stmt = $this->importConn->prepare($query);
            $stmt->execute();

            while($rowStaff = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($rowStaff);
                $this->sendMail($emailAddress, $subject, $body);
            }
            
            $this->status = "ACTIVATED";
            $this->status = htmlspecialchars(strip_tags($this->status));
            

            $query = "UPDATE tbl_activatorgrades SET term = ?, status = ?";
            $stmt  = $this->importConn->prepare($query);
                
            // bind parameters
            $stmt->bindParam(1, $this->catchTerm);
            $stmt->bindParam(2, $this->status);
            
        } //end of if activate
        
        else if ($this->action == "DEACTIVATE") {
            
            $this->status = "DEACTIVATED";
            $this->status = htmlspecialchars(strip_tags($this->status));
            
            $query = "UPDATE tbl_activatorgrades SET status = :fld_status";
            $stmt  = $this->importConn->prepare($query);
            
            // bind parameters
            $stmt->bindParam(':fld_status', $this->status);
        }
        
        
        if ($stmt->execute()) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }
        
        
        
    }
    
    public function readAllStudent(){
        $query = "SELECT student.fld_studentNo, student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_program, student.fld_yearLevel, section.fld_sectionName, user.status
                  FROM tbl_student as student
                  JOIN tbl_section as section on (section.fld_sectionID = student.fld_section)
                  JOIN tbl_users as user on (user.staffId = student.fld_studentNo)";

        $stmt       = $this->importConn->prepare($query);
        
        $stmt->execute();

        return $stmt;
    }  
    
    
     function updateUserStatus($staffId, $status){

          $query = "UPDATE tbl_users 
          SET status = :status 
          WHERE staffId = :staffId";
          
          $stmt = $this->importConn->prepare($query);
          
          // bind parameters
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':staffId', $staffId);
          
          if(!$stmt->execute()){
              return false;
          }

          return true;

     }
    
    
    public function readAllProspectus()
    {
        $query = "SELECT prospectus.fld_prospectusID, prospectus.fld_prospectusName, prospectus.fld_programID, program.fld_programName, prospectus.fld_status
                  FROM tbl_prospectus as prospectus
                  JOIN tbl_program as program on (program.fld_programID = prospectus.fld_programID)
                  GROUP BY prospectus.fld_prospectusName";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
    
    
    function updateProspectusStatus($prospectusName, $programID, $status)
    {
        
        $query = "UPDATE tbl_prospectus 
                  SET fld_status = :fld_status 
                  WHERE fld_prospectusName = :fld_prospectusName";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind parameters
        $stmt->bindParam(':fld_status', $status);
        $stmt->bindParam(':fld_prospectusName', $prospectusName);
        
        if (!$stmt->execute()) {
            return false;
        }
        
        $query = "UPDATE tbl_prospectus 
                  SET fld_status = 'Inactive' 
                  WHERE fld_prospectusName != :fld_prospectusName && fld_programID = :fld_programID";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind parameters
        $stmt->bindParam(':fld_prospectusName', $prospectusName);
        $stmt->bindParam(':fld_programID', $programID);
        
        if (!$stmt->execute()) {
            return false;
        }
        
        return true;
        
    }
    
    public function readAllStaffs()
    {
        $query = "SELECT staff.staffId, staff.firstName, staff.lastName, user.status
                  FROM tbl_staffs as staff
                  JOIN tbl_users as user ON user.staffId = staff.staffId
                  WHERE user.accessType = 'Faculty'";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
    
    function updateSectionEvaluator($staffID, $sectionID)
    {
        
        $query = "UPDATE tbl_section 
                  SET fld_staffId = :fld_staffId 
                  WHERE fld_sectionID = :fld_sectionID";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind parameters
        $stmt->bindParam(':fld_staffId', $staffID);
        $stmt->bindParam(':fld_sectionID', $sectionID);
        
        if (!$stmt->execute()) {
            return false;
        }
        
        return true;
        
    }
    
    function readApplicantRequirements()
    {
        
        $query = "SELECT tbl_applicant.fld_firstName, tbl_applicant.fld_lastName, tbl_requirements.fld_listOfRequirements
                  FROM tbl_requirements
                  JOIN tbl_applicant on (tbl_applicant.fld_applicantID = tbl_requirements.fld_applicantID)";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
        
    }
    
    function readEnrolledStudents()
    {
        
        $query = "SELECT esubjects.fld_studentNo, student.fld_lastName, student.fld_firstName, student.fld_middleName, student.fld_yearLevel, program.fld_programCode
                  FROM tbl_enrolledsubjects AS esubjects
                  JOIN tbl_student AS student on (student.fld_studentNo = esubjects.fld_studentNo)
                  JOIN tbl_program AS program on (program.fld_programID = student.fld_program)
                  GROUP BY esubjects.fld_studentNo";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
        
    }
    
    function readAllEnrolledClass()
    {
        $query = "SELECT DISTINCT acourse.fld_availableCourseID, subject.fld_subCode
                  FROM tbl_enrolledsubjects AS esubjects
                  JOIN tbl_availablecourse AS acourse ON (acourse.fld_availableCourseID = esubjects.fld_subjectID)
                  JOIN tbl_subject AS subject ON (subject.fld_subjectID = acourse.fld_subjectID)";
        
        $stmt = $this->importConn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
    
    function readOneSubjectClassList($programID, $subjectID, $sectionID)
    {
        
        $dynamicWhereStmt = "";
        $dynamicAnd       = "";
        
        if ($programID <> "") {
            $dynamicWhereStmt .= "program.fld_programID = $programID ";
            $dynamicAnd = "AND ";
        }
        
        if ($sectionID <> "") {
            $dynamicWhereStmt .= $dynamicAnd . "section.fld_sectionID = $sectionID ";
            $dynamicAnd = "AND ";
        }
        
        if ($subjectID <> "") {
            $dynamicWhereStmt .= $dynamicAnd . "acourse.fld_availableCourseID = $subjectID";
        }
        
        $query = "SELECT DISTINCT esubjects.fld_studentNo, student.fld_firstName, student.fld_middleName, student.fld_lastName, student.fld_yearLevel, program.fld_programCode, section.fld_sectionName 
                    FROM tbl_enrolledsubjects AS esubjects 
                    JOIN tbl_availablecourse As acourse ON (acourse.fld_availableCourseID = esubjects.fld_subjectID) 
                    JOIN tbl_student AS student ON (student.fld_studentNo = esubjects.fld_studentNo) 
                    JOIN tbl_program AS program on (program.fld_programID = student.fld_program) 
                    JOIN tbl_section AS section ON (section.fld_sectionID = acourse.fld_sectionID) 
                    WHERE $dynamicWhereStmt";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->execute();
        
        return $stmt;
        
    }
    
    function countRegistrationReportSex($programID, $yearLevel)
    {
        
        $query = "SELECT  
        SUM(CASE WHEN fld_sex = 'M' THEN 1 ELSE 0 END) as maleCount, 
        SUM(CASE WHEN fld_sex = 'F' THEN 1 ELSE 0 END) as femaleCount 
        FROM    tbl_student
        WHERE   fld_program = ? AND fld_yearLevel = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $programID);
        $stmt->bindParam(2, $yearLevel);
        $stmt->execute();
        
        return $stmt;
        
    }
    
    function countYearsOfResidency($studentNo)
    {
        
        $query = "SELECT COUNT(*) as yearsOfResidency
        FROM (SELECT DISTINCT e.fld_startSY, e.fld_endSY
        FROM tbl_enrolledsubjects as e
        WHERE e.fld_studentNo = ?) as student";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $studentNo);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
        return $yearsOfResidency;
        
    }
    
    function readAccessDetails($staffID)
    {
        
        $query = "SELECT staff.staffId, staff.firstName, staff.lastName, staff.employmentType, staff.maxUnits, staff.availableSchedule, user.status, user.accessType, user.Username
                  FROM tbl_staffs as staff
                  JOIN tbl_users as user ON user.staffId = staff.staffId
                  WHERE user.staffId = ?";

        $stmt  = $this->importConn->prepare($query);
        $stmt->bindParam(1, $staffID);
        
        $stmt->execute();
        
        return $stmt;
        
    }

    function updateAccessTypeStaff($staffID, $accessType, $employmentType, $maxUnits, $availableSchedule)
    {
        $query = "UPDATE tbl_staffs SET
        employmentType = ?, maxUnits = ?, availableSchedule = ?
        WHERE staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $employmentType);
        $stmt->bindParam(2, $maxUnits);
        $stmt->bindParam(3, $availableSchedule);
        $stmt->bindParam(4, $staffID);
        if (!$stmt->execute()) {
            return false;
        }

        $query = "UPDATE tbl_users SET
        accessType = ?
        WHERE staffId = ?";
        
        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1, $accessType);
        $stmt->bindParam(2, $staffID);
        if (!$stmt->execute()) {
            return false;
        }

        return true;

        
    }

function EXPORT_TABLES($host,$user,$pass,$name,$tables=false, $backup_name=false){
    $LocalTime = strtotime('+0 hours');

    set_time_limit(3000); $mysqli = new mysqli($host,$user,$pass,$name); $mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }   if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); }
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
    foreach($target_tables as $table){
        if (empty($table)){ continue; }
        $result = $mysqli->query('SELECT * FROM `'.$table.'`');     $fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows;     $res = $mysqli->query('SHOW CREATE TABLE '.$table); $TableMLine=$res->fetch_row();
        $content .= "\n\n".$TableMLine[1].";\n\n";
        for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            while($row = $result->fetch_row())  { //when started (and every after 100 command cycle):
                if ($st_counter%100 == 0 || $st_counter == 0 )  {$content .= "\nINSERT INTO ".$table." VALUES";}
                    $content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}     if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";} $st_counter=$st_counter+1;
            }
        } $content .="\n\n\n";
    }
    $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    $backup_name = $backup_name ? $backup_name : $name."(".date('F d,Y h;i A',$LocalTime).").sql";
    ob_get_clean(); header('Content-Type: application/octet-stream');   header("Content-Transfer-Encoding: Binary"); header("Content-disposition: attachment; filename=\"".$backup_name."\"");
    echo $content; exit;
}
    
}

?>