<?php

  session_start();

  require '../Database/database2.php';
  include_once "../Student/studentClass.php";

  $post = $_POST;

  if (!$post['id']){

    $error = "Failed loading students info.";

    echo $error;

    die();

  }

  $id = $post['id'];

  $query = "SELECT * FROM tbl_student WHERE fld_studentNo = '$id'";
  $stmt = mysqli_query($conn, $query);
  $res = mysqli_fetch_assoc($stmt);

  $querySem = "SELECT * FROM tbl_enrolledsubjects WHERE fld_studentNo = '$id'";
  
  $resQuery = mysqli_query($conn, $querySem);

  $userSem = mysqli_fetch_assoc($resQuery);

?>

  <div class="modal-dialog" style="width: 90%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Enroll subject</h4>

      </div>

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

          <div class="form-group" id="refreshCourse">
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

      </div>  

      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>

      </div>

    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>

<script type="text/javascript">
   var subjtbl = $("#tableAvailableCourses").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getsubjectlist",
      d.programID = "<?php echo $res['fld_prospectusName']; ?>";
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

    function addCourse(id){
      var courseID        = id; 
      var applicantID     = "";
      var getfunctionName = "addsubject";
      var studentNumber   = "<?php echo $userSem['fld_studentNo']; ?>";
      var startsy = "<?php echo $userSem['fld_startSY']; ?>";
      var endsy   = "<?php echo $userSem['fld_endSY']; ?>";
      var semester = "<?php echo $userSem['fld_semester']; ?>";
      var programID = "<?php echo $res['fld_prospectusName']; ?>";
      var yearlevel = "<?php echo $res['fld_yearLevel']; ?>";

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
</script>