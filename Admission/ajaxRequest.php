<?php  
include_once "admissionClass.php";
$admission = new Admission();

if(isset($_POST['getfunctionName'])){
    
    // read an Applicant Name
    if($_POST['getfunctionName'] == "getApplicantName"){

        $applicantID      = $_POST["applicantID"];    
        $getApplicantName = $admission->readApplicantName($applicantID);
      
        echo $getApplicantName;
    }

    // read an Applicant Name
    else if($_POST['getfunctionName'] == "getSubjectDescription"){

        $subCode      = $_POST["subCode"];    
        $getApplicantName = $admission->readSubDescription($subCode);
      
        echo $getApplicantName;
    }

    // add Exam Results
    else if($_POST['getfunctionName'] == "addExamResults"){

        $applicantID        = $_POST["applicantID"];
        $english            = $_POST["english"];
        $mathematics        = $_POST["mathematics"];
        $science            = $_POST["science"];
        $abstractReasoning  = $_POST["abstractReasoning"];
        $examResults        = $_POST["examResults"];
        $remarks            = $_POST["remarks"];  
        $comments           = $_POST["comments"];
        $dateOfExam         = $_POST["dateOfExam"];    

        if($admission->addExamResults($applicantID, $english, $mathematics, $science, $abstractReasoning, $examResults, $remarks, $comments, $dateOfExam)){
            echo "success";
        }else{
            echo "error";
        }
    }

    // add change no of items
    else if($_POST['getfunctionName'] == "changeNoOfItems"){

        $subjectID = $_POST["subjectID"];
        $noOfItems = $_POST["noOfItems"];   
      
        if($admission->updateNoOfItems($subjectID, $noOfItems)){
            echo "success";
        }else{
            echo "error";
        }
    }

    // change Submission of requirements status
    else if($_POST['getfunctionName'] == "changeSubmissionStatus"){

        $applicantID = $_POST["applicantID"];
        $status      = $_POST["status"];   
      
        if($admission->changeSubmissionStatus($applicantID, $status)){
            echo "success";
        }else{
            echo "error";
        }
    }

    // change Submission of requirements status
    else if($_POST['getfunctionName'] == "applicationApproval"){

        $applicantID            = $_POST["applicantID"];
        $interviewResult        = $_POST["interviewResult"]; 
        $recommnededProgram     = $_POST["recommnededProgram"]; 
        $status                 = $_POST["status"];   
      
        if($admission->changeApplicationStatus($applicantID, $interviewResult, $recommnededProgram, $status)){
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
        $subCodeProspectus  = $_POST["getSubCodeProspectus"];

        $counter = 0;
        
        for($i=0;$i<count($subCode);$i++){
            if($admission->creditSubjects($applicantID, $subCode[$i], $subjectDescription[$i], $units[$i], $grades[$i], $subCodeProspectus[$i])){
                $counter++;
            }
        }

        if($counter == count($subCode)){
            echo "success";
        }else{
            echo "error";
        }
    }

}

else if (isset($_FILES["addAnApplicantFile"]["name"])) {
            
            include_once "../Applicant/applicantClass.php";
            $applicant = new Applicant();

            $destination_path = getcwd() . DIRECTORY_SEPARATOR;
            $target           = $destination_path . basename($_FILES['addAnApplicantFile']['name']);
            $excelFileType    = pathinfo($target, PATHINFO_EXTENSION);
            $count            = 0;
            
              if ($excelFileType != "xls" && $excelFileType != "xlsx" && $excelFileType != "csv") {
                  echo '<script>swal("Error", "Invalid File type.", "error");</script>';
              } else {
                  if (move_uploaded_file($_FILES['addAnApplicantFile']['tmp_name'], $target)) {
                      include("../PHPExcel/IOFactory.php");
                      $objPHPExcel = PHPExcel_IOFactory::load($target);

                      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

                          $highestRow = $worksheet->getHighestRow();
                          for ($row = 2; $row <= $highestRow; $row++) {
                              $lastName             = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                              $firstName            = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                              $middleName           = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                              $address              = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                              $emailAddress         = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                              // $birthDate            = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                              $birthDate            = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP( $worksheet->getCellByColumnAndRow(5, $row)->getValue()));
                              $transferee           = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                              $schoolLastAttended   = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                              $yearGraduated        = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                              $prefferedProgram1    = $admission->getProgramID($worksheet->getCellByColumnAndRow(9, $row)->getValue());
                              $prefferedProgram2    = $admission->getProgramID($worksheet->getCellByColumnAndRow(10, $row)->getValue());
                              $prefferedPrograms    = $prefferedProgram1.",".$prefferedProgram2;
                              
                             $applicant->addApplicant($lastName, $firstName, $middleName, $address, $emailAddress, $birthDate, $transferee, $schoolLastAttended, $yearGraduated, $prefferedPrograms);
                          }
                      }
                     echo "success";
                  } else {
                    echo "error";
                  }
                  unlink($target);
              }
              
          
    }
?>