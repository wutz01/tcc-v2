<?php
include_once 'Database/database.php';
class Home
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
    
	function readAnnouncement(){
    $query = "SELECT * FROM tbl_announcements";
                      
        $stmt = $this->importConn->prepare( $query );
            
        // bind parameters
            
        $stmt->execute();
            
        return $stmt;
	}
    function getAnnouncement($ID){
        
        $query = "SELECT * FROM tbl_announcements WHERE fld_id = '". $ID ."'";
                      
        $stmt = $this->importConn->prepare( $query );
            
            
        $stmt->execute();
            
        return $stmt;
    

    }

    function readAllQualifier(){
        
        $query = "SELECT * FROM tbl_examresult as examresult
        JOIN tbl_applicant as applicant
        ON applicant.fld_applicantID =  examresult.fld_applicantID
        ";
                      
        $stmt = $this->importConn->prepare( $query );
            
            
        $stmt->execute();
            
        return $stmt;
    

    }

    function readAllProgramQualifier(){
        
        $query = "SELECT * FROM tbl_applicantchecklist as checklist
        JOIN tbl_applicant as applicant
        ON applicant.fld_applicantID =  examresult.fld_applicantID
        JOIN tbl_program 
        ";
                      
        $stmt = $this->importConn->prepare( $query );
            
            
        $stmt->execute();
            
        return $stmt;
    

    }

    function readAllQualifier2($program){

        $status = "Approved";
        $query = "SELECT * FROM tbl_applicantchecklist as checklist
        JOIN tbl_applicant as applicant
        ON applicant.fld_applicantID = checklist.fld_applicantID
        WHERE checklist.fld_status  = ? AND applicant.fld_recommendedProgram = ?
        ";

        $stmt = $this->importConn->prepare( $query );
        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $program);

        $stmt->execute();

        return $stmt;
    }

    function readAllProgram(){

        $query = "SELECT * FROM tbl_program";

        $stmt = $this->importConn->prepare( $query );

        $stmt->execute();

        return $stmt;
    }

}

?>