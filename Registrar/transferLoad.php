<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "registrarClass.php";
   
   $registrar        = new Registrar();
   $page             = " ";
   $getAllApplicants = $registrar->readAllApplicants($page);
   
   ?>
<!-- Page -->
<div class="page animsition">
<div class="page-header">
   <h1 class="page-title">Registrar</h1>
   <ol class="breadcrumb">
      <li><a href="../index.html">Home</a></li>
      <li class="active">Transfer Load</li>
   </ol>
</div>
<div class="page-content">
   <div class="panel">
      <div class="panel-body container-fluid">
         <div class="row row-lg">
            <div class="col-sm-12">
               <!-- Example Basic Form Without Label -->
               <div class="example-wrap">
                  <h4 class="example-title">Transfer Load</h4>
                  <div class="example">
                     <div class="form-group row">
                        <div class="col-sm-5"> 
                          <h3>Transfer From </h3>
                           <select class='form-control' name='transferFrom' id='transferFrom' required>
                           </select>
                        </div>
                        <div class="col-sm-5"> 
                          <h3>Transfer To </h3>
                           <select class='form-control' name='transferTo' id='transferTo' required>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-5"> 
                          <h3>Subject </h3>
                           <select class='form-control' name='subject' id='subject'>
                           </select>
                        </div>
                     </div>

                     <div class="form-group row">
                      <button type="submit" id="btnTransfer" class="btn btn-primary ">Transfer</button>
                     </div>

                  </div>
                  <!-- End Example Basic Form Without Label -->
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
  populateStaffTo();
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
      $('#transferFrom').append('<option value=""></option>');
      $.each(opt, function(key, value){
        $('#transferFrom').append('<option value="' + value.staffId + '">' + value.lastName + ', ' + value.firstName + ' ' + value.middleName + '</option>');
      })
    },

    error: function(jqXHR, exception){
      console.log(jqXHR);
    }

  });
}


function populateStaffTo()
{
    $.ajax({
    url:"ajaxRequest.php",
    method:"POST",
    data:{
      getfunctionName:'fetchStaff'
    },

    success:function(data){
      var opt = $.parseJSON(data);
      $('#transferTo').append('<option value=""></option>');
      $.each(opt, function(key, value){
        $('#transferTo').append('<option value="' + value.staffId + '">' + value.lastName + ', ' + value.firstName + ' ' + value.middleName + '</option>');
      })
    },

    error: function(jqXHR, exception){
      console.log(jqXHR);
    }

  });
}



$(document).on("change", "#transferFrom", function populateStaffSubject(){
{
  var staffID = $(this).val();

    $.ajax({
    url:"ajaxRequest.php",
    method:"POST",
    data:{
      getfunctionName:'fetchAllSubjectsByStaffID',
      staffID:staffID
    },

    success:function(data){
      var opt = $.parseJSON(data);
       $("#subject").children('option').remove();
       $('#subject').append('<option value=""></option>');
       $.each(opt, function(key, value) {
           $('#subject').append('<option value="' + value.fld_availableCourseID + '">' + value.fld_subCode + '(' + value.fld_sectionName + ')</option>');
       });
      
               },

    error: function(jqXHR, exception){
      console.log(jqXHR);
    }

  });
}

});
     
</script>


<script type="text/javascript">
   $(document).on("click","#btnTransfer",function(){

    var getfunctionName     = "transferLoad";
    var transferTo          = $('#transferTo').val();
    var subject             = $('#subject').val();

    if(transferTo != '' && subject != '')
    {

    swal({
    title: "Are you sure?",
    text: "You want to transfer load",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "green",
    confirmButtonText: "Yes",
    cancelButtonText: "Cancel",
    showLoaderOnConfirm: true,
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
          if(isConfirm){

      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName, 
          transferTo:transferTo,
          subject:subject
        },

        success:function(data){
          var getData = data;

            if($.trim(getData) == "success"){
              swal("Success","Subject Load has been transferred","success");
              $("#transferFrom").val("");
              $("#transferTo").val("");
              $("#subject").empty();
            }
            else{  
              swal("Database","Query not executed","error");
            }
            //console.log("success");
          },
        //window.location.href();
        error: function(jqXHR, exception){
            console.log(jqXHR);
          }  
        });
  }
  else{
      swal("Cancelled","No changes occured.","error");
  }    
});
}
 
});

</script>