<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include_once "studentClass.php";
   include '../Database/database2.php';
   
   $student = new Student();
   $maxunits = $student->getUnits($_SESSION['yearlevel'],$_SESSION['programID']);

?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Student</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Enrollment Form</li>
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

                        </div>
                        <div class="form-group">
                           <label class="control-label" for="name">Name: <?php echo $_SESSION['lastName'].', '.$_SESSION['firstName'].' '.$_SESSION['middleName']; ?><br>Max Units: <?php echo $maxunits; ?></label>
                           <input type="hidden" name="studentNo" id="studentNo" value="<?=$_SESSION['studentNumber'];?>">
                           <label class="control-label" id="applicantName"></label>
                           <input type="hidden" value="" id="prefferedcourse" />
                           <a href="#" id="btnPrintPEF" class="btn btn-primary pull-right">Print PEF</a>
                        </div>
                        <hr style="height:5px; background-color: black;">
                        <div class="form-group row">
                           <div class="col-sm-6">
                              <button type="button" id="addCourse" class="btn btn-primary" data-target="#addCourseModal"
                                 data-toggle="modal">Add Course</button>
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
                                    <th><span class="pull-right" id="totalunit">Total Units: </span></th>
                                    <th><label class="control-label" name="totalUnits" id="totalUnits"></label></th>
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
              <!-- <div class="col-sm-3"> 
                <input type="text" class="form-control" name="code" id="code">
              </div> --> 
              <!-- <div class="col-sm-3">
                <select class='form-control' name='selectType' id='selectType' data-plugin='selectpicker' data-live-search='true'>
                  <option value='Course Code'>Course Code</option>
                  <option value='Course Description'>Course Description</option>
                  <option value='Section'>Section</option>
                </select>
              </div> -->
              <!-- <div class="col-sm-6">
                <button type="button" id="" class="btn btn-primary">Search</button>
              </div> -->
            </div>
            <div class="form-group" id="refreshCourse">
               <table class="tableAvailableCourses table table-striped width-full" id="tableAvailableCourses">
                  <thead>
                     <tr>
                        <!-- <th><input type="checkbox" id="getCheck"></th> -->
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
                        <!-- <th></th> -->
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
<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<!-- <script type="text/javascript">
$(document).ready( function () {
    $('#tablePreEnrollmentForm').DataTable();
  } );
</script> -->
<script type="text/javascript">
   var subjtbl = $("#tableAvailableCourses").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax":{
    "method":"POST",
    "url":"ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getsubjectlist",
      d.programID = "<?php echo $_SESSION['programID']; ?>";
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
        }
  ]
});

$("#getCheck").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

   var pretbl = $("#tablePreEnrollmentForm").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getsubjects",
      d.studentNumber = "<?php echo $_SESSION['studentNumber']; ?>",
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
              return "<a href='#' onclick='removeSubj("+ data +")'>Remove</a>";
            },
            "targets": 7
        },
  ]
});


        function addCourse(id){
              var courseID        = id; 
              var applicantID     = "";
              var getfunctionName = "addsubject";
              var studentNumber   = "<?php echo $_SESSION['studentNumber']; ?>";
              var startsy = "<?php echo $_SESSION['startSY']; ?>";
              var endsy   = "<?php echo $_SESSION['endSY']; ?>";
              var semester = "<?php echo $_SESSION['semester']; ?>";
              var programID = "<?php echo $_SESSION['programID']; ?>";
              var yearlevel = "<?php echo $_SESSION['yearlevel']; ?>";

              $.ajax({
                url: "../Student/ajaxRequest.php",
                method: "POST",
                data: {
                  getfunctionName: getfunctionName,
                  courseID: courseID,
                  studentNumber: studentNumber,
                  programID: programID,
                  startsy: startsy,
                  endsy: endsy,
                  semester: semester,
                  yearlevel: yearlevel,
                  applicantID: applicantID
                },
                success: function(data) {
                      if(data == 1)
                      {
                        swal({
                           title: "Success",
                           text: "Successfully added subject",
                           type: "success",
                        }); 
                        pretbl.ajax.reload();
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
        var studentNumber   = "<?php echo $_SESSION['studentNumber']; ?>";
        $.ajax({
              url: "../Student/ajaxRequest.php",
              method: "POST",
              data: {getfunctionName:getfunctionName,courseID:courseID,studentNumber:studentNumber},
              success: function(data) {
                    if(data == 1)
                    {
                      swal({
                           title: "Success",
                           text: "Successfully remove subject!",
                           type: "success",
                      });
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



</script>

<script type="text/javascript">
      $(document).on('click', '#btnPrintPEF', function(){
             var studentNo = $("#studentNo").val();
             if(studentNo != ""){
             window.location = 'exportpdf.php?studentNo=' + btoa(studentNo);       
           }
      });

</script>