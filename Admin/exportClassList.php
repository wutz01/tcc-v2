<?php
include_once "adminClass.php";
$admin = new Admin();
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
$pdf->SetTitle('Class List | TCC');

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
if(isset($_GET['programID']) || isset($_GET['subjectID']) || isset($_GET['sectionID'])){
   $getprogramID = base64_decode($_GET['programID']);
   $getsubjectID = base64_decode($_GET['subjectID']);
   $getsectionID = base64_decode($_GET['sectionID']);
   $getSubjectClassList = $admin->readOneSubjectClassList($getprogramID,$getsubjectID,$getsectionID);
}

$pdf->SetFont('helvetica', '', 9);
$html ="";
$html ='<table id="exportpdf" width = "100%" style = "font-family:Arial;" border = "0" cellpadding = "2" cellspacing = "0">';
					$html .='<tr>';
					$html .= '<th style = "font-size:20px;background-color:#736F6E;font-weight:bold;">CLASS LIST</th>';
					$html .='</tr>';
					$html .='<tr>';
					$html .= '<th>As of '.date('m/d/y H:m:s',time()).'</th>';
					$html .='</tr>';
			$html .='</table><br><br>';

               $html .='<table border="1" width="100%" style="font-family: Arial; font-size:13px;" cellpadding="2">';
                  $html .='<tr align="center">';
                     $html .='<th width="3%"><span></span></th>';
                     $html .='<th width="17%"><span>STUDENT NO</span></th>';
                     $html .='<th width="35%"><span>STUDENT NAME</span></th>';
                     $html .='<th width="15%"><span>PROGRAM</span></th>';
                     $html .='<th width="15%"><span>YEAR LEVEL</span></th>';
                     $html .='<th width="15%"><span>SECTION</span></th>';
                  $html .='</tr>';
                  $counter=1;
                  while($row = $getSubjectClassList->fetch(PDO::FETCH_ASSOC)){
				  extract($row);
                  $html .='<tr align="center">';
                     $html .='<td><span>'.$counter.'</span></td>';
                     $html .='<td><span>'.$fld_studentNo.'</span></td>';
                     $html .='<td><span>'.$fld_firstName.' '.$fld_lastName.'</span></td>';
                     $html .='<td><span>'.$fld_programCode.'</span></td>';
                     $html .='<td><span>'.$fld_yearLevel.'</span></td>';
                     $html .='<td><span>'.$fld_sectionName.'</span></td>';
                  $html .='</tr>';
					$counter+=1;
					}
               $html .='</table>';

$pdf->writeHTMLCell('', '','', 55,$html, 0, 0, 0, true, 'C', true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Preenrolment'.time().'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
