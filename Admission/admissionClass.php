<?php
include_once '../Database/database.php';
class Admission
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

        if($page == "examResults"){
            $dynamicQuery = " WHERE checklist.fld_examResult = 'not done'";
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
        $query = "SELECT fld_lastName, fld_firstName, fld_middleName
                  FROM tbl_applicant
                  WHERE fld_applicantID = ?";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
        $stmt->bindParam(1, $applicantID);
            
        $stmt->execute();
            
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $getName = $fld_lastName.", ".$fld_firstName." ".$fld_middleName;
                              
        return $getName;
    }
    
    function addExamResults($applicantID, $english, $mathematics, $science, $abstractReasoning, $examResults, $remarks, $comments, $dateOfExam){
        
        //write query
        $query = "INSERT INTO tbl_examresult 
        SET 
        fld_applicantID = ?, 
        fld_english = ?,
        fld_mathematics = ?, 
        fld_science = ?,
        fld_abstractReasoning = ?, 
        fld_examResult = ?, 
        fld_remarks = ?,
        fld_comments = ?, 
        fld_dateOfExam = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $english);
        $stmt->bindParam(3, $mathematics);
        $stmt->bindParam(4, $science);
        $stmt->bindParam(5, $abstractReasoning);
        $stmt->bindParam(6, $examResults);
        $stmt->bindParam(7, $remarks);
        $stmt->bindParam(8, $comments);
        $stmt->bindParam(9, $dateOfExam);
        
        if (!$stmt->execute()) {
            return false;
        }       
        
        $query = "UPDATE tbl_applicantchecklist 
                  SET fld_examResult = ?
                  WHERE fld_applicantID = ?";
        
        $stmt = $this->importConn->prepare($query);
        
        // bind values
        $stmt->bindParam(1, $remarks);
        $stmt->bindParam(2, $applicantID);
        
        if (!$stmt->execute()) {
            return false;
        } 

        return true;
        
    }

    function getProgramID($programName){

        $query = "SELECT fld_programID 
                  FROM tbl_program
                  WHERE fld_programName = ?";

        $stmt = $this->importConn->prepare( $query );

        // bind values
        $stmt->bindParam(1, $programName);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        extract($row);

        return $fld_programID;
    }

    function readAllSubjectAreas(){

        $query = "SELECT fld_ID, fld_subject, fld_noOfItems 
                  FROM tbl_subjectareas";

        $stmt = $this->importConn->prepare( $query );

        $stmt->execute();

        return $stmt;
    }

    function updateNoOfItems($subjectID, $noOfItems){
        $query      = "UPDATE tbl_subjectareas 
        SET
        fld_noOfItems = ?
        WHERE fld_ID = ?";

        $stmt       = $this->importConn->prepare($query);

        $stmt->bindParam(1,$noOfItems);
        $stmt->bindParam(2,$subjectID);

        if(!$stmt->execute()){
            return false;
        }

        return true;
    }

    
}
?>