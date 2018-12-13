<?php
error_reporting(0);
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
$pdf->SetTitle('Pre-Enrolment Form | TCC');

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

$getApplicantID =$_GET['applicantID'];


	include_once "VPforAcadClass.php";
		   
	$VPforAcad = new VPforAcad();
$pdf->SetFont('helvetica', '', 9);
$html ="";

$html .='<table border="0" width="100%" style="border-color: red;">';
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
               $html .='<table border="1" width="100%" cellpadding="10" style="border-color: red; font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td height="49" colspan="9">Tanauan City College</td>';
                     $html .='<td height="49" colspan="6">Tanauan City College</td>';
                     $html .='<td height="49" colspan="5">Tanauan City College</td>';
                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';
         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table  border="1" width="100%" cellpadding="10" style="border-color: red; font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td width="15%" colspan="3">';
                        $html .='<span style="font-size: 12px;color: red;">STUDENT NUMBER</span><br>
                        <center>TCC-0279-2015</center>';
                     $html .='</td>';
                     $html .='<td colspan="7">';
                        $html .='<span style="font-size: 12px; color: red;">NAME (Last, First, Middle, Maiden Name, if married woman)</span><br>
                        <center>ESPINO, ARJAY TARROSA</center>';
                     $html .='</td>';
                     $html .='<td width="5%" colspan="1">';
                        $html .='<span style="font-size: 12px; color: red;">SEX</span><br>
                        <center>M</center>';
                     $html .='</td>';
                     $html .='<td colspan="2">';
                        $html .='<span style="font-size: 12px; color: red;">SEMESTER</span><br>
                        <center>2nd Sem</center>';
                     $html .='</td>';
                     $html .='<td colspan="2">';
                        $html .='<span style="font-size: 12px; color: red;" >SCHOOL YR</span><br>
                        <center>2016-2017</center>';
                     $html .='</td>';
                     $html .='<td colspan="5">';
                        $html .='<span style="font-size: 12px; color: red;">ADMISSION STATUS</span><br>
                        <center>New</center>';
                     $html .='</td>';
                  $html .='</tr>';
                  $html .='<tr>';
                     $html .='<td colspan="11">';
                        $html .='<span style="font-size: 12px;color: red;">ADDRESS</span><br>
                        <center>#9089 Purok 2, Brgy. Talaga, Tanauan City, Batangas</center>';
                     $html .='</td>';
                     $html .='<td colspan="4">';
                        $html .='<span style="font-size: 12px;color: red;">YEAR LEVEL</span><br>
                        <center>2nd Year</center>';
                     $html .='</td>';
                     $html .='<td colspan="5">';
                        $html .='<span style="font-size: 12px;color: red;">ACADEMIC STATUS</span><br>
                        <center>Irregular</center>';
                     $html .='</td>';
                  $html .='</tr>';
                  $html .='<tr>';
                     $html .='<td colspan="8">';
                        $html .='<span style="font-size: 12px;color: red;">PARENT/GUARDIANS NAME</span><br>
                        <center>Mary Jane T. Espino</center>';
                     $html .='</td>';
                     $html .='<td colspan="3">';
                        $html .='<span style="font-size: 12px;color: red;">CONTACT NUMBER</span><br>
                        <center>9354357821</center>';
                     $html .='</td>';
                     $html .='<td colspan="4">';
                        $html .='<span style="font-size: 12px;color: red;">COURSE &amp; SECTION</span><br>
                        <center>BTTE ETRO - Irreg 1</center>';
                     $html .='</td>';
                     $html .='<td width="22%" colspan="5">';
                        $html .='<span style="font-size: 12px;color: red;">DATE OF REGISTRATION</span><br>
                        <center>11-Jan-17</center>';
                     $html .='</td>';
                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';
         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table  border="1" width="100%" cellpadding="10" style="border-color: red; font-family: Arial;">';
                  $html .='<tr align="center">';
                     $html .='<td colspan="2" rowspan="2"><span style="font-size: 15px;color: red;">COURSE CODE</span></td>';
                     $html .='<td colspan="5" rowspan="2"><span style="font-size: 15px;color: red;">COURSE TITLE</span></td>';
                     $html .='<td colspan="1" rowspan="2"><span style="font-size: 15px;color: red;">UNITS</span></td>';
                     $html .='<td colspan="2"><span style="font-size: 15px;color: red;">HOURS</span></td>';
                     $html .='<td colspan="1" rowspan="2"><span style="font-size: 15px;color: red;">SEC</span></td>';
                     $html .='<td colspan="1" rowspan="2"><span style="font-size: 15px;color: red;">RM</span></td>';
                     $html .='<td colspan="2" rowspan="2"><span style="font-size: 15px;color: red;">DAYS</span></td>';
                     $html .='<td colspan="2" rowspan="2"><span style="font-size: 15px;color: red;">TIME</span></td>';
                     $html .='<td colspan="3" rowspan="2"><span style="font-size: 15px;color: red;">SCHOOL FEES</span></td>';
                  $html .='</tr>';
                  $html .='<tr align="center">';
                     $html .='<td><span style="font-size: 15px;color: red;">Lec</span></td>';
                     $html .='<td><span style="font-size: 15px;color: red;">Lab</span></td>';
                  $html .='</tr>';
                  $html .='<tr align="center">';
                     $html .='<td colspan="2">RIZA1</td>';
                     $html .='<td colspan="5">Rizals Life, Works and Writings</td>';
                     $html .='<td colspan="1">3</td>';
                     $html .='<td colspan="1">3</td>';
                     $html .='<td colspan="1">0</td>';
                     $html .='<td colspan="1">IR1</td>';
                     $html .='<td colspan="1">R303</td>';
                     $html .='<td colspan="2">MT</td>';
                     $html .='<td colspan="2">4:00-5:30</td>';
                     $html .='<td colspan="3">';
                        $html .='<table>';
                           $html .='<tr>';
                              $html .='<td>Tuition Fee</td>';
                              $html .='<td>5,400.00</td>';
                           $html .='</tr>';
                        $html .='</table>';
                     $html .='</td>';
                  $html .='</tr>';
               $html .='</table>';
            $html .='</td>';
         $html .='</tr>';
         $html .='<tr>';
            $html .='<td colspan="20">';
               $html .='<table  border="1" width="100%" cellpadding="10" style="border-color: red; font-family: Arial;">';
                  $html .='<tr>';
                     $html .='<td colspan="3">';
                        $html .='<span style="font-size: 15px;color: red;">COLLEGE REGISTRAR</span><br>
                        <center>Shirley P. Landicho</center>';
                     $html .='</td>';
                     $html .='<td>';
                        $html .='<span style="font-size: 15px;color: red;">TOTAL UNITS/HOURS</span><br>
                        <center>27 23 10</center>';
                     $html .='</td>';
                     $html .='<td colspan="3">';
                        $html .='<span style="font-size: 15px;color: red;">TOTAL ASSESSMENT</span><br>
                        <center>13,450.00</center>';
                     $html .='</td>';
                     $html .='<td colspan="2">';
                        $html .='<span style="font-size: 15px;color: red;">BALANCE</span><br>
                        <center>ISKOLAR NG LUNGSOD</center>';
                     $html .='</td>';
                  $html .='</tr>';
                  $html .='<tr>';
                     $html .='<td colspan="3">';
                        $html .='<span style="font-size: 15px;color: red;">ISSUED BY</span><br>
                        <center>Jovielyn G. De Torres</center>';
                     $html .='</td>';
                     $html .='<td>';
                        $html .='<span style="font-size: 15px;color: red;">DATE ISSUED</span><br>
                        <center>11-Jan-17</center>';
                     $html .='</td>';
                     $html .='<td colspan="3">';
                        $html .='<span style="font-size: 15px;color: red;">AMOUNT PAID</span><br>
                        <center>0.00</center>';
                     $html .='</td>';
                     $html .='<td colspan="2">';
                        $html .='<span style="font-size: 15px;color: red;">OR NO.</span><br>
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
}


//============================================================+
// END OF FILE
//============================================================+
