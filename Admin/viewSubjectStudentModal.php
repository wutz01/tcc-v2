<?php

  session_start();

  require '../Database/database2.php';
  include_once "../Student/studentClass.php";
  include '../Database/database2.php';
  $post = $_POST;

  if (!$post['id']){

    $error = "Failed loading students info.";

    echo $error;

    die();

  }

  $id = $post['id'];

  $query = "SELECT * FROM tbl_users WHERE staffId = '$id'";

  $res = mysqli_query($conn, $query);

  $user = mysqli_fetch_assoc($res);



  $queryStudent = "SELECT * FROM tbl_student WHERE fld_studentNo = '$id'";

  $resStudent = mysqli_query($conn, $queryStudent);

  $userStudent = mysqli_fetch_assoc($resStudent);

  $querySem = "SELECT * FROM tbl_enrolledsubjects WHERE fld_studentNo = '$id'";
  
  $resQuery = mysqli_query($conn, $querySem);

  $userSem = mysqli_fetch_assoc($resQuery);

  mysqli_close($conn);

?>
<div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true"></div>

  <div class="modal-dialog" style="width: 90%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">View Subject</h4>          

      </div>

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

<input type="hidden" name="studentNo" id="studentNo" value="<?php echo $id ?>">
              <div class="form-group row">

                <div class="form-group" id="refreshCourse">
               <table class="tableAvailableCourses table table-striped width-full" id="tablePreEnrollmentForm">
                  <thead>
                     <tr>
                        <th>Subject&nbsp;Code</th>
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
                        <th>Action</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
          </div>
        </div>
        </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="cancel()">Cancel</button>
        <a href="#" id="btnPrintPEF" class="btn btn-primary">Print PEF</a>
        <button type="button" class="btn btn-info" onclick="enrollSubject('<?php echo $id; ?>')">Add Subject</button></a>

      </div>

    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>

<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script type="text/javascript">
var pretbl = $("#tablePreEnrollmentForm").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getsubjects",
      d.studentNumber = "<?php echo $userSem['fld_studentNo']; ?>",
      d.startsy = "<?php echo $userSem['fld_startSY']; ?>",
      d.endsy   = "<?php echo $userSem['fld_endSY']; ?>",
      d.semester = "<?php echo $userSem['fld_semester']; ?>"
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

  function removeSubj(id)
     {
        var courseID        = id;
        var getfunctionName = 'removesubject';
        var studentNumber   = "<?php echo $id; ?>";
        $.ajax({
              url: "../Student/ajaxRequest.php",
              method: "POST",
              data: {getfunctionName:getfunctionName,courseID:courseID,studentNumber:studentNumber},
              success: function(data) {
                    if(data == 1)
                    {
                      swal({
                           title: "Success",
                           text: "Successfully remove subject",
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

  $(function(){

    $("#deleteTable").DataTable();

  })

  function enrollSubject(idx){

    let url = "addSubjectStudent.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

</script>

<script type="text/javascript">
      $(document).on('click', '#btnPrintPEF', function(){
        var studentNo = $("#studentNo").val();
        if(studentNo != ""){
         window.location = '../Student/exportpdf.php?studentNo=' + btoa(studentNo);       
        }
      });
</script>

<!-- <script type="text/javascript">

  function cancel() {

    window.location.href = "students.php";

  }

</script> -->