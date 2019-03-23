<?php  
include_once "studentClass.php";
include '../Database/database2.php';
$student = new Student();

if($_POST['getfunctionName'] == 'getsubjectlist')
{
	$programID 		= $_POST['programID'];
	$getsubjectList = $student->getsubjectList($programID);

	echo json_encode($getsubjectList);
}

else if($_POST['getfunctionName'] == 'addsubject')
{
	$courseID 	   = $_POST['courseID'];
	$studentNumber = $_POST['studentNumber'];
	$startSY  = $_POST['startsy'];
	$endSY    = $_POST['endsy'];
	$semester = $_POST['semester'];
	$programID = $_POST['programID'];
	$yearlevel = $_POST['yearlevel'];

	$addSubject    = $student->screenSubject($courseID,$studentNumber,$startSY,$endSY,$semester,$programID,$yearlevel);

	echo $addSubject;
}

else if($_POST['getfunctionName'] == 'removesubject')
{
	$courseID 	   = $_POST['courseID'];
	$studentNumber = $_POST['studentNumber'];
	$removeSubject = $student->removeSubject($courseID,$studentNumber);

	echo $removeSubject;
}

else if($_POST['getfunctionName'] == 'getsubjects')
{
	$studentNumber = $_POST['studentNumber'];
	$startSY  = $_POST['startsy'];
	$endSY    = $_POST['endsy'];
	$semester = $_POST['semester'];
	$getsubjects   = $student->getSubject($studentNumber,$startSY,$endSY,$semester);

	echo json_encode($getsubjects);
}

else if($_POST['getfunctionName'] == 'getGrades')
{
	$prospectusName = $_POST['prospectusName'];
	$studentNumber = $_POST['studentNumber'];
	$yearLevel = $_POST['yearLevel'];

	$getGrades   = $student->readGrades($prospectusName, $studentNumber, $yearLevel);

	echo json_encode($getGrades);
}

else if ($_POST["getfunctionName"] == "populateMyGrades") {
        $studentNo      = $_POST["studentNo"];
        $totalNoOfUnits = 0;
        $failedUnits    = 0;
        $passedUnits    = 0;
        $currentGrade   = 0;
        $totalGrade     = 0;
        $averageGrade   = 0;

        $output      = "";
        $output .= "
        <table id='grades' class='display table' cellpadding='10' width='100%''>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Subject Code</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Midterm&nbsp;Grade</th>
                    <th>Final&nbsp;Grade</th>
                    <th>Sem&nbsp;Grade</th>
                    <th>Numerical&nbsp;Grade</th>
                </tr>
            </thead>
            <tbody>";
            $getGradesSY = $student->readMyGradesSY($studentNo);
            while ($row = $getGradesSY->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $output .= "<tr>
                    <th>{$fld_startSY} - {$fld_endSY}</th>
                    <th>{$fld_semester}</th>
                    <th>{$fld_subCode}</th>
                    <th>{$fld_description}</th>
                    <th>{$fld_units}</th>";
            $queryCheck = "SELECT * FROM tbl_grades WHERE fld_studentNo = '$studentNo'";
            $stmtCheck = mysqli_query($conn, $queryCheck);

            if(mysqli_num_rows($stmtCheck)<=0){
                $output .="
                    <th>NG</th>
                    <th>NG</th>
                    <th>NG</th>
                    <th>NG</th>
                </tr>";
            } else {

            $getGrades = $student->readMyGrades($studentNo, $fld_subjectID);
            while ($row = $getGrades->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $output .="
                    <th>{$fld_midtermGrade}</th>
                    <th>{$fld_finalsGrade}</th>
                    <th>{$fld_semestralGrade}</th>
                    <th>{$fld_numericalGrade}</th>
                </tr>";
                }
            }

            $totalNoOfUnits = $totalNoOfUnits + $fld_units;

            if($fld_semestralGrade >= 75){ $passedUnits = $passedUnits + $fld_units; }
            else{ $failedUnits = $failedUnits + $fld_units; }

            $currentGrade = $fld_semestralGrade * $fld_units;
            $totalGrade = $totalGrade + $currentGrade;
            }

            $averageGrade = $totalGrade / $totalNoOfUnits;  
$output .= "</tbody>
            <tfoot>
            <tr>
                <th colspan='4'><span class='pull-right'>Total Units: </span></th>
                <th>{$totalNoOfUnits}</th>
                <th colspan='2'><span class='pull-right'>GPA: </span></th>
                <th>{$averageGrade}</th>
                <th colspan='1'></th>
            </tr>
            <tr>
                <th colspan='4'><span class='pull-right'>Failed Units: </span></th>
                <th>{$failedUnits}</th>
                <th colspan='4'></th>
            </tr>
            <tr>
                <th colspan='4'><span class='pull-right'>Passed Units: </span></th>
                <th>{$passedUnits}</th>
                <th colspan='4'></th>
            </tr>
            </tfoot>
        </table>";
        
        echo $output;
    }

    else if ($_POST["getfunctionName"] == "populateTermGrades") {
        $studentNo = $_POST["studentNo"];
        $startsy = $_POST["startsy"];
        $endsy = $_POST["endsy"];
        $semester = $_POST["semester"];
        $output      = "";
        $output .= "
        <table id='grades' class='display table' cellpadding='10' width='100%''>
            <thead>
                <tr>
                    <th width='15%'>Year</th>
                    <th width='15%'>Semester</th>
                    <th width='20%'>Subject Code</th>
                    <th width='40%'>Description</th>
                    <th width='10%'>Units</th>
                    <th width='10%'>Midterm Grade</th>
                    <th width='10%'>Final Grade</th>

                </tr>
            </thead>
            <tbody>";
            $getGradesSY = $student->readTermGradesSY($studentNo, $startsy, $endsy, $semester);
            while ($row = $getGradesSY->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $output .= "<tr>
                    <th>{$fld_startSY} - {$fld_endSY}</th>
                    <th>{$fld_semester}</th>
                    <th>{$fld_subCode}</th>
                    <th>{$fld_description}</th>
                    <th>{$fld_units}</th>";
                    
            $getGrades = $student->readMyGrades($studentNo, $fld_subjectID);
            while ($row = $getGrades->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $output .="
                    <th>{$fld_midtermGrade}</th>
                    <th>{$fld_finalsGrade}</th>
                </tr>";
                }
            }
        $output .= "</tbody>
        </table>";
        
        echo $output;
    }


    else if ($_POST["getfunctionName"] == "populateResidency") {
        $studentNo = $_POST["studentNo"];
        $output      = "";
        $output .= "
        <table id='residency' class='display table' cellpadding='10' width='100%''>
            <thead>
                <tr>
                    <th width='15%'>Year</th>
                    <th width='15%'>Semester</th>
                </tr>
            </thead>
            <tbody>";
            $getResidency = $student->readYearsOfResidency($studentNo);
            while ($row = $getResidency->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $output .= "<tr>
                    <th>{$fld_startSY} - {$fld_endSY}</th>
                    <th>{$fld_semester}</th>";
            }
        $output .= "</tbody>
        </table>";
        $semesterResidency = $student->countResidencySemester($studentNo);
        $output .= "<label>Total No. Of Semesters: {$semesterResidency}</label>";

        echo $output;
    }


?>