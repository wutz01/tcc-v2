<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "guidanceClass.php";
   
   $guidance              = new Guidance();
   $page                  = "interviewResults";
   $getAllApplicants      = $guidance->readAllApplicants($page);
   $getInterviewQuestions = $guidance->readInterviewQuestions();
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Guidance</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Interview Results</li>
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
                        <h4 class="example-title"></h4>
                        <div class="example">
               
                              <div class="">
                                 <div class="demo-radio-button">
                                    <div class="form-group row">
                                     <div class="col-sm-5">
                                        <select class='form-control' name='applicantID' id='applicantID' data-plugin='selectpicker' data-live-search='true'>
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
                                       <label class="control-label" id="applicantName"></label><br>
                                    </div>
                                    <hr style="height:5px; background-color: black;">
                                    <div class="form-group row">
                                       <div class='col-md-7'>
                                          <?php
                                             $count=0;
                                             $questID = array();
                                                    while($row = $getInterviewQuestions->fetch(PDO::FETCH_ASSOC)){
                                                    extract($row);
                                                    array_push($questID, $fld_ID);
                                                    if($count == 0){
                                                      echo "<h4>Part I: Personaliy Evalutation</h4>";
                                                    }elseif($count == 6){
                                                      echo "<h4>Part II: Qualitative Evaluation</h4>";
                                                    }
                                                    $count++;
                                                    echo $count.'. '.$fld_question;                                
                                          ?>
                                          <div class="row">
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating1<?php echo $fld_ID;?>' value='0' class='with-gap'/>
                                                <label for='rating1<?php echo $fld_ID;?>'>0</label>
                                             </div>
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating2<?php echo $fld_ID;?>' value='2' class='with-gap'/>
                                                <label for='rating2<?php echo $fld_ID;?>'>2</label>
                                             </div>
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating3<?php echo $fld_ID;?>' value='4' class='with-gap'/>
                                                <label for='rating3<?php echo $fld_ID;?>'>4</label>
                                             </div>
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating4<?php echo $fld_ID;?>' value='6' class='with-gap'/>
                                                <label for='rating4<?php echo $fld_ID;?>'>6</label>
                                             </div>
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating5<?php echo $fld_ID;?>' value='8' class='with-gap'/>
                                                <label for='rating5<?php echo $fld_ID;?>'>8</label>
                                             </div>
                                             <div class='col-md-1'>
                                                <input type='radio' name='rating<?php echo $count;?>' id='rating6<?php echo $fld_ID;?>' value='10' class='with-gap'/>
                                                <label for='rating6<?php echo $fld_ID;?>'>10</label>
                                             </div>
                                          </div>
                                          <br>
                                          <?php } ?>
                                          <input type="hidden" id="ratingcount" name="ratingcount" value="" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-md-8">
                                       <label for="comment">Comments: </label>
                                       <textarea name="comment" rows="7" id="comment" class="form-control no-resize"></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                       <label for="averagerating">Average Rating: </label>
                                       <input type="text" name="averagerating" id="averagerating" value="0" size="3" class="form-control" readonly="true">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                       <label for="Remarks">Remarks: </label>
                                       <input type="text" name="remarks" id="remarks" readonly="true" class="form-control">
                                    </div>
                                 </div>
                                 <input type="button" class="btn btn-primary btn-lg waves-effect" id="btnSubmitEvaluationPef" name="btnSubmitEvaluationPef" value="Submit">
                              </div>
          
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
             
             success: function(data) {
               $("#applicantName").text(data);               
             }
          }); 
   
       }
    });
   
   
   $("input[type=radio]").click(function() {
       var total = 0;
       var count = <?php echo $count; ?>;
     
       var average = 0;
       var ratingcount = "";
       var counter = 1;
       $("input[type=radio]:checked").each(function() {
           total += parseFloat($(this).val());
           ratingcount = ratingcount + $(this).val();
           if(count != counter){
               ratingcount+= ",";
           }
           else
           {
               ratingcount+="";
           }
           counter++;
       });
   
   
       average = total / count;
       $("#averagerating").val(average);
   
       $("#ratingcount").val(ratingcount);
   
       if(average >= 4){
           $("#remarks").val("Passed");
       }else{
           $("#remarks").val("Failed");
       }
   
   });
   

$(document).on("click","#btnSubmitEvaluationPef",function(){
        var getfunctionName = "addInterViewesultsGuidance";
        var applicantID     = $('#applicantID').val();
        var count           = <?php echo $count; ?>;
        var getRemarks      = $("#remarks").val();
        var getRating       = "";
        var counter         = 1;

        $("input[type=radio]:checked").each(function() {
            getRating = getRating + $(this).val();
            if(count != counter){
              getRating+= ",";
            }
            else
            {
              getRating+="";
            }
            counter++;
        });

        var getComment = $('#comment').val();
        var getAverageRating = $('#averagerating').val();
        <?php 
          for($i=0; $i < count($questID); $i++){ 
            $getImplode = implode(',', $questID);                  
          }   
        ?>
        var getQuestion = "<?php echo $getImplode; ?>";

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
          //$applicantID, $questionId, $ratings, $averageRating, $remarks, $comments

          function(isConfirm){
                  if(isConfirm){
                        $.ajax({
                        url:"ajaxRequest.php",
                        method:"POST",
                        data:{
                          applicantID:applicantID, getQuestion:getQuestion, getRating:getRating,getAverageRating:getAverageRating, getComment:getComment, getRemarks:getRemarks, getfunctionName:getfunctionName},

                        success:function(data){

                          var getData = data;
                            if($.trim(getData) == "success"){
                              swal("Success","Results Submitted.","success");
                              // window.location.href = "../General/dashboard.php"; 
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