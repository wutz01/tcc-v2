<?php

  session_start();

  require '../Database/database2.php';

  $post = $_POST;

  if (!$post['id']){

    $error = "Failed loading subject info.";

    echo $error;

    die();

  }

  $id = $post['id'];

  $query = "SELECT * FROM tbl_subjects_applicant WHERE id = '$id'";

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

<form method="post" action="../api/editSubjectApplicant.php" id="updateSubjectApplicantModal">

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

              <div class="form-group row">
<div hidden>
  <input type="text" class="form-control" name="subjectId" id="subjectId" placeholder="Student Number" value="<?php echo $user['id']; ?>"/> 
</div>

                <div class="col-sm-4">

                  <label>Subject Name</label>

                  <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name" value="<?php echo $user['fld_subject'] ?>" />

                </div>

                    <div class="col-sm-4">

                      <label>Status</label>

                      <select class='form-control' name='statusSubject' id='statusSubject'>

                        <option value='ACTIVE' data-hidden="true">ACTIVE</option>

                        <option value='INACTIVE' data-hidden="true">INACTIVE</option>

                      </select>

                    </div>

                    <div class="col-sm-4">

                      <label>Default</label>

                        <select class='form-control' name='defaultSubject' id='defaultSubject'>

                          <option value='YES' data-hidden="true">YES</option>

                          <option value='NO' data-hidden="true">NO</option>

                        </select>

                    </div>

                    <div class="col-sm-1">

                </div>

              </div>

            </div>

          </div>



      <div class="modal-footer">

        <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Cancel</button>

        <button type="submit" class="btn btn-danger">Update</button></a>

        <!-- <button type="button" class="btn btn-info" onclick="deleteUser('<?php echo $user['fld_studentNo'] ?>')">Delete</button></a> -->

      </div>

  </form>
<input type="hidden" class="form-control" name="statusSubjectApplicant" id="statusSubjectApplicant" placeholder="Subject Name" value="<?php echo $user['fld_status'] ?>" />
<input type="hidden" class="form-control" name="defaultSubjectApplicant" id="defaultSubjectApplicant" placeholder="Subject Name" value="<?php echo $user['fld_default'] ?>" />
    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>

<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
  var subjectStatus = document.getElementById('statusSubjectApplicant').value;
  var subjectDefault = document.getElementById('defaultSubjectApplicant').value;
// alert(subjectDefault);
if(subjectDefault == 1){
  subjectDefault = 'YES';
} else {
  subjectDefault = 'NO';
}
  $("#statusSubject option[value=" + subjectStatus + "]").attr('selected', true);
  $("#defaultSubject option[value=" + subjectDefault + "]").attr('selected', true);
</script>
<script type="text/javascript">
  $(function () {
    $('#updateSubjectApplicantModal').ajaxForm({
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