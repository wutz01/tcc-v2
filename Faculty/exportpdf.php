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
		// Logo
		$image_file = K_PATH_IMAGES.'logo2.jpg';
		$this->Image($image_file, 10, 10, 180, 40, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Position at 20 mm from top
		$this->SetY(20);
		// Set font
		$this->SetFont('helvetica', 'B', 25);
		// Title
		
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-20);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Position at X and Y-axis
		$this->SetXY(0, -15);
		// $this->Cell(0, 10, 'REVISED AS OF '.date('F Y',time()), 0, false, 'C', 0, '', 0, false, 'M', 'M');

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

if(isset($_GET['studentNo'])){

$getStudentNo = base64_decode($_GET['studentNo']);


	include_once "../Student/studentClass.php";
		   
	$student = new Student();
   	$getStudentDetails = $student->readStudentDetails($getStudentNo);
   	$getSubjectList = $student->readSubjectList($getStudentNo);
$pdf->SetFont('helvetica', '', 9);
$html ="";
					while($row = $getStudentDetails->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
$html ='<table id="exportpdf" align = "center" width = "100%" style = "font-family:Arial;" border = "0" cellpadding = "0" cellspacing = "0">';
					$html .='<tr >';
					$html .= '<th colspan="3" style = "font-size:23px;background-color:#736F6E;font-weight:bold;">PRE ENROLLMENT FORM</th>';
					$html .='</tr>';
					$html .='<tr align="left" style = "font-size:18px;background-color:#B6B6B4;color:black;">';
							$html .= '<th width="15%" style="text-align:left;font-size:13px;">Name:</th>';
							$html .= '<th width="35%" style="text-align:left;font-size:13px;">'.$fld_firstName.' '.$fld_middleName.' '.$fld_lastName.'</th>';
							$html .= '<th width="15%" style="text-align:left;font-size:13px;" >Student No:</th>';
							$html .= '<th width="35%" style="text-align:left;font-size:13px;" >'.$getStudentNo.'</th>';
					$html .='</tr>';
					
					$html .='<tr>';
							$html .= '<th style="text-align:left;" style="text-align:left;font-size:13px;">Program:</th>';
							$html .= '<th colspan="3" style="text-align:left;" style="text-align:left;font-size:13px;">' .$fld_programName.'</th>';
					$html .='</tr>';

			$html .='</table><br><br><br>';
}
			$html .='<table align = "center" style = "font-family:Arial;" border = "1" cellpadding = "5" cellspacing = "0">';
					$html .='<tr style = "background-color:#736F6E;font-size:13px;">';
							$html .= '<th width="15%"><b>Subject Code</b></th>';
							$html .= '<th width="34%"><b>Description</b></th>';
							$html .= '<th width="8%"><b>Units</b></th>';
							$html .= '<th width="8%"><b>Day</b></th>';
							$html .= '<th width="15%"><b>Time</b></th>';
							$html .= '<th width="20%"><b>Section</b></th>';
						$html .='</tr>';
			$count = 0;	

						while($row = $getSubjectList->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                         
                        $getSubjectDetailis = $student->readSubjectDetails($fld_subjectID);
                        while($row = $getSubjectDetailis->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        $count++;
						if($count%2 == 0){
							$html .='<tr style = "background-color:white;font-size:10px;">';
						}
						else{
							$html .='<tr style = "background-color:#B6B6B4;font-size:10px;">';
						}
							$html .= '<td>'.$fld_subCode.'</td>';
							$html .= '<td>'.$fld_description.'</td>';
							$html .= '<td>'.$fld_units.'</td>';
							$html .= '<td>'.$fld_day.'</td>';
							$html .= '<td>'.$fld_startTime.'-'.$fld_endTime.'</td>';
							$html .= '<td>'.$fld_sectionName.'</td>';
						$html .='</tr>';
			}
		}
				$html .='</table><br><br><br><br>';
			$html .='<table align = "center" style = "font-family:Arial;" border = "0" cellpadding = "5" cellspacing = "0">';
				$html .='<tr>';
				$html .='<td align="left">Evaluated by:</td>';
				$html .='<td align="left"></td>';
				$html .='<td></td>';
				$html .='</tr>';
				$html .='<tr>';
				$html .='<td></td>';
				$html .='<td></td>';
				$html .='<td></td>';
				$html .='</tr>';
				$html .='<tr>';
				$html .='<td>______________________________</td>';
				$html .='<td>______________________________</td>';
				$html .='<td>______________________________</td>';
				$html .='</tr>';
				$html .='<tr>';
				$html .='<td>Name of Adviser</td>';
				$html .='<td>VP for Academic Affairs</td>';
				$html .='<td>School Registrar</td>';
				$html .='</tr>';
				$html .='</table><br><br>';

$html .='<table align = "center" style = "font-family:Arial;" border = "1" cellpadding = "5" cellspacing = "0">';
				$html .='<tr>';
				$html .='<td>Submit this form when claiming the Official Enrolment and Assesment Form on your scheduled enrolment.</td>';
				$html .='</tr>';
				$html .='</table>';

$pdf->writeHTMLCell('', '','', 55,$html, 0, 0, 0, true, 'C', true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Preenrolment'.time().'.pdf', 'I');
}


//============================================================+
// END OF FILE
//============================================================+
