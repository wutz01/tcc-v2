<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
    include_once "registrarClass.php";     
    $registrar = new Registrar();

    $getGradeEncodingStatus    = $registrar->readGradesEncodingStatus();
    $getTermStatus = $getGradeEncodingStatus->fetch(PDO::FETCH_ASSOC);
    extract($getTermStatus);
    $ctrlNo = $registrar->readLastCtrlNo();
   
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Registrar</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Change Grades</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Change Grades</h4>
                     <div class="form-group row">
                        <div class="col-md-1">
                           Date:
                        </div>
                        <div class="col-md-4">
                           <?php echo date('F d, Y',time()) ?>
                        </div>
                        <div class="col-md-1">
                           Control&nbsp;No:
                        </div>
                        <div class="col-md-4">
                           <input type="text" name="controlNo" id ="controlNo" value = "<?php echo $ctrlNo; ?>" class="form-control" readonly="true">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-1">
                           School&nbsp;Year:
                        </div>
                        <div class="col-sm-4">
                           <input type="text" name="schoolYear" value="<?php echo $_SESSION['startSY'].' - '.$_SESSION['endSY']; ?>" class="form-control" readonly="true">
                        </div>
                        <div class="col-sm-1">
                           Faculty:
                        </div>
                        <div class="col-sm-4">
                           <select class="form-control staffName" id="staffName" required></select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-1">
                           Semester:
                        </div>
                        <div class="col-sm-4">
                           <input type="text" name="semester" value="<?php echo $_SESSION['semester']; ?>" class="form-control" readonly="true">
                        </div>
                        <div class="col-md-1">
                           Subject:
                        </div>
                        <div class="col-md-4">
                           <select class='form-control' name='courseID' id='courseID' ></select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-1">
                           Term:
                        </div>
                        <div class="col-md-4">
                           <input type="text" name="schoolYear" value="<?=$term?>" class="form-control" readonly="true">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-3">
                           Reason of Change Grade:
                        </div>
                        <div class="col-sm-2"></div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-10">
                           <textarea class="form-control no-resize" rows="4"></textarea>
                        </div>
                     </div>
                     <br>
                     <div class="form-group" id="">
                        <table class="table table-striped table-bordered width-full" id="chosenStudents">
                           <thead>
                              <tr>
                                 <th style="display: none;"> Row ID</th>
                                 <th>Student No.</th>
                                 <th>Student Name</th>
                                 <th>Midterm&nbsp;Grade</th>
                                 <th>Finals Grade</th>
                                 <th>SEM Grade</th>
                                 <th>Numeric Grade</th>
                                 <th>Remarks</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <input type="hidden" value="0" id="count" />
                           </tbody>
                        </table>
                     </div>
                     <br>
                     <div class="form-group row">
                        <div class="col-sm-4">
                           <button class="btn btn-primary" data-target="#getStudentsModal"
                              data-toggle="modal">Search</button>
                           <button id="btnPost" class="btn btn-primary">Post</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade modal-primary" id="getStudentsModal" aria-hidden="true"
   aria-labelledby="exampleModalPrimary" role="dialog" tabindex="-1">
   <div class="modal-dialog" style="width: 90%;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">Search Student</h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <table class="table table-striped table-bordered width-full" id="tableStudents">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Student&nbsp;No.</th>
                        <th>Student&nbsp;Name</th>
                        <th>Midterm&nbsp;Grade</th>
                        <th>Finals&nbsp;Grade</th>
                        <th>SEM&nbsp;Grade</th>
                        <th>Numeric&nbsp;Grade</th>
                        <th>Remarks</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<?php
   include_once "../General/footer.php";
   ?>
<script type="text/javascript">
   
   $(document).ready(function(){
    populateStaff();
    $('#btnPost').attr('disabled',true); 

    $(document).on("keyup", ".finTermGrade", function() {
      if($(this).val().length != 0)
        $('#btnPost').attr('disabled', false);            
      else
        $('#btnPost').attr('disabled',true); 
    });

    $(document).on("keyup", ".midTermGrade", function() {
      if($(this).val().length != 0)
        $('#btnPost').attr('disabled', false);            
      else
        $('#btnPost').attr('disabled',true); 
    });
   });

   var studenttbl = $("#tableStudents").DataTable({
       "processing": true,
       "serverSide": true,
       "bServerSide": false,
       "bPaginate": true,
       "bLengthChange": true,
       "bFilter": true,
       "bInfo": true,
       "bAutoWidth": true,
       "ajax": {
           "method": "POST",
           "url": "../Faculty/ajaxRequest.php",
           "dataSrc": "",
           "data": function(d) {
               d.getfunctionName = "getstudentlist",
                   d.courseID = $('#courseID').val()
           }
       },
       "columnDefs": [
          {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_gradeID + "</center>";
               },
               "targets": 0
           },
           {
               "render": function(data, type, row) {
                   return "<center><button id='addRow' style='border:none; background-color: Transparent; color: blue;'>" + row.fld_studentNo + "</button></center>";
               },
               "targets": 1
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_lastName + ", " + row.fld_firstName + " " + row.fld_middleName + "</center>";
               },
               "targets": 2
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_midtermGrade + "</center>";
               },
               "targets": 3
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_finalsGrade + "</center>";
               },
               "targets": 4
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_semestralGrade + "</center>";
               },
               "targets": 5
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_numericalGrade + "</center>";
               },
               "targets": 6
           },
           {
               "render": function(data, type, row) {
                   return "<center>" + row.fld_remarks + "</center>";
               },
               "targets": 7
           },
       ]
   });
   
   function populateStaff() {
       $.ajax({
           url: "../Admin/ajaxRequest.php",
           method: "POST",
           data: {
               getfunctionName: 'fetchFaculty'
           },
   
           success: function(data) {
               var opt = $.parseJSON(data);
               $('#staffName').append('<option value=""></option>');
               $.each(opt, function(key, value) {
                   $('#staffName').append('<option value="' + value.staffId + '" username="' + value.Username + '">' + value.lastName + ', ' + value.firstName + ' ' + value.middleName + '</option>');
               })
           },
   
           error: function(jqXHR, exception) {
               console.log(jqXHR);
           }
   
       });
   }
   
   $(document).on("change", ".staffName", function populateSubjects() {
   
       var staffID = $(this).val();
   
       if (staffID != "") {
   
           $.ajax({
               url: "ajaxRequest.php",
               method: "POST",
               data: {
                   getfunctionName: 'fetchAllSubjectsByStaffID',
                   staffID: staffID
               },
   
               success: function(data) {
                   var opt = $.parseJSON(data);
                   $("#courseID").children('option').remove();
                   $('#courseID').append('<option value=""></option>');
                   $.each(opt, function(key, value) {
                       $('#courseID').append('<option value="' + value.fld_availableCourseID + '">' + value.fld_subCode + '(' + value.fld_sectionName + ')</option>');
                   });
   
   
               },
   
               error: function(jqXHR, exception) {
                   console.log(jqXHR);
               }
   
           });
   
       }
   
   });
   
   
   $(document).on("change", "#courseID", function populateSubjects() {
       studenttbl.ajax.reload();
   });
   
   $(document).on("click", "#addRow", function() {
   
   var getCount     = $("#count").val();
   var term         = "<?php echo $term; ?>";
   var midTermInput = "";
   var finTermInput = "";
   var totalUnits   = 0;
   var stopAdd      = 0;
   getCount++;

   // Disables input when either midterm or finalterm grades encoding is activated
   if(term == 2){ midTermInput = 'disabled="true"';
   }else if(term == 1){ finTermInput = 'disabled="true"'; }

   $("#count").val(getCount);
       var gradeID             = $('td:nth-child(1)', $(this).closest('tr')).text();
       var studentNo           = $('td:nth-child(2)', $(this).closest('tr')).text();
       var studentName         = $('td:nth-child(3)', $(this).closest('tr')).text();
       var midTermGrade        = $('td:nth-child(4)', $(this).closest('tr')).text();
       var finTermGrade        = $('td:nth-child(5)', $(this).closest('tr')).text();
       var semGrade            = $('td:nth-child(6)', $(this).closest('tr')).text();
       var numericalGrade      = $('td:nth-child(7)', $(this).closest('tr')).text();
       var remarks             = $('td:nth-child(8)', $(this).closest('tr')).text();

           $(this).parents("tr").remove();
                 $('#chosenStudents').find('tbody').append($(
             
                     '<tr>' +
                         '<td style="display: none;">' + 
                             '<label class="control-label gradeID" name="gradeID[]" id="gradeID'+ getCount +'">'+ gradeID +'</label>' +
                         '</td> ' + 
                         '<td>' + 
                             '<label class="control-label studentNo" name="studentNo[]" id="studentNo'+ getCount +'">'+ studentNo +'</label>' +
                         '</td> ' + 
                         '<td>' + 
                             '<label class="control-label studentName" name="studentName[]" id="studentName'+ getCount +'">'+ studentName +'</label>' +
                         '</td> ' + 
                         '<td>' + 
                             '<input class="form-control midTermGrade" name="midTermGrade[]" id="midTermGrade'+ getCount +'" value="'+ midTermGrade +'" '+ midTermInput +' onChange="computeGrade('+ getCount +')"/>'+ 
                         '</td> ' +
                         '<td>' + 
                             '<input class="form-control finTermGrade" name="finTermGrade[]" id="finTermGrade'+ getCount +'" value="'+ finTermGrade +'" '+ finTermInput +' onChange="computeGrade('+ getCount +')"/>'+ 
                         '</td> ' +
                         '<td>' + 
                             '<label class="control-label semGrade" name="semGrade[]" id="semGrade'+ getCount +'">'+ semGrade +'</label>' +
                         '</td> ' + 
                         '<td>' + 
                             '<label class="control-label numericalGrade" name="numericalGrade[]" id="numericalGrade'+ getCount +'">'+ numericalGrade +'</label>' +
                         '</td> ' + 
                         '<td>' + 
                             '<label class="control-label remarks" name="remarks[]" id="remarks'+ getCount +'">'+ remarks +'</label>' +
                         '</td> ' +  
                         '<td>' +
                             '<button type="submit" id="btnRemoveCourse" class="btn btn-danger">Remove</button>' +
                         '</td> ' + 
                     '</tr>'
                    ));   
   });
   
   $(document).on("click", "#btnRemoveCourse", function() {
       $(this).parents("tr").remove();
   }); 


   $(document).on('click', '#btnPost', function(){
    var getUsername     = $('#staffName option:selected').attr('username');
    var getfunctionName = "validatePassword";

    swal({
      title: "Change Grades",
      text: "Input Password:",
      type: "input",
      inputType: "password",
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputPlaceholder: "Enter password"
    },
    function(inputValue){
      if (inputValue === false) return false;
      
      if (inputValue === "") {
        swal.showInputError("You need to write something!");
        return false
      }
      $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{getUsername:getUsername, inputValue:inputValue, getfunctionName:getfunctionName
        },

        success:function(data){
          var getData = data;
          if(getData.trim() == "success"){
            changeGrades();
          }else{
            swal("Error","Incorrect Password","error");
          }
        },
      });
    });
});

function changeGrades(){

  var getfunctionName    = "changeGrades";
  var gradeIDArr         = [];
  var studentNoArr       = [];
  var midTermGradeArr    = [];
  var finTermGradeArr    = [];
  var semGradeArr        = [];
  var numericalGradeArr  = [];
  var remarksArr         = [];

  $('.gradeID').each(function() {
    gradeIDArr.push($(this).text());
  });

  $('.studentNo').each(function() {
    studentNoArr.push($(this).text());
  });

  $('.midTermGrade').each(function() {
    midTermGradeArr.push($(this).val());
  });

  $('.finTermGrade').each(function() {
    finTermGradeArr.push($(this).val());
  });

  $('.semGrade').each(function() {
    semGradeArr.push($(this).text());
  });

  $('.numericalGrade').each(function() {
    numericalGradeArr.push($(this).text());
  });

  $('.remarks').each(function() {
    remarksArr.push($(this).text());
  });

  $.ajax({
    url:"ajaxRequest.php",
    method:"POST",
    data:{ 
      gradeIDArr:gradeIDArr,
      studentNoArr:studentNoArr,
      midTermGradeArr:midTermGradeArr,
      finTermGradeArr:finTermGradeArr,
      semGradeArr:semGradeArr,
      numericalGradeArr:numericalGradeArr,
      remarksArr:remarksArr, 
      getfunctionName:getfunctionName
    },

    success:function(data){
      var getData = data;
      if(getData.trim() == "success"){
          gradesLog();
          swal({
                    title: "Success",
                    text: "Grade Changed Succesfully",
                    type: "success",
                   closeOnConfirm: false,
                }, function(){
                      location.reload();
                });
      }else{
        swal("Error","Unable to change grade","error");
      }
    },
  });

}

function gradesLog(){

  var getfunctionName    = "gradesLog";
  var gradeIDArr         = [];
  var ctrlNo         = $("#controlNo").val();
  
  

  $('.gradeID').each(function() {
    gradeIDArr.push($(this).text());
  });

  $.ajax({
    url:"ajaxRequest.php",
    method:"POST",
    data:{ 
      gradeIDArr:gradeIDArr,
      ctrlNo:ctrlNo,
      getfunctionName:getfunctionName
    },

    success:function(data){
      var getData = data;
      if(getData.trim() == "success"){
      }else{
      }
    },
  });

}

function computeGrade(rowID){
   
     var semGrade = 0;
     var numericalGrade = "";
     var remarks = "";

     var midGrade = $("#midTermGrade" + rowID).val();
     var finalGrade = $("#finTermGrade" + rowID).val();

     //compute Semestral Grade
     semGrade = (midGrade * .4) + (finalGrade * .6);
     
     semGrade = semGrade.toFixed(0);

     //get Numerical Grade
     if ( semGrade >= 97) { numericalGrade = "1.00"; }
     else if ( semGrade <= 96 && semGrade > 93) { numericalGrade = "1.25"; }
     else if ( semGrade <= 93 && semGrade > 90) { numericalGrade = "1.50"; }
     else if ( semGrade <= 90 && semGrade > 87) { numericalGrade = "1.75"; }
     else if ( semGrade <= 87 && semGrade > 84) { numericalGrade = "2.00"; }
     else if ( semGrade <= 84 && semGrade > 82) { numericalGrade = "2.25"; }
     else if ( semGrade <= 82 && semGrade > 80) { numericalGrade = "2.50"; }
     else if ( semGrade <= 80 && semGrade > 77) { numericalGrade = "2.75"; }
     else if ( semGrade <= 77 && semGrade >= 75) { numericalGrade = "3.00"; }
     else if ( semGrade < 75) { numericalGrade = "5.00"; }

     //get Remarks
     if( semGrade >= 75){ remarks = "Passed"; }
     else{ remarks = "Failed"; }

     $("#semGrade" + rowID).text(semGrade);
     $("#numericalGrade" + rowID).text(numericalGrade);
     $("#remarks" + rowID).text(remarks);

   }
</script>