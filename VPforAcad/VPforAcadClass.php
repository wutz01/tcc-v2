<?php
include_once '../Database/database.php';
require '../PHPMailer-master/PHPMailerAutoload.php';
class VPforAcad
{
    
    // database connection and table name
    private $conn;
    protected $importConn;

    private $getEmailAddress;
    private $getProgramName;
    
    
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

    function readAllApplicants(){
        $query = "SELECT DISTINCT applicant.fld_applicantID, applicant.fld_applicationDate, applicant.fld_lastName, applicant.fld_firstName, applicant.fld_middleName, applicant.fld_homeAddress, applicant.fld_transferee, checklist.fld_status, checklist.fld_applicationForm, checklist.fld_submissionOfRequirements, checklist.fld_examResult
                  FROM tbl_applicant as applicant
                  JOIN tbl_applicantchecklist as checklist on (checklist.fld_applicantID = applicant.fld_applicantID)";
                      
        $stmt = $this->importConn->prepare( $query );
        $stmt->execute();

        return $stmt;      
    }

    function readApplicantDetails($applicantID){
        $query = "SELECT applicant.fld_prefferedPrograms, exam.fld_examResult, exam.fld_remarks, exam.fld_english, exam.fld_mathematics, exam.fld_science , exam.fld_abstractReasoning, exam.fld_comments , exam.fld_dateOfExam, interview.fld_questionId, interview.fld_ratings, interview.fld_averageRating, interview.fld_remarks as iremarks, interview.fld_comments as icomments
                  FROM tbl_applicant as applicant
                  JOIN tbl_examresult as exam on (exam.fld_applicantID = applicant.fld_applicantID)
                  JOIN tbl_interviewresults as interview ON (interview.fld_applicantID = applicant.fld_applicantID)
                  WHERE applicant.fld_applicantID = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $applicantID);
            
        $stmt->execute();

        return $stmt; 
    }

    function changeApplicationStatus($applicantID, $interviewResult, $fld_working, $recommnededProgram, $yearLevel, $status){      
        
        $query = "UPDATE tbl_applicant 
                  SET fld_working = ?,
                  fld_recommendedProgram = ?,
                  fld_yearLevel = ?
                  WHERE fld_applicantID = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $fld_working);
        $stmt->bindParam(2, $recommnededProgram);
        $stmt->bindParam(3, $yearLevel);
        $stmt->bindParam(4, $applicantID);
        
        if (!$stmt->execute()) {
            return false;
        } 

        $query = "UPDATE tbl_applicantchecklist 
                  SET fld_interviewResultVPAA = ?,
                  fld_status = ?
                  WHERE fld_applicantID = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $interviewResult);
        $stmt->bindParam(2, $status);
        $stmt->bindParam(3, $applicantID);
        
        if (!$stmt->execute()) {
            return false;
        } 

        $query = "SELECT fld_lastName, fld_firstName 
                  FROM tbl_applicant
                  WHERE fld_applicantID = ?";

        $stmt = $this->importConn->prepare( $query );

        // bind values
        $stmt->bindParam(1, $applicantID);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);

        $username   = strtolower(str_replace(' ', '', ($fld_firstName.".".$fld_lastName)));
        $accesstype = "Applicant";

        $this->createUserAccount($username, $applicantID, $accesstype);
        $this->getProgramName   = $this->readProgramName($recommnededProgram);
        $this->getEmailAddress  = $this->getEmailAddress($applicantID);

        $subject = "Approval";
        $body =
            "Dear $fld_firstName $fld_lastName,<br><br>
            Good Day!<br><br>
            We would like to inform you that you have qualified in the program $this->getProgramName. This further notifies you that you may now process your enrollment. Please check the date of enrollment from our website. <br><br>
            Here are your login details:<br>
            Username: $username <br>
            Password: 1234 <br><br>

            Thank you and welcome to TCC.<br><br><br>
            Best Regards,<br>
            ______________________________________________________________<br><br>
            Thank you. This is an automated response. PLEASE DO NOT REPLY.";

        if (!$this->sendMail($this->getEmailAddress, $subject, $body)) {
            return false;
        }

        return true;
        
    }

    public function createUserAccount($username,$applicantID,$accesstype)
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


    function readAllPrograms(){

        $query = "SELECT * FROM tbl_program";

        $stmt = $this->importConn->prepare( $query );

        $stmt->execute();

        return $stmt;
    }

    function readProgramName($programID){

        $query = "SELECT fld_programName 
                  FROM tbl_program
                  WHERE fld_programID = ?";

        $stmt = $this->importConn->prepare( $query );

        // bind values
        $stmt->bindParam(1, $programID);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);

        return $fld_programName;
    }

    function getEmailAddress($applicantID){

        $query = "SELECT fld_emailAddress 
                  FROM tbl_applicant
                  WHERE fld_applicantID = ?";

        $stmt = $this->importConn->prepare( $query );

        // bind values
        $stmt->bindParam(1, $applicantID);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);

        return $fld_emailAddress;
    }
    

    function readQuestionName($questionID){

        $query = "SELECT fld_question 
                  FROM tbl_interviewquestions
                  WHERE fld_ID = ?";

        $stmt = $this->importConn->prepare( $query );

        // bind values
        $stmt->bindParam(1, $questionID);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);

        return $fld_question;
    }
}
?>