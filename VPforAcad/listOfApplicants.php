<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "VPforAcadClass.php";

   $VPforAcad = new VPforAcad();
   $getAllApplicant = $VPforAcad->readAllApplicants();
?>

<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">VP for Acad</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">List of Applicants</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                   
                     <div class="example-wrap">
                        <h4 class="example-title">List of Applicants</h4>
                        <div class="example">
                          <table class="table dataTable table-striped width-full" data-plugin="dataTable">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Application Date</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Address</th>
                                <th>Transferee</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Application Date</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Transferee</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              while($row = $getAllApplicant->fetch(PDO::FETCH_ASSOC)){
                              extract($row); 
                              $applicantID = urlencode(base64_encode($fld_applicantID));

                              if($fld_status == "Pending"){ $labelStatus = "warning"; }
                              elseif($fld_status == "Approved"){ $labelStatus = "success"; }
                              elseif($fld_status == "Disapproved"){ $labelStatus = "danger"; }
                              ?>
                              <tr>
                                <td><?php echo $fld_applicantID; ?></td>
                                <td><?php echo $fld_applicationDate; ?></td>
                                <td><?php echo $fld_lastName; ?></td>
                                <td><?php echo $fld_firstName; ?></td>
                                <td><?php echo $fld_homeAddress; ?></td>
                                <td><?php echo $fld_transferee; ?></td>
                                <td><span class="label label-<?php echo $labelStatus; ?>"><?php echo $fld_status; ?></span></td>
                                <td>
                                  <button type="button" onclick="window.location.href='applicationApproval.php?id=<?php echo $applicantID; ?>'" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Approval" 
                                  <?php 
                                  if($fld_status != "Pending" || $fld_applicationForm != "done" || $fld_submissionOfRequirements == "not done" || $fld_examResult == "not done"){ echo "disabled"; } ?> 
                                  >
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                  </button>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
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


<?php
   include_once "../General/footer.php";
?>



