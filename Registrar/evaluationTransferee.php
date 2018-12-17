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
      <li class="active">Evaluate Subjects</li>
   </ol>
</div>
<div class="page-content">
   <div class="panel">
      <div class="panel-body container-fluid">
         <div class="row row-lg">
            <div class="col-sm-12">
               <!-- Example Basic Form Without Label -->
               <div class="example-wrap">
                  <h4 class="example-title">Evaluate Subjects</h4>
                  <div class="example">
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
                        <div class="col-sm-7">
                           <button type="button" id="btnAddSubject" class="btn btn-primary pull-right" >Add Subject</button>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="name">Name: </label>
                        <label class="control-label" id="applicantName"></label>
                     </div>
                     <div class="form-group">
                        <table class="table dataTable table-striped width-full" id="tableEvaluation">
                            <thead>
                              <tr>
                                <th width="15%">Subject Code</th>
                                <th width="25%">Description</th>
                                <th width="10%">Units</th>
                                <th width="10%">Grade</th>
                                <th width="15%">Subject Code</th>
                                <th width="25%">Description</th>
                              </tr>
                            </thead>
                            <tbody>
                              <input type="hidden" value="0" id="count" />
                              <tr>
                                <td><input type="text" class="form-control subCode" name="subCode[]" id="subCode0"/></td>
                                <td><input type="text" class="form-control subjectDescription" name="subjectDescription[]" id="subjectDescription0"/></td>
                                <td><input type="text" class="form-control units" name="units[]" id="units0"/></td>
                                <td><input type="text" class="form-control grades" name="grades[]" id="grades0"/></td>
                                <td>
                                
                                <select class='form-control subjectID' name='subjectID[]' id='subjectID0' subjectID='0'>
                                  <option value='' data-hidden='true'>Select Subject Code</option>
                                <?php
                                  $getProspectus  = $registrar->readProspectus();
                                  while($row = $getProspectus->fetch(PDO::FETCH_ASSOC)){
                                  extract($row);
                                  echo "<option value='{$fld_subjectID}'>{$fld_subCode}</option>";
                                  } 
                                ?>
                                 </select>
                                </td>
                                <td><label class="control-label subjectDescriptionProspectus" name="subjectDescriptionProspectus[]" id="subjectDescriptionProspectus0"></label></td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th>Units</th>
                                <th>Grade</th>
                                <th>Subject Code</th>
                                <th>Description</th>
                              </tr>
                            </tfoot>
                          </table>
                     </div>
                     <div class="form-group">
                        <button type="submit" id="btnSubmit" class="btn btn-primary ">Submit</button>
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

  $(document).on("click", "#btnAddSubject", function() {
   var getCount = $("#count").val();
   getCount++;
   $("#count").val(getCount);
   
       $('#tableEvaluation').find('tbody').append($(
   
           '<tr>' +
               '<td>' +
                   '<input type="text" class="form-control subCode" name="subCode[]" id="subCode'+ getCount +'"' + '>' +
               '</td> ' + 
               '<td>' +
                   '<input type="text" class="form-control subjectDescription" name="subjectDescription[]" id="subjectDescription'+ getCount +'"' + '>' +
               '</td> ' + 
               '<td>' +
                   '<input type="text" class="form-control units" name="units[]" id="units'+ getCount +'"' + '>' +
               '</td> ' + 
               '<td>' +
                   '<input type="text" class="form-control grades" name="grades[]" id="grades'+ getCount +'"' + '>' +
               '</td> ' + 
               '<td> ' + 
                    '<select class="form-control subjectID" name="subjectID[]" id="subjectID'+ getCount +'"' + ' data-plugin="selectpicker" data-live-search="true" subjectID="'+ getCount +'">' +
                      '<option value="" data-hidden="true">Select Subject Code</option>' +
                      <?php 
                      $getProspectus  = $registrar->readProspectus();
                      while($row = $getProspectus->fetch(PDO::FETCH_ASSOC)){
                      extract($row);
                      ?>
                      '<option value="<?php echo $fld_subjectID; ?>"><?php echo $fld_subCode; ?></option>' +
                      <?php } ?>
                     '</select>' +   
               '</td> ' +
               '<td> ' + 
                    '<label class="control-label subjectDescriptionProspectus" name="subjectDescriptionProspectus[]" id="subjectDescriptionProspectus'+ getCount +'"></label>' +   
               '</td> ' +
           '</tr>'
          ));
   });


   $(document).on("change", ".subjectID", function changeName(){

       var getfunctionName = "getSubjectDescription";
       var subjectID = $(this).val();
       var subCodeProspectusID = $(this).attr("subjectID");
       
       if(subjectID != ""){
         
         $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, subjectID: subjectID},
             
             success: function(data) {
               $("#subjectDescriptionProspectus"+subCodeProspectusID).text(data);               
             }
          }); 
   
       }

    });

   $(document).on("change", "#applicantID", function changeName(){
   
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
             }
          }); 
   
       }
    });
   
    $(document).on("click","#btnSubmit",function(){
   
      var getfunctionName       = "creditSubjects";
      var applicantID           = $("#applicantID").val();
      var getSubCode            = [];
      var getSubjectDescription = [];
      var getUnits              = [];
      var getGrades             = [];
      var subjectID             = [];
  
      $('.subCode').each(function() {
        if($(this).val() != ""){ 
          getSubCode.push($(this).val());
        }
      });

      $('.subjectDescription').each(function() {
        if($(this).val() != ""){ 
          getSubjectDescription.push($(this).val());
        }
      });

      $('.units').each(function() {
        if($(this).val() != ""){ 
          alert($(this).val());
          getUnits.push($(this).val());
        }
      });

      $('.grades').each(function() {
        if($(this).val() != ""){ 
          getGrades.push($(this).val());
        }
      });

      $('.subjectID').each(function() {
        subjectID.push($(this).val());
      });
   getSubCode = getSubCode.toString();
   getSubjectDescription = getSubjectDescription.toString();
   getUnits = getUnits.toString();
   getGrades = getGrades.toString();
   subjectID = subjectID.toString();
       // prefferedPrograms       = prefferedPrograms.toString();

         $.ajax({
           url:"ajaxRequest.php",
           method:"POST",
           data:{
             getfunctionName:getfunctionName, 
             applicantID:applicantID,
             getSubCode:getSubCode,
             getSubjectDescription:getSubjectDescription,
             getUnits:getUnits,
             getGrades:getGrades,
             subjectID:subjectID
           },
   
           success:function(data){
             var getData = data;
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