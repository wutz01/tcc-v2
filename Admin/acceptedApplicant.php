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

         <li class="active">Approved Applicant List</li>

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

                        <h4 class="example-title">Approved Applicant List</h4>

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

    <?php if (isset($_SESSION['msgEnrolled'])): ?>

        <div class="notif">

          <div class="alert alert-success alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php 

                echo $_SESSION['msgEnrolled'];

                unset($_SESSION['msgEnrolled']);

              ?>

          </div>

        </div>

    <?php endif ?>

    <?php if (isset($_SESSION['msgExist'])): ?>

        <div class="notif">

          <div class="alert alert-danger alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php 

                echo $_SESSION['msgExist'];

                unset($_SESSION['msgExist']);

              ?>

          </div>

        </div>

    <?php endif ?>

</div>

<style type="text/css">

  .button1 {font-size: 10px;}

</style>

<style type="text/css">

  .button1 {font-size: 7px;}

  .listApply {font-size: 11px;}

</style>

                      <!-- Example Tabs In The Panel -->

                      <div class="form-group row">

                          <table id="acceptedApplicant" class="display" style="width:100%">

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

                              $getAcceptedApplicantList = $admin->getAcceptedApplicantList();

                              while($row = $getAcceptedApplicantList->fetch(PDO::FETCH_ASSOC)){

                              extract($row);

                            ?>

                              <tr class="listApply">

                                 <td><a href="acceptedApplicantProfile.php?id=<?php echo $fld_applicantID; ?>"><?php echo $fld_applicantGeneratedID; ?></a></td>

                                 <td><?php echo $fld_lastName; ?>, <?php echo $fld_firstName; ?> <?php echo $fld_middleName; ?></td>

                                 <td><?php echo $fld_homeAddress; ?></td>

                                 <td><?php echo $fld_emailAddress; ?></td>

                                 <td><?php echo $fld_mobilePhoneNo; ?></td>

                                 <td><a href="acceptedApplicantProfile.php?id=<?php echo $fld_applicantID; ?>">

                                  <button class="btn btn-success btn-sm button1" onclick="viewDetails()" type="submit" id="viewDetails">View Details</button></a></td>

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

    $('#acceptedApplicant').DataTable();

} );

</script>