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



          <form  method="post" action="editStudentAPI.php" id="updateStudent">

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

                <div class="col-sm-3">

                  <label>Sex</label>

                <select name="sexStudent" id="sexStudent" class='form-control'>
                  <?php if($userStudent['fld_sex'] == 'M'){ ?>
                  <option class="form-control" value="M">Male</option>
                  <option class="form-control" value="F">Female</option>
                  <?php } else { ?>
                  <option class="form-control" value="F">Female</option>
                  <option class="form-control" value="M">Male</option>
                  <?php } ?>
                </select>

                </div>

                <div class="col-sm-9">

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

                  <select name="academicStatus"  class='form-control' id="academicStatus">
                    <?php if($userStudent['fld_academicStatus'] == 'Irregular') { ?>
                    <option value="Irregular">Irregular</option>
                    <option value="Regular">Regular</option>
                    <?php } else { ?>
                    <option value="Regular">Regular</option> 
                    <option value="Irregular">Irregular</option>
                    <?php } ?>
                  </select>

                  <!-- <input type="text" class="form-control" name="academicStatus" id="academicStatus" placeholder="N/A" value="<?php echo $userStudent['fld_academicStatus']; ?>" /> -->

                </div>

                <div class="col-sm-4">

                  <label>Username</label>

                  <div hidden>

                    <input type="text" class="form-control" name="staffId" id="staffId" placeholder="Student Number" value="<?php echo $userStudent['fld_studentNo']; ?>">

                    <input type="text" class="form-control" name="propectusName" id="propectusName" placeholder="N/A" value="<?php echo $userStudent['fld_prospectusName']; ?>" />

                    <input type="text" class="form-control" name="status" id="status" placeholder="N/A" value="<?php echo $userStudent['fld_status']; ?>" />

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

    var firstName = document.getElementById("firstName").value;

    var middleName = document.getElementById("middleName").value;

    var lastName = document.getElementById("lastName").value;

    var sexStudent = $("#sexStudent").val();

    var homeAddress = document.getElementById("homeAddress").value;

    var guardianName = document.getElementById("guardianName").value;

    var mobileNo = document.getElementById("mobileNo").value;

    var yearLevel = document.getElementById("yearLevel").value;

    var course = document.getElementById("course").value;

    var section = document.getElementById("section").value;

    var admissionStatus = document.getElementById("admissionStatus").value;

    var academicStatus = $("#academicStatus").val();

    var userName = document.getElementById("userName").value;

    var prospectusName = document.getElementById("propectusName").value;

    var status = document.getElementById("status").value;

    var statusUser = $("#statusUser").val();
    

    $(function(){

      $.ajax({

        url: 'editStudentAPI.php',

        method: "POST",

        data:{ staffId:staffId, firstName:firstName, middleName:middleName, lastName:lastName, sexStudent:sexStudent, homeAddress:homeAddress, guardianName:guardianName, mobileNo:mobileNo, yearLevel:yearLevel, course:course, section:section, admissionStatus:admissionStatus, academicStatus:academicStatus, userName:userName, statusUser:statusUser, prospectusName:prospectusName, status:status},

        success:function(data){

              alert('Successfully updated '+firstName+ ' ' +middleName+ ' '+lastName);

              window.location.href = "students.php";

        }

      });

    });

  }

  function cancel() {

    window.location.href = "students.php";

  }

</script>