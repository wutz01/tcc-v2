<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
   
   include_once "admissionClass.php";
   ?>
<!-- Page -->
<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title">Admission</h1>
      <ol class="breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li class="active">Add an Applicant</li>
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
                        <h4 class="example-title">Add an Applicant</h4>
                        <div class="example">
                           <!-- Example Tabs In The Panel -->
                           <div class="panel nav-tabs-horizontal">
                              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                 <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTopComponents" aria-controls="exampleTopComponents"
                                    role="tab"><i class="icon wb-user" aria-hidden="true"></i>Import</a></li>
                              </ul>
                              <div class="panel-body">
                                 <div class="tab-pane" id="exampleTopComponents" role="tabpanel">
                                    <div class="card">
                                       <div class="body">
                                          <div class="row">
                                             <h3>Downloadable File</h3>
                                             <table border="0" width="150PX;">
                                                <tr>
                                                   <td><a href="exportTemplate.php"><img src="../assets/images/excel.jpg" width="40%" height="30%"></a></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top">
                                                      <a href="exportTemplate.php">
                                                         <h6>Template</h6>
                                                      </a>
                                                   </td>
                                                </tr>
                                             </table>
                                             <hr>
                                             <h3>Import Files</h3>
                                             <div class="table-responsive">
                                                <form id="uploadTemplate" method="post" enctype="multipart/form-data">  
                                                   <input type="file" id="addAnApplicantFile" name="addAnApplicantFile"><br>
                                                   <button type="submit" id="btnAddAnApplicant" class="btn btn-primary">Upload</button>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- End Example Tabs In The Panel -->
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
    $('#uploadTemplate').on("submit", function(e){  
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
            text: "New Applicants Added!",
            type: "success",
          });
          $("#addAnApplicantFile").val("");
        }  
      });
    });  
   });
</script>