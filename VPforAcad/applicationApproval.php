<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";

   include_once "VPforAcadClass.php";

   $applicantID = urldecode(base64_decode($_REQUEST['id']));

   $VPforAcad = new VPforAcad();
   $getApplicantDetails = $VPforAcad->readApplicantDetails($applicantID);
?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">VP for Acad</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Application Approval</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-10">
                  <div class="col-sm-12">
                     <!-- Example Basic Form Without Label -->
                     <div class="example-wrap">
                        <h4 class="example-title">Application Approval</h4>
                        <div class="example">
                           <form class="">
                              <div class="form-group row">
                                 <div class="col-sm-2">
                                <?php
                                $row = $getApplicantDetails->fetch(PDO::FETCH_ASSOC);
                                extract($row); 
                                ?>
                                <label class="control-label" >Exam Result:  </label>
                                </div><div class="col-sm-2">
                                <a style="cursor: pointer;" data-target="#examResults"
                                data-toggle="modal"><?php echo $fld_remarks; ?></a>
                                </div>
                              </div>

                              <div class="form-group row">
                                 <div class="col-sm-2">
                                <label class="control-label" >Guidance Interview Result:  </label>
                                </div>
                                <div class="col-sm-2">
                                <a style="cursor: pointer;" data-target="#interviewResultModal"
                                data-toggle="modal"><?php echo $iremarks; ?></a>
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                 <div class="col-sm-4">
                                    <label class="control-label" for="Interview Result">Interview Result:  </label>
                                 </div>
                                 <div class="col-sm-5">
                                    <select class='form-control' name='interviewResult' id='interviewResult' data-plugin="selectpicker">
                                       <option value=''></option> 
                                       <option value='Passed'>Passed</option>
                                       <option value="Failed">Failed</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-4">
                                    <label class="control-label" for="Interview Result">Is the applicant already working?  </label>
                                 </div>
                                 <div class="col-sm-7">
                                    <input type="radio" class="working" name="working" id="workingY" value="Yes"><label for="workingY">Yes</label>
                                    <input type="radio" class="working" name="working" id="workingN" value="No"><label for="workingN">No</label>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-5">
                                    <label class="control-label" for="inputBasicFirstName">Preffered Programs: </label>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <?php
                                    $programID = array(); 
                                    $programID = explode(",",$fld_prefferedPrograms);
                                    
                                    for($i=0;$i < count($programID);$i++){
                                      $getProgramName  = $VPforAcad->readProgramName($programID[$i]);
                                      echo $getProgramName." <br>";
                                    }
                                    ?> </label>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-4">
                                    <label class="control-label" for="inputBasicFirstName">Recommended Program: </label>
                                 </div>
                                 <div class="col-sm-8">
                                    <select class='form-control' name='recommnededProgram' id='recommnededProgram' data-plugin="selectpicker" data-live-search="true">
                                      <option value=''></option>
                                    <?php
                                     $getAllPrograms  = $VPforAcad->readAllPrograms();
                                     while($row = $getAllPrograms->fetch(PDO::FETCH_ASSOC)){
                                       extract($row);
                                       echo "<option value='{$fld_programID}'>{$fld_programName}</option>";
                                     } 
                                     ?>
                                  </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-4">
                                    <label class="control-label" for="inputBasicFirstName">Year Level: </label>
                                 </div>
                                 <div class="col-sm-3">
                                    <select class='form-control' name='yearLevel' id='yearLevel' data-plugin="selectpicker">
                                      <option value=''></option>
                                      <option value='1st'>1st Year</option>
                                      <option value='2nd'>2nd Year</option>
                                      <option value='3rd'>3rd Year</option>
                                      <option value='4th'>4th Year</option>
                                      <option value='5th'>5th Year</option>
                                  </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="button" class="btn btn-success btnSubmit" approvalStatus="Approved">Approved</button>
                                 <button type="button" class="btn btn-danger btnSubmit" approvalStatus="Disapproved">Disapproved</button>
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


                  <div class="modal fade" id="examResults" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <form class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFormModalLabel">Exam Results</h4>
                        </div>
                        <div class="modal-body">
                        Examination Date: <?php echo $fld_dateOfExam; ?>
                                <table border="1" class="table table-striped width-full">
                                  <thead>
                                  <tr>
                                    <th>Subject Areas</th>
                                    <th>Percentage</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                    <td>English1</td>
                                    <td><?php echo $fld_english; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Mathematics</td>
                                    <td><?php echo $fld_mathematics; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Science</td>
                                    <td><?php echo $fld_science; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Abstract Reasoning</td>
                                    <td><?php echo $fld_abstractReasoning; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Total Percentage: </td>
                                    <td><?php echo $fld_examResult."%"; ?></td>
                                  </tr>
                                  <tr>
                                    <td><span class="pull-right">Remarks:</span> </td>
                                    <td><span class="pull-left"><?php echo $iremarks; ?></span></td>
                                  </tr>


                                  <tr>
                                    <td colspan="2"><h6 class="">Comments</h6>
                                    <p class=""><?php echo $fld_comments; ?></p> </td>  
                                  </tr>
                                  </tbody>
                                </table>

                        </div>
                      </form>
                    </div>
                  </div>


                  <div class="modal fade" id="interviewResultModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <form class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFormModalLabel">Interview Results</h4>
                        </div>
                        <div class="modal-body">
                                <table border="1" class="table table-striped width-full">
                                  <thead>
                                  <tr>
                                    <th>Questions</th>
                                    <th>Ratings</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                  <?php
                                    $questionID = array();
                                    $ratings = array();
                                    $questionID = explode(",",$fld_questionId);
                                    $ratings = explode(",",$fld_ratings);

                                    for($i=0;$i < count($questionID);$i++){
                                      $getQuestionName  = $VPforAcad->readQuestionName($questionID[$i]);
                                      $getRatings = $ratings[$i];
                                      echo "<tr>";
                                      echo "<td>{$getQuestionName}</td>";
                                      echo "<td>{$getRatings}</td>";
                                      echo "</tr>";
                                    }
                                    ?>

                                  </tr>
                                  <tr>
                                    <td>Total Percentage: </td>
                                    <td><?php echo $fld_averageRating ; ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><h6>Comments:</h6>
                                    <p><?php echo $icomments ; ?></p></td>
                                  </tr>

                                  </tbody>
                                </table>
                        </div>
                      </form>
                    </div>
                  </div>
<?php
   include_once "../General/footer.php";
?>

<script type="text/javascript">

$(document).on("click",".btnSubmit",function(){

    var getfunctionName     = "applicationApproval";
    var applicantID         = "<?php echo $applicantID; ?>";
    var interviewResult     = $('#interviewResult').val();
    var working             = $('.working:checked').val();
    var recommnededProgram  = $('#recommnededProgram').val();
    var yearLevel           = $('#yearLevel').val();
    var status              = $(this).attr("approvalStatus");

      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName, 
          applicantID:applicantID,
          interviewResult:interviewResult,
          working:working,
          recommnededProgram:recommnededProgram,
          yearLevel: yearLevel,
          status:status
        },

        success:function(data){
          var getData = data;
          alert(getData);
          if($.trim(getData) == "success"){
            console.log("success");
            window.location.href="listOfApplicants.php";
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


