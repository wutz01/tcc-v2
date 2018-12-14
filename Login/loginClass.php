<?php
session_start();
include_once '../Database/database.php';

class Login
{
    private $conn;
    protected $importConn;
    public $redirect = "General/dashboard.php";


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

    public function loggedIn()
    {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
        {
            header("location: " . $this->redirect);
        }
    }

    public function triggerLogin($Username,$Password)
    {

        $query= "SELECT * FROM tbl_users 
        WHERE 
        Username = ?";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1,$Username);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row        = $stmt->fetch();
            $password   = $row['passwordPlain'];
            $salt       = $row['passwordSalt'];
            $staffid    = $row['staffId'];
            $accesstype = $row['accessType'];
            $encrypted  = md5($Password.$salt);

            if($password == $encrypted)
            {
                $_SESSION['username'] = $Username;
                if($accesstype == "Applicant"){
                    $this->applicantInformation($staffid,$accesstype,1);
                }elseif($accesstype == "Student"){
                    $this->studentInformation($staffid,$accesstype,1);
                }else{
                    $this->staffInformation($staffid,$accesstype,1);
                }
                $this->syDetails();
                return true;
            }
        }

        return false;
    }

    private function syDetails()
    {
        $query = "SELECT fld_startSY, fld_endSY, fld_semester, fld_status  FROM tbl_activatorsy";

        $stmt = $this->importConn->prepare($query);

        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row                        = $stmt->fetch();
            $_SESSION['startSY']        = $row['fld_startSY'];
            $_SESSION['endSY']          = $row['fld_endSY'];
            $_SESSION['semester']       = $row['fld_semester'];
            $_SESSION['status']         = $row['fld_status'];
            if($_SESSION['semester'] == "1"){ $_SESSION['semesterName'] = "1st Sem"; }
            elseif($_SESSION['semester'] == "2"){ $_SESSION['semesterName'] = "2nd Sem"; }
            elseif($_SESSION['semester'] == "3"){ $_SESSION['semesterName'] = "Mid Year Sem"; }
            
        }
    }

    private function studentInformation($id,$accesstype,$logged)
    {
        $query = "SELECT * FROM tbl_student
        WHERE
        fld_studentNo = ?";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row                        = $stmt->fetch();
            $_SESSION['firstName']      = $row['fld_firstName'];
            $_SESSION['middleName']     = $row['fld_middleName'];
            $_SESSION['lastName']       = $row['fld_lastName'];
            $_SESSION['studentNumber']  = $row['fld_studentNo'];
            $_SESSION['programID']      = $row['fld_prospectusName'];
            $_SESSION['yearlevel']      = $row['fld_yearLevel'];
            $_SESSION['accessType']     = $accesstype;
            $_SESSION['logged']         = $logged;
        }
    }

    private function applicantInformation($id,$accesstype,$logged)
    {
        $query = "SELECT * FROM tbl_applicant
        WHERE
        fld_applicantID = ?";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row                    = $stmt->fetch();
            $_SESSION['applicantID']  = $row['fld_applicantID'];
            $_SESSION['firstName']  = $row['fld_firstName'];
            $_SESSION['middleName'] = $row['fld_middleName'];
            $_SESSION['lastName']   = $row['fld_lastName'];
            $_SESSION['accessType'] = $accesstype;
            $_SESSION['logged']     = $logged;
        }
    }

    private function staffInformation($id,$accesstype,$logged)
    {
        $query = "SELECT * FROM tbl_staffs
        WHERE
        staffId = ?";

        $stmt = $this->importConn->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row                    = $stmt->fetch();
            $_SESSION['staffID']    = $row['staffId'];
            $_SESSION['firstName']  = $row['firstName'];
            $_SESSION['middleName'] = $row['middleName'];
            $_SESSION['lastName']   = $row['lastName'];
            $_SESSION['accessType'] = $accesstype;
            $_SESSION['logged']     = $logged;
        }
    }


    function checkPassword($username, $oldpass){

            $query= "SELECT * FROM tbl_users 
            WHERE 
            staffId = ?";

            $stmt = $this->importConn->prepare($query);
            $stmt->bindParam(1,$username);
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                $row        = $stmt->fetch();
                $password   = $row['passwordPlain'];
                $salt       = $row['passwordSalt'];
                $accesstype = $row['accessType'];
                $encrypted  = md5($oldpass.$salt);

                if($password == $encrypted)
                {
                   return true;
                }else{
                    return false;
                }
            }

            return false;
    }

    function changePassword($username, $newpass){
        $cost       = 10;
        $enc        = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt       = sprintf("$2a$%02d$", $cost) . $enc;
        $password   = md5($newpass.$salt);

        $query = "UPDATE tbl_users 
                  SET
                    passwordPlain = ?, passwordSalt = ?
                  WHERE staffId = ?";

        $stmt = $this->importConn->prepare($query);

        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $salt);
        $stmt->bindParam(3, $username);


        if(!$stmt->execute()){
            return false;
        }

        return true;
    }


}