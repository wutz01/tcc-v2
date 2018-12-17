<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   include_once "studentClass.php";
   
   $student = new Student();
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Term Grades</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Term Grades</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Term Grades</h4>
                        <div class="form-group" id="refreshThis">
                           <input type="hidden" id="studentNo" value="<?php echo $_SESSION['studentNumber'];?>">
                           <input type="hidden" id="startsy" value="<?php echo $_SESSION['startSY'];?>">
                           <input type="hidden" id="endsy" value="<?php echo $_SESSION['endSY'];?>">
                           <input type="hidden" id="semester" value="<?php echo $_SESSION['semester'];?>">
                           <div id="divGrades"></div>
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
 $(document).ready(function(){
       var getfunctionName = "populateTermGrades";
       var studentNo = $("#studentNo").val();
       var startsy = $("#startsy").val();
       var endsy = $("#endsy").val();
       var semester = $("#semester").val();

      if(studentNo != ""){

                 $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, studentNo: studentNo, startsy: startsy, endsy: endsy, semester: semester},
             
          success:function(data){
            var getData = data;
            $("#divGrades").html(getData);
          },
          error: function(jqXHR, exception){
            console.log(jqXHR);
          }          
        }); 
      }
 });
</script>