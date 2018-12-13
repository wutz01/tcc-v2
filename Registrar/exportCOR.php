<?php
error_reporting(0);
session_start();

include_once "registrarClass.php";     
$registrar = new Registrar();
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
      require_once('../PDF/tcpdf.php');
      include_once '../Database/database.php';

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

   //Page header
   public function Header() {

$this->Rect(0,0,240,400,'F','',$fill_color = array(252, 243, 174));
   }

   // Page footer
   public function Footer() {

   }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Certificate of Registration | TCC');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
   require_once(dirname(__FILE__).'/lang/eng.php');
   $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();
if(isset($_GET['applicantID'])){
   $getApplicantID = base64_decode($_GET['applicantID']);
   $getStudentNo = $registrar->readStudentNo($getApplicantID);
   $getApplicant = $registrar->readApplicantDetails($getApplicantID);
   
   $row = $getApplicant->fetch(PDO::FETCH_ASSOC);
   extract($row);

   if($fld_working == "Yes" || $fld_transferee == "Yes"){
      $status = "Irregular";
   }else{
      $status = "Regular";
   }
}elseif(isset($_GET['studentNo'])) {
   $getStudentNo = base64_decode($_GET['studentNo']);

   $getStudentDetails = $registrar->readStudentDetails($getStudentNo);
   
   $row = $getStudentDetails->fetch(PDO::FETCH_ASSOC);
   extract($row);
}

$totalSchoolFees = 0;
$totalUnits = 0;
$totalLecHrs = 0;
$totalLabHrs = 0;
$counter = 0;

$registrar->addCompliance($getStudentNo);
$getSubjectList = $registrar->readSubjectList($getStudentNo);
$getSchoolFees = $registrar->readSchoolFees();

$pdf->SetFont('helvetica', '', 8);
$html ="";

$html .='<table border="0" width="100%" background="../assets/images/TCCBackground.png">';
         $html .='<colgroup>';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
            $html .='<col width="5%">';
         $html .='</colgroup>';
         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table border="1" width="100%" cellpadding="0" style="font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td width="50%" rowspan="2">TANAUAN CITY COLLEGE</td>';
                     $html .='<td width="36%" rowspan="2"><span style="font-size: 10px; color: red;">CERTIFICATE OF REGISTRATION</span></td>';
                     $html .='<td width="14%"><span style="font-size: 10px; color: red;">TCC-FORM-001</span></td>';
                  $html .='</tr>';
                  $html .='<tr>';                  
                  $html .='<td><span style="font-size: 10px; color: red;">REVISED 14</span></td>';

                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';

         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table  border="1" width="100%" cellpadding="8" style="border-color: red; font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td width="15%">';
                        $html .='<span style="font-size: 8px;color: red;">STUDENT NUMBER</span><br>
                        <center>'.$getStudentNo.'</center>';
                     $html .='</td>';
                     $html .='<td width="35%">';
                        $html .='<span style="font-size: 8px; color: red;">NAME (Last, First, Middle, Maiden Name, if married woman)</span><br>
                        <center>'.$fld_lastName.', '.$fld_firstName.' '.$fld_middleName.'</center>';
                     $html .='</td>';
                     $html .='<td width="5%">';
                        $html .='<span style="font-size: 8px; color: red;">SEX</span><br>
                        <center>'.$fld_sex.'</center>';
                     $html .='</td>';
                     $html .='<td width="10%">';
                        $html .='<span style="font-size: 8px; color: red;">SEMESTER</span><br>
                        <center>'.$_SESSION['semesterName'].'</center>';
                     $html .='</td>';
                     $html .='<td width="10%">';
                        $html .='<span style="font-size: 8px; color: red;" >SCHOOL YR</span><br>
                        <center>'.$_SESSION['startSY'].'-'.$_SESSION['endSY'].'</center>';
                     $html .='</td>';
                     $html .='<td width="25%">';
                        $html .='<span style="font-size: 8px; color: red;">ADMISSION STATUS</span><br>
                        <center>New</center>';
                     $html .='</td>';
                  $html .='</tr>';
                  $html .='<tr>';
                     $html .='<td width="55%">';
                        $html .='<span style="font-size: 8px;color: red;">ADDRESS</span><br>
                        <center>'.$fld_homeAddress.'</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 8px;color: red;">YEAR LEVEL</span><br>
                        <center>'.$fld_yearLevel.'</center>';
                     $html .='</td>';
                     $html .='<td width="25%">';
                        $html .='<span style="font-size: 8px;color: red;">ACADEMIC STATUS</span><br>
                        <center>'.$status.'</center>';
                     $html .='</td>';
                  $html .='</tr>';
                  $html .='<tr>';
                     $html .='<td width="35%">';
                        $html .='<span style="font-size: 8px;color: red;">PARENT/GUARDIANS NAME</span><br>
                        <center>'.$fld_guardianName.'</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 8px;color: red;">CONTACT NUMBER</span><br>
                        <center>'.$fld_mobilePhoneNo.'</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 8px;color: red;">COURSE &amp; SECTION</span><br>
                        <center>'.$fld_programCode.'</center>';
                     $html .='</td>';
                     $html .='<td width="25%">';
                        $html .='<span style="font-size: 8px;color: red;">DATE OF REGISTRATION</span><br>
                        <center>'.date("d-m-Y").'</center>';
                     $html .='</td>';
                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';

         $html .='<tr>';
            $html .='<td colspan="16">';
               $html .='<table border="1" width="100%" style="font-family: Arial;">';
                  $html .='<tr align="center">';
                     $html .='<td width="10%" height="1%" rowspan="2"><span style="font-size: 9px;color: red;">COURSE CODE</span></td>';
                     $html .='<td width="28%" rowspan="2"><span style="font-size: 9px;color: red;">COURSE TITLE</span></td>';
                     $html .='<td width="6%" rowspan="2"><span style="font-size: 8px;color: red;">UNITS</span></td>';
                     $html .='<td width="11%" colspan="2"><span style="font-size: 8px;color: red;">HOURS</span></td>';
                     $html .='<td width="18%" rowspan="2"><span style="font-size: 9px;color: red;">SEC</span></td>';
                     $html .='<td width="10%" rowspan="2"><span style="font-size: 9px;color: red;">RM</span></td>';
                     $html .='<td width="6%" rowspan="2"><span style="font-size: 9px;color: red;">DAYS</span></td>';
                     $html .='<td width="11%" rowspan="2"><span style="font-size: 9px;color: red;">TIME</span></td>';
                  $html .='</tr>';
                  $html .='<tr align="center">';
                     $html .='<td><span style="font-size: 9px;color: red;">Lec</span></td>';
                     $html .='<td><span style="font-size: 9px;color: red;">Lab</span></td>';
                  $html .='</tr>';
                  $subjectsTaken = array();
                  while($row = $getSubjectList->fetch(PDO::FETCH_ASSOC)){
                     extract($row);
                     $getSubjectDetailis = $registrar->readSubjectDetails($fld_subjectID);
                     while($row = $getSubjectDetailis->fetch(PDO::FETCH_ASSOC)){
                     extract($row);
                  $html .='<tr align="center">';
                     $html .='<td><span style="font-size: 10px;">'.$fld_subCode.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_description.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_units.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_lecHrs.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_labHrs.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_sectionName.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_room.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_day.'</span></td>';
                     $html .='<td><span style="font-size: 10px;">'.$fld_startTime.'-'.$fld_endTime.'</span></td>';
                     if($counter == 0){
                     
                     $counter  = 1;
                     }
                  $html .='</tr>';
                  $totalUnits = $totalUnits + $fld_units;
                  $totalLecHrs = $totalLecHrs + $fld_lecHrs;
                  $totalLabHrs = $totalLabHrs + $fld_labHrs;
                    }
               }
               $html .='</table>';
            $html .='</td>';

            $html .='<td colspan="4">';
               $html .='<table border="1" style="font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td colspan="2"><span style="font-size: 9px;color: red;">TUITION FEES<br></span></td>';
                  $html .='</tr>';
                  while($schoolFees = $getSchoolFees->fetch(PDO::FETCH_ASSOC)){
                     extract($schoolFees);
                     if($fld_feeName == "Tuition Fee"){ $fld_price = $fld_price * $totalUnits; }
                     if($fld_feeName == "Lab Fee"){ $fld_price = $fld_price * $totalLabHrs; }
                     $html .='<tr>';
                        $html .='<td><span style="font-size: 10px;">'.$fld_feeName.'</span></td>';
                        $html .='<td><span style="font-size: 10px;">'.$fld_price.'</span></td>';
                     $html .='</tr>';
                     $totalSchoolFees = $totalSchoolFees + $fld_price;
                  }
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';


         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table  border="1" width="100%" cellpadding="5" style="border-color: red; font-family: Arial;">';
                  $html .='<tr align="left">';
                     $html .='<td width="35%">';
                        $html .='<span style="font-size: 9px;color: red;">COLLEGE REGISTRAR</span><br>
                        <center>Shirley P. Landicho</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 8px;color: red;">TOTAL UNITS/HOURS</span><br>
                        <center>'.$totalUnits.' '.$totalLecHrs.' '.$totalLabHrs.'</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 9px;color: red;">TOTAL ASSESSMENT</span><br>
                        <center>'.$totalSchoolFees.'</center>';
                     $html .='</td>';
                     $html .='<td width="25%">';
                        $html .='<span style="font-size: 9px;color: red;">BALANCE</span><br>
                        <center>ISKOLAR NG LUNGSOD</center>';
                     $html .='</td>';
                  $html .='</tr>';

                  $html .='<tr align="left">';
                     $html .='<td width="35%">';
                        $html .='<span style="font-size: 9px;color: red;">ISSUED BY</span><br>
                        <center>Jovielyn G. De Torres</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 9px;color: red;">DATE ISSUED</span><br>
                        <center>'.date("d-M-Y").'</center>';
                     $html .='</td>';
                     $html .='<td width="20%">';
                        $html .='<span style="font-size: 9px;color: red;">AMOUNT PAID</span><br>
                        <center>0.00</center>';
                     $html .='</td>';
                     $html .='<td width="25%">';
                        $html .='<span style="font-size: 9px;color: red;">OR NO.</span><br>
                        <center>N/A</center>';
                     $html .='</td>';
                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';
      $html .='</table>';


$pdf->writeHTMLCell('', '','', 10,$html, 0, 0, 0, true, 'C', true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Preenrolment'.time().'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
