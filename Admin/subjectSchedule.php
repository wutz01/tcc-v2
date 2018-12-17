<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   ?>
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Subject Scheduling</li>
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
                        <h4 class="example-title">Subject Scheduling</h4>
                        <div class="example">
                           <!-- Example Tabs In The Panel -->
                           <div class="panel nav-tabs-horizontal">
                              <div class="panel-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="exampleTopHome" role="tabpanel">
                                      <form id="subjectScheduleForm"  onsubmit="return false">
                                       <div class="form-group row">
                                          <div class="form-group row">
                                             <div class="col-sm-3">
                                                <input type="hidden" id="courseID">
                                                <select class="form-control subjectCode" id="subjectCode" placeholder="SubjectCode">
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control" id="sectionCode">
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control" id="facultyId">
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <input type="number" id="numberofSlots" placeholder="# of Slots" class="form-control">
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <table class="table dataTable table-striped width-full" id="tableAddSchedule">
                                                <thead>
                                                   <tr>
                                                      <th width="24%">Room</th>
                                                      <th>Start Time</th>
                                                      <th>End Time</th>
                                                      <th>Day</th>
                                                      <th><button type="button" id="btnAddSchedule" class="btn btn-primary pull-right">Add</button></th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <input type="hidden" value="0" id="count" />
                                                   <tr>
                                                      <td><input type="text" id="room0" name="room[]" placeholder="Room" class="form-control room" ></td>
                                                      <td><input id="startTime0" name="startTime[]" type="time" class="form-control startTime"></td>
                                                      <td><input id='endTime0' name="endTime[]" type="time" class="form-control endTime"></td>
                                                      <td colspan="2">
                                                         <select id="scheduleDay0" name="scheduleDay[]" class="form-control scheduleDay">
                                                            <option value="">Day</option>
                                                            <option value="M">M</option>
                                                            <option value="T">T</option>
                                                            <option value="W">W</option>
                                                            <option value="TH">TH</option>
                                                            <option value="F">F</option>
                                                            <option value="S">S</option>
                                                            <option value="MT">MT</option>
                                                            <option value="WTH">WTH</option>
                                                            <option value="FS">FS</option>
                                                            <option value="TTH">TTH</option>
                                                            <option value="MWF">MWF</option>
                                                         </select>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="form-group row">
                                             <div class="col-sm-12" align="center">
                                                <button id="btnAdd" class="btn btn-primary">Add</button>
                                                <button id="btnUpdate" class="btn btn-primary" disabled="disabled">Update</button>
                                                <button id="btnClear" class="btn btn-primary" disabled="disabled">Clear</button>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <table class="table table-striped width-full" id="tableSchedule">
                                                <thead>
                                                   <tr>
                                                      <th>Subject Code</th>
                                                      <th>Section</th>
                                                      <th>Room</th>
                                                      <th>Day</th>
                                                      <th>Start Time</th>
                                                      <th>End Time</th>
                                                      <th># of Slots</th>
                                                      <th>Faculty</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Subject Code</th>
                                                      <th>Section</th>
                                                      <th>Room</th>
                                                      <th>Day</th>
                                                      <th>Start Time</th>
                                                      <th>End Time</th>
                                                      <th># of Slots</th>
                                                      <th>Faculty</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </tfoot>
                                             </table>
                                          </div>
                                       </div>
                                       </form>
                                       <div class="form-group row">
                                          <div class="body">
                                             <h3>Downloadable File</h3>
                                             <table border="0" width="150PX;">
                                                <tr>
                                                   <td><a href="subjectSchedulingTemplate.php"><img src="../assets/images/excel.jpg" width="40%" height="30%"></a></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top">
                                                      <a href="subjectSchedulingTemplate.php">
                                                         <h6>Template</h6>
                                                      </a>
                                                   </td>
                                                </tr>
                                             </table>
                                             <hr>
                                             <h3>Import File</h3>
                                             <form id="upload_csv" method="post" enctype="multipart/form-data">  
                                                <input type="file" id="subjectScheduleFile" name="subjectScheduleFile"><br>
                                                <button type="submit" id="btnAddProspectus" class="btn btn-primary" >Upload</button>
                                             </form>
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
    populateSubject();
    populateSection();
    populateFaculty();
   
    $('#upload_csv').on("submit", function(e){  
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
                           text: "Subject Schedules Added!",
                           type: "success",
                           });
                          $("#subjectScheduleFile").val("");
                     }  
                })  ;
           });  
   
   
   });
   
    function populateSubject()
    {
        $.ajax({
        url:"ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:'fetchSubject'
        },
   
        success:function(data){
          var opt = $.parseJSON(data);
          $('#subjectCode').append('<option value="">Subject Code</option>');
          $.each(opt, function(key, value){
            $('#subjectCode').append('<option value="' + value.fld_subjectID + '">' + value.fld_subCode + '</option>');
          })
        },
   
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
   
      });
    }
   
    function populateSection()
   {
      $.ajax({
      url:"ajaxRequest.php",
      method:"POST",
      data:{
        getfunctionName:'fetchSection'
      },
   
      success:function(data){
        var opt = $.parseJSON(data);
        $('#sectionCode').append('<option value="">Section Code</option>');
        $.each(opt, function(key, value){
          $('#sectionCode').append('<option value="' + value.fld_sectionID + '">' + value.fld_sectionName + '</option>');
        })
      },
   
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
   
    });
   }
   
   function populateFaculty()
   {
      $.ajax({
      url:"ajaxRequest.php",
      method:"POST",
      data:{
        getfunctionName:'fetchFaculty'
      },
   
      success:function(data){
        var opt = $.parseJSON(data);
        $('#facultyId').append('<option value="">Faculty Name</option>');
        $.each(opt, function(key, value){
          $('#facultyId').append('<option value="' + value.staffId + '">' + value.lastName + ', ' + value.firstName + ' ' + value.middleName + '</option>');
        })
      },
   
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
   
    });
   }
   
   function ConvertTime(time24) {
   var ts = time24;
   var H = +ts.substr(0, 2);
   var h = (H % 12) || 12;
   h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
   var ampm = H < 12 ? " AM" : " PM";
   ts = h + ts.substr(2, 3) + ampm;
   return ts;
   }
   
   function resetForm() {
    $("#tableAddSchedule > tbody").children('tr:not(:first)').remove();
    $('#subjectScheduleForm')[0].reset();

    $('#btnAdd').removeAttr("disabled");
    $('#btnUpdate').attr('disabled', 'disabled');
    $('#btnClear').attr('disabled', 'disabled');
    
   }

   $(document).on("click", "#btnClear", function() {
    resetForm();
   });

   $(document).on("click","#btnAdd",function(){

      var getfunctionName     = "addSchedule";
      var subjectCode         = $('#subjectCode').val();
      var sectionCode         = $('#sectionCode').val();
      var facultyId           = $('#facultyId').val();
      var numberofSlots       = $('#numberofSlots').val();
   
      var getRoom             = [];
      var getStartTime        = [];
      var getEndTime          = [];
      var getScheduleDay      = [];
   
      $('.room').each(function() {
        if($(this).val() != ""){ 
          getRoom.push($(this).val());
        }
      });
   
      $('.startTime').each(function() {
        if($(this).val() != ""){ 
          startTime = $(this).val();
          getStartTime.push(startTime);
        }
      });
   
      $('.endTime').each(function() {
        if($(this).val() != ""){ 
          endTime = $(this).val();
          getEndTime.push(endTime);
        }
      });
   
      $('.scheduleDay').each(function() {
        if($(this).val() != ""){ 
          getScheduleDay.push($(this).val());
        }
      });
      getRoom = getRoom.toString();
      getStartTime = getStartTime.toString();
      getEndTime = getEndTime.toString();
      getScheduleDay = getScheduleDay.toString();
   
      if(subjectCode != '' && sectionCode != '' && facultyId != '' && numberofSlots != '')
      {
        $.ajax({
          url:"ajaxRequest.php",
          method:"POST",
          data:{
            getfunctionName:getfunctionName, 
            subjectCode:subjectCode,
            sectionCode:sectionCode,
            facultyId:facultyId,
            numberofSlots:numberofSlots,
            getStartTime:getStartTime,
            getEndTime:getEndTime,
            getScheduleDay:getScheduleDay,
            getRoom:getRoom
          },
   
          success:function(data){
            if(data == "success"){
              swal({
                title: 'Success!',
                text: "Schedule Added!",
                type: "success",
                });
              $('#subjectCode').val('').change();
              $('#subjectCode').empty();
              populateSubject();
              $('#sectionCode').val('').change();
              $('#sectionCode').empty();
              populateSection();
              $('#facultyId').val('').change();
              $('#facultyId').empty();
              populateFaculty();
              $('#numberofSlots').val('');
              $('#scheduleDay').val('').change();
              $('#room').val('');
              tableSchedule.ajax.reload();
              resetForm();
            }else{
              swal({
                title: "Error!",
                text: data,
                type: "error",
                });
            }
          },
          
          error: function(jqXHR, exception){
            console.log(jqXHR);
          }  
        });
        }
    });

   $(document).on("click","#btnUpdate",function(){

      var getfunctionName     = "updateSchedule";
      var courseID            = $('#courseID').val();
      var subjectCode         = $('#subjectCode').val();
      var sectionCode         = $('#sectionCode').val();
      var facultyId           = $('#facultyId').val();
      var numberofSlots       = $('#numberofSlots').val();
   
      var getRoom             = [];
      var getStartTime        = [];
      var getEndTime          = [];
      var getScheduleDay      = [];
   
      $('.room').each(function() {
        if($(this).val() != ""){ 
          getRoom.push($(this).val());
        }
      });
   
      $('.startTime').each(function() {
        if($(this).val() != ""){ 
          startTime = $(this).val();
          getStartTime.push(startTime);
        }
      });
   
      $('.endTime').each(function() {
        if($(this).val() != ""){ 
          endTime = $(this).val();
          getEndTime.push(endTime);
        }
      });
   
      $('.scheduleDay').each(function() {
        if($(this).val() != ""){ 
          getScheduleDay.push($(this).val());
        }
      });
      getRoom = getRoom.toString();
      getStartTime = getStartTime.toString();
      getEndTime = getEndTime.toString();
      getScheduleDay = getScheduleDay.toString();
   
      if(subjectCode != '' && sectionCode != '' && facultyId != '' && numberofSlots != '')
      {
        $.ajax({
          url:"ajaxRequest.php",
          method:"POST",
          data:{
            getfunctionName:getfunctionName, 
            courseID:courseID,
            subjectCode:subjectCode,
            sectionCode:sectionCode,
            facultyId:facultyId,
            numberofSlots:numberofSlots,
            getStartTime:getStartTime,
            getEndTime:getEndTime,
            getScheduleDay:getScheduleDay,
            getRoom:getRoom
          },
   
          success:function(data){
            if(data == "success"){
              swal({
                title: 'Success!',
                text: "Schedule Updated!",
                type: "success",
                });
              $('#subjectCode').val('').change();
              $('#subjectCode').empty();
              populateSubject();
              $('#sectionCode').val('').change();
              $('#sectionCode').empty();
              populateSection();
              $('#facultyId').val('').change();
              $('#facultyId').empty();
              populateFaculty();
              $('#numberofSlots').val('');
              $('#scheduleDay').val('').change();
              $('#room').val('');
              tableSchedule.ajax.reload();
              resetForm();
            }else{
              swal({
                title: "Error!",
                text: data,
                type: "error",
                });
            }
          },
          
          error: function(jqXHR, exception){
            console.log(jqXHR);
          }  
        });
        }
    });
   
    var tableSchedule = $('#tableSchedule').DataTable({
        "ajax":{
        "method":"POST",
        "url":"ajaxRequest.php",
        "data":{
        getfunctionName: "fetchSchedule"
        },
        "dataSrc": function (json) {
        var return_data = new Array();
        for(var i=0;i< json.length; i++){
          return_data.push({
            'fld_availableCourseID': json[i].fld_availableCourseID,
            'fld_subCode': json[i].fld_subCode,
            'fld_sectionName'  : json[i].fld_sectionName,
            'fld_room' : json[i].fld_room,
            'fld_day' : json[i].fld_day,
            'fld_startTime' : json[i].fld_startTime,
            'fld_endTime' : json[i].fld_endTime,
            'fld_availableSlots' : json[i].fld_availableSlots,
            'lastName' : json[i].lastName,
            'firstName' : json[i].firstName,
            'middleName' : json[i].middleName   
          })
        }
        return return_data;
        }
        },
      "columns":[
        {"data":"fld_subCode"},
        {"data":"fld_sectionName"},
        {"data":"fld_room"},
        {"data":"fld_day"},
        {"data":"fld_startTime"},
        {"data":"fld_endTime"},
        {"data":"fld_availableSlots"}
      ],
      "columnDefs": [
          {
              "render": function (data, type, row) {
                      return row.lastName + ", " + row.firstName + " " + row.middleName;
              },
              "targets": 7
          },
          {
           "render": function (data, type, row) {
             return "<button id='editCourse' style='border:none; background-color: Transparent; color: blue;' data-id='"+row.fld_availableCourseID+"'>Edit</button>" + 
             "<button style='border:none; background-color: Transparent; color: blue;' onclick='deleteCourse("+row.fld_availableCourseID+")'>Delete</button>";
           },
           "targets": 8
          }
      ]
    });

   $(document).on("click", "#editCourse", function() {

        var courseID        = $(this).data("id");
        var subjectCode     = $('td:nth-child(1)', $(this).closest('tr')).text();
        var sectionCode     = $('td:nth-child(2)', $(this).closest('tr')).text();
        var facultyName     = $('td:nth-child(8)', $(this).closest('tr')).text();
        var numberofSlots   = $('td:nth-child(7)', $(this).closest('tr')).text();
        var room            = $('td:nth-child(3)', $(this).closest('tr')).text();
        var day             = $('td:nth-child(4)', $(this).closest('tr')).text();
        var startTime       = $('td:nth-child(5)', $(this).closest('tr')).text();
        var endTime         = $('td:nth-child(6)', $(this).closest('tr')).text();
        
        $('#subjectCode').children().filter(function(){
          return this.text == subjectCode;
        }).prop('selected', true);

        $('#sectionCode').children().filter(function(){
          return this.text == sectionCode;
        }).prop('selected', true);

        $('#facultyId').children().filter(function(){
          return $.trim(this.text) == $.trim(facultyName);
        }).prop('selected', true);

        // $('select[id="subjectCode"]').find('option:contains("'+subjectCode+'")').attr("selected",true);

        $('#courseID').val(courseID);
        $('#numberofSlots').val(numberofSlots);

        roomArr       = room.split(',');
        dayArr        = day.split(',');
        startTimeArr  = startTime.split(',');
        endTimeArr    = endTime.split(',');

        for(i = 0; i < roomArr.length; i++) { 
          if(i == 0){
            $("#room0").val(roomArr[i]);
            // alert(startTimeArr[i]);
            $("#startTime0").val(startTimeArr[i]);
            $("#endTime0").val(endTimeArr[i]);
            $('#scheduleDay0').children().filter(function(){
              return this.text == dayArr[i];
            }).prop('selected', true);
          }else{
            
            $('#tableAddSchedule').find('tbody').append($(
             '<tr>' +
                 '<td>' +
                     '<input type="text" class="form-control room" name="room[]" placeholder="Room" id="room'+ i +'" value="'+ roomArr[i] +'">' +
                 '</td> ' + 
                 '<td>' +
                     '<input type="time" class="form-control startTime" name="startTime[]" id="startTime'+ i +'" value="'+ startTimeArr[i] +'">' +
                 '</td> ' + 
                 '<td>' +
                     '<input type="time" class="form-control endTime" name="endTime[]" id="endTime'+ i +'" value="'+ endTimeArr[i] +'">' +
                 '</td> ' + 
                 '<td colspan="2"> ' + 
                      '<select id="scheduleDay'+ i +'"' + ' name="scheduleDay[]" class="form-control scheduleDay" required>' +
                        '<option value="">Day</option>' +
                        '<option value="M">M</option>' +
                        '<option value="T">T</option>' +
                        '<option value="W">W</option>' +
                        '<option value="TH">TH</option>' +
                        '<option value="F">F</option>' +
                        '<option value="S">S</option>' +
                        '<option value="MT">MT</option>' +
                        '<option value="WTH">WTH</option>' +
                        '<option value="FS">FS</option>' +
                        '<option value="TTH">TTH</option>' +
                        '<option value="MWF">MWF</option>' +
                      '</select>' +   
                 '</td> ' +
             '</tr>'
            ));

            $('#scheduleDay'+i).children().filter(function(){
              return this.text == dayArr[i];
            }).prop('selected', true);
          }
        }
        $('#btnUpdate').removeAttr("disabled");
        $('#btnClear').removeAttr("disabled");
        $('#btnAdd').attr('disabled', 'disabled');
  
    });

   $(document).on("click", "#btnAddSchedule", function() {
   var getCount = $("#count").val();
   getCount++;
   $("#count").val(getCount);
       
       $('#tableAddSchedule').find('tbody').append($(
   
           '<tr>' +
               '<td>' +
                   '<input type="text" class="form-control room" name="room[]" placeholder="Room" id="room'+ getCount +'"' + '>' +
               '</td> ' + 
               '<td>' +
                   '<input type="time" class="form-control startTime" name="startTime[]" id="startTime'+ getCount +'"' + ' required>' +
               '</td> ' + 
               '<td>' +
                   '<input type="time" class="form-control endTime" name="endTime[]" id="endTime'+ getCount +'"' + ' required>' +
               '</td> ' + 
               '<td colspan="2"> ' + 
                    '<select id="scheduleDay'+ getCount +'"' + ' name="scheduleDay[]" class="form-control scheduleDay" required>' +
                                 '<option value="">Day</option>' +
                                 '<option value="M">M</option>' +
                                 '<option value="T">T</option>' +
                                 '<option value="W">W</option>' +
                                 '<option value="TH">TH</option>' +
                                 '<option value="F">F</option>' +
                                 '<option value="S">S</option>' +
                                 '<option value="MT">MT</option>' +
                                 '<option value="WTH">WTH</option>' +
                                 '<option value="FS">FS</option>' +
                                 '<option value="TTH">TTH</option>' +
                                 '<option value="MWF">MWF</option>' +
                              '</select>' +   
               '</td> ' +
           '</tr>'
          ));
   });

   
   function deleteCourse(id)
    {
       var courseID        = id;
       var getfunctionName = 'removeSchedule';

       $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName,courseID:courseID},
             success: function(data) {
                   if(data == "success")
                   {
                    swal({
                    title: 'Success!',
                    text: "Schedule Deleted!",
                    type: "success",
                    });
                     tableSchedule.ajax.reload();
                   }else{
                     swal({
                          title: "Error!",
                          text: "Please try again!",
                          type: "error",
                     });
                   }
             },
             error : function(XMLHttpRequest, textstatus, error) { 
                   console.log(error);
             } 
          }); 
    }
</script>