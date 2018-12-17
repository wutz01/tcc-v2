<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "admissionClass.php";

   $admission           = new Admission();
   $page                = "examResults";
   $getAllApplicants    = $admission->readAllApplicants($page);
   $getAllSubjectAreas  = $admission->readAllSubjectAreas();
?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admission</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Exam Results</li>
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
                        <h4 class="example-title">Exam Results</h4>
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
                              <?php
                                $counter = 0;
                                while($row = $getAllSubjectAreas->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                              ?>
                              <div class="form-group row">
                                 <div class="col-sm-3">
                                    <label class="control-label"><?php echo $fld_subject; ?></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <input type="number" class="form-control score" subjectID="<?php echo $fld_ID; ?>" name="score<?php echo $fld_ID; ?>" id="score" min="0" max="<?php echo $fld_noOfItems; ?>">
                                 </div>
                                 <div class="col-sm-3">
                                    /<label class="control-label noOfItems" id="noOfItems<?php echo $fld_ID; ?>"> <?php echo $fld_noOfItems; ?></label>
                                 </div>
                                 <input type="hidden" class="percentage" id="percentage<?php echo $fld_ID; ?>" value="0">
                              </div>
                              <?php 
                              $counter++;
                              } 
                              ?>
                              <div class="form-group row">
                                 <div class="col-sm-3">
                                    <label class="control-label" for="inputBasicFirstName">Exam Results</label>
                                 </div>
                                 <div class="col-sm-3">
                                    <input type="number" class="form-control" name="examResults" id="examResults" readonly="true">
                                 </div>
                                 <div class="col-sm-3">
                                    <label class="control-label" id="percentageSymbol">%</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="remarks">Remarks: </label>
                                 <label class="control-label" id="remarks"></label>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-3">
                                    <label class="control-label">Comments</label>
                                 </div>
                                 <div class="col-sm-8">
                                    <textarea class="form-control no-resize" name="comments" id="comments" cols="50" rows="5"> </textarea> 
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-3">
                                    <label class="control-label">Date of Exam</label>
                                 </div>
                                 <div class="col-sm-5">
                                    <input type="date" class="form-control" name="dateOfExam" id="dateOfExam">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="button" id="btnSubmit" class="btn btn-primary" disabled="true">Submit</button>
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

$(document).on("change", ".score", function(){

    var subjectID         = $(this).attr('subjectID');
    var score             = $(this).val();
    var noOfItems         = $("#noOfItems" + subjectID).text();
    var totalPercentage   = 0;

    $("#percentage" + subjectID).val((score / parseInt(noOfItems)) * 50 + 50);

    $( ".percentage" ).each(function() {
      var percentage = parseInt($(this).val());
      
      totalPercentage = totalPercentage + percentage;
    });

    examResults = totalPercentage / 4;
    $("#examResults").val(examResults);

    if(examResults >= 75){
        $("#remarks").text("Passed");
    }else{
        $("#remarks").text("Failed");
    }
  
 });

$(document).on("change", "#applicantID", function(){

    var getfunctionName = "getApplicantName";
    var applicantID = $("#applicantID").val();
    
    if(applicantID != ""){
      
      $.ajax({
          url: "ajaxRequest.php",
          method: "POST",
          data: {getfunctionName:getfunctionName, applicantID: applicantID},
          
          success: function(data) {
            $("#applicantName").text(data);  
            $('#btnSubmit').removeAttr('disabled');               
          }
       }); 

    }else{
      $("#applicantName").text("");
      $("#remarks").text("");
      $("#examResults").val("");
      $('#btnSubmit').attr('disabled','true');

      $( ".score" ).each(function() {
        $(this).val("");
      });
    }
 });

$(document).on("click","#btnSubmit",function(){

    var getfunctionName   = "addExamResults";
    var applicantID       = $('#applicantID').val();
    var english           = $('#percentage1').val();
    var mathematics       = $('#percentage2').val();
    var science           = $('#percentage3').val();
    var abstractReasoning = $('#percentage4').val();
    var examResults       = $('#examResults').val();
    var remarks           = $('#remarks').text();
    var comments          = $('#comments').val();
    var dateOfExam        = $('#dateOfExam').val();

      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName, 
          applicantID:applicantID,
          english: english,
          mathematics: mathematics,
          science: science,
          abstractReasoning: abstractReasoning,
          examResults: examResults,
          remarks:remarks,
          comments: comments,
          dateOfExam: dateOfExam
        },

        success:function(data){
          var getData = data;
          alert(getData);
          if($.trim(getData) == "success"){
            console.log("success");
          }else{
            console.log("error");
          }
        },
        
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }  
      });
  });
</script>