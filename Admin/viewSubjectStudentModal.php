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

  <div class="modal-dialog" style="width: 90%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">View Subject</h4>          

      </div>

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

          <form  method="post" action="editStudentAPI.php" id="updateStudent">

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
        </div>
        </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="cancel()">Cancel</button>

        <button type="button" class="btn btn-info">Add Subject</button></a>

      </div>

      </form>

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
    {"data":"fld_sectionName"}
  ],
});
</script>

<script type="text/javascript">

  function cancel() {

    window.location.href = "students.php";

  }

</script>