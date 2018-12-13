<?php 

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Singapore');

if (PHP_SAPI == 'cli')
	die('This Excel should only be run from a Web Browser');

/** Include PHPExcel */
require_once  '../PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("TCC")
	    ->setLastModifiedBy("TCC - Admin")
	    ->setTitle("Import Applicants");

$conn = mysqli_connect('localhost' , 'root', '', 'db_tcc');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlProgram = "SELECT fld_programID, fld_programName
FROM tbl_program";

$resultPrograms = mysqli_query($conn, $sqlProgram);

$column=1;

$newSheet=$objPHPExcel->createSheet();            
$objPHPExcel->setActiveSheetIndex(1);
$newSheet->setTitle("programList");

if (mysqli_num_rows($resultPrograms) > 0) {
  while($row = mysqli_fetch_assoc($resultPrograms)) {
  extract($row);
  $objPHPExcel->setActiveSheetIndex(1)->SetCellValue("A".$column, $fld_programID);
  $objPHPExcel->setActiveSheetIndex(1)->SetCellValue("B".$column, $fld_programName);
  $column++;
  }
}

$objPHPExcel->addNamedRange( 
new PHPExcel_NamedRange(
'programIDList', 
$objPHPExcel->setActiveSheetIndex(1), 
'A1:A'.$column
) 
);

$objPHPExcel->addNamedRange( 
new PHPExcel_NamedRange(
'programNameList', 
$objPHPExcel->setActiveSheetIndex(1), 
'B1:B'.$column
) 
);


// Add some data
$objPHPExcel->setActiveSheetIndex(0);

$maxWidth = 700;
$maxHeight = 40;

$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'LAST NAME');
$objPHPExcel->getActiveSheet(0)->setCellValue('B1', 'FIRST NAME');
$objPHPExcel->getActiveSheet(0)->setCellValue('C1', 'MIDDLE NAME');
$objPHPExcel->getActiveSheet(0)->setCellValue('D1', 'ADDRESS');
$objPHPExcel->getActiveSheet(0)->setCellValue('E1', 'EMAIL');
$objPHPExcel->getActiveSheet(0)->setCellValue('F1', 'BIRTHDATE');
$objPHPExcel->getActiveSheet(0)->setCellValue('G1', 'TRANSFEREE');
$objPHPExcel->getActiveSheet(0)->setCellValue('H1', 'SCHOOL LAST ATTENDED');
$objPHPExcel->getActiveSheet(0)->setCellValue('I1', 'YEAR GRADUATED');
$objPHPExcel->getActiveSheet(0)->setCellValue('J1', 'PREFFERED PROGRAM #1');
$objPHPExcel->getActiveSheet(0)->setCellValue('K1', 'PREFFERED PROGRAM #2');

$objPHPExcel->setActiveSheetIndex(0);

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('G' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('"Yes,No"');
}

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('J' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('=programNameList');
}

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('K' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('=programNameList');
}

for($col = 'A'; $col !== 'L'; $col++) {
    $objPHPExcel->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

$objPHPExcel->getSheetByName('programList')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Template.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

exit;
?>

