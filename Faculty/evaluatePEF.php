<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "facultyClass.php";

   if($_SESSION['accessType'] == "Faculty"){
    $staffID = $_SESSION['staffID'];
   }else if($_SESSION['accessType'] == "VP for Acad"){
    $staffID = "";
   }

   $faculty    = new Faculty();
   $getAllStudents = $faculty->readAllStudents($staffID);
   
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Faculty</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Evaluate PEF</li>
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
                              <select class='form-control' name='studentNo' id='studentNo' data-plugin='selectpicker' data-live-search='true'>
                                 <option value=''>Select Student No</option>
                                 <?php
                                    while($row = $getAllStudents->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_studentNo}'>{$fld_studentNo}</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="col-sm-7">
                              <button type="button" id="btnSearchStudentNo" class="btn btn-primary">Search</button>
                              <a href="#" id="btnPrintPEF" class="btn btn-primary pull-right">Print PEF</a>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="name">Name: </label>
                           <label class="control-label" id="studentName"></label><br>
                           <label class="control-label" for="units">Max units: </label> 
                           <label class="control-label" id="maxunits"></label>
                           <input type="hidden" value="" id="programID" />
                           <input type="hidden" value="" id="prospectusName" />
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

              <div class="example-wrap">
                <div class="nav-tabs-horizontal">
                  <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                    <li class="active" role="presentation"><a data-toggle="tab" href="#yearOne" aria-controls="yearOne"
                      role="tab">1st Year</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#yearTwo" aria-controls="yearTwo"
                      role="tab">2nd Year</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#yearThree" aria-controls="yearThree"
                      role="tab">3rd Year</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#yearFour" aria-controls="yearFour"
                      role="tab">4th Year</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#yearFive" aria-controls="yearFive"
                      role="tab">5th Year</a></li>
                  </ul>
                  <div class="tab-content padding-top-20">
                    <div class="tab-pane active" id="yearOne" role="tabpanel">
                              <div class="form-group row" id="">
                          
                             <table class="table table-striped table-bordered width-full" id="tableGrades1">
                                <thead>
                                   <tr>
                                      <th width="10%">Semester</th>
                                      <th width="10%">Subject&nbsp;Code</th>
                                      <th width="45%">Description</th>
                                      <th width="5%">Unit</th>
                                      <th width="15%">Pre-Requisite</th>
                                      <th width="15%">Semestral Grade</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                                <tfoot>
                                   <tr>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="45%"></th>
                                      <th width="5%"></th>
                                      <th width="15%"></th>
                                      <th width="15%"></th>
                                   </tr>
                                </tfoot>
                             </table>
                          </div>

                    </div>
                    <div class="tab-pane" id="yearTwo" role="tabpanel">
                              <div class="form-group row" id="">
                          
                             <table class="table table-striped table-bordered width-full" id="tableGrades2">
                                <thead>
                                   <tr>
                                      <th width="10%">Semester</th>
                                      <th width="10%">Subject&nbsp;Code</th>
                                      <th width="45%">Description</th>
                                      <th width="5%">Unit</th>
                                      <th width="15%">Pre-Requisite</th>
                                      <th width="15%">Semestral Grade</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                                <tfoot>
                                   <tr>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="45%"></th>
                                      <th width="5%"></th>
                                      <th width="15%"></th>
                                      <th width="15%"></th>
                                   </tr>
                                </tfoot>
                             </table>
                          </div>

                    </div>
                    <div class="tab-pane" id="yearThree" role="tabpanel">
                              <div class="form-group row" id="">
                          
                             <table class="table table-striped table-bordered width-full" id="tableGrades3">
                                <thead>
                                   <tr>
                                      <th width="10%">Semester</th>
                                      <th width="10%">Subject&nbsp;Code</th>
                                      <th width="45%">Description</th>
                                      <th width="5%">Unit</th>
                                      <th width="15%">Pre-Requisite</th>
                                      <th width="15%">Semestral Grade</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                                <tfoot>
                                   <tr>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="45%"></th>
                                      <th width="5%"></th>
                                      <th width="15%"></th>
                                      <th width="15%"></th>
                                   </tr>
                                </tfoot>
                             </table>
                          </div>
                    </div>
                    <div class="tab-pane" id="yearFour" role="tabpanel">
                              <div class="form-group row" id="">
                          
                             <table class="table table-striped table-bordered width-full" id="tableGrades4">
                                <thead>
                                   <tr>
                                      <th width="10%">Semester</th>
                                      <th width="10%">Subject&nbsp;Code</th>
                                      <th width="45%">Description</th>
                                      <th width="5%">Unit</th>
                                      <th width="15%">Pre-Requisite</th>
                                      <th width="15%">Semestral Grade</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                                <tfoot>
                                   <tr>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="45%"></th>
                                      <th width="5%"></th>
                                      <th width="15%"></th>
                                      <th width="15%"></th>
                                   </tr>
                                </tfoot>
                             </table>
                          </div>
                    </div>

                    <div class="tab-pane" id="yearFive" role="tabpanel">
                              <div class="form-group row" id="">
                          
                             <table class="table table-striped table-bordered width-full" id="tableGrades5">
                                <thead>
                                   <tr>
                                      <th width="10%">Semester</th>
                                      <th width="10%">Subject&nbsp;Code</th>
                                      <th width="45%">Description</th>
                                      <th width="5%">Unit</th>
                                      <th width="15%">Pre-Requisite</th>
                                      <th width="15%">Semestral Grade</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                                <tfoot>
                                   <tr>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="45%"></th>
                                      <th width="5%"></th>
                                      <th width="15%"></th>
                                      <th width="15%"></th>
                                   </tr>
                                </tfoot>
                             </table>
                          </div>
                    </div>
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
     d.programID = $('#prospectusName').val()
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
      d.studentNumber = $('#studentNo').val(),
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

var gradestbl1 = $("#tableGrades1").DataTable({
    "processing": true,
    "serverSide": true,
    "bServerSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getGrades",
      d.prospectusName = $('#prospectusName').val(),
      d.studentNumber = $('#studentNo').val(),
      d.yearLevel = '1st'
    }
  },
  "columns":[
    {"data":"semester"},
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_preReq"},
    {"data":"fld_semestralGrade"}
  ]
});

    var gradestbl2 = $("#tableGrades2").DataTable({
    "processing": true,
    "serverSide": true,
    "bServerSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getGrades",
      d.prospectusName = $('#prospectusName').val(),
      d.studentNumber = $('#studentNo').val(),
      d.yearLevel = '2nd'
    }
  },
  "columns":[
    {"data":"semester"},
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_preReq"},
    {"data":"fld_semestralGrade"}
  ]
});

    var gradestbl3 = $("#tableGrades3").DataTable({
    "processing": true,
    "serverSide": true,
    "bServerSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getGrades",
      d.prospectusName = $('#prospectusName').val(),
      d.studentNumber = $('#studentNo').val(),
      d.yearLevel = '3rd'
    }
  },
  "columns":[
    {"data":"semester"},
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_preReq"},
    {"data":"fld_semestralGrade"}
  ]
});

    var gradestbl4 = $("#tableGrades4").DataTable({
    "processing": true,
    "serverSide": true,
    "bServerSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getGrades",
      d.prospectusName = $('#prospectusName').val(),
      d.studentNumber = $('#studentNo').val(),
      d.yearLevel = '4th'
    }
  },
  "columns":[
    {"data":"semester"},
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_preReq"},
    {"data":"fld_semestralGrade"}
  ]
});


    var gradestbl5 = $("#tableGrades5").DataTable({
    "processing": true,
    "serverSide": true,
    "bServerSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getGrades",
      d.prospectusName = $('#prospectusName').val(),
      d.studentNumber = $('#studentNo').val(),
      d.yearLevel = '5th'
    }
  },
  "columns":[
    {"data":"semester"},
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_preReq"},
    {"data":"fld_semestralGrade"}
  ]
});
     function addCourse(id){
            var courseID        = id; 
            var getfunctionName = "addsubject";
            var studentNumber   = $("#studentNo").val();
            var startsy = "<?php echo $_SESSION['startSY']; ?>";
            var endsy   = "<?php echo $_SESSION['endSY']; ?>";
            var semester = "<?php echo $_SESSION['semester']; ?>";
            var programID = $("#prospectusName").val();
            var yearlevel = $("#yearLevel").val();

            $.ajax({
              url: "../Student/ajaxRequest.php",
              method: "POST",
              data: {
                getfunctionName: getfunctionName,
                courseID: courseID,
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
        var studentNumber   = $("#studentNo").val();
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

    $(document).on("click", "#btnSearchStudentNo", function changeName(){
    
        var getfunctionName = "getStudentDetails";
        var studentNo = $("#studentNo").val();
        

       if(studentNo != ""){
          
          $.ajax({
              url: "ajaxRequest.php",
              method: "POST",
              data: {getfunctionName:getfunctionName, studentNo: studentNo},
              dataType:"json",
              success: function(data) { 

                $("#studentName").text(data[0]);
                $("#programID").val(data[1]);
                $("#prospectusName").val(data[2]);
                $("#yearLevel").val(data[3]);
                $("#maxunits").text(data[4]);
                subjtbl.ajax.reload();
                pretbl.ajax.reload();
                gradestbl1.ajax.reload();
                gradestbl2.ajax.reload();
                gradestbl3.ajax.reload();
                gradestbl4.ajax.reload();
                gradestbl5.ajax.reload();

           }
         }); 
    
        }
     });
  

  
</script>

  <script type="text/javascript">
        $(document).on('click', '#btnPrintPEF', function(){
               var studentNo = $("#studentNo").val();

               if(studentNo != ""){
               window.location = 'exportpdf.php?studentNo=' + btoa(studentNo);       
             }
        });

  </script>