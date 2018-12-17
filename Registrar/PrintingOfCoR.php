<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "registrarClass.php";
   
   $registrar        = new Registrar();
   $page             = " ";
   $getAllApplicants = $registrar->readAllApplicants($page);
   $getAllStudents   = $registrar->readAllStudents();
   
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Registrar</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Printing of Certificate of Registration</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Certificate of Registration</h4>
                     <div class="example">
                        <div class="form-group row">

                           <div class="col-sm-4 applicant">
                           <input type="hidden" name="type" id="type">
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

                           <div class="col-sm-2">
                              <a href="#" id="btnPrintPEF" class="btn btn-primary pull-right">Print COR</a>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="name">Name: </label>
                           <label class="control-label" id="applicantName"></label><br>
                           <input type="hidden" value="" id="prefferedcourse" />
                           <input type="hidden" value="" id="prefferedProgram" />
                           <input type="hidden" value="" id="studentNumber" />
                           <input type="hidden" value="" id="yearLevel" />
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
             dataType:"json",
             success: function(data) {
   
               $("#applicantName").text(data[0]);
               $("#prefferedcourse").val(data[1]);
               $("#prefferedProgram").val(data[3]);
               if(data[4] == "n/a")
               {
               $("#type").val("Applicant");
               $("#studentNumber").val(applicantID);
               }else{
                $("#type").val("Student");
                $("#studentNumber").val(data[4]);
               }
               $("#yearLevel").val(data[5]);
             }
          }); 
   
      }
    });

    function printPef(){
            var getfunctionName = "printPef";
            var applicantID = $("#applicantID").val();
            $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, applicantID: applicantID},
             success: function(data) {
               var getData = $.trim(data);
               $("#type").val("Student");
               $("#studentNumber").val(getData);
               window.location = 'exportCOR.php?studentNo=' + btoa(getData);  
             }
            }); 
    }

    function updatePef(){
            var getfunctionName = "updatePef";
            var studentNo = $("#studentNumber").val();
            $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, studentNo: studentNo},
             success: function(data) {
             }
            }); 
    }

   $(document).on('click', '#btnPrintPEF', function(){
          var type = $("#type").val();
          
          if(type == "Applicant"){
            printPef();
          }
          else{
          var studentNo = $("#studentNumber").val();
          updatePef();
          if(studentNo != ""){
              window.location = 'exportCOR.php?studentNo=' + btoa(studentNo);       
          }
         }
   });

   
   
</script>