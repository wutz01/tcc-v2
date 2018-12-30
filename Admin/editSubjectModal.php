<?php

  session_start();

  require '../Database/database2.php';

  $post = $_POST;

  if (!$post['id']){

    $error = "Failed loading user info.";

    echo $error;

    die();

  }

  $id = $post['id'];

  $query = "SELECT * FROM tbl_subject WHERE fld_subjectID = '$id'";

  $res = mysqli_query($conn, $query);

  $user = mysqli_fetch_assoc($res);

  mysqli_close($conn);

?>

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Delete Subject</h4>          

      </div>

<form method="post" action="../api/editSubject.php" id="updateSubjectModal">

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

              <div class="form-group row">
<div hidden>
  <input type="text" class="form-control" name="subjectId" id="subjectId" placeholder="Student Number" value="<?php echo $user['fld_subjectID']; ?>"/> 
</div>
              <div class="col-sm-4">

                <label>Subject Code</label>

                <input type="text" class="form-control" name="subjectCode" id="subjectCode" placeholder="Student Number" value="<?php echo $user['fld_subCode']; ?>"/>

              </div>

              <div class="col-sm-4">

                <label>Subject Description</label>

                <input type="text" class="form-control" name="subjectDes" id="subjectDes" placeholder="Student Number" value="<?php echo $user['fld_description']; ?>"/>

              </div>

              <div class="col-sm-4">

                <label>Units</label>

                <input type="number" class="form-control" name="subjectUnits" id="subjectUnits" placeholder="Student Number" value="<?php echo $user['fld_units']; ?>"/>

              </div>

              <div class="col-sm-4">

                <label>Lecture Hours</label>

                <input type="number" class="form-control" name="subjectLecHrs" id="subjectLecHrs" placeholder="Student Number" value="<?php echo $user['fld_lecHrs']; ?>"/>

              </div>

              <div class="col-sm-4">

                <label>Laboratory Hours</label>

                <input type="number" class="form-control" name="subjectLabHrs" id="subjectLabHrs" placeholder="Student Number" value="<?php echo $user['fld_labHrs']; ?>"/>

              </div>

              <div class="col-sm-4">

                <label>Pre-Requisite</label>

                <input type="text" class="form-control" name="subjectPreReq" id="subjectPreReq" placeholder="Student Number" value="<?php echo $user['fld_preReq']; ?>"/>

              </div>

                    <div class="col-sm-1">

                </div>

              </div>

            </div>

          </div>



      <div class="modal-footer">

        <button type="button" class="btn btn-info pull-left" data-dismiss="modal" onclick="cancel()">Cancel</button>

        <button type="submit" class="btn btn-danger">Update</button></a>

        <!-- <button type="button" class="btn btn-info" onclick="deleteUser('<?php echo $user['fld_studentNo'] ?>')">Delete</button></a> -->

      </div>

  </form>

    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>



<script type="text/javascript">

  // function deleteUser(id){

  //   let url = "../api/deleteStudent.php";

  //   $.post(url, {id: id},function(o){

  //     $(".dynamic-alert").show();

  //     if (o.is_successful) {

  //       $(".dynamic-alert").removeClass('alert-success');

  //       $(".dynamic-alert").removeClass('alert-danger');

  //       $(".dynamic-alert").addClass('alert-success');

  //       $(".error-message").html(o.message);

  //       alert(o.message);

  //       window.location.href="users.php";

  //     } else {

  //       $(".dynamic-alert").removeClass('alert-success');

  //       $(".dynamic-alert").removeClass('alert-danger');

  //       $(".dynamic-alert").addClass('alert-danger');

  //       $(".dynamic-alert").html(o.error);

  //     }

  //     $("#modal-danger").modal('hide');

  //   }, 'json');

  // }

  function cancel() {

    window.location.href = "subjectSchedule.php";

  }

</script>

<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">
  $(function () {
    $('#updateSubjectModal').ajaxForm({
      dataType: 'json',
      success: (o) => {
        if(o.success){
          alert(o.message)
          location.reload();
        } else {
          alert(o.message)
        }
      },
      beforeSubmit: (o) => {
        alert('Do you want to update subject?');
      }
    });
  })
</script>