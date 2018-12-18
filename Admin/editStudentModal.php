<?php

  session_start();

  require '../Database/database2.php';

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

                  <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $userStudent['fld_firstName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Middlename</label>

                  <input type="text" class="form-control" name="middleName" id="middleName" value=" <?php echo $userStudent['fld_middleName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Lastname</label>

                  <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $userStudent['fld_lastName']; ?>" />

                </div>

                <div class="col-sm-2">

                  <label>Sex</label>

                  <input type="text" class="form-control" name="sexStudent" id="sexStudent" placeholder="N/A" value="<?php echo $userStudent['fld_sex']; ?>" />

                </div>

                <div class="col-sm-10">

                  <label>Home Address</label>

                  <input type="text" class="form-control" name="homeAddress" id="homeAddress" placeholder="N/A" value="<?php echo $userStudent['fld_homeAddress']; ?>" />

                </div>

                <div class="col-sm-6">

                  <label>Guardian Name</label>

                  <input type="text" class="form-control" name="guardianName" id="guardianName" placeholder="N/A" value="<?php echo $userStudent['fld_guardianName']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Mobile Number</label>

                  <input type="text" class="form-control" name="mobileNo" id="mobileNo" placeholder="N/A" value="<?php echo $userStudent['fld_mobilePhoneNo']; ?>" />

                </div>

                <div class="col-sm-2">

                  <label>Year Level</label>

                  <input type="text" class="form-control" name="yearLevel" id="yearLevel" placeholder="N/A" value="<?php echo $userStudent['fld_yearLevel']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Course</label>

                  <input type="text" class="form-control" name="course" id="course" placeholder="N/A" value="<?php echo $userStudent['fld_program']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Section</label>

                  <input type="text" class="form-control" name="section" id="section" placeholder="N/A" value="<?php echo $userStudent['fld_section']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Admission Status</label>

                  <input type="text" class="form-control" name="admissionStatus" id="admissionStatus" placeholder="N/A" value="<?php echo $userStudent['fld_admissionStatus']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Academic Status</label>

                  <input type="text" class="form-control" name="academicStatus" id="academicStatus" placeholder="N/A" value="<?php echo $userStudent['fld_academicStatus']; ?>" />

                </div>

                <div class="col-sm-4">

                  <label>Username</label>

                  <div hidden>

                    <input type="text" class="form-control" name="staffId" id="staffId" placeholder="Subject Name" value="<?php echo $user['staffId']; ?>">

                  </div>

                  <input type="text" class="form-control" name="userName" id="userName" placeholder="Username" value="<?php echo $user['Username']; ?>" />

                    </div>

                    <div class="col-sm-4">

                      <label>Status</label>

                      <select class='form-control' name='statusUser' id='statusUser'>

                        <?php if ($user['status'] == 'active') { ?>

                          <option value='active' data-hidden="true">ACTIVE</option>

                          <option value='inactive' data-hidden="true">INACTIVE</option>

                        <?php } else {  ?>

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

        url: 'editStudentAPI.php',

        method: "POST",

        data:{ staffId:staffId, firstName:firstName, middleName:middleName, lastName:lastName, emailAddress:emailAddress, employmentType:employmentType, maxUnits:maxUnits, schedule:schedule, userName:userName, accessType:accessType, statusUser:statusUser},

        success:function(data){

              alert('Successfully updated '+userName);

              window.location.href = "students.php";

        }

      });

    });

  }

  function cancel() {

    window.location.href = "students.php";

  }

</script>