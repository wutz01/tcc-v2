<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include '../Database/database2.php';
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
                                      <form id="subjectScheduleForm" method="post" action="../api/addSubjectSched.php">
                                       <div class="form-group row">
                                          <div class="form-group row">
                                             <div class="col-sm-3">
                                                <input type="hidden" id="courseID">
                                                <select class="form-control subjectCode" id="subjectCode" placeholder="SubjectCode">
                                                   <option>Subject Code</option>
                                             <?php
                                                $querySubjectCode = "SELECT * FROM tbl_subject";
                                                $resSubjectCode = mysqli_query($conn, $querySubjectCode);
                                                while($stmt2 = mysqli_fetch_assoc($resSubjectCode)){
                                             ?>
                                                   <option value="<?php $stmt2['fld_subCode'] ?>"><?php echo $stmt2['fld_subCode'] ?></option>
                                             <?php } ?>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control" id="sectionCode" name="sectionCode">
                                                   <option>Section Code</option>
                                             <?php
                                                $querySection = "SELECT * FROM tbl_section";
                                                $resSection = mysqli_query($conn, $querySection);
                                                while($stmt1 = mysqli_fetch_assoc($resSection)){
                                             ?> 
                                                   <option value="<?php $stmt1['fld_sectionName'] ?>"><?php echo $stmt1['fld_sectionName'] ?></option>
                                             <?php } ?>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control" id="facultyId">
                                                   <option>Faculty Name</option>
                                             <?php
                                                $queryStaff = "SELECT Username, firstName, middleName, lastName, tbl_staffs.staffId FROM tbl_users LEFT JOIN tbl_staffs ON tbl_users.staffId = tbl_staffs.staffId WHERE tbl_users.accessType = 'Faculty'";
                                                $resStaff = mysqli_query($conn, $queryStaff);
                                                while($stmt3 = mysqli_fetch_assoc($resStaff)){
                                             ?> 
                                                   <option value="<?php $stmt3['staffId'] ?>"><?php echo $stmt3['lastName'] ?>, <?php echo $stmt3['firstName'] ?> <?php echo $stmt3['middleName'] ?></option>
                                             <?php } ?>      
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
                                                <button class="btn btn-primary" type="submit">Add</button>
                                                <button id="btnUpdate" class="btn btn-primary" type="submit" disabled="disabled">Update</button>
                                                <button id="btnClear" class="btn btn-primary" type="submit" disabled="disabled">Clear</button>
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
  $(function () {
    $('#gradeApplicantSubmit').ajaxForm({
      dataType: 'json',
      success: (o) => {
        if(o.success){
          alert(o.message)
          location.reload();
        } else {
          alert('error')
        }
      },
      beforeSubmit: (o) => {
        alert('Do you want to save?');
      }
    });
  })
</script>

<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/> 

<script type="text/javascript" src="../assets/js/datatables.min.js"></script>

<script type="text/javascript">

  $(document).ready( function () {

    $('#tableSchedule').DataTable();

} );

</script>