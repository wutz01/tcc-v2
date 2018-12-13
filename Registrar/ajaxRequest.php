<?php  
session_start();
include_once "registrarClass.php";
$registrar = new Registrar();

if(isset($_POST['getfunctionName'])){
    
    // read an Applicant Name
    if($_POST['getfunctionName'] == "getApplicantName"){

        $applicantID      = $_POST["applicantID"];    
        $getApplicantName = $registrar->readApplicantName($applicantID);
      
        echo json_encode($getApplicantName);
    }

    // read an Applicant Name
    else if($_POST['getfunctionName'] == "getStudentName"){

        $studentNo      = $_POST["studentNo"];    
        $getStudentName = $registrar->readStudentName($studentNo);
      
        echo json_encode($getStudentName);
    }
    
    else if($_POST['getfunctionName'] == "autoFillSubjects"){

        $studentNumber        = $_POST["studentNumber"];  
        $programID          = $_POST["programID"];  
        $startsy            = $_POST["startsy"];  
        $endsy              = $_POST["endsy"];  
        $semester           = $_POST["semester"];  

        $autoFillSubjects    = $registrar->autoFillSubjects($studentNumber, $programID, $startsy, $endsy, $semester);
        
        echo $autoFillSubjects;
    }

    // read Subject Description
    else if($_POST['getfunctionName'] == "getSubjectDescription"){

        $subjectID            = $_POST["subjectID"];    
        $getSubDescription  = $registrar->readSubDescription($subjectID);
      
        echo $getSubDescription;
    }

    // change Submission of requirements status
    else if($_POST['getfunctionName'] == "changeSubmissionStatus"){

        $applicantID            = $_POST["applicantID"];
        $status                 = $_POST["status"];   
        $listOfRequirements  = $_POST["getListOfRequirements"];   

        if($registrar->changeSubmissionStatus($applicantID, $status, $listOfRequirements)){
            echo "success";
        }else{
            echo "error";
        }
    }

    else if($_POST['getfunctionName'] == "creditSubjects"){

        $applicantID        = $_POST["applicantID"];
        $subCode            = $_POST["getSubCode"];
        $subjectDescription = $_POST["getSubjectDescription"];
        $units              = $_POST["getUnits"];
        $grades             = $_POST["getGrades"];
        $subjectID          = $_POST["subjectID"];

        if($registrar->creditSubjects($applicantID, $subCode, $subjectDescription, $units, $grades, $subjectID)){
            echo "success";
        }else{
            echo "error";
        }
    }

    // change Submission of requirements status
    else if($_POST['getfunctionName'] == "addSubject"){

        $applicantID    = $_POST["applicantID"];
        $getSubjectID   = $_POST["getSubjectID"];   
        $status         = "0";

        $startSY    = $_SESSION['startSY'];
        $endSY      = $_SESSION['endSY'];
        $semester   = $_SESSION['semester'];

        foreach($getSubjectID as $subject){

            $registrar->addSubject($applicantID, $subject, $status, $startSY, $endSY, $semester);
            $status  = "1";
        }
        echo "success";
    }

    else if($_POST['getfunctionName'] == "getStudentNo"){

        $applicantID      = $_POST["applicantID"];    
        $getStudentNo     = $registrar->readStudentNo($applicantID);
      
        echo $getStudentNo;
    }

    else if($_POST['getfunctionName'] == "printPef")
    {
        $applicantID  = $_POST["applicantID"];
        $getStudentNo = $registrar->printPef($applicantID);
        
        echo $getStudentNo;
    }

    else if($_POST['getfunctionName'] == "updatePef"){
        $studentNumber = $_POST['studentNo'];
        $updateGrade = $registrar->checkGrade($studentNumber);

        echo 'success';
    }

    else if ($_POST['getfunctionName'] == 'fetchSubmittedGrades') {
        echo json_encode($registrar->populateSubmittedGrades());
    }

    else if ($_POST['getfunctionName'] == 'fetchAllSubjectsByStaffID') {
        $staffID          = $_POST['staffID'];
        echo json_encode($registrar->readAllSubjectListByStaffID($staffID));
    }

    // Validate Password
    else if($_POST['getfunctionName'] == "validatePassword"){
      $getUsername  = $_POST['getUsername'];
      $password     = $_POST['inputValue'];

      if($registrar->validatePassword($getUsername, $password)){
        echo "success";
      }else{
        echo "error";
      }
    }

    // Change Grades
    if($_POST['getfunctionName'] == "changeGrades"){

        $gradeID            = $_POST['gradeIDArr'];
        $studentNo          = $_POST['studentNoArr'];
        $midTermGrade       = $_POST['midTermGradeArr'];
        $finTermGrade       = $_POST['finTermGradeArr'];
        $semGrade           = $_POST['semGradeArr'];
        $numericalGrade     = $_POST['numericalGradeArr'];
        $remarks            = $_POST['remarksArr'];

        $counter = 0;
            
        for($i=0;$i<count($gradeID);$i++){
            if($registrar->changeGrade($gradeID[$i], $midTermGrade[$i], $finTermGrade[$i], $semGrade[$i], $numericalGrade[$i], $remarks[$i])){
                $counter++;
            }
        }

        if($counter == count($gradeID)){
            echo "success";
        }else{
            echo "error";
        }
    }
    
    if($_POST['getfunctionName'] == "gradesLog"){

        $gradeID            = $_POST['gradeIDArr'];
        $ctrlNo            = $_POST['controlNo'];
        
        $counter = 0;
            
        for($i=0;$i<count($gradeID);$i++){
            if($registrar->saveGradeLog($gradeID[$i], $ctrlNo)){
                $counter++;
            }
        }

        if($counter == count($gradeID)){
            echo "success";
        }else{
            echo "error";
        }
    }
    
    if ($_POST['getfunctionName'] == 'fetchStaff') {
        echo json_encode($registrar->populateInfo());
    }


    if($_POST['getfunctionName'] == "transferLoad"){

        $transferTo    = $_POST['transferTo'];
        $subject       = $_POST['subject'];

        if($registrar->transferLoad($transferTo, $subject)){
            echo "success";
        }else{
            echo "error";
        }
    }
    
}
?>

