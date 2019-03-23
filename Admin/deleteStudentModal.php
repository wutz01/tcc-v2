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

  $query = "SELECT * FROM tbl_student WHERE fld_studentNo = '$id'";

  $res = mysqli_query($conn, $query);

  $user = mysqli_fetch_assoc($res);



  $queryStaff = "SELECT * FROM tbl_users WHERE Username = '$id'";

  $resStaff = mysqli_query($conn, $queryStaff);

  $userStaff = mysqli_fetch_assoc($resStaff);

  mysqli_close($conn);

?>

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Delete Student</h4>          

      </div>

<form method="post" action="../api/deleteStudent.php" id="deleteStudentModal">

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">

              <div class="form-group row">

              <div class="col-sm-12">

                <label>Student Number</label>
                <div hidden>
                  <input type="text" class="form-control" name="userName" id="userName" placeholder="Student Number" value="<?php echo $user['fld_studentNo']; ?>"/>
                </div>
                <input type="text" class="form-control" name="userNames" id="userNames" placeholder="Student Number" value="<?php echo $user['fld_studentNo']; ?>" disabled/>

              </div>

                <div class="col-sm-4">

                  <label>Firstname</label>

                  <input type="text" class="form-control" name="firstName" id="Firstname" value="<?php echo $user['fld_firstName']; ?>" disabled/>

                </div>

                <div class="col-sm-4">

                  <label>Middlename</label>

                  <input type="text" class="form-control" name="firstName" id="Firstname" value=" <?php echo $user['fld_middleName']; ?>" disabled/>

                </div>

                <div class="col-sm-4">

                  <label>Lastname</label>

                  <input type="text" class="form-control" name="firstName" id="Firstname" value="<?php echo $user['fld_lastName']; ?>" disabled/>

                </div>

                    <div class="col-sm-1">

                </div>

              </div>

            </div>

          </div>



      <div class="modal-footer">

        <button type="button" class="btn btn-info pull-left" data-dismiss="modal" onclick="cancel()">Cancel</button>

        <button type="submit" class="btn btn-danger">Delete</button></a>

      </div>

  </form>

    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>



<script type="text/javascript">

  function cancel() {

    location.reload();

  }

</script>

<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">
  $(function () {
    $('#deleteStudentModal').ajaxForm({
      dataType: 'json',
      success: (o) => {
        if(o.success){
          alert(o.message)
          location.href = "students.php";
        } else {
          alert(o.message)
        }
      },
      beforeSubmit: (o) => {
        alert('Do you want to delete student?');
      }
    });
  })
</script>