<?php
   include_once "homeClass.php";
   
   $home        = new Home();
   $page             = " ";
   $getAnnouncement = $home->readAnnouncement();
   $getQualifier = $home->readAllQualifier();   
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TCC</title>
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
      <link rel="stylesheet" type="text/css" href="assets/mentor/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="assets/mentor/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/mentor/css/imagehover.min.css">
      <link rel="stylesheet" type="text/css" href="assets/mentor/css/style.css">

      <link rel="stylesheet" href="assets/vendor/datatables-bootstrap/dataTables.bootstrap.css">
      <link rel="stylesheet" href="assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
      <link rel="stylesheet" href="assets/vendor/datatables-responsive/dataTables.responsive.css">
   </head>
   <body>
      <!--Navigation bar-->
      <nav class="navbar navbar-default navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">TCC</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="Applicant/application.php">Apply</a></li>
                  <li><a href="#">Exam Results</a></li>
                  <li><a href="qualifiedApplicants.php">Qualified Applicants</a></li>
                  <li><a href="index.php#courses">Courses</a></li>
                  <li><a href="#" data-target="#login" data-toggle="modal">Sign in</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!--/ Navigation bar-->
      <!--Modal box-->
      <div class="modal fade" id="login" role="dialog">
         <div class="modal-dialog modal-sm">
            <!-- Modal content no 1-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center form-title">Login</h4>
               </div>
               <div class="modal-body padtrbl">
                  <div class="login-box-body">
                     <p class="login-box-msg">Sign in to start your session</p>
                     <br>
                     <div class="form-group">
                        <form onsubmit='return false;'>
                           <div class="form-group has-feedback">
                              <!----- username -------------->
                              <input class="form-control" placeholder="Username"  id="username" type="text" autocomplete="off" /> 
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                           </div>
                           <div class="form-group has-feedback">
                              <!----- password -------------->
                              <input class="form-control" placeholder="Password" id="password" type="password" autocomplete="off" />
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                           </div>
                           <div class="row">
                              <div class="col-xs-12">
                                 <button type="submit" id="btnLogin" class="btn btn-green btn-block btn-flat">Log In</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Modal box-->
      <section id ="examResults" class="section-padding">
         <div class="container">
            <div class="row">
               <div class="header-section text-center">
                  <h2>List of Entrance Exam Passers</h2>
                  <hr class="bottom-line">
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <table class="examResults table table-striped table-bordered dataTable" style="width: 100%; float: left; border: 1;" border="1" cellpadding="5">
                  <thead>
                     <tr>
                        <td style="width: 10.3204%;">&nbsp;Applicant ID:</td>
                        <td style="width: 60.6796%;">&nbsp;Name:</td>
                        <td style="width: 10%;">&nbsp;&nbsp;Remarks:&nbsp;</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        while($row = $getQualifier->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        ?>
                     <tr>
                        <td style="width: 10.3204%;">&nbsp;<?php echo $fld_applicantID; ?></td>
                        <td style="width: 60.6796%;">&nbsp;&nbsp;&nbsp;<?php echo $fld_lastName.', '.$fld_firstName.' '.$fld_middleName; ?></td>
                        <td style="width: 10%;">&nbsp;<?php echo $fld_examResult.'%'; ?></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
      <!--Footer-->
      <footer id="footer" class="footer">
         <div class="container text-center">
            <ul class="social-links">
               <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            </ul>
            ©2017 TCC. All rights reserved
         </div>
      </footer>
      <!--/ Footer-->
      <script src="assets/vendor/jquery/jquery.js"></script>
      <script src="assets/vendor/bootstrap/bootstrap.js"></script>
      <script src="assets/vendor/animsition/jquery.animsition.js"></script>
      <script src="assets/vendor/asscroll/jquery-asScroll.js"></script>
      <script src="assets/vendor/mousewheel/jquery.mousewheel.js"></script>
      <script src="assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
      <script src="assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

      <!-- Scripts -->
      <script src="assets/js/core.js"></script>
      <script src="assets/js/site.js"></script>

      <script src="assets/js/sections/menu.js"></script>
      <script src="assets/js/sections/menubar.js"></script>
      <script src="assets/js/sections/sidebar.js"></script>

      <script src="assets/js/configs/config-colors.js"></script>
      <script src="assets/js/configs/config-tour.js"></script>

      <script src="assets/js/components/asscrollable.js"></script>
      <script src="assets/js/components/animsition.js"></script>
      <script src="assets/js/components/slidepanel.js"></script>
      <script src="assets/js/components/switchery.js"></script>
      <script src="assets/js/components/jquery-placeholder.js"></script>

      <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
      <script src="assets/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
      <script src="assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <script src="assets/vendor/datatables-tabletools/dataTables.tableTools.js"></script>
      <script src="assets/js/components/datatables.js"></script>

  <script>
    $(document).ready(function() {
      $('.examResults').DataTable();
    });
    $(document).on("click","#btnLogin",function(){

    var getfunctionName     = "logIn";
    var Username            = $('#username').val();
    var Password            = $('#password').val();

      $.ajax({
        url:"Login/ajaxRequest.php",
        method:"POST",
        data:{
          getfunctionName:getfunctionName, 
          Username:Username,
          Password:Password
        },

        success:function(data){
          alert(data);
          if(data == 'success')
          {
              window.location.assign("General/dashboard.php");
          }
          else
          {
              swal({
              title: "Error!",
              text: "Username/Password is incorrect!",
              type: "error",
              });
          }
        },

        error: function(jqXHR, exception){
          console.log(jqXHR);
        }  
      });
  });
  </script>

  </body>
</html>