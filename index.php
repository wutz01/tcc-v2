<?php
   session_start();
   if (isset($_SESSION['firstName'])) {
      header('Location: General/dashboard.php');
   }
   include_once "homeClass.php";
   $home       = new Home();
   $getProgram = $home->readAllProgram();
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
                  <li><a href="examResults.php">Exam Results</a></li>
                  <li><a href="qualifiedApplicants.php">Qualified Applicants</a></li>
                  <li><a href="#courses">Courses</a></li>
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
      <!--Banner-->
      <div class="banner">
         <div class="bg-color">
         </div>
      </div>
      <!--/ Banner-->
      <!--Feature-->
      <section id ="missionandvision" class="section-padding">
         <div class="container">
            <div class="row">
               <div class="header-section text-center">
                  <h2>Mission and Vision</h2>
                  <hr class="bottom-line">
               </div>
               <div class="feature-info">
                  <div class="fea">
                     <div class="col-md-6">
                        <div class="heading pull-right">
                           <h4>Mission</h4>
                           <p>Donec et lectus bibendum dolor dictum auctor in ac erat. Vestibulum egestas sollicitudin metus non urna in eros tincidunt convallis id id nisi in interdum.</p>
                        </div>
                        <div class="fea-img pull-left">
                           <i class="fa fa-book"></i>
                        </div>
                     </div>
                  </div>
                  <div class="fea">
                     <div class="col-md-6">
                        <div class="heading pull-right">
                           <h4>Vision</h4>
                           <p>Donec et lectus bibendum dolor dictum auctor in ac erat. Vestibulum egestas sollicitudin metus non urna in eros tincidunt convallis id id nisi in interdum.</p>
                        </div>
                        <div class="fea-img pull-left">
                           <i class="fa fa-book"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--/ feature-->
      <!--Courses-->
      <section id ="courses" class="section-padding">
         <div class="container">
            <div class="row">
               <div class="header-section text-center">
                  <h2>Available Courses</h2>
                  <hr class="bottom-line">
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <?php 
                  while($program = $getProgram->fetch(PDO::FETCH_ASSOC))
                  {
                  extract($program);
                  ?>
               <div class="col-md-6">
                  <figure>
                     <figcaption>
                        <h3><?php echo $fld_programName; ?></h3>
                        <p><a href="Others/<?php echo $fld_pathName; ?>">Download Prospectus</a></p>
                     </figcaption>
                  </figure>
               </div>
               <?php } ?>
            </div>
         </div>
      </section>
      <!--/ Courses-->
      <!--Footer-->
      <footer id="footer" class="footer">
         <div class="container text-center">
         FOR INQUIRIES<br><br>
         call us at (043)-706-8743
            <ul class="social-links">
               <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            </ul>
            ©2017 TCC. All rights reserved
         </div>
      </footer>
      <!--/ Footer-->
      <script src="assets/vendor/jquery/jquery.js"></script>
      <script src="assets/mentor/js/jquery.easing.min.js"></script>
      <script src="assets/mentor/js/bootstrap.min.js"></script>
      <script src="assets/mentor/js/custom.js"></script>
      <script>
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