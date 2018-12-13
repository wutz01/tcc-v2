<?php

   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "facultyClass.php";

   $staffID     = $_SESSION['staffID'];
   $faculty     = new Faculty();
   $getSubjects = $faculty->readSubjectList($staffID);
   
   $getGradeEncodingStatus    = $faculty->readGradesEncodingStatus();
   $getTermStatus = $getGradeEncodingStatus->fetch(PDO::FETCH_ASSOC);
   extract($getTermStatus);

   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Faculty</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Grades Encoding</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Grades Encoding</h4>
                     <div class="example">
                        <div class="form-group row">
                           <div class="col-sm-5">
                              <select class='form-control' name='courseID' id='courseID' data-plugin='selectpicker' data-live-search='true'>
                                 <option value=''>Select Subject</option>
                                 <?php
                                    while($row = $getSubjects->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$fld_availableCourseID}'>{$fld_subCode}({$fld_sectionName})</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-5">
                              Course Code: <label id="courseCode" style="font-weight: bold; text-decoration: underline;"></label>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-5">
                              Description: <label id="courseDescription" style="font-weight: bold; text-decoration: underline;"></label>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-5">
                              Schedule: <label id="courseSchedule" style="font-weight: bold; text-decoration: underline;"></label><br>
                           </div>
                           <div class="col-sm-2 pull-right">
                              <button id='btnSave' type='button' data-value='N' class='btn btn-success btnEncode' disabled='true'>Save</button> 
                              <button id='btnPost' type='button' data-value='Y' class='btn btn-success btnEncode' disabled='true'>Post</button>
                              <!-- <button id='btnPost' type='button' class='btn btn-success' disabled='true'>Post</button> --> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr style="height:5px; background-color: black;">
                     <div class="form-group row" id="">
                        <table class="table table-striped table-bordered width-full" id="tableStudents">
                           <thead>
                              <tr>
                                 <th>
                                    <center>Student Number</center>
                                 </th>
                                 <th>
                                    <center>Student Name</center>
                                 </th>
                                 <th>
                                    <center>Mid&nbsp;Term</center>
                                 </th>
                                 <th>
                                    <center>Final&nbsp;Term</center>
                                 </th>
                                 <th>
                                    <center>SEM</center>
                                 </th>
                                 <th>
                                    <center>Numeric</center>
                                 </th>
                                 <th>
                                    <center>Remarks</center>
                                 </th>
                                 <th style='display:none;'>
                                    Row ID
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                     </div>
                  <hr style="height:5px; background-color: black;">
                     <div class="form-group row" id="">
                        <table class="table table-striped table-bordered" style="width: 25%;" id="">
                           <thead>
                              <tr>
                                 <th colspan="2">
                                    <center>Count of students who: </center>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th>
                                    Failed
                                 </th>
                                 <th>
                                    <center><label id="failed"></label></center>
                                 </th>
                              </tr>
                              <tr>
                                 <th>
                                    Passed based on Mid&nbsp;Term Grade
                                 </th>
                                 <th>
                                    <center><label id="passedMid"></label></center>
                                 </th>
                              </tr>
                              <tr>
                                 <th>
                                    Passed based on Final&nbsp;Term Grade
                                 </th>
                                 <th>
                                    <center><label id="passedFinal"></label></center>
                                 </th>
                              </tr>
                              <tr>
                                 <th>
                                    Passed based on SEM Grade
                                 </th>
                                 <th>
                                    <center><label id="passedSEM"></label></center>
                                 </th>
                              </tr>
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
<?php
   include_once "../General/footer.php";
   ?>
<script type="text/javascript">
   var studenttbl = $("#tableStudents").DataTable({
   "processing": true,
   "serverSide": true,
   "bServerSide": false,
   "bPaginate": false,
   "bLengthChange": false,
   "bFilter": true,
   "bInfo": false,
   "bAutoWidth": true,
   "ajax":{
   "method":"POST",
   "url":"../Faculty/ajaxRequest.php",
   "dataSrc":"",
   "data":function(d){
    d.getfunctionName = "getstudentlist",
    d.courseID = $('#courseID').val()
   }
   },
   "columnDefs": [
       {
           "render": function (data, type, row) {
             return "<center>" + row.fld_studentNo + "</center>";
           },
           "targets": 0
       },
       {
           "render": function (data, type, row) {
             return "<center>" + row.fld_lastName + ", " + row.fld_firstName + " " + row.fld_middleName + "</center>";
           },
           "targets": 1
       },
       {
           "render": function (data, type, row) {
            switch(row.fld_midPosted) {
              case 'N' :
              case ''  :
                return "<center>" + 
               "<input min='60' max='100' type='number' value='"+ row.fld_midtermGrade +"' class='txtmid' id='txtmid" + row.fld_gradeID +"' onChange='computeGrade("+ row.fld_gradeID +")'></center>"; 
              break;
              case 'Y' :
                return "<center>" + 
               "<input min='60' max='100' type='number' value='"+ row.fld_midtermGrade +"' class='txtmid' id='txtmid" + row.fld_gradeID +"' onChange='computeGrade("+ row.fld_gradeID +")' disabled='true'></center>"; 
              break;
            }
           },
           "targets": 2
       },
       {
           "render": function (data, type, row) {

            switch(row.fld_finalPosted) {
              case 'N' :
              case ''  :
                return "<center>" + 
               "<input min='60' max='100' type='number' value='"+ row.fld_finalsGrade +"' class='txtfinal' id='txtfinal" + row.fld_gradeID +"' onChange='computeGrade("+ row.fld_gradeID +")'></center>"; 
              break;
              case 'Y' :
                return "<center>" + 
               "<input min='60' max='100' type='number' value='"+ row.fld_finalsGrade +"' class='txtfinal' id='txtfinal" + row.fld_gradeID +"' onChange='computeGrade("+ row.fld_gradeID +")' disabled='true'></center>"; 
              break;
            }

             
           },
           "width" : "10%",
           "targets": 3
       },
       {
           "render": function (data, type, row) {
             return "<center><label class='lblSemGrade' id='lblSemGrade"+ row.fld_gradeID +"'>"+ row.fld_semestralGrade +"</label></center>";
           },
           "width" : "10%",
           "targets": 4
       },
       {
           "render": function (data, type, row) {
             return "<center><label class='lblNumericalGrade' id='lblNumericalGrade"+ row.fld_gradeID +"'>"+ row.fld_numericalGrade +"</label></center>";
           },
           "width" : "10%",
           "targets": 5
       },
       {
           "render": function (data, type, row) {
             return "<center><label class='lblRemarks' id='lblRemarks"+ row.fld_gradeID +"'>"+ row.fld_remarks +"</label></center>";
           },
           "width" : "10%",
           "targets": 6
       },
       {
           "render": function (data, type, row) {
             return "<label style='display:none;' class='rowID'>"+ row.fld_gradeID +"</label>";
           },
           "targets": 7
       },
       
   ]
   });
   
   function computeGrade(rowID){
   
     var semGrade = 0;
     var numericalGrade = "";
     var remarks = "";

     var midGrade = $("#txtmid" + rowID).val();
     var finalGrade = $("#txtfinal" + rowID).val();

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

     $("#lblSemGrade" + rowID).text(semGrade);
     $("#lblNumericalGrade" + rowID).text(numericalGrade);
     $("#lblRemarks" + rowID).text(remarks);

     updateCountOfStudents();
   }
  
   
   $(document).on('change','#courseID', function(){
     studenttbl.ajax.reload();
     var getfunctionName = "getcourseDetails";
     var courseID = $("#courseID").val();
     var term = "<?php echo $term; ?>";
    
     $.ajax({
             url: "../Faculty/ajaxRequest.php",
             method: "POST",
             data: {
               getfunctionName: getfunctionName,
               courseID: courseID,
             },
             dataType:"json",
             success: function(data) {
                   $("#courseCode").text(data[0]);
                   $("#courseDescription").text(data[1]);
                   $("#courseSchedule").text(data[2]);

                   if(term == "1"){
                      // $(".txtmid").removeAttr('disabled');
                      $(".txtfinal").attr('disabled', true);
                   }else{
                      // $(".txtfinal").removeAttr('disabled');
                      $(".txtmid").attr('disabled', true);
                   }
                   countOfStudents(); 
                   courseGradeType();
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
   });
   
  function countOfStudents(){
    var getfunctionName = "getCountOfStudents";
    var courseID = $("#courseID").val();

    $.ajax({
             url: "../Faculty/ajaxRequest.php",
             method: "POST",
             data: {
               getfunctionName: getfunctionName,
               courseID: courseID,
             },
             dataType:"json",
             success: function(data) {
                  $("#failed").text(data[0].failed);
                  $("#passedMid").text(data[0].passedMid);
                  $("#passedFinal").text(data[0].passedFinal);
                  $("#passedSEM").text(data[0].passedSEM);
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
  }

  function updateCountOfStudents(){
      var midGradeCount = 0;
      var finalGradeCount = 0;
      var semGradeCount = 0;
      var remarksCount = 0;

      $('.txtmid').each(function() {
        if($(this).val() >= 75){
          midGradeCount++;
        }
      });

      $('.txtfinal').each(function() {
        if($(this).val() >= 75){
          finalGradeCount++;
        }
      });

      $('.lblSemGrade').each(function() {
        if($(this).text() >= 75){
          semGradeCount++;
        }
      });

      $('.lblRemarks').each(function() {
        if($(this).text() == "Failed"){
          remarksCount++;
        }
      });

      $("#failed").text(remarksCount);
      $("#passedMid").text(midGradeCount);
      $("#passedFinal").text(finalGradeCount);
      $("#passedSEM").text(semGradeCount);
  }
   

  function courseGradeType(){
var getfunctionName = "getcourseGradeType";
      var courseID = $("#courseID").val();
      var term = "<?php echo $term; ?>";
                $.ajax({
             url: "../Faculty/ajaxRequest.php",
             method: "POST",
             data: {
               getfunctionName: getfunctionName,
               courseID: courseID,
             },
             dataType:"json",
             success: function(data) {

                    if(term == "1"){
                      if(data[0] == "Y"){
                        $("#btnPost").attr('disabled', true);
                        $("#btnSave").attr('disabled', true);
                      }
                      else{
                        $("#btnPost").removeAttr('disabled');
                        $("#btnSave").removeAttr('disabled');
                      } 
                    }

                    else if(term == "2"){
                      if(data[1] == "Y"){
                        $("#btnPost").attr('disabled', true);
                        $("#btnSave").attr('disabled', true);
                      }
                      else{
                        $("#btnPost").removeAttr('disabled');
                        $("#btnSave").removeAttr('disabled');
                      } 
                    }
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
  }

  $(document).on('click','.btnEncode', function(){
     var getfunctionName = "savegrade";

     var rowID          = [];
     var midGrade       = [];
     var finalGrade     = [];
     var semGrade       = [];
     var numericalGrade = [];
     var remarks        = [];
     var term = "<?php echo $term; ?>";
     var status = $(this).attr("data-value");

      $('.rowID').each(function() {
        rowID.push($(this).text());
      });

      $('.txtmid').each(function() {
        midGrade.push($(this).val());
      });

      $('.txtfinal').each(function() {
        finalGrade.push($(this).val());
      });

      $('.lblSemGrade').each(function() {
        semGrade.push($(this).text());
      });

      $('.lblNumericalGrade').each(function() {
        numericalGrade.push($(this).text());
      });

      $('.lblRemarks').each(function() {
        remarks.push($(this).text());
      });
   
      $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {
               getfunctionName: getfunctionName,
               rowID: rowID,
               midGrade: midGrade,
               finalGrade: finalGrade,
               semGrade: semGrade,
               numericalGrade: numericalGrade,
               remarks: remarks,
               term:term,
               status:status
             },
             success: function(data) {
                   if(data == "success")
                   {
                     // studenttbl.ajax.reload();
                     swal({
                          title: "Success!",
                          text: "Grades Encoded!",
                          type: "success",
                     });
                     $(".txtfinal").attr('disabled', 'true');
                     $(".txtmid").attr('disabled', 'true');
                   }else{
                     swal({
                          title: "Error!",
                          text: data,
                          type: "error",
                     });
                   }
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
  }); 
</script>