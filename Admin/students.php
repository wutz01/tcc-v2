<?php

   include_once "../General/header.php";

   include_once "../General/topBar.php";

   include_once "../General/leftSideBar.php";

   include_once "adminClass.php";

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

                                 <th>Status</th>

                                 <th>Action</th>

                              </tr>

                           </thead>

                           <tbody>

                            <?php

                              $UsersList = $admin->getStudentList();

                              while($row = $UsersList->fetch(PDO::FETCH_ASSOC)){

                              extract($row);

                            ?>

                              <tr class="listApply">

                                <?php if($staffId == '1' || $staffId == '0'){ ?>

                                 <td>-</td>

                                 <?php }  else { ?>

                                  <td><?php echo $staffId; ?></td>

                                 <?php } ?>

                                 <td><?php echo $fld_lastName; ?>, <?php echo $fld_firstName; ?> <?php echo $fld_middleName; ?></td>

                                 <?php if($status == 'active'){ ?>

                                 <td>Active</td>

                                 <?php }  elseif($status == 'inactive') { ?>

                                  <td>Inactive</td>

                                 <?php } elseif($status == 'resignedTerminated') {?>

                                 <td>Resign/Terminated</td>

                                <?php } else { ?>

                                  <td><?php echo $status; ?></td>

                                <?php } ?>

                                 <td>

                                <button class="btn btn-info" type="button" onclick="editStudent('<?php echo $row['staffId']; ?>')">Edit</button></button>

                                <button class="btn btn-danger" type="button" onclick="deleteUser('<?php echo $row['staffId']; ?>')">Delete</button></button></td>

                              </tr>

                              <?php

                                }

                              ?>

                           </tbody>

                           <tfoot>

                              <tr class="listApply">

                                 <th>Student Number</th>

                                 <th>Fullname</th>

                                 <th>Status</th>

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

  function addStudent(){
    window.location.href='addStudent.php';
  }

</script>



<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 

<script type="text/javascript" src="../assets/js/datatables.min.js"></script>

<script type="text/javascript">

  $(document).ready( function () {

    $('#tableUsers').DataTable();

} );

</script> -->
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
  $(function () {
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
        alert('Do you want to save?');
      }
    });
  })
</script>
