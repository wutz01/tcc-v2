<?php
  require '../Database/database2.php';
  require '../Database/database.php';
  include_once "../General/header.php";
  include_once "../General/topBar.php";
  include_once "../General/leftSideBar.php";
  include_once "adminClass.php";

  $admin = new Admin();
  if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM tbl_applicant WHERE fld_applicantID = '$id'";
    $res = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($res);
  }
?>

<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Add Grades</li>
      </ol>
   </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="example-wrap">
              <h1><?php echo $user['fld_lastName'] ?>, <?php echo $user['fld_firstName'] ?> <?php echo $user['fld_middleName'] ?></h1>
                <div class="example">
                  <div class="form-group row">
                    <form method="post" id="gradeApplicantSubmit" action="addGradesApplicantAPI.php">
                      <center><table id="example" style="width: 50%">
                            <tr>
                               <th>Subject Name</th>
                               <th>Grade</th>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <input type="text" name="applicantUserID" id="applicantUserID" value="<?php echo $user['fld_applicantID'] ?>" hidden />
                                <select id="subjectNameSelect" class='form-control'>
                                  <?php $getApplicantSubject = $admin->getApplicantSubjectNotDefault();
                                    while($row = $getApplicantSubject->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                  ?>
                                  <option value="<?php echo $id ?>" data-id="<?php echo $id ?>"><?php echo $fld_subject ?></option>
                                  <?php } ?>
                                </select>
                              </td>
                              <td>
                                <button class="btn btn-primary" onclick="addRow()" type="button">+</button>
                              </td>
                            </tr>
                          <?php
                            $getApplicantSubject = $admin->getApplicantSubjectDefault();
                            while($row = $getApplicantSubject->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            $userId = $_GET["id"];
                            $queryHave = "SELECT * FROM tbl_grades_applicant WHERE fld_applicantID = '$userId' AND fld_subjectID = $id";
                            $result = mysqli_query($conn, $queryHave);
                            $userHave = mysqli_fetch_assoc($result);
                          ?>
                            <tr>
                               <td><input type="text" name="subjectName[<?php echo $id ?>]" id="subjectName" value="<?php echo $id; ?>" hidden><?php echo $fld_subject; ?></td>
                               <td><input type="number" class="form-control" name="grade[<?php echo $id ?>]" id="grade" placeholder="Grade" value="<?php echo $userHave['fld_grade'] ?>"/></td>
                            </tr>
                          <?php
                            }
                          ?>
                      </table>
                      </center>
                      <button class="btn btn-success pull-right" name="validate" type="submit">Save</button> 
                      <a href="acceptedApplicantProfile.php?id=<?php echo $_GET["id"] ?>"><button class="btn btn-danger" type="button">Cancel</button></a>
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
<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="../OSPI/assets/js/jquery.form.min.js"></script>
<!-- <script src="../OSPI/assets/js/jquery-3.1.1.min.js"></script> -->

<script>
  function addRow() {
    let subject = $("#subjectNameSelect").val();
    let subjectList = $("#subjectNameSelect option:selected").text();
    let html = '';
    html += '<tr><td><input  type="text" name="subjectName[<?php echo $id ?>]" id="subjectName" hidden>' +subjectList+ '</td>' + 
      '<td><input type="number" class="form-control" name="grade[]" id="grade" placeholder="Grade" /></td><td><button class="btn btn-danger" type="button" onclick="removeRow()">-</button></tr>';
    $('#example').find('tbody').append(html);
  }
  // function removeRow(){

  // }
</script>

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
    $('#example').DataTable();
} );
</script>