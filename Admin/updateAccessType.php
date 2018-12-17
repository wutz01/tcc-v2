<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include_once "adminClass.php";
   $admin                     = new Admin();
  if(isset($_GET['staffID'])){
   $staffID = base64_decode($_GET['staffID']); 
   $getAccessDetails = $admin->readAccessDetails($staffID);
 }
?>

<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Update Access Type</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                     <!-- Example Basic Form Without Label -->
                     <div class="example-wrap">
                        <h4 class="example-title">Update Access Type</h4>
                        <div class="example">
                          <!-- Example Tabs In The Panel -->
                          <div class="panel nav-tabs-horizontal">
                            <div class="panel-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="exampleTopHome" role="tabpanel">
                                  <form onsubmit = 'return false'>
                                    <?php
                                        while($row = $getAccessDetails->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                                    ?>
                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputStaffName">Office Staff Name</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="text" name="staffID" class="form-control" id="staffID" value="<?php echo $staffID; ?>" readonly="true">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">User Name</label>
                                     </div>
                                     <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Username" id="Username" value="<?php echo $Username; ?>" readonly="true" />
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Access Type</label>
                                     </div>
                                     <div class="col-sm-4">
                                <select class="form-control" id="accessType"  required>
                                	<option value='' data-hidden='true'></option>
                                	<option value='Admission' <?php if($accessType=="Admission"){echo "selected"; }?> >Admission</option>
                                	<option value='Registrar4old' <?php if($accessType=="Registrar4old"){echo "selected"; }?> >Registrar for Old Students</option>
                                	<option value='Registrar4new' <?php if($accessType=="Registrar4new"){echo "selected"; }?> >Registrar for New Students</option>
                                	<option value='VP for Acad' <?php if($accessType=="VP for Acad"){echo "selected"; }?> >VP for Acad</option>
                                	<option value='Admin' <?php if($accessType=="Admin"){echo "selected"; }?> >Admin</option>
                                	<option value='Faculty' <?php if($accessType=="Faculty"){echo "selected"; }?> >Faculty</option>
                                </select>
                                     </div>
                                  </div>
                                  <div class="form-group row" style="display:none" id="employmentDiv">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Employment Type</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <select class="form-control" id="employmentType"  required>
                                          <option value='' data-hidden='true'></option>
                                          <option value='1' <?php if($employmentType=="1"){echo "selected"; }?> >Full Time</option>
                                          <option value='2' <?php if($employmentType=="2"){echo "selected"; }?>>Part Time</option>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="form-group row" style="display:none" id="maxUnitsDiv">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Max Units</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="number" id="maxUnits" class="form-control" value="<?php echo $maxUnits; ?>">
                                     </div>
                                  </div>
                                  <div class="form-group row" style="display:none" id="availableScheduleDiv">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Available Schedule</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <select class="form-control" id="availableSchedule"  required>
                                          <option value='' data-hidden='true'></option>
                                          <option value='mwf' <?php if($availableSchedule=="mwf"){echo "selected"; }?>>MWF</option>
                                          <option value='tth' <?php if($availableSchedule=="tth"){echo "selected"; }?>>TTH</option>
                                          <option value='s' <?php if($availableSchedule=="s"){echo "selected"; }?>>S</option>
                                        </select>
                                     </div>
                                  </div>
                                  <?php 
                                }
                                  ?>
                                  <div class="form-group">
                                     <button type="submit" id="btnSubmit" class="btn btn-primary ">Update</button>
                                  </div>
                                  </form>
                                </div>
                     <!-- End Example Basic Form Without Label -->
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

 $(document).ready(function(){
    accessType = $('#accessType').val();

    if(accessType == 'Faculty')
    {
      $('#employmentDiv').show();
      $('#maxUnitsDiv').show();
    }
    else
    {
      $('#employmentType').val('').change();
      $('#availableSchedule').val('').change();
      $('#maxUnits').val('');
      $('#employmentDiv').hide();
      $('#maxUnitsDiv').hide();
      $('#availableScheduleDiv').hide();
    }

    employmentType = $('#employmentType').val();

    if(employmentType == '2')
    {
      $('#availableScheduleDiv').show();
    }
    else
    {
      $('#availableSchedule').val('').change();
      $('#availableScheduleDiv').hide();
    }

 });

 $(document).on("click","#btnSubmit",function(){

    var getfunctionName     = "updateAccessTypeStaff";
    var staffID          = $('#staffID').val();
    var accessType          = $('#accessType').val();
    var employmentType      = $('#employmentType').val();
    var maxUnits            = $('#maxUnits').val();
    var availableSchedule   = $('#availableSchedule').val();

    if(accessType != '')
    {
      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName,
          staffID:staffID,
          accessType:accessType,
          employmentType:employmentType,
          maxUnits:maxUnits,
          availableSchedule:availableSchedule
        },

        success:function(data){
          if(data == "success"){
            swal({
              title: "Success!",
              text: "User was assigned!",
              type: "success",
              });
              window.location = 'settings.php';
          }else{
            swal({
              title: "Error!",
              text: "Username already exist!",
              type: "error",
              });
          }
        },
        
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }  
      });
      }
  });


  $('#accessType').on('change', function() {
    accessType = $('#accessType').val();

    if(accessType == 'Faculty')
    {
      $('#employmentDiv').show();
      $('#maxUnitsDiv').show();
    }
    else
    {
      $('#employmentType').val('').change();
      $('#availableSchedule').val('').change();
      $('#maxUnits').val('');
      $('#employmentDiv').hide();
      $('#maxUnitsDiv').hide();
      $('#availableScheduleDiv').hide();
    }
  })

  $('#employmentType').on('change', function() {
    employmentType = $('#employmentType').val();

    if(employmentType == '2')
    {
      $('#availableScheduleDiv').show();
    }
    else
    {
      $('#availableSchedule').val('').change();
      $('#availableScheduleDiv').hide();
    }
  })

  </script>
