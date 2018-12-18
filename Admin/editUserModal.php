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

  $query = "SELECT * FROM tbl_users WHERE staffId = '$id'";

  $res = mysqli_query($conn, $query);

  $user = mysqli_fetch_assoc($res);



  $queryStaff = "SELECT * FROM tbl_staffs WHERE staffId = '$id'";

  $resStaff = mysqli_query($conn, $queryStaff);

  $userStaff = mysqli_fetch_assoc($resStaff);



  mysqli_close($conn);

?>

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Update User</h4>          

      </div>



      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">



          <form  method="post" action="editSubjectAPI.php" id="updateSubjects">

              <div class="form-group row">

                <div class="col-sm-4">

                  <label>Firstname</label>

                  <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $userStaff['firstName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Middlename</label>

                  <input type="text" class="form-control" name="middleName" id="middleName" value=" <?php echo $userStaff['middleName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Lastname</label>

                  <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $userStaff['lastName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Email Address</label>

                  <input type="email" class="form-control" name="emailAddress" id="emailAddress" placeholder="N/A" value="<?php echo $userStaff['emailAddress']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Employment Type</label>

                  <select class='form-control' name='employmentType' id='employmentType'>

                    <?php if($userStaff['employmentType'] == '1') { ?>

                    <option value='1' data-hidden="true">Part Time</option>

                    <option value='2' data-hidden="true">Full Time</option>

                    <?php } elseif($userStaff['employmentType'] == '2') { ?>

                    <option value='2' data-hidden="true">Full Time</option>

                    <option value='1' data-hidden="true">Part Time</option>

                    <?php } else { ?>

                    <option value='NA' data-hidden="true">NA</option>

                    <option value='1' data-hidden="true">Part Time</option>

                    <option value='2' data-hidden="true">Full Time</option>

                    <?php } ?>

                  </select>

                </div>

                <div class="col-sm-4">

                  <label>Max Units</label>

                  <input type="number" class="form-control" name="maxUnits" id="maxUnits" value="<?php echo $userStaff['maxUnits']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Schedule</label>

                  <input type="text" class="form-control" name="schedule" id="schedule" value="<?php echo $userStaff['availableSchedule']; ?>" />

                </div>



                <div class="col-sm-4">

                  <label>Username</label>

                  <div hidden>

                    <input type="text" class="form-control" name="staffId" id="staffId" placeholder="Subject Name" value="<?php echo $user['staffId']; ?>">

                  </div>

                  <input type="text" class="form-control" name="userName" id="userName" placeholder="Username" value="<?php echo $user['Username']; ?>" />

                    </div>

                    <div class="col-sm-4">

                      <label>Access Type</label>

                      <select class='form-control' name='accessType' id='accessType'>

                        <?php if ($user['accessType'] == 'Admin') { ?>

                          <option value='Admin' data-hidden="true">ADMIN</option>

                          <option value='inactive' data-hidden="true">FACULTY</option>

                          <option value='Registrar4old' data-hidden="true">REGISTRAR4OLD</option>

                        <?php } elseif($user['accessType'] == 'Registrar4old') { ?>

                          <option value='Registrar4old' data-hidden="true">REGISTRAR4OLD</option>

                          <option value='Faculty' data-hidden="true">FACULTY</option>

                          <option value='Admin' data-hidden="true">ADMIN</option>

                        <?php } else {?>

                          <option value='Faculty' data-hidden="true">FACULTY</option>

                          <option value='Admin' data-hidden="true">ADMIN</option>

                          <option value='Registrar4old' data-hidden="true">REGISTRAR4OLD</option>

                        <?php } ?>

                     </select>

                    </div>

                          <div class="col-sm-4">

                      <label>Status</label>

                      <select class='form-control' name='statusUser' id='statusUser'>

                        <?php if ($user['status'] == 'active') { ?>

                          <option value='active' data-hidden="true">ACTIVE</option>

                          <option value='inactive' data-hidden="true">INACTIVE</option>

                          <option value='resignedTerminated' data-hidden="true">Resign/Terminated</option>

                        <?php } elseif($user['status'] == 'inactive') { ?>

                          <option value='INACTIVE' data-hidden="true">INACTIVE</option>

                          <option value='active' data-hidden="true">ACTIVE</option>

                          <option value='resignedTerminated' data-hidden="true">Resign/Terminated</option>

                        <?php } else {  ?>

                          <option value='resignedTerminated' data-hidden="true">Resign/Terminated</option>

                          <option value='active' data-hidden="true">ACTIVE</option>

                          <option value='inactive' data-hidden="true">INACTIVE</option>

                        <?php } ?>

                     </select>

                      </div>

                    <div class="col-sm-1">

                </div>

              </div>

            </div>

          </div>



      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="cancel()">Cancel</button>

        <button type="button" class="btn btn-info" onclick="updateUser()">Update</button></a>

      </div>

  </form>

    </div>

    <!-- /.modal-content -->

  </div>

  <!-- /.modal-dialog -->

</div>



<script type="text/javascript">

  function updateUser() {

    var staffId = document.getElementById("staffId").value;

    var userName = document.getElementById("userName").value;

    var accessType = $("#accessType").val();

    var statusUser = $("#statusUser").val();



    var firstName = document.getElementById("firstName").value;

    var middleName = document.getElementById("middleName").value;

    var lastName = document.getElementById("lastName").value;

    var emailAddress = document.getElementById("emailAddress").value;

    // var employmentType = document.getElementById("employmentType").value;

    var employmentType = $("#employmentType").val();

    var maxUnits = document.getElementById("maxUnits").value;

    var schedule = document.getElementById("schedule").value;

    

    $(function(){

      $.ajax({

        url: 'editUserAPI.php',

        method: "POST",

        data:{ staffId:staffId, firstName:firstName, middleName:middleName, lastName:lastName, emailAddress:emailAddress, employmentType:employmentType, maxUnits:maxUnits, schedule:schedule, userName:userName, accessType:accessType, statusUser:statusUser},

        success:function(data){

              alert('Successfully updated '+userName);

              window.location.href = "users.php";

        }

      });

    });

  }

  function cancel() {

    window.location.href = "users.php";

  }

</script>