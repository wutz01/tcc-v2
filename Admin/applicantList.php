<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include_once "adminClass.php";
?>
<?php
  $admin = new Admin();
?>
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Applicant List</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                     <!-- Example Basic Form Without Label -->
                     <div class="panel panel-default">
                        <h4 class="example-title">Applicant List</h4>
                        <div class="example">
<div class="card-body">
    <?php if (isset($_SESSION['msg_approved'])): ?>
        <div class="notif">
          <div class="alert alert-success alert-dismissable show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php 
                echo $_SESSION['msg_approved'];
                unset($_SESSION['msg_approved']);
              ?>
          </div>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['msg_cancel'])): ?>
        <div class="notif">
          <div class="alert alert-danger alert-dismissable show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php 
                echo $_SESSION['msg_cancel'];
                unset($_SESSION['msg_cancel']);
              ?>
          </div>
        </div>
    <?php endif ?>
</div>
                      <!-- Example Tabs In The Panel -->
                      <div class="form-group row">
                          <table id="applicantList" class="display" style="width:100%">
                           <thead>
                              <tr class="listApply">
                                 <th>Applicant ID</th>
                                 <th>Full Name</th>
                                 <th>Address</th>
                                 <th>Email Address</th>
                                 <th>Mobile Number</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                              $getApplicantList = $admin->getApplicantList();
                              while($row = $getApplicantList->fetch(PDO::FETCH_ASSOC)){
                              extract($row);
                            ?>
                              <tr class="listApply">
                                 <td><a href="applicantProfile.php?id=<?php echo $fld_applicantID; ?>"><?php echo $fld_applicantGeneratedID; ?></a></td>
                                 <td><?php echo $fld_lastName; ?>, <?php echo $fld_firstName; ?> <?php echo $fld_middleName; ?></td>
                                 <td><?php echo $fld_homeAddress; ?></td>
                                 <td><?php echo $fld_emailAddress; ?></td>
                                 <td><?php echo $fld_mobilePhoneNo; ?></td>
                                 <td><a href="applicantProfile.php?id=<?php echo $fld_applicantID; ?>">
                                  <button class="btn btn-success btn-sm button1" onclick="viewDetails()" type="submit" id="viewDetails">View Details</button></a> <a href="approvedApplicant.php?id=<?php echo $fld_applicantID; ?>" style="color: white"><button class="btn btn-primary btn-sm button1">Approve</button></a>
                                  <a href="cancelApplicant.php?id=<?php echo $fld_applicantID; ?>" style="color: white"><button class="btn btn-danger btn-sm button1">Cancel</button></a></td>
                              </tr>
                              <?php
                                }
                              ?>
                           </tbody>
                           <tfoot>
                              <tr class="listApply">
                                 <th>Applicant ID</th>
                                 <th>Full Name</th>
                                 <th>Address</th>
                                 <th>Email Address</th>
                                 <th>Mobile Number</th>
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
<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>
<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#applicantList').DataTable();
} );
</script>