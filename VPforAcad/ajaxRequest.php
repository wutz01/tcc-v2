<?php  
include_once "VPforAcadClass.php";
$VPforAcad = new VPforAcad();

if(isset($_POST['getfunctionName'])){
    

    // change status of Application
    if($_POST['getfunctionName'] == "applicationApproval"){

        $applicantID            = $_POST["applicantID"];
        $interviewResult        = $_POST["interviewResult"]; 
        $working                = $_POST["working"]; 
        $recommnededProgram     = $_POST["recommnededProgram"]; 
        $status                 = $_POST["status"];   
        $yearLevel              = $_POST["yearLevel"];
      
        if($VPforAcad->changeApplicationStatus($applicantID, $interviewResult, $working, $recommnededProgram, $yearLevel, $status)){
            echo "success";
        }else{
            echo "error";
        }
    }

}
?>