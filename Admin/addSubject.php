<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include_once "adminClass.php";
?>
<?php
  $admin = new Admin();
?>
<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Manage Subjects</li>
      </ol>
   </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="example-wrap">
              <h4 class="example-title">Manage Subjects</h4>
              <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#addSubject">Add new subject</button><br><br>
                <div class="example">
<div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true"></div>
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
    <?php if (isset($_SESSION['msgUpdate'])): ?>
        <div class="notif">
          <div class="alert alert-danger alert-dismissable show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php 
                echo $_SESSION['msgUpdate'];
                unset($_SESSION['msgUpdate']);
              ?>
          </div>
        </div>
    <?php endif ?>
</div>
<!-- Modal -->
<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-pane active" id="subject" role="tabpanel">

          <form action="addSubjectAPI.php" method="post">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label>Subject Name</label>
                  <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name" />
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
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Subject</button>
          </div>
      </form>
    </div>
  </div>
</div>
                  <!-- <div class="tab-pane active" id="subject" role="tabpanel">
                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name" />
                          </div>
                          <div class="col-sm-3">
                            <select class='form-control' name='statusSubject' id='statusSubject'>
                              <option value='Active' data-hidden="true">Active</option>
                                <option value='Inactive' data-hidden="true">Inactive</option>
                                  </select>
                                    </div>
                                    <div class="col-sm-3">
                                  <select class='form-control' name='defaultSubject' id='defaultSubject'>
                                <option value='' data-hidden="true">Default</option>
                              </select>
                            </div>
                          <div class="col-sm-1">
                        <button type="submit" id="btnAddSection" class="btn btn-primary ">Add</button>
                      </div>
                    </div>
                  </div> -->

                  <div class="form-group row">
                          <table id="subjectList" class="display" style="width:100%">
                           <thead>
                              <tr class="listApply">
                                 <th>Subject Name</th>
                                 <th>Status</th>
                                 <th>Default</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                              $getApplicantSubject = $admin->getApplicantSubject();
                              while($row = $getApplicantSubject->fetch(PDO::FETCH_ASSOC)){
                              extract($row);
                            ?>
                              <tr class="listApply">
                                 <td><?php echo $fld_subject; ?></td>
                                 <td><?php echo $fld_status; ?></td>
                                 <?php if ($fld_default == 1) { ?>
                                   <td>YES</td>
                                 <?php } else { ?>
                                  <td>NO</td>
                                <?php } ?>
                                 <td>
                                <button class="btn btn-info" onclick="updateSubject(<?php echo $row['id']; ?>)">Edit</button></button></td>
                              </tr>
                              <?php
                                }
                              ?>
                           </tbody>
                           <tfoot>
                              <tr class="listApply">
                                 <th>Subject Name</th>
                                 <th>Status</th>
                                 <th>Address</th>
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
<script type="text/javascript">
  $(function(){
    $("#deleteTable").DataTable();
  })
  function updateSubject(idx){
    let url = "editSubjectModal.php";
    $.post(url,{id:idx},function(result){
      $("#modal-danger").html(result);
      $("#modal-danger").modal('show');
    });
  }
</script>
<?php
   include_once "../General/footer.php";
?>
<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#subjectList').DataTable();
} );
</script>
