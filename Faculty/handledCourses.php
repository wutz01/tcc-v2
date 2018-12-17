<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "facultyClass.php";

   $staffID     = $_SESSION['staffID'];
   $faculty     = new Faculty();
   $getSubjects = $faculty->readFacultyCourse($staffID);

?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Faculty</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Handled Courses</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                     <!-- Example Basic Form Without Label -->
                     <div class="example-wrap">
                        <h4 class="example-title">Grades</h4>
                        <div class="example">
                        <table class="table table-striped table-bordered width-full" id="tableCourses">
                           <thead>
                              <tr>
                                 <th>Faculty ID</th>
                                 <th>Faculty Name</th>
                                 <th>School Year</th>
                                 <th>Semester</th>
                                 <th>Subject Code</th>
                                 <th>Section Code</th>
                                 <th>Midterms</th>
                                 <th>Finals</th>
                              </tr>
                           </thead>
                           <tbody>
                                <?php 
                            while($row = $getSubjects->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            echo "<tr>";
                            $id = base64_encode($fld_subjectID);
                            $ssy = base64_encode($fld_startSY);
                            $esy = base64_encode($fld_endSY);
                            $sem = base64_encode($fld_semester);

                            echo "<td><button style='border:none; background-color: Transparent; color: blue;' onclick=location.href='showStudents.php?id=".$id."&ssy=".$ssy."&esy=".$esy."&sem=".$sem."'>{$fld_staffId}</button></td>";
                            echo "<td>{$lastName}, {$firstName} {$middleName}</td>";
                            echo "<td>{$fld_startSY} - {$fld_endSY}</td>";
                            echo "<td>{$fld_semester}</td>";
                            echo "<td>{$fld_subCode}</td>";
                            echo "<td>{$fld_sectionName}</td>";
                            echo "<td align='center'>";
                            if($fld_midPosted == "Y"){
                                echo "Y";
                            }
                            else{
                                echo "N";
                            }
                            echo "</td>";
                            echo "<td align='center'>";
                            if($fld_finalPosted == "Y"){
                                echo "Y";
                            }
                            else{
                                echo "N";
                            }
                            echo "</td>";
                            echo "</tr>";

                          }
          ?>
                           </tbody>
                        </table>
                        </div>
                     </div>
                     <!-- End Example Basic Form Without Label -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>

<script type="text/javascript">
 $("#tableCourses").DataTable();
</script>
