<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Applicant</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Pre-Enrollment Form</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Pre-Enrollment Form</h4>
                     <div class="example">
                        <div class="form-group row">
                           <div class="col-sm-5">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="name">Name: </label>
                           <label class="control-label" id="applicantName"></label><br>
                           <label class="control-label" for="units">Max units: </label>
                           <label class="control-label" id="maxunits"></label>
                           <input type="hidden" value="" id="prefferedcourse" />
                           <input type="hidden" value="" id="prefferedProgram" />
                           <input type="hidden" value="" id="studentNumber" />
                           <input type="hidden" value="" id="yearLevel" />
                        </div>
                        <hr style="height:5px; background-color: black;">
                        <div class="form-group row">
                           <div class="col-sm-6">
                              <button type="button" id="addCourse" class="btn btn-primary" data-target="#addCourseModal"
                                 data-toggle="modal">Add Course</button>
                              <button type="button" id="autoFill" class="btn btn-warning">Auto-FIll Courses</button>
                           </div>
                        </div>
                     </div>
                     <div class="form-group" id="refreshThis">
                        <table class="table table-striped width-full" id="tablePreEnrollmentForm">
                           <thead>
                              <tr>
                                 <th>Subject Code</th>
                                 <th>Description</th>
                                 <th>Units</th>
                                 <th>Day</th>
                                 <th>Start Time</th>
                                 <th>End Time</th>
                                 <th>Section</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <input type="hidden" value="0" id="count" />
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                              </tr>
                           </tfoot>
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
<!-- Modal -->
<div class="modal fade modal-primary" id="addCourseModal" aria-hidden="true"
   aria-labelledby="exampleModalPrimary" role="dialog" tabindex="-1">
   <div class="modal-dialog" style="width: 90%;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">Add Course</h4>
         </div>
         <div class="modal-body">
            <div class="form-group row">
               <div class="col-sm-3"> 
                  <input type="text" class="form-control" name="code" id="code">
               </div>
               <div class="col-sm-3">
                  <select class='form-control' name='selectType' id='selectType' data-plugin='selectpicker' data-live-search='true'>
                     <option value='Course Code'>Course Code</option>
                     <option value='Course Description'>Course Description</option>
                     <option value='Section'>Section</option>
                  </select>
               </div>
               <div class="col-sm-6">
                  <button type="button" id="" class="btn btn-primary">Search</button>
               </div>
            </div>
            <div class="form-group">
               <table class="tableAvailableCourses table table-striped width-full" id="tableAvailableCourses">
                  <thead>
                     <tr>
                        <th>Subject&nbsp;Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Section</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Subject&nbsp;Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Section</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- End Modal -->
<?php
   include_once "../General/footer.php";
   ?>
<script type="text/javascript">
   
  $(document).ready(function(){
      changeName();
  });

   var subjtbl = $("#tableAvailableCourses").DataTable({
   "processing": true,
   "serverSide": true,
   "bServerSide": false,
   "ajax":{
   "method":"POST",
   "url":"../Student/ajaxRequest.php",
   "dataSrc":"",
   "data":function(d){
     d.getfunctionName = "getsubjectlist",
     d.programID = $('#prefferedProgram').val()
   }
   },
   "columns":[
   {"data":"fld_subCode"},
   {"data":"fld_description"},
   {"data":"fld_units"},
   {"data":"fld_day"},
   {"data":"fld_startTime"},
   {"data":"fld_endTime"},
   {"data":"fld_sectionName"}
   ],
   "columnDefs": [
           {
           "render": function (data, type, row) {
             return "<button style='border:none; background-color: Transparent; color: blue;'  onclick='addCourse("+row.fld_availableCourseID+")'>"+data+"</button>";
           },
           "targets": 0
       },
   ]
   });
   
   var pretbl = $("#tablePreEnrollmentForm").DataTable({
   "processing": true,
   "serverSide": true,
   "bServerSide": false,
   "ajax":{
   "method":"POST",
   "url":"../Student/ajaxRequest.php",
   "dataSrc":"",
   "data":function(d){
     d.getfunctionName = "getsubjects",
     d.studentNumber = $('#studentNumber').val(),
     d.startsy = "<?php echo $_SESSION['startSY']; ?>",
     d.endsy   = "<?php echo $_SESSION['endSY']; ?>",
     d.semester = "<?php echo $_SESSION['semester']; ?>"
   }
   },
   "columns":[
   {"data":"fld_subCode"},
   {"data":"fld_description"},
   {"data":"fld_units"},
   {"data":"fld_day"},
   {"data":"fld_startTime"},
   {"data":"fld_endTime"},
   {"data":"fld_sectionName"},
   {"data":"fld_availableCourseID"}
   ],
   "columnDefs": [
           {
           "render": function (data, type, row) {
             return "<a href='#' onclick='removeSubj("+ data +")'>Remove</button></td>";
           },
           "targets": 7
       },
   ]
   });
   
   
    function addCourse(id){
           var courseID        = id; 
           var getfunctionName = "addsubject";
           var applicantID   = '<?php echo $_SESSION["applicantID"]; ?>';
           var studentNumber   = $("#studentNumber").val();
           var startsy = "<?php echo $_SESSION['startSY']; ?>";
           var endsy   = "<?php echo $_SESSION['endSY']; ?>";
           var semester = "<?php echo $_SESSION['semester']; ?>";
           var programID = $("#prefferedProgram").val();
           var yearlevel = $("#yearLevel").val();
   
           $.ajax({
             url: "../Student/ajaxRequest.php",
             method: "POST",
             data: {
               getfunctionName: getfunctionName,
               courseID: courseID,
               applicantID: applicantID,
               studentNumber: studentNumber,
               startsy: startsy,
               endsy: endsy,
               semester: semester,
               programID: programID,
               yearlevel: yearlevel
             },
             success: function(data) {
                   if(data == 1)
                   {
                     pretbl.ajax.reload();
                     $('#addCourseModal').modal('toggle');
                     changeName();
                   }else{
                     swal({
                          title: "Error!",
                          text: data,
                          type: "error",
                     });
                   }
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
   
            
       };
    

    function removeSubj(id)
    {
       var courseID        = id;
       var getfunctionName = 'removesubject';
       var studentNumber   = $("#studentNumber").val();
       $.ajax({
             url: "../Student/ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName,courseID:courseID,studentNumber:studentNumber},
             success: function(data) {
                   if(data == 1)
                   {
                     pretbl.ajax.reload();
                   }else{
                     swal({
                          title: "Error!",
                          text: "Please try again!",
                          type: "error",
                     });
                   }
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
    }
   
   function changeName(){
   
       var getfunctionName = "getApplicantName";
       var applicantID = '<?php echo $_SESSION["applicantID"]; ?>';
       
   
      if(applicantID != ""){
         
         $.ajax({
             url: "../Registrar/ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, applicantID: applicantID},
             dataType:"json",
             success: function(data) {
   
               $("#applicantName").text(data[0]);
               $("#prefferedcourse").val(data[1]);
               $("#prefferedProgram").val(data[3]);
               if(data[4] == "n/a")
               {
                $("#studentNumber").val(applicantID);
               }else{
                $("#studentNumber").val(data[4]);
               }
               $("#yearLevel").val(data[5]);
               $("#maxunits").text(data[6]);
               subjtbl.ajax.reload();
               pretbl.ajax.reload();
   
               if(data[2]=="Regular"){
                 $("#addCourse").prop("disabled",true);
                 $("#autoFill").prop("disabled",false);
              }else{
                 $("#addCourse").prop("disabled",false);
                 $("#autoFill").prop("disabled",true);
               }

             }
          }); 
   
      }
    }


   $(document).on("click", "#autoFill", function(){
   
       var getfunctionName = "autoFillSubjects";
       var applicantID   = $("#applicantID").val();
       var startsy = "<?php echo $_SESSION['startSY']; ?>";
       var endsy   = "<?php echo $_SESSION['endSY']; ?>"
       var semester = "<?php echo $_SESSION['semester']; ?>";
       var programID = $("#prefferedcourse").val();
       var totalUnits = 0;
       var count=0;

       if(programID != ""){
         
         $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, 
               applicantID: applicantID,
               startsy: startsy,
               endsy: endsy,
               semester: semester,
               programID: programID
             },
             dataType:"json",
             success: function(data) {
              changeName();
              pretbl.ajax.reload();
             },
             error: function(data){
               alert("dataaa"); 
   
             }
          }); 
   
       }
   
   
    });
   
     
</script>
<script type="text/javascript">
   $(document).on('click', '#btnPrintPEF', function(){
          var applicantID = $("#applicantID").val();
   
          if(applicantID != ""){
          window.location = 'exportCOR.php?applicantID=' + btoa(applicantID);       
        }
   });
   
</script>