<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "registrarClass.php";
   $registrar = new Registrar();
?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Registrar</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Grades Log</li>
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
                        <h4 class="example-title">Log</h4>
                        <div class="example">
                        <table class="table table-striped width-full" id="tableGradesLog">
                           <thead>
                              <tr>
                                 <th>Ctrl No</th>
                                 <th>Date</th>
                                 <th>Student No</th>
                                 <th>Student Name</th>
                                 <th>Subject Code</th>
                                 <th>Midterm Grade</th>
                                 <th>Final Grade</th>
                                 <th>Semestral Grade</th>
                                 <th>Numerical Grade</th>
                                 <th>Faculty</th>
                              </tr>
                           </thead>
                           <tbody>
                          <?php
                             $getAllLogs = $registrar->readGradesLog();
                             while($row = $getAllLogs->fetch(PDO::FETCH_ASSOC)){
                             extract($row);
                              echo "<tr>";
                                 echo "<td>{$fld_controlNo}</td>";
                                 echo "<th>{$fld_datetime}</th>";
                                 echo "<th>{$fld_studentNo}</th>";
                                 echo "<th>{$fld_lastName}, {$fld_firstName} {$fld_middleName}</th>";
                                 echo "<th>{$fld_subCode}</th>";
                                 echo "<th>{$fld_midtermGrade}</th>";
                                 echo "<th>{$fld_finalsGrade}</th>";
                                 echo "<th>{$fld_semestralGrade}</th>";
                                 echo "<th>{$fld_numericalGrade}</th>";
                                 echo "<th>{$lastName}, {$firstName} {$middleName}</th>";
                              echo "</tr>";
                               } ?>
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
  $('#tableGradesLog').DataTable();
</script>