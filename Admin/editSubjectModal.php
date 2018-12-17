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
        <h4 class="modal-title" id="modal-danger">Update Subject</h4>           
      </div>

      <div class="modal-body">
        <div class="tab-pane active" id="subject" role="tabpanel">

          <form  method="post" action="editSubjectAPI.php" id="updateSubjects">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label>Subject Name</label>
                  <div hidden>
                    <input type="text" class="form-control" name="subjectID" id="subjectID" placeholder="Subject Name" value="<?php echo $user['id']; ?>">
                  </div>
                  <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name" value="<?php echo $user['fld_subject']; ?>" />
                    </div>
                    <div class="col-sm-4">
                      <label>Status</label>
                      <select class='form-control' name='statusSubject' id='statusSubject'>
                        <?php if ($user['fld_status'] == 'ACTIVE') { ?>
                          <option value='ACTIVE' data-hidden="true">ACTIVE</option>
                          <option value='INACTIVE' data-hidden="true">INACTIVE</option>
                        <?php } else { ?>
                          <option value='INACTIVE' data-hidden="true">INACTIVE</option>
                          <option value='ACTIVE' data-hidden="true">ACTIVE</option>
                        <?php } ?>
                      </select>
                              </div>
                          <div class="col-sm-4">
                          <label>Default</label>
                          <select class='form-control' name='defaultSubject' id='defaultSubject'>
                            <?php if ($user['fld_default'] == 1) { ?>
                            <option value='YES' data-hidden="true">YES</option>
                            <option value='NO' data-hidden="true">NO</option>
                            <?php } else { ?>
                            <option value='NO' data-hidden="true">NO</option>
                            <option value='YES' data-hidden="true">YES</option>
                          <?php } ?>
                          </select>
                      </div>
                    <div class="col-sm-1">
                </div>
              </div>
            </div>
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" onclick="updateSubject()">Update</button></a>
      </div>
  </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  function updateSubject() {
    var subjectID = document.getElementById("subjectID").value;
    var subjectName = document.getElementById("subjectName").value;
    var statusSubject = $("#statusSubject").val();
    var defaultSubject = $("#defaultSubject").val();
    
    $(function(){
      $.ajax({
        url: 'editSubjectAPI.php',
        method: "POST",
        data:{ subjectID:subjectID, subjectName:subjectName, statusSubject:statusSubject, defaultSubject:defaultSubject},
        success:function(data){
              alert('Successfully updated '+subjectName);
              window.location.href = "addSubject.php";
        }
      });
    });
  }
</script>