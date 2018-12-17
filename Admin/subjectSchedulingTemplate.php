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
	    ->setTitle("Import Subjects");

$conn = mysqli_connect('localhost' , 'root', '', 'tanauaud_tcc');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlSubjects = "SELECT fld_subCode
FROM tbl_subject";

$resultSubjects = mysqli_query($conn, $sqlSubjects);

$column=1;

$newSheet=$objPHPExcel->createSheet();            
$objPHPExcel->setActiveSheetIndex(1);
$newSheet->setTitle("subjectList");

if (mysqli_num_rows($resultSubjects) > 0) {
  while($row = mysqli_fetch_assoc($resultSubjects)) {
  extract($row);
  $objPHPExcel->setActiveSheetIndex(1)->SetCellValue("A".$column, $fld_subCode);
  $column++;
  }
}

$objPHPExcel->addNamedRange( 
new PHPExcel_NamedRange(
'subjectList', 
$objPHPExcel->setActiveSheetIndex(1), 
'A1:A'.$column
) 
);

$sqlRoom = "SELECT fld_roomName
FROM tbl_rooms";

$resultRoom = mysqli_query($conn, $sqlRoom);

$column=1;

$newSheet=$objPHPExcel->createSheet();            
$objPHPExcel->setActiveSheetIndex(2);
$newSheet->setTitle("roomList");

if (mysqli_num_rows($resultRoom) > 0) {
  while($row = mysqli_fetch_assoc($resultRoom)) {
  extract($row);
  $objPHPExcel->setActiveSheetIndex(2)->SetCellValue("A".$column, $fld_roomName);
  $column++;
  }
}

$objPHPExcel->addNamedRange( 
new PHPExcel_NamedRange(
'roomList', 
$objPHPExcel->setActiveSheetIndex(2), 
'A1:A'.$column
) 
);

$sqlFaculty = "SELECT staffId
FROM tbl_staffs
WHERE staffId != '0'";

$resultFaculty = mysqli_query($conn, $sqlFaculty);

$column=1;

$newSheet=$objPHPExcel->createSheet();            
$objPHPExcel->setActiveSheetIndex(3);
$newSheet->setTitle("facultyList");

if (mysqli_num_rows($resultFaculty) > 0) {
  while($row = mysqli_fetch_assoc($resultFaculty)) {
  extract($row);
  // $fullName = $firstName." ".$lastName;
  // $objPHPExcel->setActiveSheetIndex(3)->SetCellValue("A".$column, $fullName);
  $objPHPExcel->setActiveSheetIndex(3)->SetCellValue("A".$column, $staffId);
  $column++;
  }
}

$objPHPExcel->addNamedRange( 
new PHPExcel_NamedRange(
'facultyList', 
$objPHPExcel->setActiveSheetIndex(3), 
'A1:A'.$column
) 
);

// Add some data
$objPHPExcel->setActiveSheetIndex(0);

$maxWidth = 700;
$maxHeight = 40;

$objPHPExcel->getActiveSheet(0)->setCellValue('A1', 'Subject Code');
$objPHPExcel->getActiveSheet(0)->setCellValue('B1', 'Section');
$objPHPExcel->getActiveSheet(0)->setCellValue('C1', 'Room');
$objPHPExcel->getActiveSheet(0)->setCellValue('D1', 'Day');
$objPHPExcel->getActiveSheet(0)->setCellValue('E1', 'Start Time');
$objPHPExcel->getActiveSheet(0)->setCellValue('F1', 'End Time');
$objPHPExcel->getActiveSheet(0)->setCellValue('G1', 'Available Slots');
$objPHPExcel->getActiveSheet(0)->setCellValue('H1', 'Faculty');

$objPHPExcel->setActiveSheetIndex(0);

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('A' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('=subjectList');
}

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('C' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('=roomList');
}

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('D' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('"M, T, W, TH, F, S, MT, WTH, FS, MWF, TTH"');
}

for ($i = 2; $i <= 250; $i++)
{
$objValidation = $objPHPExcel->getSheet(0)->getCell('H' . $i)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Value is not in list.');
$objValidation->setFormula1('=facultyList');
}

for($col = 'A'; $col !== 'I'; $col++) {
    $objPHPExcel->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

$objPHPExcel->getSheetByName('subjectList')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);
$objPHPExcel->getSheetByName('roomList')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);
$objPHPExcel->getSheetByName('facultyList')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Subject Sched Template.xlsx"');
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

