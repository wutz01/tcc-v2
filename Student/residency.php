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
      <h1 class="page-title">Residency</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Residency</li>
      </ol>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-sm-12">
                  <!-- Example Basic Form Without Label -->
                  <div class="example-wrap">
                     <h4 class="example-title">Residency</h4>
                        <div class="form-group" id="refreshThis">
                           <input type="hidden" id="studentNo" value="<?php echo $_SESSION['studentNumber'];?>">
                           <div id="divResidency"></div>
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
       var getfunctionName = "populateResidency";
       var studentNo = $("#studentNo").val();
      if(studentNo != ""){

                 $.ajax({
             url: "ajaxRequest.php",
             method: "POST",
             data: {getfunctionName:getfunctionName, studentNo: studentNo},
             
          success:function(data){
            var getData = data;
            $("#divResidency").html(getData);
          },
          error: function(jqXHR, exception){
            console.log(jqXHR);
          }          
        }); 
      }
 });
</script>