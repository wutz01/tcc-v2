<?php

   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "facultyClass.php";   
   $faculty     = new Faculty();
   

if(isset($_GET['Sid'])|| isset($_GET['ssy']) || isset($_GET['esy']) || isset($_GET['sem'])){
  $courseID = base64_decode($_GET['id']);
  $ssy = base64_decode($_GET['ssy']);
  $esy = base64_decode($_GET['esy']);
  $semester = base64_decode($_GET['sem']);
  $getCourseStudents = $faculty->readCourseStudents($courseID);
  $getCourseDetails = $faculty->readCourseDetails($courseID);
}
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Faculty</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li><a href="../Faculty/handledCourses.php">Handled Courses</a></li>
         <li class="active">Details</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Handled Courses</h4>
                     <?php 
                     while($row = $getCourseDetails->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            ?>
                        <div class="form-group row">
                           <div class="col-sm-5">
                              School Year:&nbsp;<label style="font-weight: bold;"><?php echo $ssy." - ".$esy; ?> </label>
                           </div>
                           <div class="col-sm-5">
                              Course:&nbsp;<label style="font-weight: bold;"><?php echo $fld_subCode." - ".$fld_description; ?> </label>
                           </div>
                        </div>


                        <div class="form-group row">
                           <div class="col-sm-5">
                              Semester:&nbsp;<label style="font-weight: bold;"><?php echo $semester; ?> </label>
                           </div>
                           <div class="col-sm-2">
                              Section:&nbsp;<label style="font-weight: bold;"><?php echo $fld_sectionName; ?> </label>
                           </div>
                         <div class="col-sm-3">
                              Schedule:&nbsp;<label style="font-weight: bold;"><?php echo $fld_day." ".$fld_startTime." - ".$fld_endTime; ?> </label>
                           </div>
                        </div>


                        <div class="form-group row">
                           <div class="col-sm-5">
                              Professor:&nbsp;<label style="font-weight: bold;"><?php echo $firstName." ".$lastName; ?> </label>
                           </div>
                        </div>

<?php   }      ?>
<br>
                     <div class="form-group" id="">
                        <table class="table table-striped table-bordered width-full" id="tableStudents">
                           <thead>
                              <tr>
                                 <th>Student Number</th>
                                 <th>Student Name</th>
                              </tr>
                           </thead>
                           <tbody>
                                <?php 
                            while($row = $getCourseStudents->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            echo "<tr>";
                            echo "<td>{$fld_studentNo}</td>";
                            echo "<td>{$fld_lastName}, {$fld_firstName} {$fld_middleName}</td>";
                            echo "</tr>";

                          }
          ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
<?php
   include_once "../General/footer.php";
   ?>