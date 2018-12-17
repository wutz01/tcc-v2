<?php
include_once '../Database/database.php';
class Guidance
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

    function readInterviewQuestions(){

        $query = "SELECT fld_ID, fld_question
            FROM tbl_interviewquestions";
                      
        $stmt = $this->importConn->prepare( $query );

        $stmt->execute();

        return $stmt;      
    }

    function readAllApplicants($page){

        if($page == "interviewResults"){
            $dynamicQuery = " WHERE checklist.fld_examResult <> 'not done' AND checklist.fld_interviewResultGuidance = 'not done'";
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

    function addInterViewesultsGuidance($applicantID, $questionId, $ratings, $averageRating, $remarks, $comments){
        
        //write query
        $query = "INSERT INTO tbl_interviewresults 
        SET 
        fld_applicantID = ?, 
        fld_questionId = ?,
        fld_ratings = ?, 
        fld_averageRating = ?,
        fld_remarks = ?, 
        fld_comments = ?";
        
        $stmt = $this->importConn->prepare($query);


        // bind values
        $stmt->bindParam(1, $applicantID);
        $stmt->bindParam(2, $questionId);
        $stmt->bindParam(3, $ratings);
        $stmt->bindParam(4, $averageRating);
        $stmt->bindParam(5, $remarks);
        $stmt->bindParam(6, $comments);
        
        if (!$stmt->execute()) {
            return false;
        }       
        
        $query = "UPDATE tbl_applicantchecklist 
                  SET fld_interviewResultGuidance = ?
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

    
}