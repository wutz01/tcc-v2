<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "registrarClass.php";

?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Registrar</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Grades</li>
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
                        <table class="table table-striped width-full" id="tableGrades">
                           <thead>
                              <tr>
                                 <th>Faculty ID</th>
                                 <th>Faculty Name</th>
                                 <th>Faculty Name</th>
                                 <th>Faculty Name</th>
                                 <th>Start Year</th>
                                 <th>End Year</th>
                                 <th>Semester</th>
                                 <th>Subject Code</th>
                                 <th>Section Code</th>
                                 <th>Midterms</th>
                                 <th>Finals</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>Faculty ID</th>
                                 <th>Faculty Name</th>
                                 <th>Faculty Name</th>
                                 <th>Faculty Name</th>
                                 <th>Start Year</th>
                                 <th>End Year</th>
                                 <th>Semester</th>
                                 <th>Subject Code</th>
                                 <th>Section Code</th>
                                 <th>Midterms</th>
                                 <th>Finals</th>
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
<?php
   include_once "../General/footer.php";
?>

<script type="text/javascript">
  $(document).ready(function(){
   var tableGrades = $("#tableGrades").DataTable({
    "processing": true,
    "serverSide": true,
    "ajax":{
    "method":"POST",
    "url":"ajaxRequest.php",
    "dataSrc":"",
    "data":{
      getfunctionName: "fetchSubmittedGrades"
    }
  },
  "columns":[
    {"data":"fld_staffId"},
    {"data":"firstName"},
    {"data":"middleName"},
    {"data":"lastName"},
    {"data":"fld_startSY"},
    {"data":"fld_endSY"},
    {"data":"fld_semester"},
    {"data":"fld_subCode"},
    {"data":"fld_sectionName"},
    {"data":"fld_midPosted"},
    {"data":"fld_finalPosted"}
  ],
  "columnDefs": [
            {
            "render": function (data, type, row) {
              return "<button style='border:none; background-color: Transparent; color: blue;' onclick=location.href='showStudentGrade.php?id="+btoa(row.fld_subjectID)+"&ssy="+btoa(row.fld_startSY)+"&esy="+btoa(row.fld_endSY)+"&sem="+btoa(row.fld_semester)+"'>"+data+"</button>";
            },
            "targets": 0
        },
        {
            "render": function (data, type, row) {
              return row.lastName + ", " + row.firstName + " " + row.middleName;
            },
            "targets": 1
        },
                {
            "visible": false,
              "targets": 2
        },
                {
            "visible": false,
              "targets": 3
        },
        {
            "render": function (data, type, row) {
              if(data == "Y"){
              return "Y";
              }
              else{
                return "N";
              }
            },
            "targets": 9
        },
        {
            "render": function (data, type, row) {
              if(data == "Y"){
              return "Y";
              }
              else{
                return "N";
              }
            },
            "targets": 10
        },
  ]
});
 });


     function showStudents(id){
            var courseID        = id; 
            var getfunctionName = "showStudents";

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
</script>
