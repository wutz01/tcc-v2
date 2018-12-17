<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "admissionClass.php";
   
   $admission           = new Admission();
   $getAllSubjectAreas  = $admission->readAllSubjectAreas();
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admission</h1>
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
                                 <li class="active" role="presentation"><a data-toggle="tab" href="#exam" aria-controls="exam"
                                    role="tab">Exam</a></li>
                              </ul>
                              <div class="panel-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="exam" role="tabpanel">
                                       <div class="form-group row">
                                          <table class="table table-striped width-full" id="tableExamDetails">
                                             <thead>
                                                <tr>
                                                   <th>Subject Area</th>
                                                   <th>No of Items</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                   while($row = $getAllSubjectAreas->fetch(PDO::FETCH_ASSOC)){
                                                   extract($row);
                                                   ?>
                                                <tr>
                                                   <td><?php echo $fld_subject; ?></td>
                                                   <td class="noOfItems" subjectID="<?php echo $fld_ID; ?>" contenteditable="true"><?php echo $fld_noOfItems; ?></td>
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                             <tfoot>
                                                <tr>
                                                   <th></th>
                                                   <th></th>
                                                </tr>
                                             </tfoot>
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
<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>
<script type="text/javascript">

$('table td').blur(function() {
   var getfunctionName  = "changeNoOfItems";
   var subjectID        = $(this).attr('subjectID');
   var noOfItems        = $(this).text();

   $.ajax({
      url: "ajaxRequest.php",
      method: "POST",
      data: {
         getfunctionName:getfunctionName, 
         subjectID: subjectID,
         noOfItems: noOfItems
      },
          
      success: function(data) {
         var getData = data;
            if (getData == "success") {
               swal("Success!", "No of Items changed!", "success");
               $("#tableExamDetails").load(" #tableExamDetails");
            } else {
               swal("Error", "Please call the administrator..", "error");  
            } 
      }
   }); 
    

});
$(document).on("change", ".noOfItems", function(){
    alert("hi");
    var getfunctionName  = "changeNoOfItems";
    var subjectID        = $(this).attr('subjectID');
    var noOfItems        = $(this).text();
    alert(noOfItems);
    
      $.ajax({
          url: "ajaxRequest.php",
          method: "POST",
          data: {getfunctionName:getfunctionName, applicantID: applicantID},
          
          success: function(data) {
             
          }
       }); 
 });
</script>