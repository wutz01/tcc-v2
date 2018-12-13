<?php  
include_once "facultyClass.php";
$faculty = new Faculty();

// read student details
 if($_POST['getfunctionName'] == "getStudentDetails"){

    $studentNo      = $_POST["studentNo"];    
    $getStudentDetails = $faculty->readStudentDetails($studentNo);
      
    echo json_encode($getStudentDetails);
 }

if($_POST['getfunctionName'] == "getstudentlist"){
    
    $courseID = $_POST['courseID'];
    $getStudentList = $faculty->getStudentList($courseID);

    echo json_encode($getStudentList);
 }

 if($_POST['getfunctionName'] == "getCountOfStudents"){
    
    $courseID = $_POST['courseID'];
    $getCountOfStudents = $faculty->countStudents($courseID);

    echo json_encode($getCountOfStudents);
 }

 if($_POST['getfunctionName'] == "savegrade"){

    $rowID          = $_POST['rowID'];
    $midGrade       = $_POST['midGrade'];
    $finalGrade     = $_POST['finalGrade'];
    $semGrade       = $_POST['semGrade'];
    $numericalGrade = $_POST['numericalGrade'];
    $remarks        = $_POST['remarks'];
    $term        = $_POST['term'];
    $status        = $_POST['status'];
    
    

    $counter = 0;
        
    for($i=0;$i<count($rowID);$i++){
        if($faculty->saveGrade($rowID[$i], $midGrade[$i], $finalGrade[$i], $semGrade[$i], $numericalGrade[$i], $remarks[$i], $term, $status)){
            $counter++;
        }
    }

    if($counter == count($rowID)){
        echo "success";
    }else{
        echo "error";
    }
 }

 if($_POST['getfunctionName'] == "getcourseDetails"){
    $courseID = $_POST['courseID'];
    $getcourseDetails = $faculty->getcourseDetails($courseID);

    echo json_encode($getcourseDetails);
 }

 if($_POST['getfunctionName'] == "getcourseGradeType"){
    $courseID = $_POST['courseID'];
    $getcourseGradeType = $faculty->getcourseGradeType($courseID);

    echo json_encode($getcourseGradeType);
 }

?>