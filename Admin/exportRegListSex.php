<?php
error_reporting(0);
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
$pdf->AddPage('L', 'Legal');
$subjectID = "290";

$getAllPrograms = $admin->readAllPrograms(); 

$pdf->SetFont('helvetica', '', 9);
$html ="";
$html ='<table id="exportpdf" width = "100%" style = "font-family:Arial; font-size:14px;" border = "0" cellpadding = "2" cellspacing = "0">';
					$html .='<tr align="left" style="background-color:#B6B6B4;color:black;">';
					$html .= '<th>OFFICE OF THE REGISTRAR</th>';
					$html .='</tr>';

					$html .='<tr align="left">';
					$html .= '<th>REGISTRATION REPORT BY SEX</th>';
					$html .='</tr>';

					$html .='<tr align="left" style="background-color:#B6B6B4;color:black;">';
					$html .= '<th>As of '.date("F d, Y") .'</th>';
					$html .='</tr>';

			$html .='</table><br><br><br>';

               $html .='<table border="1" width="100%" style="font-family: Arial; font-size:13px;" cellpadding="2">';

                  $html .='<tr align="center">';
                     $html .='<td width="3%" rowspan="2"><span>NO</span></td>';
                     $html .='<td width="30%" rowspan="2"><span>PROGRAM</span></td>';
                     $html .='<td width="7%" rowspan="2"><span>CODE</span></td>';
                     $html .='<td width="15%" colspan="3"><span>1st Year</span></td>';
                     $html .='<td width="15%" colspan="3"><span>2nd Year</span></td>';
                     $html .='<td width="15%" colspan="3"><span>3rd Year</span></td>';
                     $html .='<td width="15%" colspan="3"><span>4th Year</span></td>';
                  $html .='</tr>';
 
                  $html .='<tr align="center">';
                     $html .='<td>M</td>';
                     $html .='<td>F</td>';
                     $html .='<td>T</td>';
                     $html .='<td>M</td>';
                     $html .='<td>F</td>';
                     $html .='<td>T</td>';
                     $html .='<td>M</td>';
                     $html .='<td>F</td>';
                     $html .='<td>T</td>';
                     $html .='<td>M</td>';
                     $html .='<td>F</td>';
                     $html .='<td>T</td>';
                  $html .='</tr>';
                  while($row = $getAllPrograms->fetch(PDO::FETCH_ASSOC)){
				  extract($row);
                  $html .='<tr align="center">';
                  	 $html .='<td>'.$fld_programID.'</td>';
                     $html .='<td>'.$fld_programName.'</td>';
                     $html .='<td>'.$fld_programCode.'</td>';
                     
                     $yearLevels = array("1st", "2nd", "3rd", "4th");
                     foreach ($yearLevels as $yearLevel) {
                     	 $getCountBySex = $admin->countRegistrationReportSex($fld_programID, $yearLevel);
						 $count = $getCountBySex->fetch(PDO::FETCH_ASSOC);
						 extract($count);
	                     $html .='<td>'.$maleCount.'</td>';
	                     $html .='<td>'.$femaleCount.'</td>';
	                     $html .='<td>'.($maleCount + $femaleCount).'</td>';
                     }

                  $html .='</tr>';
				  }
               $html .='</table>';

$pdf->writeHTMLCell('', '','', 55,$html, 0, 0, 0, true, 'C', true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Preenrolment'.time().'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

