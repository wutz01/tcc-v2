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

if(isset($_GET['subjectID'])){
   $getsubjectID = base64_decode($_GET['subjectID']);
}

$conn = mysqli_connect('localhost' , 'root', '', 'db_tcc');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$objPHPExcel->setActiveSheetIndex(0);

$date = date("d-M-Y");

// Add some data
$objPHPExcel->getActiveSheet();

$maxWidth = 700;
$maxHeight = 40;

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A4:D4')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A5:D5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->freezePane('A6');
$objPHPExcel->getActiveSheet()->freezePane('E6');


$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
$objPHPExcel->getActiveSheet()->mergeCells('A3:D3');
$objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
$objPHPExcel->getActiveSheet()->mergeCells('E1:BS5');

$sqlListDetails = "SELECT subject.fld_subCode
                    FROM tbl_subject AS subject
                    JOIN tbl_availablecourse AS acourse ON (acourse.fld_subjectID = subject.fld_subjectID)
                    WHERE acourse.fld_availableCourseID = ".$getsubjectID."";

$detailList = mysqli_query($conn, $sqlListDetails);
$detailListrow = mysqli_fetch_assoc($detailList);
extract($detailListrow);

$objPHPExcel->getActiveSheet()->getCell('A1')->setValue('OFFICE OF THE REGISTRAR');
$objPHPExcel->getActiveSheet()->getCell('A2')->setValue('LIST OF REGISTERED STUDENTS');
$objPHPExcel->getActiveSheet()->getCell('A3')->setValue('AS OF '.$date);
$objPHPExcel->getActiveSheet()->getCell('A4')->setValue('COURSE CODE: '.$fld_subCode);

$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$objPHPExcel->getActiveSheet()->setCellValue('A5', 'NO.');
$objPHPExcel->getActiveSheet()->setCellValue('B5', 'STUDENT NUMBER');
$objPHPExcel->getActiveSheet()->setCellValue('C5', 'STUDENT NAME');
$objPHPExcel->getActiveSheet()->setCellValue('D5', 'PROGRAM');
$objPHPExcel->getActiveSheet()->setCellValue('E5', '');

$column = 6;
$counter = 0;

$sqlList = "SELECT esubjects.fld_studentNo, student.fld_firstName, student.fld_middleName, student.fld_lastName, program.fld_programCode 
                    FROM tbl_enrolledsubjects AS esubjects 
                    JOIN tbl_availablecourse As acourse ON (acourse.fld_availableCourseID = esubjects.fld_subjectID) 
                    JOIN tbl_student AS student ON (student.fld_studentNo = esubjects.fld_studentNo) 
                    JOIN tbl_program AS program on (program.fld_programID = student.fld_program)
                    WHERE acourse.fld_availableCourseID = ".$getsubjectID."";

$resultList = mysqli_query($conn, $sqlList);

if (mysqli_num_rows($resultList) > 0) {
  while($row = mysqli_fetch_assoc($resultList)) {
  extract($row);
  $counter++;
  $objPHPExcel->getActiveSheet()->SetCellValue("A".$column, $counter);
  $objPHPExcel->getActiveSheet()->SetCellValue("B".$column, $fld_studentNo);
  $objPHPExcel->getActiveSheet()->SetCellValue("C".$column, $fld_firstName.' '.$fld_middleName.' '.$fld_lastName);
  $objPHPExcel->getActiveSheet()->SetCellValue("D".$column, $fld_programCode);
  $column++;
  }
}
     
for($col = 'A'; $col !== 'E'; $col++) {
    $objPHPExcel->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

for($col = 'E'; $col !== 'BS'; $col++) {
    $objPHPExcel->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setWidth('5');
}





// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Attendance Sheet.xlsx"');
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

