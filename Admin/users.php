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

         <li class="active">Manage Users</li>

      </ol>

   </div>

  <div class="page-content">

    <div class="panel">

      <div class="panel-body container-fluid">

        <div class="row row-lg">

          <div class="col-sm-12">

            <div class="col-sm-12">

              <div class="example-wrap">

              <h4 class="example-title">Manage Users</h4>

              <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#addSubject">Add new user</button><br><br>

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

<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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



          <form action="addUserAPI.php" method="post" id="addUser">

              <div class="form-group row">

                <div class="col-sm-4">

                  <label>Firstname</label>

                  <input type="text" class="form-control" name="firstName" id="Firstname" placeholder="Firstname" />

                </div>

                <div class="col-sm-4">

                  <label>Middlename</label>

                  <input type="text" class="form-control" name="middleName" id="Middlename" placeholder="Middlename" />

                </div>

                <div class="col-sm-4">

                  <label>Lastname</label>

                  <input type="text" class="form-control" name="lastName" id="Lastname" placeholder="Lastname" />

                </div>

                <div class="col-sm-4">

                  <label>Email Address</label>

                  <input type="email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Email Address" />

                </div>

                <div class="col-sm-4">

                  <label>Employment Type</label>

                  <select class='form-control' name='employmentType' id='employmentType'>

                    <option value='1' data-hidden="true">Part Time</option>

                    <option value='2' data-hidden="true">Full Time</option>

                  </select>

                </div>

                <div class="col-sm-4">

                  <label>Max Units</label>

                  <input type="number" class="form-control" name="maxUnits" id="maxUnits" placeholder="Max Units" />

                </div>

                <div class="col-sm-4">

                  <label>Schedule</label><br>
                  <input type="checkbox" name="schedule[]" value="M">M
                  <input type="checkbox" name="schedule[]" value="T">T
                  <input type="checkbox" name="schedule[]" value="W">W
                  <input type="checkbox" name="schedule[]" value="Th">Th
                  <input type="checkbox" name="schedule[]" value="F">F
                  <input type="checkbox" name="schedule[]" value="S">S

                </div>

                  <div class="col-sm-4">

                    <label>Username</label>

                    <input type="text" class="form-control" name="userName" id="userName" placeholder="Username" />

                  </div>

                  <div class="col-sm-4">

                    <label>Access Type</label>

                    <select class='form-control' name='accessType' id='accessType'>

                      <option value='Admin' data-hidden="true">ADMIN</option>

                      <option value='Faculty' data-hidden="true">FACULTY</option>

                      <option value='Registrar4old' data-hidden="true">REGISTRAR4OLD</option>

                    </select>

                  </div>

                  <div class="col-sm-4">

                    <label>Status</label>

                    <select class='form-control' name='statusUser' id='statusUser'>

                      <option value='active' data-hidden="true">ACTIVE</option>

                      <option value='inactive' data-hidden="true">INACTIVE</option>

                      <option value='resignedTerminated' data-hidden="true">Resign/Terminated</option>

                    </select>

                  </div>

                      <div class="col-sm-4">

                        <label>Password</label>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />

                      </div>

                      <div class="col-sm-4">

                        <label>Confirm Password</label>

                        <input type="password" class="form-control" name="cPassword" id="cPassword" placeholder="Confirm Password" />

                      </div>

                    <div class="col-sm-1">

                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Add User</button>

          </div>

      </form>

    </div>

  </div>

</div>



                  <div class="form-group row">

                          <table id=tableUsers class="display" style="width:100%">

                           <thead>

                              <tr class="listApply">

                                 <th>Staff ID</th>

                                 <th>Username</th>

                                 <th>Access Type</th>

                                 <th>Status</th>

                                 <th>Action</th>

                              </tr>

                           </thead>

                           <tbody>

                            <?php

                              $UsersList = $admin->getUsersList();

                              while($row = $UsersList->fetch(PDO::FETCH_ASSOC)){

                              extract($row);

                            ?>

                              <tr class="listApply">

                                <?php if($staffId == '1' || $staffId == '0'){ ?>

                                 <td>-</td>

                                 <?php }  else { ?>

                                  <td><?php echo $staffId; ?></td>

                                 <?php } ?>

                                 <td><?php echo $Username; ?></td>

                                 <td><?php echo $accessType; ?></td>

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

                                <button class="btn btn-info" type="button" onclick="updateUser('<?php echo $row['staffId']; ?>')">Edit</button></button>

                                <button class="btn btn-danger" type="button" onclick="deleteUser('<?php echo $row['staffId']; ?>')">Delete</button></button></td>

                              </tr>

                              <?php

                                }

                              ?>

                           </tbody>

                           <tfoot>

                              <tr class="listApply">

                                 <th>Staff ID</th>

                                 <th>Username</th>

                                 <th>Access Type</th>

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
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
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
          alert('Add user?')
          console.log(`Submit?`)
        }
      })
    });
</script>

<script type="text/javascript">

  $(function(){

    $("#deleteTable").DataTable();

  })

  function updateUser(idx){

    let url = "editUserModal.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

</script>


<script type="text/javascript">

  $(function(){

    $("#deleteUserModal").DataTable();

  })

  function deleteUser(idx){

    let url = "deleteUserModal.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

</script>



<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 

<script type="text/javascript" src="../assets/js/datatables.min.js"></script>

<script type="text/javascript">

  $(document).ready( function () {

    $('#tableUsers').DataTable();

} );

</script>