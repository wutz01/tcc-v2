<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
?>

<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Assign Access Type</li>
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
                        <h4 class="example-title">Assign Access Type</h4>
                        <div class="example">
                          <!-- Example Tabs In The Panel -->
                          <div class="panel nav-tabs-horizontal">
                            <div class="panel-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="exampleTopHome" role="tabpanel">
                                  <form onsubmit = 'return false'>
                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Office Staff Name</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <select class="form-control staffName" id="staffName" required>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">User Name</label>
                                     </div>
                                     <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required readonly="true" />
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Access Type</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <select class="form-control" id="accessType"  required>
                                        	<option value='' data-hidden='true'></option>
                                        	<option value='Admission'>Admission</option>
                                        	<option value='Registrar4old'>Registrar for Old Students</option>
                                        	<option value='Registrar4new'>Registrar for New Students</option>
                                        	<option value='VP for Acad'>VP for Acad</option>
                                        	<option value='Admin'>Admin</option>
                                        	<option value='Faculty'>Faculty</option>
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
                                          <option value='1'>Full Time</option>
                                          <option value='2'>Part Time</option>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="form-group row" style="display:none" id="maxUnitsDiv">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Max Units</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="number" id="maxUnits" class="form-control" min="0">
                                     </div>
                                  </div>
                                  <div class="form-group row" style="display:none" id="availableScheduleDiv">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="inputBasicFirstName">Available Schedule</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <select class="form-control" id="availableSchedule"  required>
                                          <option value='' data-hidden='true'></option>
                                          <option value='mwf'>MWF</option>
                                          <option value='tth'>TTH</option>
                                          <option value='s'>S</option>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <button type="submit" id="btnSubmit" class="btn btn-primary ">Assign</button>
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
 	populateStaff();
 });

function populateStaff()
{
	 	$.ajax({
 		url:"ajaxRequest.php",
 		method:"POST",
 		data:{
 			getfunctionName:'fetchStaff'
 		},

 		success:function(data){
 			var opt = $.parseJSON(data);
 			$('#staffName').append('<option value=""></option>');
 			$.each(opt, function(key, value){
 				$('#staffName').append('<option value="' + value.staffId + '">' + value.lastName + ', ' + value.firstName + ' ' + value.middleName + '</option>');
 			})
 		},

 		error: function(jqXHR, exception){
 			console.log(jqXHR);
 		}

 	});
}


 $(document).on("change", ".staffName", function changeName(){

       var getfunctionName      = "generateUsername";
       var staffId              = $(this).val();
       
       if(staffId != ""){
         
         $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, staffId: staffId},
             
             success: function(data) {
               $("#Username").val(data);               
             }
          }); 
   
       }

    });

 $(document).on("click","#btnSubmit",function(){

    var getfunctionName     = "addUser";
    var Username            = $('#Username').val();
    var staffName           = $('#staffName').val();
    var accessType          = $('#accessType').val();
    var employmentType      = $('#employmentType').val();
    var maxUnits            = $('#maxUnits').val();
    var availableSchedule   = $('#availableSchedule').val();

    if(Username != '' && staffName != '' && accessType != '')
    {
      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName, 
          Username:Username,
          staffName:staffName,
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
            $('#Username').val('');
            $('#staffName').val('').change();
            $('#accessType').val('').change();
            $('#staffName').empty();
            $('#employmentType').val('').change();
            $('#availableSchedule').val('').change();
            $('#maxUnits').val('');
            $('#employmentDiv').hide();
            $('#maxUnitsDiv').hide();
            $('#availableScheduleDiv').hide();
            populateStaff();
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


