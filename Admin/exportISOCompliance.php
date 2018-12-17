<?php 
session_start();
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
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt  LGPL
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
      ->setTitle("Export");


$conn = mysqli_connect('localhost' , 'root', '', 'db_tcc');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlList = "SELECT compliance.fld_studentNo, student.fld_firstName, student.fld_lastName, student.fld_middleName, student.fld_sex, program.fld_programCode, compliance.fld_dateOfRegistration, student.fld_yearLevel, student.fld_new
FROM tbl_compliance AS compliance
JOIN tbl_student AS student on (student.fld_studentNo = compliance.fld_studentNo)
JOIN tbl_program AS program on (program.fld_programID = student.fld_program)";

$resultList = mysqli_query($conn, $sqlList);

$objPHPExcel->setActiveSheetIndex(0);

$date = date("d-M-Y");

// Add some data
$objPHPExcel->getActiveSheet();

$maxWidth = 700;
$maxHeight = 40;

$objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3:O3')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getCell('A1')->setValue('OFFICE OF THE REGISTRAR');
$objPHPExcel->getActiveSheet()->getCell('A2')->setValue('ISO COMPLIANCE REPORT');
$objPHPExcel->getActiveSheet()->getCell('A3')->setValue('AS OF '.$date);

$objPHPExcel->getActiveSheet()->setCellValue('A5', 'NO.');
$objPHPExcel->getActiveSheet()->setCellValue('B5', 'STUDENT NUMBER');
$objPHPExcel->getActiveSheet()->setCellValue('C5', 'STUDENT NAME');
$objPHPExcel->getActiveSheet()->setCellValue('D5', 'SEX');
$objPHPExcel->getActiveSheet()->setCellValue('E5', 'PROGRAM');
$objPHPExcel->getActiveSheet()->setCellValue('F5', 'DATE OF REGISTRATION');
$objPHPExcel->getActiveSheet()->setCellValue('G5', 'YEAR LEVEL');
$objPHPExcel->getActiveSheet()->setCellValue('H5', 'ADMISSION STATUS');
$objPHPExcel->getActiveSheet()->setCellValue('I5', 'ACADEMIC STATUS');
$objPHPExcel->getActiveSheet()->setCellValue('J5', 'SCHOLASTIC STATUS');
$objPHPExcel->getActiveSheet()->setCellValue('K5', 'TIME IN');
$objPHPExcel->getActiveSheet()->setCellValue('L5', 'TIME OUT');
$objPHPExcel->getActiveSheet()->setCellValue('M5', 'LAPSE TIME');

$column = 6;
$counter = 0;
if (mysqli_num_rows($resultList) > 0) {
  while($row = mysqli_fetch_assoc($resultList)) {
  extract($row);
  $counter++;
  $objPHPExcel->getActiveSheet()->SetCellValue("A".$column, $counter);
  $objPHPExcel->getActiveSheet()->SetCellValue("B".$column, $fld_studentNo);
  $objPHPExcel->getActiveSheet()->SetCellValue("C".$column, $fld_firstName.' '.$fld_middleName.' '.$fld_lastName);
  $objPHPExcel->getActiveSheet()->SetCellValue("D".$column, $fld_sex);
  $objPHPExcel->getActiveSheet()->SetCellValue("E".$column, $fld_programCode);
  $objPHPExcel->getActiveSheet()->SetCellValue("F".$column, date("Y-m-d",strtotime($fld_dateOfRegistration)));
  $objPHPExcel->getActiveSheet()->SetCellValue("G".$column, $fld_yearLevel);
  $objPHPExcel->getActiveSheet()->SetCellValue("H".$column, $fld_new);
  $column++;
  }
}

// $objPHPExcel->getSheetByName('programList')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ISO Compliance Report.xlsx"');
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

