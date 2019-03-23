<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "adminClass.php";
   
   $admin                     = new Admin();
   $getAllPrograms            = $admin->readAllPrograms();
   $getSchoolYear             = $admin->readSchoolYear();
   $getGradeEncodingStatus    = $admin->readGradesEncodingStatus();
   $getRowSY                  = $getSchoolYear->rowCount();
   $SYstatus                  = "";
   $termStatus                = "";
   $btnEdit                   = "";
   $btnActivate               = "";
   $btnDeactivate             = "";
   $btnEditGrade              = "";
   $btnActivateGrade          = "";
   $btnDeactivateGrade        = "";
   
   if($getRowSY > 0){
       while($getSchoolYearStatus = $getSchoolYear->fetch(PDO::FETCH_ASSOC)){
       extract($getSchoolYearStatus);
           if($fld_status == "ACTIVATED"){
               $SYstatus = "disabled";
               $btnActivate = "disabled";
           }
           else{
               $btnEdit = "disabled";
               $btnDeactivate = "disabled";
           }
       }   
   }else{
       $btnEdit = "disabled";
       $btnDeactivate = "disabled";
   } 

   while($getTermStatus = $getGradeEncodingStatus->fetch(PDO::FETCH_ASSOC)){
      extract($getTermStatus);
         if($status == "ACTIVATED"){           
            $termStatus = "disabled";
            $btnActivateGrade = "disabled";
         }else{
            $btnEditGrade = "disabled";
            $btnDeactivateGrade = "disabled";
         }
   }  
?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Settings</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                     <div class="example-wrap">
                        <h4 class="example-title">Settings</h4>
                        <div class="example">
                           <div class="panel nav-tabs-horizontal">
                              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                 <li class="active" role="presentation"><a data-toggle="tab" href="#section" aria-controls="section"
                                    role="tab">Section</a></li>
                                 <li role="presentation"><a data-toggle="tab" href="#activator" aria-controls="activator"
                                    role="tab">Activator</a></li>
                                 <li role="presentation"><a data-toggle="tab" href="#students" aria-controls="students"
                                    role="tab">Students</a></li>
                                 <li role="presentation"><a data-toggle="tab" href="#prospectus" aria-controls="prospectus"
                                    role="tab">Prospectus</a></li>
                                 <li role="presentation"><a data-toggle="tab" href="#faculty" aria-controls="faculty"
                                    role="tab">Faculty</a></li>
                                 <li role="presentation"><a data-toggle="tab" href="#facultyactivator" aria-controls="facultyactivator" role="tab">Faculty Activator</a></li>
                              </ul>
                              <div class="panel-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="section" role="tabpanel">
                                       <div class="form-group row">
                                          <div class="col-sm-3">
                                             <input type="text" class="form-control" name="sectionName" id="sectionName" placeholder="Section Name" />
                                          </div>
                                          <div class="col-sm-3">
                                             <select class='form-control' name='programID' id='programID' data-plugin='selectpicker' data-live-search='true'>
                                                <option value='' data-hidden="true">Select Program</option>
                                                <?php

                                                   while($row = $getAllPrograms->fetch(PDO::FETCH_ASSOC)){
                                                   extract($row);
                                                   echo "<option value='{$fld_programID}'>{$fld_programName}</option>";
                                                   }
                                                   ?>
                                             </select>
                                          </div>
                                          <div class="col-sm-3">
                                             <select class='form-control' name='yearLevel' id='yearLevel' data-plugin='selectpicker' data-live-search='true'>
                                                <option value='' data-hidden="true">Select Year Level</option>
                                                <option value='1st'>1st Year</option>
                                                <option value='2nd'>2nd Year</option>
                                                <option value='3rd'>3rd Year</option>
                                                <option value='4th'>4th Year</option>
                                                <option value='5th'>5th Year</option>
                                             </select>
                                          </div>
                                          <div class="col-sm-2">
                                             <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity" />
                                          </div>
                                          <div class="col-sm-1">
                                             <button type="submit" id="btnAddSection" class="btn btn-primary ">Add</button>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <table class="table table-striped width-full" id="tableSection">
                                             <thead>
                                                <tr>
                                                   <th>Section Name</th>
                                                   <th>Program</th>
                                                   <th>Year&nbsp;Level</th>
                                                   <th>Capacity</th>
                                                   <th>Evaluator</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   $getAllSections = $admin->readAllSections();
                                                   while($row = $getAllSections->fetch(PDO::FETCH_ASSOC)){
                                                   extract($row);
                                                   ?>
                                                <tr>
                                                   <td><?php echo $fld_sectionName; ?></td>
                                                   <td><?php echo $fld_programName; ?></td>
                                                   <td><?php echo $fld_yearLevel; ?></td>
                                                   <td><?php echo $fld_maxNoOfStudents; ?></td>
                                                   <td>
                                                      <select class="form-control" id="selectStaff" name="selectStaff" data-section="<?php echo $fld_sectionID; ?>"data-plugin='selectpicker' data-live-search='true'>
                                                        <option value=""></option>
                                                         <?php 
                                                            $getAllStaffs = $admin->readAllStaffs();
                                                            while($staff = $getAllStaffs->fetch(PDO::FETCH_ASSOC)){
                                                            extract($staff);
                                                            ?>
                                                         <option value="<?php echo $staffId; ?>" <?php if($fld_staffId == $staffId){ echo "selected"; } ?> ><?php echo $firstName." ".$lastName; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                             <tfoot>
                                                <tr>
                                                   <th>Section Name</th>
                                                   <th>Program</th>
                                                   <th>Year&nbsp;Level</th>
                                                   <th>Capacity</th>
                                                   <th>Evaluator</th>
                                                </tr>
                                             </tfoot>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="activator" role="tabpanel">
                                       <div class="card">
                                          <div class="body">
                                             <h3>School Year</h3>
                                             <div class="col-md-12 text-center">
                                                <div class="col-md-6">
                                                   <input type="number" id="startYear" class="form-control" value="<?php echo $fld_startSY; ?>" <?php echo $SYstatus;?> />
                                                </div>
                                                <div class="col-md-6">
                                                   <input type="number" id="endYear" class="form-control" value="<?php echo $fld_endSY; ?>" <?php echo $SYstatus;?> />
                                                </div>
                                             </div>
                                             <h3>Semester</h3>
                                             <div class="col-md-12">
                                                <div class="radio-custom radio-primary">
                                                   <div class="col-md-3">
                                                      <input type="radio" id="1stSemester" name="semesterSY" value="1" <?php if($fld_semester == "1") { echo 'checked'; } ?> <?php echo $SYstatus;?>/>
                                                      <label for="1stSemester">1st Semester</label>
                                                   </div>
                                                   <div class="col-md-3">
                                                      <input type="radio" id="2ndSemester" name="semesterSY" value="2" <?php if($fld_semester == "2") { echo 'checked'; } ?> <?php echo $SYstatus;?> />
                                                      <label for="2ndSemester">2nd Semester</label>
                                                   </div>
                                                   <div class="col-md-3">
                                                      <input type="radio" id="summer" name="semesterSY" value="3" <?php if($fld_semester == "3") { echo 'checked'; } ?> <?php echo $SYstatus;?> />
                                                      <label for="summer">Summer</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <br><br>
                                             <div class="col-md-12 text-center"> 
                                                <button type="button" id="btnActivate" class="btn btn-lg btn-primary" <?php echo $btnActivate;?>>Activate</button>
                                                <button type="button" id="btnDeactivate" class="btn btn-lg btn-primary" <?php echo $btnDeactivate;?>>Deactivate</button>
                                                <button type="button" id="btnEdit" class="btn btn-lg btn-primary" <?php echo $btnEdit;?>>Edit</button>
                                             </div>
                                             <br><br>
                                             <hr>
                                             <h3>Grades Encoding</h3>
                                             <div class="col-md-12">
                                                <div class="radio-custom radio-primary">
                                                   <div class="col-md-3">
                                                      <input type="radio" id="midTerm" name="term" value="1" <?php if($term == "1") { echo 'checked'; } ?> <?php echo $termStatus;?>/>
                                                      <label for="midTerm">Mid Term</label>
                                                   </div>
                                                   <div class="col-md-3">
                                                      <input type="radio" id="finalTerm" name="term" value="2" <?php if($term == "2") { echo 'checked'; } ?> <?php echo $termStatus;?> />
                                                      <label for="finalTerm">Final Term</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <br><br>
                                             <div class="col-md-12 text-center"> 
                                                <button type="button" id="btnActivateGrade" class="btn btn-lg btn-primary" <?php echo $btnActivateGrade;?>>Activate</button>
                                                <button type="button" id="btnDeactivateGrade" class="btn btn-lg btn-primary" <?php echo $btnDeactivateGrade;?>>Deactivate</button>
                                                <button type="button" id="btnEditGrade" class="btn btn-lg btn-primary" <?php echo $btnEditGrade;?>>Edit</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                                                        <div class="tab-pane" id="students" role="tabpanel">
                                       <div class="card">
                                          <div class="body">
                                             <table class="table table-bordered table-striped table-hover tblListOfScholar dataTable" id="tableStudent">
                                                <thead>
                                                   <tr>
                                                      <th>STUDENT NO.</th>
                                                      <th>NAME</th>
                                                      <th>PROGRAM</th>
                                                      <th>SECTION</th>
                                                      <th>YEAR LEVEL</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>STUDENT NO.</th>
                                                      <th>NAME</th>
                                                      <th>PROGRAM</th>
                                                      <th>SECTION</th>
                                                      <th>YEAR LEVEL</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>
                                                   <?php $getAllStudent = $admin->readAllStudent();
                                                      while($row = $getAllStudent->fetch(PDO::FETCH_ASSOC)){
                                                      extract($row);
                                                        echo "<tr>
                                                              <td>{$fld_studentNo}</td>
                                                              <td>{$fld_firstName} {$fld_lastName}</td>
                                                              <td>{$fld_program}</td>
                                                              <td>{$fld_sectionName}</td>
                                                              <td>{$fld_yearLevel}</td>
                                                              <td><select data-value='{$fld_studentNo}' status='assignStudentStatus' id='selectStudent' name='selectStudent' class='form-control selectStudent'>";
                                                              
                                                              echo "<option value='active'";
                                                            if($status == "active"){
                                                              echo "selected";
                                                            }
                                                              echo ">Active</option>
                                                              <option value='inactive'";
                                                            if($status == "inactive"){
                                                              echo "selected";
                                                            }
                                                             echo ">Inactive</option>
                                                              <option value='graduated'";
                                                            if($status == "graduated"){
                                                              echo "selected";
                                                            }
                                                              echo ">Graduated</option>
                                                              </select>
                                                              </td>
                                                          </tr>";
                                                      }
                                                      ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="prospectus" role="tabpanel">
                                       <div class="card">
                                          <div class="body">
                                             <table class="table table-bordered table-striped table-hover dataTable" id="tableProspectus">
                                                <thead>
                                                   <tr>
                                                      <th>PROSPECTUS NAME</th>
                                                      <th>PROGRAM</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>PROSPECTUS NAME</th>
                                                      <th>PROGRAM</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>
                                                   <?php $getAllProspectus = $admin->readAllProspectus();
                                                      while($row = $getAllProspectus->fetch(PDO::FETCH_ASSOC)){
                                                      extract($row);
                                                        echo "<tr>
                                                              <td>{$fld_prospectusName}</td>
                                                              <td>{$fld_programName}</td>
                                                              <td><select data-value='{$fld_prospectusName}' data-program='{$fld_programID}' status='assignProspectusStatus' id='selectProspectus' name='selectProspectus' class='form-control selectProspectus'>";
                                                              
                                                              echo "<option value='Active'";
                                                            if($fld_status == "Active"){
                                                              echo "selected";
                                                            }
                                                              echo ">Active</option>
                                                              <option value='Inactive'";
                                                            if($fld_status == "Inactive"){
                                                              echo "selected";
                                                            }
                                                             echo ">Inactive</option>
                                                              </select>
                                                              </td>
                                                          </tr>";
                                                      }
                                                      ?>
                                                </tbody>
                                             </table>
                                             <hr>
                                             <h3>Downloadable File</h3>
                                             <table border="0" width="150PX;">
                                                <tr>
                                                   <td><a href="exportTemplate.php"><img src="../assets/images/excel.jpg" width="40%" height="30%"></a></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top">
                                                      <a href="exportTemplate.php">
                                                         <h6>Subject Template</h6>
                                                      </a>
                                                   </td>
                                                </tr>
                                             </table>
                                             <hr>
                                             <h3>Import File</h3>
                                             <form id="upload_prospectus" method="post" enctype="multipart/form-data">  
                                                <input type="file" id="prospectusFile" name="prospectusFile"><br>
                                                <button type="submit" id="btnAddProspectus" class="btn btn-primary">Upload</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="faculty" role="tabpanel">
                                       <div class="card">
                                          <div class="body">
                                             <h3>Downloadable File</h3>
                                             <table border="0" width="150PX;">
                                                <tr>
                                                   <td><a href="exportTemplateFaculty.php"><img src="../assets/images/excel.jpg" width="40%" height="30%"></a></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top">
                                                      <a href="exportTemplateFaculty.php">
                                                         <h6>Faculty Template</h6>
                                                      </a>
                                                   </td>
                                                </tr>
                                             </table>
                                             <hr>
                                             <h3>Import File</h3>
                                             <form id="upload_faculty" method="post" enctype="multipart/form-data">  
                                                <input type="file" id="facultyFile" name="facultyFile"></br>
                                                <button type="submit" id="btnAddFaculty" class="btn btn-primary">Upload</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tab-pane" id="facultyactivator" role="tabpanel">
                                       <div class="card">
                                          <div class="body">
                                             <table class="table table-bordered table-striped table-hover dataTable" id="tableFaculty">
                                                <thead>
                                                   <tr>
                                                      <th>ID</th>
                                                      <th>NAME</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>NAME</th>
                                                      <th>NAME</th>
                                                      <th>STATUS</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>
                                                   <?php $getAllFaculty = $admin->readAllStaffs();
                                                      while($row = $getAllFaculty->fetch(PDO::FETCH_ASSOC)){
                                                      extract($row);
                                                        echo "<tr>
                                                              <td>{$staffId}</td>
                                                              <td>{$firstName} {$lastName}</td>
                                                              <td><select data-value='{$staffId}' id='selectFaculty' name='selectFaculty' class='form-control selectFaculty'>";
                                                              
                                                              echo "<option value='active'";
                                                            if($status == "active"){
                                                              echo "selected";
                                                            }
                                                              echo ">Active</option>
                                                              <option value='inactive'";
                                                            if($status == "inactive"){
                                                              echo "selected";
                                                            }
                                                             echo ">Inactive</option>
                                                              <option value='resignedTerminated'";
                                                            if($status == "resignedTerminated"){
                                                              echo "selected";
                                                            }
                                                              echo ">Resigned/Terminated</option>
                                                              </select>
                                                              </td>
                                                              <td><center><button class='btn btn-success' data-id='{$staffId}' id='btnUpdateAccess'>Update</button></center></td>
                                                          </tr>";
                                                      }
                                                      ?>
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
    $('#tableSection').DataTable();
    $('#tableStudent').DataTable();
    $('#tableProspectus').DataTable();
    $('#upload_prospectus').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"ajaxRequest.php",  
                     method:"POST",  
                     data:new FormData(this),
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          swal({
                          title: "Success!",
                          text: "Prospectus Updated!",
                          type: "success",
                          });
                          $("#prospectusFile").val("");
                     }  
                })  ;
           });  
   
      $('#upload_faculty').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"ajaxRequest.php",  
                     method:"POST",  
                     data:new FormData(this),
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          swal({
                          title: "Success!",
                          text: "Faculty Added!",
                          type: "success",
                          });
                          $("#facultyFile").val("");
                     }  
                })  ;
           });
   });
   
           
   
   $(document).on("click", "#btnAddSection", function() {
   
    var getfunctionName   = "addSection";
    var sectionName       = $("#sectionName").val();
    var programID         = $("#programID").val();
    var capacity          = $("#capacity").val();
    var yearLevel         = $("#yearLevel").val();
    
    $.ajax({
        url: "ajaxRequest.php",
        method: "POST",
        data: {
            getfunctionName: getfunctionName,
            sectionName: sectionName,
            capacity: capacity,
            yearLevel: yearLevel,
            programID: programID
        },
        success: function(data) {
            var getData = data;
            alert(getData);
            if (getData == "success") {
                // swal("ERROR IN DATABASE", "Database not executed! Please ask the administrator for assisstance.", "error");
                // swal("ADDING DATA", "Data successfully added in database.", "success");  
                // $("#tableSection").load(" #tableSection");
                location.reload();
            } else {
                // swal("ADDING DATA", "Data successfully added in database.", "success");  
            }
        },
        error: function(jqXHR, exception) {
            console.log(jqXHR);
        }
    });
    
   });
</script>

<script>
   $(document).on('click', '#btnActivate', function(){
   
           
           var getSemester = $('input[name=semesterSY]:checked').val();   
           var getStartSY = $("#startYear").val();
           var getEndSY = $("#endYear").val(); 
           
           var getAction = "ACTIVATE"; 
             $.ajax({
                       url:"ajaxRequest.php",
                       method:"POST",
                       data:{getSemester:getSemester,getStartSY:getStartSY,getEndSY:getEndSY,getAction:getAction},
                       success:function(data){
                         var getData = data;
                           if(getData.trim() == "SUCCESS"){
                             swal("SCHOOL YEAR ACTIVATION","School year activated","success");
                             $("#btnActivate").attr("disabled","disabled");
                             $("#btnDeactivate").removeAttr("disabled");                 
                             $("#startYear").attr("disabled","disabled");  
                             $("#endYear").attr("disabled","disabled");  
                             $("#btnEdit").removeAttr("disabled");
                             $("input[type=radio][name=semesterSY]").attr("disabled","disabled");
                           }
                           else{  
                             swal("SCHOOL YEAR ACTIVATION","School year did not activate!","error");
                           }
                           
                         },
                       error: function(jqXHR, exception){
                           console.log(jqXHR);
                         }  
                       });
     });
</script>
<script>
   $(document).on('click', '#btnEdit', function(){
           $("#btnEdit").attr("disabled","disabled");
           $("#btnActivate").removeAttr("disabled");
           $("#btnDeactivate").attr("disabled","disabled");
           $("#startYear").removeAttr("disabled");
           $("#endYear").removeAttr("disabled");
           //$("#1stSemester").attr("checked","checked");
           $("input[type=radio][name=semesterSY]").removeAttr("disabled");
     });
</script>
<script>
   $(document).on('click', '#btnDeactivate', function(){
           var getSemester = $('input[name=semesterSY]:checked').val();   
           var getStartSY = $("#startYear").val();
           var getEndSY = $("#endYear").val(); 
           
           var getAction = "DEACTIVATE"; 
             $.ajax({
                       url:"ajaxRequest.php",
                       method:"POST",
                       data:{getSemester:getSemester,getStartSY:getStartSY,getEndSY:getEndSY,getAction:getAction},
                       success:function(data){
                         var getData = data;
                           if(getData.trim() == "SUCCESS"){
                             swal("SCHOOL YEAR ACTIVATION","School year activated","success");
                             $("#btnEdit").attr("disabled","disabled");
                             $("#btnActivate").removeAttr("disabled");
                             $("#btnDeactivate").attr("disabled","disabled");
                             $("#startYear").removeAttr("disabled");
                             $("#endYear").removeAttr("disabled");
                             $("#1stSemester").attr("checked","checked");
                             $("input[type=radio][name=semesterSY]").removeAttr("disabled");
                             swal("SCHOOL YEAR ACTIVATION","School year deactivated","success");
                           }
                           else{  
                             swal("SCHOOL YEAR ACTIVATION","School year did not deactivate!","error");
                           }
                           
                         },
                       error: function(jqXHR, exception){
                           console.log(jqXHR);
                         }  
                       });
     });
</script>
<script>
   $(document).on('change', '#selectStudent', function(){
   var getfunctionName = "assignStudentStatus"; 
   var getStatus = $(this).val();
   var getID = $(this).attr("data-value");
   
   $.ajax({
               url:"ajaxRequest.php",
               method:"POST",
               data:{getID:getID,getStatus:getStatus,getfunctionName:getfunctionName},
               success:function(data){
                   var getData = data;
                   if(getData.trim() == "success"){
                       swal("STATUS CHANGED","Data successfully updated in database.","success");
                       $("#tableStudent").load(" #tableStudent");
                   }
                   else if(getData.trim() == "error"){
                       swal("ERROR IN DATABASE","Database not executed! Please ask the administrator for assistance.","error");
                   }
                   
                 },
               error: function(jqXHR, exception){
                   console.log(jqXHR);
                 }  
           });
   });
   
</script>
<script>
   $(document).on('change', '#selectProspectus', function(){
   var getfunctionName = "assignProspectusStatus"; 
   var getStatus = $(this).val();
   var getProspectusName = $(this).attr("data-value");
   var getProgramID = $(this).attr("data-program");

   $.ajax({
               url:"ajaxRequest.php",
               method:"POST",
               data:{getProspectusName:getProspectusName,getProgramID:getProgramID,getStatus:getStatus,getfunctionName:getfunctionName},
               success:function(data){
                   var getData = data;
                   if(getData.trim() == "success"){
                       swal("STATUS CHANGED","Data successfully updated in database.","success");
                       $("#tableProspectus").load(" #tableProspectus");
                   }
                   else if(getData.trim() == "error"){
                       swal("ERROR IN DATABASE","Database not executed! Please ask the administrator for assistance.","error");
                   }
                   
                 },
               error: function(jqXHR, exception){
                   console.log(jqXHR);
                 }  
           });
   });
   
</script>
<script>
   $(document).on('change', '#selectStaff', function(){
   var getfunctionName = "assignSectionEvaluator"; 
   var getStaffID = $(this).val();
   var getSectionID = $(this).attr("data-section");
   
   $.ajax({
               url:"ajaxRequest.php",
               method:"POST",
               data:{getStaffID:getStaffID,getSectionID:getSectionID,getfunctionName:getfunctionName},
               success:function(data){
                   var getData = data;

                   if(getData.trim() == "success"){
                       swal("EVALUATOR ASSIGNED","Data successfully updated in database.","success");
                       }
                   else if(getData.trim() == "error"){
                       swal("ERROR IN DATABASE","Database not executed! Please ask the administrator for assistance.","error");
                   }
                   
                 },
               error: function(jqXHR, exception){
                   console.log(jqXHR);
                 }  
           });
   });
   
</script>

<!-- Activation for Grades Encoding -->
<script>
   $(document).on('click', '#btnActivateGrade', function(){
   
           
           var getTerm = $('input[name=term]:checked').val();   
           var getfunctionName = "updateGradesEncodingStatus";
           var getAction = "ACTIVATE"; 
             $.ajax({
                       url:"ajaxRequest.php",
                       method:"POST",
                       data:{getfunctionName:getfunctionName, getTerm:getTerm, getAction:getAction},
                       success:function(data){
                         var getData = data;
                           if(getData.trim() == "SUCCESS"){
                             swal("GRADES ENCODING ACTIVATION","Grades Encoding activated","success");
                             $("#btnActivateGrade").attr("disabled","disabled");
                             $("#btnDeactivateGrade").removeAttr("disabled"); 
                             $("#btnEditGrade").removeAttr("disabled");
                             $("input[type=radio][name=term]").attr("disabled","disabled");
                           }
                           else{  
                             swal("GRADES ENCODING ACTIVATION","Grades Encoding did not activate!","error");
                           }
                           
                         },
                       error: function(jqXHR, exception){
                           console.log(jqXHR);
                         }  
                       });
     });
</script>
<script>
   $(document).on('click', '#btnEditGrade', function(){
           $("#btnEditGrade").attr("disabled","disabled");
           $("#btnActivateGrade").removeAttr("disabled");
           $("#btnDeactivateGrade").attr("disabled","disabled");
           $("input[type=radio][name=term]").removeAttr("disabled");
     });
</script>
<script>
   $(document).on('click', '#btnDeactivateGrade', function(){
           var getTerm = $('input[name=term]:checked').val();   
           var getfunctionName = "updateGradesEncodingStatus";
           
           var getAction = "DEACTIVATE"; 
             $.ajax({
                       url:"ajaxRequest.php",
                       method:"POST",
                       data:{getfunctionName:getfunctionName, getTerm:getTerm, getAction:getAction},
                       success:function(data){
                         var getData = data;
                           if(getData.trim() == "SUCCESS"){
                             $("#btnEditGrade").attr("disabled","disabled");
                             $("#btnActivateGrade").removeAttr("disabled");
                             $("#btnDeactivateGrade").attr("disabled","disabled");
                             $("input[type=radio][name=term]").removeAttr("disabled");
                             swal("GRADES ENCODING ACTIVATION","Grades Encoding deactivated","success");
                           }
                           else{  
                             swal("GRADES ENCODING ACTIVATION","Grades Encoding did not deactivate!","error");
                           }
                           
                         },
                       error: function(jqXHR, exception){
                           console.log(jqXHR);
                         }  
                       });
     });
</script>

<script>
   $(document).on('change', '#selectFaculty', function(){
   var getfunctionName = "assignStaffStatus"; 
   var getStatus = $(this).val();
   var getID = $(this).attr("data-value");
   $.ajax({
               url:"ajaxRequest.php",
               method:"POST",
               data:{getID:getID,getStatus:getStatus,getfunctionName:getfunctionName},
               success:function(data){
                   var getData = data;
                   if(getData.trim() == "success"){
                       swal("STATUS CHANGED","Data successfully updated in database.","success");
                       $("#tableFaculty").load(" #tableFaculty");
                   }
                   else if(getData.trim() == "error"){
                       swal("ERROR IN DATABASE","Database not executed! Please ask the administrator for assistance.","error");
                   }
                   
                 },
               error: function(jqXHR, exception){
                   console.log(jqXHR);
                 }  
           });
   });
   
   $(document).on('click', '#btnUpdateAccess', function(){
   var getfunctionName = "editAccessType";
   var getID = $(this).attr("data-id");
   if(getID != ""){
      window.location = 'updateAccessType.php?staffID=' + btoa(getID);
   }
   });
</script>

<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#tableSection').DataTable();
} );
</script>