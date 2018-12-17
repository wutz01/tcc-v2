<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "adminClass.php";
   
   $admin        = new Admin();
   $getAllEnrolledSubjects = $admin->readAllEnrolledClass();
   $getAllProgram = $admin->readAllPrograms();
   $getAllSection = $admin->readAllSections();
   
 
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Printing of Class List</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Class List</h4>
                     <div class="example">
                        <div class="form-group row">

                           <div class="col-sm-4">
                              <select class='form-control' name='programID' id='programID' data-plugin='selectpicker' data-live-search='true'>
                                 <option value=''>Select Program Code</option>
                                 <?php
                                    while($row = $getAllProgram->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_programID}'>{$fld_programCode}</option>";
                                    }
                                    ?>
                              </select>
                           </div>

                           <div class="col-sm-4">
                              <select class='form-control' name='subjectID' id='subjectID' data-plugin='selectpicker' data-live-search='true'>
                                 <option value=''>Select Subject Code</option>
                                 <?php
                                    while($row = $getAllEnrolledSubjects->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_availableCourseID}'>{$fld_subCode}</option>";
                                    }
                                    ?>
                              </select>
                           </div>

                          <div class="col-sm-4">
                              <select class='form-control' name='sectionID' id='sectionID' data-plugin='selectpicker' data-live-search='true'>
                                 <option value=''>Select Section Code</option>
                                 <?php
                                    while($row = $getAllSection->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_sectionID}'>{$fld_sectionName}</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">

                           <div class="col-sm-6">
                              <a href="#" id="btnPrintClassList" class="btn btn-primary pull-right">Print Class List</a>
                           </div>
                           <div class="col-sm-6">
                              <a href="#" id="btnPrintAttendanceSheet" class="btn btn-primary pull-left" disabled="true">Print Attendace Sheet</a>
                           </div>
                        </div>
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

   $(document).on('change', 'select', function(){
      var programID = $("#programID").val();
      var subjectID = $("#subjectID").val();
      var sectionID = $("#sectionID").val();

      if(programID == "" && sectionID == "" && subjectID != ""){
         $('#btnPrintAttendanceSheet').removeAttr('disabled');
      }else{
         $("#btnPrintAttendanceSheet").attr("disabled", "true");
      }
   });

   $(document).on('click', '#btnPrintAttendanceSheet', function(){
         var subjectID = $("#subjectID").val();
         
         if(programID != "" || subjectID != "" || sectionID != ""){
         window.location = 'exportAttendanceSheet.php?subjectID=' + btoa(subjectID);
         }
         
   });

   $(document).on('click', '#btnPrintClassList', function(){
         var programID = $("#programID").val();
         var subjectID = $("#subjectID").val();
         var sectionID = $("#sectionID").val();

         if(programID != "" || subjectID != "" || sectionID != ""){
         window.location = 'exportClassList.php?programID=' + btoa(programID) +'&subjectID=' + btoa(subjectID)+'&sectionID=' + btoa(sectionID);
         }
         
   });

</script>