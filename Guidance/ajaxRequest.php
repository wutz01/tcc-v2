<?php  
include_once "guidanceClass.php";
$guidance = new Guidance();


// read an Applicant Name
if($_POST['getfunctionName'] == "getApplicantName"){

    $applicantID      = $_POST["applicantID"];    
    $getApplicantName = $guidance->readApplicantName($applicantID);
      
    echo $getApplicantName;
}

// add Exam Results
else if($_POST['getfunctionName'] == "addInterViewesultsGuidance"){

    $applicantID    = $_POST["applicantID"];
    $questionId     = $_POST["getQuestion"];
    $ratings        = $_POST["getRating"];
    $averageRating  = $_POST["getAverageRating"];
    $remarks  		= $_POST["getRemarks"];
    $comments       = $_POST["getComment"];  

    if($guidance->addInterViewesultsGuidance($applicantID, $questionId, $ratings, $averageRating, $remarks, $comments)){
        echo "success";
    }else{
        echo "error";
    }
}

?>