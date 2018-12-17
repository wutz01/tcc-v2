<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "registrarClass.php";

   $registrar        = new Registrar();
   $page             = "submissionOfRequirements";
   $getAllApplicants = $registrar->readAllApplicants($page);
?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Registrar</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Submission of Requirements</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-6">
                  <div class="col-sm-12">
                     <!-- Example Basic Form Without Label -->
                     <div class="example-wrap">
                        <h4 class="example-title">Submission of Requirements</h4>
                        <div class="example">
                           <form class="">
                              <div class="form-group row">
                                 <div class="col-sm-5">
                                  <select class='form-control' name='applicantID' id='applicantID' data-plugin="selectpicker" data-live-search="true">
                                    <option value=''>Select Applicant ID</option>
                                    <?php
                                    while($row = $getAllApplicants->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_applicantID}'>{$fld_applicantID}</option>";
                                    }
                                    ?>
                                 </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="name">Name: </label>
                                 <label class="control-label" id="applicantName"></label>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <span class="checkbox-custom checkbox-default nontransferee">
                                      <input type="checkbox" id="requirements1" name="requirements[]" class="requirements nontransferee" value="GMC">
                                      <label for="requirements1">GMC</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default nontransferee">
                                      <input type="checkbox" id="requirements2" name="requirements[]" class="requirements nontransferee" value="Form 137">
                                      <label for="requirements2">Form 137</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default nontransferee">
                                      <input type="checkbox" id="requirements3" name="requirements[]" class="requirements nontransferee" value="Certificate of Indigency">
                                      <label for="requirements3">Certificate of Indigency</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default nontransferee">
                                      <input type="checkbox" id="requirements4" name="requirements[]" class="requirements nontransferee" value="Voters ID (Parents/Student)">
                                      <label for="requirements4">Voters ID (Parents/Student)</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default transferee">
                                      <input type="checkbox" id="requirements5" name="requirements[]" class="requirements transferee" value="Honorable Dismissal">
                                      <label for="requirements5">Honorable Dismissal</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default transferee">
                                      <input type="checkbox" id="requirements6" name="requirements[]" class="requirements transferee" value="True copy of Grades">
                                      <label for="requirements6">True copy of Grades</label>
                                    </span>
                                    <span class="checkbox-custom checkbox-default transferee">
                                      <input type="checkbox" id="requirements7" name="requirements[]" class="requirements transferee" value="TOR">
                                      <label for="requirements7">TOR</label>
                                    </span>
                                    <input type="hidden" id="transferee" name="transferee">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="button" id="btnSubmit" class="btn btn-primary">Receive</button>
                              </div>
                           </form>
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

$(document).on("change", "#applicantID", function(){

    var getfunctionName = "getApplicantName";
    var applicantID = $("#applicantID").val();

    if(applicantID != ""){
      
      $.ajax({
          url: "ajaxRequest.php",
          method: "POST",
          data: {getfunctionName:getfunctionName, applicantID: applicantID},
          dataType:"json",
          success: function(data) {
         
            $("#applicantName").text(data[0]); 
          
            // check if applicant is transferee
            if(data[7] == "Yes"){
              $('span.transferee').show();
              $('#transferee').val("transferee");
            }else if(data[7] == "No"){
              $('span.transferee').hide();
              $('span.nontransferee').show();
              $('#transferee').val("nontransferee");
            }else{
              $('span.transferee').show();
              $('span.nontransferee').show();
            }

            // $('#btnSubmit').attr('disabled','true');

          }
       }); 

    }
 });

/*
$("input[type='checkbox'].requirements").change(function(){
    var transferee  = $('#transferee').val();

    if(transferee == "nontransferee"){
      var checker     = $("input[type='checkbox'].requirements."+transferee);
      if(checker.length == checker.filter(":checked").length){
          $('#btnSubmit').removeAttr('disabled');
      }else{
          $('#btnSubmit').removeAttr('disabled');
          // $('#btnSubmit').attr('disabled','true');
      }
    }else{
      var checker     = $("input[type='checkbox'].requirements");
      if(checker.length == checker.filter(":checked").length){
          $('#btnSubmit').removeAttr('disabled');
      }else{
          $('#btnSubmit').removeAttr('disabled');
          // $('#btnSubmit').attr('disabled','true');
      }
    }
});
*/

$(document).on("click","#btnSubmit",function(){

    var getfunctionName         = "changeSubmissionStatus";
    var applicantID             = $('#applicantID').val();
    var status                  = "";
    var getListOfRequirements   = [];
    var transferee              = $('#transferee').val();

    if(transferee == "nontransferee"){
      var checker     = $("input[type='checkbox'].requirements."+transferee);
      if(checker.length == checker.filter(":checked").length){
          status = "done";
      }else{
          status = "partial";
      }
    }else{
      var checker     = $("input[type='checkbox'].requirements");
      if(checker.length == checker.filter(":checked").length){
          status = "done";
      }else{
          status = "partial";
      }
    }

    $("input[type='checkbox'].requirements:checked").each(function() {
      getListOfRequirements.push($(this).val());
    });
    
    getListOfRequirements = getListOfRequirements.toString();


        swal({
            title: "Are you sure?",
            text: "You want to add Performance Evaluation",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "green",
            confirmButtonText: "Add Evaluation!",
            cancelButtonText: "Cancel",
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
                  applicantID:applicantID,
                  status:status,
                  getListOfRequirements:getListOfRequirements
                  },

                        success:function(data){

                          var getData = data;
                            if($.trim(getData) == "success"){
                              swal("Success","Results Submitted.","success");
                            }
                            else{  
                              swal("Database","Query not executed","error");
                            }
                            //console.log("success");
                          },
                       
                        error: function(jqXHR, exception){
                            console.log(jqXHR);
                          }  
                        });
                  }
                  else{
                      swal("Canceled","No changes occured.","error");
                  }    
              });

  });

</script>


