<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
?>

<div class="page animsition">
   <div class="page-header">
      <h1 class="page-title"><?php echo $_SESSION['accessType']; ?></h1>
      <ol class="breadcrumb">
         <li><a href="../General/dashboard.php">Home</a></li>
         <li class="active">Change Password</li>
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
                        <h4 class="example-title">Change Password</h4>
                        <div class="example">
                          <!-- Example Tabs In The Panel -->
                          <div class="panel nav-tabs-horizontal">
                            <div class="panel-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="exampleTopHome" role="tabpanel">
                                  <input type="hidden" id="username" value="<?php if($_SESSION['accessType'] == "Applicant"){ echo $_SESSION['applicantID']; } 
                                  if($_SESSION['accessType'] == "Student"){ echo $_SESSION['studentNumber']; } 
                                  else{ echo $_SESSION['staffID']; }?>">
                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="oldpass">Old Password</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="password" class="form-control" name="oldpass" id="oldpass" required />
                                     </div>
                                  </div>

                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="newpass">New Password</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="password" class="form-control" name="newpass" id="newpass" required />
                                     </div>
                                  </div>

                                  <div class="form-group row">
                                     <div class="col-sm-3">
                                        <label class="control-label" for="cnewpass">Confirm New Password</label>
                                     </div>
                                     <div class="col-sm-4">
                                        <input type="password" class="form-control" name="cnewpass" id="cnewpass" required />
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <button type="button" id="btnChangePassword" class="btn btn-primary ">Change</button>
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
</div>
<!-- End Page -->
<?php
   include_once "../General/footer.php";
?>

<script>
$(document).on("click","#btnChangePassword",function(){

    var getfunctionName = "changePassword";
    var username       = $('#username').val();
    var oldpass         = $('#oldpass').val();
    var newpass         = $('#newpass').val();
    var cnewpass        = $('#cnewpass').val();

    if (newpass != cnewpass) {
         swal("Error","Passwords Don't Match","error");
     } 
     else {

    
      swal({
                 title: "Are you sure?",
                 text: "You want to change password?",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "green",
                 confirmButtonText: "Yes!",
                 cancelButtonText: "Cancel",
                 showLoaderOnConfirm: true,
                 closeOnConfirm: false,
                 closeOnCancel: false
               },
               function(isConfirm){
                       if(isConfirm){
                            $.ajax({
                              url:"ajaxRequest.php",
                              method:"POST",
                              data:{
                                getfunctionName:getfunctionName, 
                                username:username,
                                oldpass:oldpass,
                                newpass:newpass
                              },
                             success:function(data){
                               
                               var getData = data;
                                 if($.trim(getData) == "success"){
                                   swal("Success","Password successfully changed","success");
                                   
                                 }
                                 else{  
                                   swal("Database","Invalid Old Password","error");
                                 }
                               },
                             //window.location.href();
                             error: function(jqXHR, exception){
                                 console.log(jqXHR);
                               }  
                             });
                       }
                       else{
                           swal("Canceled","No changes occured.","error");
                       }    
                   });

}


  });
</script>
