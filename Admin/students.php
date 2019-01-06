<?php

   include_once "../General/header.php";

   include_once "../General/topBar.php";

   include_once "../General/leftSideBar.php";

   include_once "adminClass.php";

   include '../Database/database2.php';

?>

<?php

  $admin = new Admin();

?>

<!-- <script type="text/javascript">

  $('#myModal').on('shown.bs.modal', function () {

  $('#myInput').trigger('focus')

})

</script> -->

<div class="page animsition">

   <div class="page-header">

      <h1 class="page-title">Admin</h1>

      <ol class="breadcrumb">

         <li><a href="../General/dashboard.php">Home</a></li>

         <li class="active">Manage Students</li>

      </ol>

   </div>

  <div class="page-content">

    <div class="panel">

      <div class="panel-body container-fluid">

        <div class="row row-lg">

          <div class="col-sm-12">

            <div class="col-sm-12">

              <div class="example-wrap">

              <h4 class="example-title">Manage Students</h4>

              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addStudent">Add new student</button><br><br>

                <div class="example">

<div class="card-body">

    <?php if (isset($_SESSION['msgAdd'])): ?>

        <div class="notif">

          <div class="alert alert-success alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php

                echo $_SESSION['msgAdd'];

                unset($_SESSION['msgAdd']);

              ?>

          </div>

        </div>

    <?php endif ?>

    <?php if (isset($_SESSION['msgNot'])): ?>

        <div class="notif">

          <div class="alert alert-danger alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php

                echo $_SESSION['msgNot'];

                unset($_SESSION['msgNot']);

              ?>

          </div>

        </div>

    <?php endif ?>

    <?php if (isset($_SESSION['msgError'])): ?>

        <div class="notif">

          <div class="alert alert-danger alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php

                echo $_SESSION['msgError'];

                unset($_SESSION['msgError']);

              ?>

          </div>

        </div>

    <?php endif ?>

    <?php if (isset($_SESSION['msgUpdate'])): ?>

        <div class="notif">

          <div class="alert alert-success alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php

                echo $_SESSION['msgUpdate'];

                unset($_SESSION['msgUpdate']);

              ?>

          </div>

        </div>

    <?php endif ?>

</div>

<div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true"></div>

<!-- Modal -->

<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h4 class="modal-title" id="exampleModalLabel">Add User</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <div class="tab-pane active" id="subject" role="tabpanel">



          <form  method="post" action="../api/addUser.php" id="addUser">

              <div class="form-group row">

                <div class="col-sm-12">

                  <label>Student Number</label>

                  <input type="text" class="form-control" name="studentNo" id="studentNo" placeholder="Student Number" required />

                </div>

                <div class="col-sm-4">

                  <label>Firstname</label>

                  <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Firstname" required/>

                </div>

                <div class="col-sm-4">

                  <label>Middlename</label>

                  <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Middlename"/>

                </div>

                <div class="col-sm-4">

                  <label>Lastname</label>

                  <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Lastname" required/>

                </div>

                <div class="col-sm-4">

                  <label>Sex</label>

                  <select name="sexStudent" id="sexStudent" class='form-control'>
                    <option class="form-control" value="Male">Male</option>
                    <option class="form-control" value="Female">Female</option>
                  </select>

                </div>

                <div class="col-sm-4">

                  <label>Gender</label>

                  <select name="genderStudent" id="genderStudent" class='form-control'>
                    <option class="form-control" value="Not Specified">Not Specified</option>
                    <option class="form-control" value="Gay">Gay</option>
                    <option class="form-control" value="Lesbian">Lesbian</option>
                    <option class="form-control" value="Bisexual">Bisexual</option>
                    <option class="form-control" value="Transgender">Transgender</option>
                  </select>

                </div>

                <div class="col-sm-4">

                  <label>Date of Birth</label>

                  <input type="date" class="form-control" name="birthDate" id="birthDate" placeholder="Birthdate" required/>

                </div>

                <div class="col-sm-9">

                  <label>Course</label>

                  <select class="form-control" name="course" id="course">
                    <?php 
                    $queryCourse  = "SELECT prospectus.fld_prospectusID, prospectus.fld_prospectusName, prospectus.fld_programID, program.fld_programName, prospectus.fld_status
                  FROM tbl_prospectus as prospectus
                  JOIN tbl_program as program on (program.fld_programID = prospectus.fld_programID)
                  GROUP BY prospectus.fld_prospectusName";
                    $resCourse = mysqli_query($conn, $queryCourse);
                    while ($stmtCourse = mysqli_fetch_assoc($resCourse)){
                    ?>
                    <option value="<?php echo $stmtCourse['fld_prospectusName'] ?>"><?php echo $stmtCourse['fld_programName'] ?></option>
                    <?php
                      }
                    ?>
                  </select>

                </div>

                <div class="col-sm-3">

                  <label>Year Level</label>

                  <select class="form-control" name="yearLevel" id="yearLevel">
                    <option value="1st">1st Year</option>
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                    <option value="4th">4th Year</option>
                  </select>

                </div>

               <!--  <div class="col-sm-6">

                  <label>Place of Birth</label>

                  <input type="tetx" class="form-control" name="birthPlace" id="birthPlace" placeholder="Birth Place" required/>

                </div>

                <div class="col-sm-2">

                  <label>Age</label>

                  <input type="tetx" class="form-control" name="age" id="age" placeholder="Age" required/>

                </div> -->

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Add Student</button>

          </div>

      </form>

    </div>

  </div>

</div>

                  <div class="form-group row">

                          <table id=tableUsers class="display" style="width:100%">

                           <thead>

                              <tr class="listApply">

                                 <th>Student Number</th>

                                 <th>Fullname</th>

                                 <th>Year Level</th>

                                 <th>Action</th>

                              </tr>

                           </thead>

                           <tbody>

                            <?php

                              $UsersList = $admin->getStudentList();

                              while($row = $UsersList->fetch(PDO::FETCH_ASSOC)){

                              extract($row);

                            ?>
<style type="text/css">

  .button1 {font-size: 8px;}

</style>
                              <tr class="listApply">

                                  <td><a href="editStudent.php?id=<?php echo $staffId ?>"><?php echo $staffId; ?></a></td>

                                 <td><?php echo $fld_lastName; ?>, <?php echo $fld_firstName; ?> <?php echo $fld_middleName; ?></td>

                                  <td><?php echo $fld_yearLevel; ?> year</td>

                                 <td>
                                <a href="editStudent.php?id=<?php echo $staffId; ?>"><button class="btn btn-info button1" type="button">Edit</button></a>

                                <button class="btn btn-danger button1" type="button" onclick="deleteUser('<?php echo $row['staffId']; ?>')">Delete</button>

                                <button class="btn btn-success button1" type="button" onclick="viewSubjectStudent('<?php echo $row['staffId']; ?>')">View subject</button></td>

                              </tr>

                              <?php

                                }

                              ?>

                           </tbody>

                           <tfoot>

                              <tr class="listApply">

                                 <th>Student Number</th>

                                 <th>Fullname</th>

                                 <th>Year Level</th>

                                 <th>Action</th>

                              </tr>

                           </tfoot>

                        </table>

                     </div>



                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

</div>

</div>

</div>

<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>

<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 

<script type="text/javascript" src="../assets/js/datatables.min.js"></script>

<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>


<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/>
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">

  $(function(){
    $("#deleteUserModal").DataTable();
  })

  function deleteUser(idx){

    let url = "deleteStudentModal.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

  function viewSubjectStudent(idx){

    let url = "viewSubjectStudentModal.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

  function addStudent(){
    window.location.href='addStudent.php';
  }

</script>

<script type="text/javascript">

  $(document).ready( function () {

    $('#tableUsers').DataTable();

} );

</script>

<script type="text/javascript">
  $(function () {

    $('#tableUsers').DataTable();

    $('#addUser').ajaxForm({
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
        alert('Do you want to add student?');
      }
    });
  })

  function deleteUser(idx){

    let url = "deleteStudentModal.php";
    $.post(url,{id:idx},function(result){
      $("#modal-danger").html(result);
      $("#modal-danger").modal('show');
    });
  }

  function addStudent(){
    window.location.href='addStudent.php';
  }
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#viewSubjectStudent').DataTable();
} );
</script>
