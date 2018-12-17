<?php
error_reporting(0);
include_once 'adminClass.php';
$admin = new Admin();

if (isset($_POST['getfunctionName'])) {
    if ($_POST['getfunctionName'] == 'fetchStaff') {
        echo json_encode($admin->populateInfo());
    }
    
    else if ($_POST['getfunctionName'] == 'addUser') {
        $Username          = $_POST['Username'];
        $staffName         = $_POST['staffName'];
        $accessType        = $_POST['accessType'];
        $employmentType    = 'NA';
        $maxUnits          = 'NA';
        $availableSchedule = 'NA';
        
        if ($accessType == 'Faculty') {
            $employmentType = $_POST['employmentType'];
            $maxUnits       = $_POST['maxUnits'];
            if ($employmentType == '2') {
                $availableSchedule = $_POST['availableSchedule'];
            }
        }
        
        if ($admin->validateUser($Username, $staffName, $accessType, $employmentType, $maxUnits, $availableSchedule)) {
            echo "success";
        } else {
            echo "error";
        }
    }
    
    else if ($_POST['getfunctionName'] == 'fetchSubject') {
        echo json_encode($admin->populateSubject());
    }
    
    else if ($_POST['getfunctionName'] == 'fetchSection') {
        echo json_encode($admin->populateSection());
    }
    
    else if ($_POST['getfunctionName'] == 'fetchFaculty') {
        echo json_encode($admin->populateFaculty());
    }
    
    else if ($_POST['getfunctionName'] == 'addSchedule') {
        $subjectCode   = $_POST['subjectCode'];
        $sectionCode   = $_POST['sectionCode'];
        $facultyId     = $_POST['facultyId'];
        $numberofSlots = $_POST['numberofSlots'];
        $startTime     = $_POST['getStartTime'];
        $endTime       = $_POST['getEndTime'];
        $scheduleDay   = $_POST['getScheduleDay'];
        $room          = $_POST['getRoom'];
        $result        = $admin->validateSchedule($subjectCode, $sectionCode, $facultyId, $numberofSlots, $startTime, $endTime, $scheduleDay, $room);
        
        if ($result == 1) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    else if ($_POST['getfunctionName'] == 'updateSchedule') {
        $courseID      = $_POST['courseID'];
        $subjectCode   = $_POST['subjectCode'];
        $sectionCode   = $_POST['sectionCode'];
        $facultyId     = $_POST['facultyId'];
        $numberofSlots = $_POST['numberofSlots'];
        $startTime     = $_POST['getStartTime'];
        $endTime       = $_POST['getEndTime'];
        $scheduleDay   = $_POST['getScheduleDay'];
        $room          = $_POST['getRoom'];
        $result        = $admin->updateSchedule($courseID, $subjectCode, $sectionCode, $facultyId, $numberofSlots, $startTime, $endTime, $scheduleDay, $room);
        
        if ($result == 1) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    else if($_POST['getfunctionName'] == 'removeSchedule'){
        
        $courseID      = $_POST['courseID'];

        if ($admin->removeSchedule($courseID)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    
    else if ($_POST['getfunctionName'] == 'fetchSchedule') {
        echo json_encode($admin->populateSchedule());
    }
    
    else if ($_POST['getfunctionName'] == 'addSection') {
        $sectionName = $_POST['sectionName'];
        $programID   = $_POST['programID'];
        $capacity    = $_POST['capacity'];
        $yearLevel   = $_POST['yearLevel'];
        
        if ($admin->addSection($sectionName, $programID, $capacity, $yearLevel)) {
            echo "success";
        } else {
            echo "error";
        }
    } else if ($_POST['getfunctionName'] == 'generateUsername') {
        $staffId = $_POST['staffId'];
        
        $username = $admin->generateUsername($staffId);
        
        echo $username;
    }
    
       else if($_POST['getfunctionName'] == "assignStudentStatus"){

        $accountID = $_POST["getID"];
        $status = $_POST["getStatus"];

        if($admin->updateUserStatus($accountID, $status)){
          echo "success";
        }else{
          echo "error";
        }
      }
    
    else if ($_POST['getfunctionName'] == "assignProspectusStatus") {
        
        $prospectusName = $_POST["getProspectusName"];
        $programID      = $_POST["getProgramID"];
        $status         = $_POST["getStatus"];
        
        if ($admin->updateProspectusStatus($prospectusName, $programID, $status)) {
            echo "success";
        } else {
            echo "error";
        }
    }
    
    else if ($_POST['getfunctionName'] == "assignSectionEvaluator") {
        
        $staffID   = $_POST["getStaffID"];
        $sectionID = $_POST["getSectionID"];
        
        if ($admin->updateSectionEvaluator($staffID, $sectionID)) {
            echo "success";
        } else {
            echo "error";
        }
    }

       else if($_POST['getfunctionName'] == "assignStaffStatus"){

        $staffId = $_POST["getID"];
        $status = $_POST["getStatus"];

        if($admin->updateUserStatus($staffId, $status)){
          echo "success";
        }else{
          echo "error";
        }
      }

    else if ($_POST['getfunctionName'] == "updateGradesEncodingStatus") {
        
        $getTerm     = $_POST["getTerm"];
        $getAction   = $_POST["getAction"];

        $admin->updateGradesEncodingStatus($getTerm, $getAction);
    }
    
   else if($_POST['getfunctionName'] == "updateAccessTypeStaff"){
    $staffID = $_POST["staffID"];
    $accessType = $_POST["accessType"];
    $employmentType = $_POST["employmentType"];
    $maxUnits = $_POST["maxUnits"];
    $availableSchedule = $_POST["availableSchedule"];

    if($admin->updateAccessTypeStaff($staffID, $accessType, $employmentType, $maxUnits, $availableSchedule)){
      echo "success";
    }else{
      echo "error";
    }
  }

} else if (isset($_FILES["prospectusFile"]["name"])) {
    
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target           = $destination_path . basename($_FILES['prospectusFile']['name']);
    $excelFileType    = pathinfo($target, PATHINFO_EXTENSION);
    $count            = 0;
    
    if ($excelFileType != "xls" && $excelFileType != "xlsx" && $excelFileType != "csv") {
        echo 'error';
    } else {
        if (move_uploaded_file($_FILES['prospectusFile']['tmp_name'], $target)) {
            include("../PHPExcel/IOFactory.php");
            $objPHPExcel = PHPExcel_IOFactory::load($target);
            
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                
                $highestRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $subcode     = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $description = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $units       = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $lec         = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $lab         = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $prereq      = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $prospec     = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $year        = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $sem         = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $program     = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    
                    $admin->addProspectus($subcode, $description, $units, $lec, $lab, $prereq, $prospec, $year, $sem, $program);
                }
            }
            echo "success";
        } else {
            echo "error";
        }
        unlink($target);
    }
}

else if (isset($_FILES["facultyFile"]["name"])) {
    
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target           = $destination_path . basename($_FILES['facultyFile']['name']);
    $excelFileType    = pathinfo($target, PATHINFO_EXTENSION);
    $count            = 0;
    
    if ($excelFileType != "xls" && $excelFileType != "xlsx" && $excelFileType != "csv") {
        echo '<script>swal("Error", "Invalid File type.", "error");</script>';
    } else {
        if (move_uploaded_file($_FILES['facultyFile']['tmp_name'], $target)) {
            include("../PHPExcel/IOFactory.php");
            $objPHPExcel = PHPExcel_IOFactory::load($target);
            
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                
                $highestRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $employeeNo = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $firstname  = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $middlename = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    if ($middlename == NULL) {
                        $middlename = "";
                    }
                    $lastname = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $suffix   = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    if ($suffix == NULL) {
                        $suffix = "";
                    }
                    
                    $admin->addFaculty($employeeNo, $firstname, $middlename, $lastname, $suffix);
                }
            }
            echo "success";
        } else {
            echo "error";
        }
        unlink($target);
    }
    
    
}

else if (isset($_FILES["subjectScheduleFile"]["name"])) {
    
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target           = $destination_path . basename($_FILES['subjectScheduleFile']['name']);
    $excelFileType    = pathinfo($target, PATHINFO_EXTENSION);
    $count            = 0;
    
    if ($excelFileType != "xls" && $excelFileType != "xlsx" && $excelFileType != "csv") {
        echo 'error';
    } else {
        if (move_uploaded_file($_FILES['subjectScheduleFile']['tmp_name'], $target)) {
            include("../PHPExcel/IOFactory.php");
            $objPHPExcel = PHPExcel_IOFactory::load($target);
            
            // foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $worksheet  = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow = $worksheet->getHighestRow();
            $timeArr    = array();
            for ($row = 2; $row <= $highestRow; $row++) {
                $subjectCode = $admin->getSubjectID($worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $sectionID   = $admin->getSectionID($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $room        = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                if ($room == "NULL" || $room == "") {
                    $room = "";
                }
                $scheduleDay   = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $startTime     = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $endTime       = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $numberofSlots = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $facultyId     = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                // $facultyName    = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                
                // $timeArr        = explode("-", $time);
                
                /*
                if($facultyName == NULL || $facultyName == ""){
                $facultyId    = "1";
                }else{
                $facultyId      = $admin->getFacultyID($facultyName);
                }
                */
                
                $admin->validateSchedule($subjectCode, $sectionID, $facultyId, $numberofSlots, $startTime, $endTime, $scheduleDay, $room);
                
                // unset($timeArr);
            }
            
            echo $highestRow;
        } else {
            echo "error";
        }
        unlink($target);
    }
    
    
}

else if (isset($_POST["getSemester"], $_POST["getStartSY"], $_POST["getEndSY"], $_POST["getAction"])) {
    $getSemester = $_POST["getSemester"];
    $getStartSY  = $_POST["getStartSY"];
    $getEndSY    = $_POST["getEndSY"];
    $getAction   = $_POST["getAction"];
    $admin->updateSchoolYear($getSemester, $getStartSY, $getEndSY, $getAction);
}
?>