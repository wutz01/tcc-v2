<?php
   include_once "applicantClass.php";
   
   $applicant             = new Applicant();  
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TCC</title>
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
      <link rel="stylesheet" type="text/css" href="../assets/mentor/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/mentor/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/mentor/css/imagehover.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/mentor/css/style.css">
      <!-- Page -->
      <link rel="stylesheet" href="../assets/css/pages/register.css">
      <link rel="stylesheet" href="../assets/vendor/select2/select2.css">
      <link rel="stylesheet" href="../assets/vendor/bootstrap-select/bootstrap-select.css">
      <link rel="stylesheet" href="../assets/vendor/multi-select/multi-select.css">

      <link rel="stylesheet" href="../assets/vendor/WebRes/css/style.css">

  <link rel="stylesheet" href="../assets/vendor/bootstrap-sweetalert/sweet-alert.css">
</head>
<script type="text/javascript">
  function getAge(){
    var birthDate = document.getElementById('birthDate').value;
    birthDate = new Date(birthDate);
    var today = new Date();
    var ageApplicant = Math.floor((today - birthDate)/(365.25 * 24 * 60 * 60 *1000));
    document.getElementById('ageApplicant').value = ageApplicant;
  } console.log(ageApplicant);
</script>
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
               <a class="navbar-brand" href="../index.php">TCC</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="">Apply</a></li>
                  <li><a href="../examResults.php">Exam Results</a></li>
                  <li><a href="../qualifiedApplicants.php">Qualified Applicants</a></li>
                  <li><a href="../index.php#courses">Courses</a></li>
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
      <section class="home-section">
         <div class="container">
         <div class="row">
            <div class="margin-top-100 margin-bottom-150">
               <section>
                  <div class="container" style="background-color: white;">
                     <div class="row">

            <!-- Advanced Form Example With Validation -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Scholarship Application</h2>
                    </div>
                    <div class="body" >
                        <form id="applicationForm" method="POST">
                            <h3>Personal Information</h3>
                            <fieldset>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="">Name of Applicant<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="middleName" class="form-control" placeholder="Middle Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="homeAddress">Home Address<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="homeAddress" name="homeAddress" class="form-control" placeholder="Home Address" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                 <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="emailAddress">Email Address<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="emailAddress" name="emailAddress" class="form-control" placeholder="Email Address" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                       <div class="col-md-2 form-control-label">
                                           <label for="birthPlace">Birth Place<span style="color:red; font-size: 18px;">*</span></label>
                                       </div>
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <div class="form-line">
                                                   <input type="text" id="birthPlace" name="birthPlace" class="form-control" placeholder="Birth place" required="required">
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-2 form-control-label">
                                           <label for="birthDate">Birth Date<span style="color:red; font-size: 18px;">*</span></label>
                                       </div>
                                       <div class="col-md-3">
                                           <div class="form-group">
                                               <div class="form-line">
                                                   <input type="date" id="birthDate" name="birthDate" class="form-control" placeholder="" required="required" onblur="getAge();">
                                               </div>
                                           </div>
                                       </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="mobilePhoneNo">Mobile Phone No.<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="mobilePhoneNo" class="form-control" placeholder="Mobile number" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="TelNo">Tel No.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="telNo" class="form-control" placeholder="Telephone number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="sex">Sex<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="radio" class="sex" name="sex" id="male" value="Male" checked required="required"><label for="male">Male</label>

                                            <input type="radio" class="sex" name="sex" id="female" value="Female"><label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 form-control-label">
                                        <label for="Gender">Gender<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='getGender'>
                                            <option class="academicProblemFail" value="Not specified">Not specified</option>
                                            <option class="academicProblemFail" value="Lesbian">Lesbian</option>
                                            <option class="academicProblemFail" value="Gay">Gay</option>
                                            <option class="academicProblemFail" value="Bisexual">Bisexual</option>
                                            <option class="academicProblemFail" value="Transgender">Transgender</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-1 form-control-label">
                                        <label for="Gender">Region<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='regionApplicant'>
                                            <option class="academicProblemFail" value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                            <option class="academicProblemFail" value="CAR">CAR (Cordillera Administrative Region)</option>
                                            <option class="academicProblemFail" value="NCR">NCR (National Capital Region)</option>
                                            <option class="academicProblemFail" value="Region 1">Region 1 (Ilocos Region)</option>
                                            <option class="academicProblemFail" value="Region 2">Region 2 (Cagayan Valley)</option>
                                            <option class="academicProblemFail" value="Region 3">Region 3 (Central Luzon)</option>
                                            <option class="academicProblemFail" value="Region 4A">Region 4A (CALABARZON)</option>
                                            <option class="academicProblemFail" value="Region 4B">Region 4B (MIMAROPA)</option>
                                            <option class="academicProblemFail" value="Region 5">Region 5 (Bicol Region)</option>
                                            <option class="academicProblemFail" value="Region 6">Region 6 (Western Visayas)</option>
                                            <option class="academicProblemFail" value="Region 7">Region 7 (Central Visayas)</option>
                                            <option class="academicProblemFail" value="Region 8">Region 8 (Eastern Visayas)</option>
                                            <option class="academicProblemFail" value="Region 9">Region 9 (Zamboanga Peninsula)</option>
                                            <option class="academicProblemFail" value="Region 10">Region 10 (Northern Mindanao)</option>
                                            <option class="academicProblemFail" value="Region 11">Region 11 (Davao Region)</option>
                                            <option class="academicProblemFail" value="Region 12">Region 12 (SOCCSKSARGEN)</option>
                                            <option class="academicProblemFail" value="Region 13">Region 13 (Caraga Region)</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="civilStatus">Civil Status<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="radio" class="civilStatus" name="civilStatus" id="single" value="Single" checked required="required"><label for="single">Single</label>

                                            <input type="radio" class="civilStatus" name="civilStatus" id="married" value="Married"><label for="married">Married</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 form-control-label">
                                        <label for="Age">Age<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <div class="input-group">
                                                <input type="Number" id="ageApplicant" class="form-control" placeholder="" required="required" readonly>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 form-control-label">
                                        <label for="religion">Religion<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='religion'>
                                            <option class="academicProblemFail" value="Roman Catholic">Roman Catholic</option>
                                            <option class="academicProblemFail" value="Protestants">Protestants</option>
                                            <option class="academicProblemFail" value="7th Day Adventist">7th Day Adventist</option>
                                            <option class="academicProblemFail" value="Muslims">Muslims</option>
                                            <option class="academicProblemFail" value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                            <option class="academicProblemFail" value="Buddhists">Buddhists</option>
                                            <option class="academicProblemFail" value="Jehovah's Witness">Jehovah's Witness</option>
                                            <option class="academicProblemFail" value="Other">Other (please specify)</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <div class="input-group">
                                                <input type="text" id="otherReligion" class="form-control" placeholder="Religion" required="required" style="display: none">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Family Background</h3>
                            <fieldset>
                            <div class="col-md-6">
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherStatus"><h2>Father</h2></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="radio" class="fatherStatus" name="fatherStatus" id="fatherLiving" value="Living" required="required" checked><label for="fatherLiving">Living</label>

                                                <input type="radio" class="fatherStatus" name="fatherStatus" id="fatherDeceased" value="Deceased" required="required"><label for="fatherDeceased">Deceased</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fatherName" class="form-control" placeholder="Father's name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherAddress">Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fatherAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherOccupation">Occupation</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fatherOccupation" class="form-control" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherContactNumber">Contact Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fatherContactNumber" class="form-control" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="fatherEducationalAttainment">Educational Attainment</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="fatherEducationalAttainment" class="form-control" placeholder="Educational Attainment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="homeAddress"><h2>Mother</h2></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="radio" class="motherStatus" name="motherStatus" id="motherLiving" value="Living" required="required" checked><label for="motherLiving">Living</label>

                                                <input type="radio" class="motherStatus" name="motherStatus" id="motherDeceased" value="Deceased" required="required"><label for="motherDeceased">Deceased</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="motherName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="motherName" class="form-control" placeholder="Mother's Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="motherAddress">Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="motherAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="motherOccupation">Occupation</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="motherOccupation" class="form-control" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="motherContactNumber">Contact Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="motherContactNumber" class="form-control" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="motherEducationalAttainment">Educational Attainment</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="motherEducationalAttainment" class="form-control" placeholder="Educational Attainment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
</div>
<!-- <div class="row clearfix">
<h2>Parents Total Monthly Income<span style="color:red; font-size: 18px;">*</span></h2>
<div class="col-md-2 form-control-label">
<input type="radio" class="income" name="income" id="income1" value="below 5,000"><label for="income1" required="required" checked> below 5,000</label><br>
<input type="radio" class="income" name="income" id="income2" value="5,000- 9,999"><label for="income2"> 5,000- 9,999</label>
</div>
<div class="col-md-2 form-control-label">
<input type="radio" class="income" name="income" id="income3" value="10,000- 14,999"><label for="income3"> 10,000- 14,999</label><br>
<input type="radio" class="income" name="income" id="income4" value="15,000- 19,999"><label for="income4"> 15,000- 19,999</label>
</div>
<div class="col-md-2 form-control-label">
<input type="radio" class="income" name="income" id="income5" value="20,000- 24,999"><label for="income5"> 20,000- 24,999</label><br>
<input type="radio" class="income" name="income" id="income6" value="25,000- 29,999"><label for="income6"> 25,000- 29,999</label>
</div>
<div class="col-md-2 form-control-label">
<input type="radio" class="income" name="income" id="income6" value="30,000- 34,999"><label for="income7"> 30,000- 34,999</label><br>
<input type="radio" class="income" name="income" id="income6" value="35,000- 39,999"><label for="income8"> 35,000- 39,999</label>
</div>
<div class="col-md-2 form-control-label">
<input type="radio" class="income" name="income" id="income6" value="40,000- 44,999"><label for="income9"> 40,000- 44,999</label><br>
<input type="radio" class="income" name="income" id="income6" value="above 45,000"><label for="income10"> above 45,000</label>
</div>
</div> -->

<!-- <div class="row clearfix">
<h2>Siblings</h2>
<div class="col-md-12">
      <table id="tableSiblings" class="table table-bordered">
          <thead>
              <tr>
                  <th width="25%">Name</th>
                  <th width="10%">Age</th>
                  <th width="20%">Educational Attainment</th>
                  <th width="20%">School/Employer</th>
                  <th width="15%">Monthly Income</th>
                  <th width="10%">Civil Status</th>
                  <th><input type="button" name="add_item" id="add_item" onClick="addRow();" value="Add More" /></th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td><input type="text" id="siblingName[]" name="siblingName[]" class="form-control siblingName" placeholder=""></td>
                  <td><input type="text" id="siblingAge[]" name="siblingAge[]" class="form-control siblingAge" placeholder=""></td>
                  <td><input type="text" id="siblingEducationalAttainment[]" name="siblingEducationalAttainment[]" class="form-control siblingEducationalAttainment" placeholder=""></td>
                  <td><input type="text" id="siblingSchool[]" name="siblingSchool[]" class="form-control siblingSchool" placeholder=""></td>
                  <td><input type="text" id="siblingIncome[]" name="siblingIncome[]" class="form-control siblingIncome" placeholder=""></td>
                  <td colspan="2"><input type="text" id="siblingStatus[]" name="siblingStatus[]" class="form-control siblingStatus" placeholder=""></td>
              </tr>
          </tbody>
      </table>
</div>
</div>
 -->
                            </fieldset>
                            <h3>Additional Questions</h3>
                            <fieldset>
                            <div id="for_married" style="display: none;">
                            <h2><b>FOR MARRIED:</b> Information about spouse</h2>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseName">Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseName" class="form-control" placeholder="Spouse Name">
                                            </div>
                                        </div>
                                    </div>

                                            <div class="col-md-2">
                                                <input type="radio" class="spouseStatus" name="spouseStatus" id="spouseLiving" value="Living"><label for="spouseLiving">Living</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" class="spouseStatus" name="spouseStatus" id="spouseDeceased" value="Deceased"><label for="spouseDeceased">Deceased</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" class="spouseStatus" name="spouseStatus" id="spouseSeparated" value="Separated"><label for="spouseSeparated">Separated</label>
                                            </div>                                  
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseAddress">Address</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseContactNo">Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseContactNo" class="form-control" placeholder="Contact No.">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseOccupation">Occupation</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseOccupation" class="form-control" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseEmployer">Employer</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseEmployer" class="form-control" placeholder="Employer">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="spouseEmployerAddress">Employer's Address</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="spouseEmployerAddress" class="form-control" placeholder="Employer's Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                                <input type="radio" class="spouseOccupationLocation" name="spouseOccupationLocation" id="spouseLocal" value="Local"><label for="spouseLocal">Local</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" class="spouseOccupationLocation" name="spouseOccupationLocation" id="spouseAbroad" value="Abroad"><label for="spouseAbroad">Abroad</label>
                                            </div>
                                </div>
<div class="row clearfix" id="children">
<h2>Name of Children</h2>
<div class="col-md-12">
      <table id="tableChildren" class="table table-bordered">
          <thead>
              <tr>
                  <th width="25%">Name</th>
                  <th width="10%">Sex</th>
                  <th width="20%">Age</th>
                  <th width="20%">Birth Date</th>
                  <th width="15%">Birth Place</th>
                  <th width="10%">Educational Attainment</th>
                  <th><input type="button" name="add_item" id="add_item" onClick="addChild();" value="Add More" /></th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder=""></td>
                  <td><input type="text" id="childrenSex[]" name="childrenSex[]" class="form-control childrenSex" placeholder=""></td>
                  <td><input type="text" id="childrenAge[]" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>
                  <td><input type="date" id="childrenBirthDate[]" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder=""></td>
                  <td><input type="text" id="childrenBirthPlace[]" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>
                  <td colspan="2"><input type="text" id="childrenEducationalAttainment[]" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td>
              </tr>
          </tbody>
      </table>
</div>
</div>

</div>
<br>
                            <h2>IF EMPLOYED</h2>
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="studentOccupation">Occupation</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="studentOccupation" class="form-control" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <label for="studentEmployer">Employer</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="studentEmployer" class="form-control" placeholder="Employer">
                                            </div>
                                        </div>
                                    </div>

                                                                    
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="studentEmployerAddress">Employer Address</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="studentEmployerAddress" class="form-control" placeholder="Employer Address">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                                <input type="radio" class="studentOccupationLocation" name="studentOccupationLocation" id="studentLocal" value="Local"><label for="studentLocal">Local</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" class="studentOccupationLocation" name="studentOccupationLocation" id="studentAbroad" value="Abroad"><label for="studentAbroad">Abroad</label>
                                            </div>

                                </div>
<br>
<h2>PRIMARY GUARDIAN'S INFORMATION</h2>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianName" class="form-control" placeholder="Guardian Name" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianRelation" required="required">Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianRelation" class="form-control" placeholder="Relation">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianAddress" required="required">Address</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianTelNo">Tel no</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianTelNo" class="form-control" placeholder="Telephone number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianMobileNo" required="required">Mobile No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianMobileNo" class="form-control" placeholder="Mobile number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianEmailAddress">Email Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianEmailAddress" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
<h2>SECONDARY GUARDIAN'S INFORMATION</h2>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianName2" class="form-control" placeholder="Guardian Name" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianRelation" required="required">Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianRelation2" class="form-control" placeholder="Relation">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianAddress" required="required">Address</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianAddress2" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianTelNo">Tel no</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianTelNo2" class="form-control" placeholder="Telephone number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianMobileNo" required="required">Mobile No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianMobileNo2" class="form-control" placeholder="Mobile number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="guardianEmailAddress">Email Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guardianEmailAddress2" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Academic Information</h3>
                            <fieldset>

                            <h3>Elementary</h3>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="elementaryName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="elementaryName" class="form-control" placeholder="School Name" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <input type="radio" class="elementaryType" name="elementaryType" id="elementaryPublic" value="Public" required="required"><label for="elementaryPublic">Public</label>
                                        <input type="radio" class="elementaryType" name="elementaryType" id="elementaryPrivate" value="Private" required="required"><label for="elementaryPrivate">Private</label>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="elementaryAward">Award</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="elementaryAward" class="form-control" placeholder="Award">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="elementaryAddress">Address<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="elementaryAddress" class="form-control" placeholder="Address" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="elementaryRegion">Region<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='elementaryRegion'>
                                            <option class="academicProblemFail" value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                            <option class="academicProblemFail" value="CAR">CAR (Cordillera Administrative Region)
</option>
                                            <option class="academicProblemFail" value="NCR">NCR (National Capital Region)
</option>
                                            <option class="academicProblemFail" value="Region 1">Region 1 (Ilocos Region)</option>
                                            <option class="academicProblemFail" value="Region 2">Region 2 (Cagayan Valley)
</option>
                                            <option class="academicProblemFail" value="Region 3">Region 3 (Central Luzon)
</option>
                                            <option class="academicProblemFail" value="Region 4A">Region 4A (CALABARZON)
</option>
                                            <option class="academicProblemFail" value="Region 4B">Region 4B (MIMAROPA)
</option>
                                            <option class="academicProblemFail" value="Region 5">Region 5 (Bicol Region)
</option>
                                            <option class="academicProblemFail" value="Region 6">Region 6 (Western Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 7">Region 7 (Central Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 8">Region 8 (Eastern Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 9">Region 9 (Zamboanga Peninsula)
</option>
                                            <option class="academicProblemFail" value="Region 10">Region 10 (Northern Mindanao)
</option>
                                            <option class="academicProblemFail" value="Region 11">Region 11 (Davao Region)
</option>
                                            <option class="academicProblemFail" value="Region 12">Region 12 (SOCCSKSARGEN)
</option>
                                            <option class="academicProblemFail" value="Region 13">Region 13 (Caraga Region)
</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="elementaryGraduated">Year Graduated<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="elementaryGraduated" class="form-control" placeholder="Year Graduated" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            <h3>Secondary</h3>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="secondaryName">Name<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="secondaryName" class="form-control" placeholder="School Name" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <input type="radio" class="secondaryType" name="secondaryType" id="secondaryPublic" value="Public" required="required"><label for="secondaryPublic">Public</label>
                                        <input type="radio" class="secondaryType" name="secondaryType" id="secondaryPrivate" value="Private" required="required"><label for="secondaryPrivate">Private</label>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="secondaryAward">Award</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="secondaryAward" class="form-control" placeholder="Award">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="secondaryAddress">Address<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="secondaryAddress" class="form-control" placeholder="Address" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="secondaryRegion">Region<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='secondaryRegion'>
                                            <option class="academicProblemFail" value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                            <option class="academicProblemFail" value="CAR">CAR (Cordillera Administrative Region)
</option>
                                            <option class="academicProblemFail" value="NCR">NCR (National Capital Region)
</option>
                                            <option class="academicProblemFail" value="Region 1">Region 1 (Ilocos Region)</option>
                                            <option class="academicProblemFail" value="Region 2">Region 2 (Cagayan Valley)
</option>
                                            <option class="academicProblemFail" value="Region 3">Region 3 (Central Luzon)
</option>
                                            <option class="academicProblemFail" value="Region 4A">Region 4A (CALABARZON)
</option>
                                            <option class="academicProblemFail" value="Region 4B">Region 4B (MIMAROPA)
</option>
                                            <option class="academicProblemFail" value="Region 5">Region 5 (Bicol Region)
</option>
                                            <option class="academicProblemFail" value="Region 6">Region 6 (Western Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 7">Region 7 (Central Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 8">Region 8 (Eastern Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 9">Region 9 (Zamboanga Peninsula)
</option>
                                            <option class="academicProblemFail" value="Region 10">Region 10 (Northern Mindanao)
</option>
                                            <option class="academicProblemFail" value="Region 11">Region 11 (Davao Region)
</option>
                                            <option class="academicProblemFail" value="Region 12">Region 12 (SOCCSKSARGEN)
</option>
                                            <option class="academicProblemFail" value="Region 13">Region 13 (Caraga Region)
</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-1 form-control-label">
                                        <label for="secondaryGraduated">Year Graduated<span style="color:red; font-size: 18px;">*</span></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="secondaryGraduated" class="form-control" placeholder="Year Graduated" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>




                            <h3>College</h3>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="collegeName">Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="collegeName" class="form-control" placeholder="School Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <input type="radio" class="collegeType" name="collegeType" id="collegePublic" value="Public"><label for="collegePublic">Public</label>
                                        <input type="radio" class="collegeType" name="collegeType" id="collegePrivate" value="Private"><label for="collegePrivate">Private</label>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="collegeAward">Award</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="collegeAward" class="form-control" placeholder="Award">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="collegeAddress">Address</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="collegeAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="collegeRegion">Region</label>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='collegeRegion'>
                                            <option class="academicProblemFail" value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                            <option class="academicProblemFail" value="CAR">CAR (Cordillera Administrative Region)
</option>
                                            <option class="academicProblemFail" value="NCR">NCR (National Capital Region)
</option>
                                            <option class="academicProblemFail" value="Region 1">Region 1 (Ilocos Region)</option>
                                            <option class="academicProblemFail" value="Region 2">Region 2 (Cagayan Valley)
</option>
                                            <option class="academicProblemFail" value="Region 3">Region 3 (Central Luzon)
</option>
                                            <option class="academicProblemFail" value="Region 4A">Region 4A (CALABARZON)
</option>
                                            <option class="academicProblemFail" value="Region 4B">Region 4B (MIMAROPA)
</option>
                                            <option class="academicProblemFail" value="Region 5">Region 5 (Bicol Region)
</option>
                                            <option class="academicProblemFail" value="Region 6">Region 6 (Western Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 7">Region 7 (Central Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 8">Region 8 (Eastern Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 9">Region 9 (Zamboanga Peninsula)
</option>
                                            <option class="academicProblemFail" value="Region 10">Region 10 (Northern Mindanao)
</option>
                                            <option class="academicProblemFail" value="Region 11">Region 11 (Davao Region)
</option>
                                            <option class="academicProblemFail" value="Region 12">Region 12 (SOCCSKSARGEN)
</option>
                                            <option class="academicProblemFail" value="Region 13">Region 13 (Caraga Region)
</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="collegeGraduated">Year Last Attended</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="collegeGraduated" class="form-control" placeholder="Year Last Attended">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            <h3>Vocational</h3>
                                  <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="vocationalName">Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="vocationalName" class="form-control" placeholder="School Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-control-label">
                                        <input type="radio" class="vocationalType" name="vocationalType" id="vocationalPublic" value="Public"><label for="vocationalPublic">Public</label>
                                        <input type="radio" class="vocationalType" name="vocationalType" id="vocationalPrivate" value="Private"><label for="vocationalPrivate">Private</label>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="vocationalAward">Award</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="vocationalAward" class="form-control" placeholder="Award">
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-2 form-control-label">
                                        <label for="vocationalAddress">Address</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="vocationalAddress" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="vocationalRegion">Region</label>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <select class='form-control' id='vocationalRegion'>
                                            <option class="academicProblemFail" value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                            <option class="academicProblemFail" value="CAR">CAR (Cordillera Administrative Region)
</option>
                                            <option class="academicProblemFail" value="NCR">NCR (National Capital Region)
</option>
                                            <option class="academicProblemFail" value="Region 1">Region 1 (Ilocos Region)</option>
                                            <option class="academicProblemFail" value="Region 2">Region 2 (Cagayan Valley)
</option>
                                            <option class="academicProblemFail" value="Region 3">Region 3 (Central Luzon)
</option>
                                            <option class="academicProblemFail" value="Region 4A">Region 4A (CALABARZON)
</option>
                                            <option class="academicProblemFail" value="Region 4B">Region 4B (MIMAROPA)
</option>
                                            <option class="academicProblemFail" value="Region 5">Region 5 (Bicol Region)
</option>
                                            <option class="academicProblemFail" value="Region 6">Region 6 (Western Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 7">Region 7 (Central Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 8">Region 8 (Eastern Visayas)
</option>
                                            <option class="academicProblemFail" value="Region 9">Region 9 (Zamboanga Peninsula)
</option>
                                            <option class="academicProblemFail" value="Region 10">Region 10 (Northern Mindanao)
</option>
                                            <option class="academicProblemFail" value="Region 11">Region 11 (Davao Region)
</option>
                                            <option class="academicProblemFail" value="Region 12">Region 12 (SOCCSKSARGEN)
</option>
                                            <option class="academicProblemFail" value="Region 13">Region 13 (Caraga Region)
</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-1 form-control-label">
                                        <label for="vocationalGraduated">Year Last Attended</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="vocationalGraduated" class="form-control" placeholder="Year Last Attended">
                                            </div>
                                        </div>
                                    </div>
                                </div>
<br><br>
                              <div class="row clearfix">
                                <div class="col-md-5 form-control-label">
                                <h4>SENIOR HIGH SCHOOL LEARNER'S DATA<span style="color:red; font-size: 18px;">*</span></h4>
                                    </div><br><br>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="form-line learners">
                                          <select class='form-control' id='learnersData'>
                                            <option value="Balik-Aral">Balik-Aral</option>
                                            <option value="Indigenous Peoples Learner">Indigenous Peoples Learner</option>
                                            <option value="Muslim Learner">Muslim Learner</option>
                                            <option value="Repeater">Repeater</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                              </div>
<br>
                                  <div class="row clearfix">
                                    <div class="col-md-4 form-control-label">
                                        <h4>SENIOR HIGH SCHOOL TRACK<span style="color:red; font-size: 18px;">*</span></h4>
                                    </div><br><br>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <div class="form-line learners">
                                          <select class='form-control' id='shsTrack'>
                                            <option class="academicProblemFail" value="Academic">Academic</option>
                                            <option class="academicProblemFail" value="Arts and Design">Arts and Design</option>
                                            <option class="academicProblemFail" value="Sports">Sports</option>
                                            <option class="academicProblemFail" value="Technology Vocational Livelihood">Technology Vocational Livelihood</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="col-md-4 form-control-label">
                                        <div class="form-group shsStrandss">
                                              <div class="form-line">
                                                <select class='form-control' id='shsTrackAcademic' style="display: none;">
                                                  <option value="STEM">STEM</option>
                                                  <option value="ABM">ABM</option>
                                                  <option value="HUMMS">HUMMS</option>
                                                  <option value="GAS">GAS</option>
                                                </select>
                                                <select class='form-control' id='shsTrackTVL' style="display: none;">
                                                  <option value="Home Economics">Home Economics</option>
                                                  <option value="Agri-Fishery">Agri-Fishery</option>
                                                  <option value="Industrial Arts">Industrial Arts</option>
                                                  <option value="Information Communication Technology">Information Communication Technology
                                                  </option>
                                              </select>
                                            </div>
                                        </div>
                                      </div>
                                  </div><br>
<div class="row clearfix">
  <div class="col-md-8 form-control-label">
      <h4>REASONS FOR APPLYING AT TANAUAN CITY COLLEGE<span style="color:red; font-size: 18px;">*</span></h4>
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <div class="form-line learners">
        <select class='form-control' id='reasonEntryTCC'>
          <option class="academicProblemFail" value="Quality Education">Quality Education</option>
          <option class="academicProblemFail" value="Proximity">Proximity</option>
          <option class="academicProblemFail" value="Competent Professor">Competent Professor</option>
          <option class="academicProblemFail" value="Recommended by Relatives">Recommended by Relatives</option>
          <option class="academicProblemFail" value="Campus Environment">Campus Environment</option>
          <option class="academicProblemFail" value="Good Facilities">Good Facilities</option>
          <option class="academicProblemFail" value="Availability of Program">Availability of Program</option>
          <option class="academicProblemFail" value="With National Government Subsidy">With National Government Subsidy</option>
          <option class="academicProblemFail" value="With Local Government Subsidy">With Local Government Subsidy</option>
          <option class="academicProblemFail" value="Others">Others (please specify)</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
        <div class="form-line">
          <div class="input-group">
              <input type="text" id="reasonEntryTCCOther" class="form-control" placeholder="Other reason" required="required" style="display: none">
          </div>
        </div>
    </div>
  </div>
</div>
<br>


<style>
    .shss{
      margin-left: 50px;
    }

    .knowAbout{
      margin-left: 50px;
    }

    .shsStrandss{
      align-left;
    }

    input[type="radio"] {
      margin-left:10px;
    }

    .learners{
      margin-left: 50px;
    }

</style>
                                  <div class="row clearfix">
                                    <div class="col-md-4 form-control-label">
                                        <h4><label for="grade">GENERAL WEIGHTED AVERAGE<span style="color:red; font-size: 18px;">*</span></label></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="input-group">
                                                  <input type="text" id="gwAverage" class="form-control" placeholder="Average grade" required="required">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div><br>
                                    <div class="row clearfix">
                                      <div class="col-md-8 form-control-label">
                                          <h4>HOW DID YOU GET TO KNOW ABOUT TANAUAN CITY COLLEGE?<span style="color:red; font-size: 18px;">*</span></h4>
                                      </div>
                                        <div class="col-md-5">
                                          <div class="form-group">
                                            <div class="form-line learners">
                                              <select class='form-control' id='knowAboutCollege'>
                                                <option class="academicProblemFail" value="Career Orientation">Career Orientation</option>
                                                <option class="academicProblemFail" value="Social Media">Social Media</option>
                                                <option class="academicProblemFail" value="Employee of TCC">Employee of TCC</option>
                                                <option class="academicProblemFail" value="Student of TCC">Student of TCC</option>
                                                <option class="academicProblemFail" value="Others">Others(please specify)</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                              <div class="form-line">
                                                <div class="input-group">
                                                    <input type="text" id="knowAboutCollegeOther" class="form-control" placeholder="Other" required="required" placeholder="Other reason." style="display: none">
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
<br><br>

                                  <!-- <div class="row clearfix">
                                    <div class="col-md-3 form-control-label">
                                        <h4>Are you a transferee?<span style="color:red; font-size: 18px;">*</span></h4>
                                    </div>
                                    <div class="col-md-8 form-control-label">
                                    <div class="form-group">
                                            <div class="form-line">
                                      <input type="radio" class="transferee" name="transferee" id="tYes" value="Yes"><label for="tYes" required="required">Yes</label>
                                      <input type="radio" class="transferee" name="transferee" id="tNo" value="No"><label for="tNo">No</label>
                                            </div>
                                      </div>
                                    </div>
                                  </div> -->

                                <!-- <div class="row clearfix">
                                <div class="col-md-3 form-control-label">
                                        <h4></h4>
                                    </div>
                                    <div class="col-md-5 form-control-label">
                                    <div class="form-group">
                                            <div class="form-line">
                                              <select class='form-control' id='enrolledCourse' style="display: none;">
                                                <option value="">Select Course...</option>
                                                <option value="ALS">ALS</option>
                                                <option value="TESDA">TESDA</option>
                                                <option value="High School Graduate">High School Graduate</option>
                                              </select>
                                            </div>
                                      </div>
                                    </div>
                                  </div> -->

                                    <!-- <div class="col-md-3 form-control-label">
                                      <h4>Select Preferred Programs<span style="color:red; font-size: 18px;">*</span></h4>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class='form-control' id='prefferedPrograms'>
                                      <?php
                                         $getAllPrograms  = $applicant->readAllPrograms();
                                         while($row = $getAllPrograms->fetch(PDO::FETCH_ASSOC)){
                                           extract($row);
                                           echo "<option value='{$fld_programID}'>{$fld_programName}</option>";
                                         } 
                                         ?>
                                      </select>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Form Example With Validation -->      

                     </div>
               </section>
               </div>
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
      <script src="../assets/vendor/jquery/jquery.js"></script>
      <script src="../assets/mentor/js/jquery.easing.min.js"></script>
      <script src="../assets/mentor/js/bootstrap.min.js"></script>
      <script src="../assets/mentor/js/custom.js"></script>
      <script src="../assets/vendor/select2/select2.min.js"></script>
      <script src="../assets/vendor/bootstrap-select/bootstrap-select.js"></script>
      <script src="../assets/vendor/multi-select/jquery.multi-select.js"></script>
      <script src="../assets/js/components/select2.js"></script>
      <script src="../assets/js/components/bootstrap-select.js"></script>
      <script src="../assets/js/components/multi-select.js"></script>

  <script src="../assets/vendor/bootstrap/bootstrap.js"></script>
  <script src="../assets/vendor/animsition/jquery.animsition.js"></script>
  <script src="../assets/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="../assets/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="../assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>


<script src="../assets/vendor/jquery-steps/jquery.steps.js"></script>
<script src="../assets/vendor/jquery-validation/jquery.validate.js"></script>
  <script src="../assets/vendor/bootstrap-sweetalert/sweet-alert.js"></script>

<script type="text/javascript">
              $(document).on('click', '.fatherStatus', function(){
              var status = $(this).val();
              if(status == "Deceased"){
                $("#fatherAddress").attr("disabled","true");
                $("#fatherOccupation").attr("disabled","true");
                $("#fatherContactNumber").attr("disabled","true");
                $("#fatherEducationalAttainment").attr("disabled","true");
                $("#fatherAddress").val("n/a");
                $("#fatherOccupation").val("n/a");
                $("#fatherContactNumber").val("n/a");
                $("#fatherEducationalAttainment").val("n/a");
              }
              else{
                $("#fatherAddress").removeAttr("disabled");
                $("#fatherOccupation").removeAttr("disabled");
                $("#fatherContactNumber").removeAttr("disabled");
                $("#fatherEducationalAttainment").removeAttr("disabled");

                $("#fatherAddress").val("");
                $("#fatherOccupation").val("");
                $("#fatherContactNumber").val("");
                $("#fatherEducationalAttainment").val("");

              }
              });

              $(document).on('click', '.motherStatus', function(){
              var status = $(this).val();
              if(status == "Deceased"){
                $("#motherAddress").attr("disabled","true");
                $("#motherOccupation").attr("disabled","true");
                $("#motherContactNumber").attr("disabled","true");
                $("#motherEducationalAttainment").attr("disabled","true");
                $("#motherAddress").val("n/a");
                $("#motherOccupation").val("n/a");
                $("#motherContactNumber").val("n/a");
                $("#motherEducationalAttainment").val("n/a");
              }
              else{
                $("#motherAddress").removeAttr("disabled");
                $("#motherOccupation").removeAttr("disabled");
                $("#motherContactNumber").removeAttr("disabled");
                $("#motherEducationalAttainment").removeAttr("disabled");

                $("#motherAddress").val("");
                $("#motherOccupation").val("");
                $("#motherContactNumber").val("");
                $("#motherEducationalAttainment").val("");

              }
              });


              $(document).on('click', '.civilStatus', function(){
              var status = $(this).val();
              if(status == "Married"){
                $("#for_married").show();
              alert(status);
              }
              else if(status == "Single"){
                $("#for_married").hide();
              }
              });

              $(document).on('click', '.transferee', function(){
                var transferee = $(this).val();
                if(transferee == "No"){
                  $("#enrolledCourse").show();
                }
                else if(transferee = "Yes"){
                  $("#enrolledCourse").hide();
                }
              });

              $(document).ready(function() {
                  $('#knowAboutCollege').change(function() {
                      if ( $("#knowAboutCollege").val ()  ==  "Others") 
                      {                              
                          $('#knowAboutCollegeOther').show();
                      }
                      else
                          $("#knowAboutCollegeOther").hide();
                  }); 
              });
              
              $(document).on('click', '#discontinuanceOfStudyYes', function(){
                         $("#discontinuanceOfStudyReason").removeAttr("disabled");
              });
              $(document).on('click', '#discontinuanceOfStudyNo', function(){
                         $("#discontinuanceOfStudyReason").attr("disabled","true");
              });

              $(document).on('click', '#academicProblemRepeatYes', function(){
                         $("#academicProblemRepeatReason").removeAttr("disabled");
              });
              $(document).on('click', '#academicProblemRepeatNo', function(){
                         $("#academicProblemRepeatReason").attr("disabled","true");
              });

              $(document).on('click', '#academicProblemFailYes', function(){
                         $("#academicProblemFailReason").removeAttr("disabled");
              });
              $(document).on('click', '#academicProblemFailNo', function(){
                         $("#academicProblemFailReason").attr("disabled","true");
              });

              $(document).on('click', '#disciplinaryRecordYes', function(){
                         $("#disciplinaryRecordReason").removeAttr("disabled");
              });
              $(document).on('click', '#disciplinaryRecordNo', function(){
                         $("#disciplinaryRecordReason").attr("disabled","true");
              });
</script>

        <script>
            function addChild() {
                $('#tableChildren').find('tbody').append($(
                  '<tr><td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder=""></td>' +
                  '<td><input type="text" id="childrenSex[]" name="childrenSex[]" class="form-control childrenSex" placeholder=""></td>' +
                  '<td><input type="text" id="childrenAge[]" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>' +
                  '<td><input type="date" id="childrenBirthDate[]" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder=""></td>' +
                  '<td><input type="text" id="childrenBirthPlace[]" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>' +
                  '<td colspan="2"><input type="text" id="childrenEducationalAttainment[]" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td></tr>'
                   ));
            }
        </script>

        <script type="text/javascript">
          $(document).ready(function() {
              $('#religion').change(function() {
                  if ( $("#religion").val ()  ==  "Other") 
                  {                              
                      $('#otherReligion').show();
                  }
                  else
                      $("#otherReligion").hide();
              }); 
          });

          $(document).ready(function() {
              $('#reasonEntryTCC').change(function() {
                  if ( $("#reasonEntryTCC").val ()  ==  "Others") 
                  {                              
                      $('#reasonEntryTCCOther').show();
                  }
                  else
                      $("#reasonEntryTCCOther").hide();
              }); 
          });


          $(document).ready(function() {
            $('#shsTrack').change(function() {
                if ( $("#shsTrack").val ()  ==  "Academic") 
                {                              
                    $('#shsTrackAcademic').show();
                    $("#shsTrackTVL").hide();
                }
                else if ( $("#shsTrack").val ()  ==  "Technology Vocational Livelihood") 
                {                              
                    $('#shsTrackAcademic').hide();
                    $("#shsTrackTVL").show();
                }
                else if ( $("#shsTrack").val ()  ==  "Arts and Design") 
                {                              
                    $('#shsTrackAcademic').hide();
                    $("#shsTrackTVL").hide();
                }
                else if ( $("#shsTrack").val ()  ==  "Sports") 
                {                              
                    $('#shsTrackAcademic').hide();
                    $("#shsTrackTVL").hide();
                }
            }); 
        });
        </script>

        <script>
            function addRow() {
                $('#tableSiblings').find('tbody').append($(
                  '<tr><td><input type="text" id="siblingName[]" name="siblingName[]" class="form-control siblingName" placeholder=""></td>' +
                  '<td><input type="text" id="siblingAge[]" name="siblingAge[]" class="form-control siblingAge" placeholder=""></td>' +
                  '<td><input type="text" id="siblingEducationalAttainment[]" name="siblingEducationalAttainment[]" class="form-control siblingEducationalAttainment" placeholder=""></td>' +
                  '<td><input type="text" id="siblingSchool[]" name="siblingSchool[]" class="form-control siblingSchool" placeholder=""></td>' +
                  '<td><input type="text" id="siblingIncome[]" name="siblingIncome[]" class="form-control siblingIncome" placeholder=""></td>' +
                  '<td colspan="2"><input type="text" id="siblingStatus[]" name="siblingStatus[]" class="form-control siblingStatus" placeholder=""></td></tr>'
                   ));
            }
        </script>
<script type="text/javascript">
  var form = $('#applicationForm').show();
    form.steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            $.AdminBSB.input.activate();

            //Set tab width
            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
            var tabCount = $tab.length;
            $tab.css('width', (100 / tabCount) + '%');

            //set button waves effect
            setButtonWavesEffect(event);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }

            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            var getsiblingName = [];
            var getsiblingAge = [];
            var getsiblingEducationalAttainment = [];
            var getsiblingSchool = [];
            var getsiblingIncome = [];
            var getsiblingStatus = [];
            var getchildrenName = [];
            var getchildrenSex = [];
            var getchildrenAge = [];
            var getchildrenBirthDate = [];
            var getchildrenBirthPlace = [];
            var getchildrenEducationalAttainment = [];


            var getfunctionName = "studentApplication";
            var getfirstName = $('#firstName').val();
            var getmiddleName = $('#middleName').val();
            var getlastName = $('#lastName').val();
            var gethomeAddress = $('#homeAddress').val();
            var getemailAddress = $('#emailAddress').val();
            var getbirthPlace = $('#birthPlace').val();
            var getbirthDate = $('#birthDate').val();
            var getmobilePhoneNo = $('#mobilePhoneNo').val();
            var gettelNo= $('#telNo').val();
            var getSex = $(".sex:checked").val();
            var getHeight = $('#height').val();
            var getbloodType = $('#bloodType').val();
            var getcivilStatus = $(".civilStatus:checked").val();
            var getweight = $('#weight').val();
            // var getreligion = $('#religion').val();
            var getGender = $("#getGender").val();
            getGender = getGender.toString();

            var getAgeApplicant = $('#ageApplicant').val();
            var getregionApplicant = $('#regionApplicant').val();


            var getfatherStatus = $(".fatherStatus:checked").val(); 
            var getfatherName = $('#fatherName').val();
            var getfatherAddress = $('#fatherAddress').val();
            var getfatherOccupation = $('#fatherOccupation').val();
            var getfatherContactNumber = $('#fatherContactNumber').val();
            var getfatherEducationalAttainment = $('#fatherEducationalAttainment').val();

            var getmotherStatus = $(".motherStatus:checked").val(); 
            var getmotherName = $('#motherName').val();
            var getmotherAddress = $('#motherAddress').val();
            var getmotherOccupation = $('#motherOccupation').val();
            var getmotherContactNumber = $('#motherContactNumber').val();
            var getmotherEducationalAttainment = $('#motherEducationalAttainment').val();

            var getincome = $(".income:checked").val();

             $('.siblingName').each(function() {
                       getsiblingName.push($(this).val());
                    });
             $('.siblingAge').each(function() {
                       getsiblingAge.push($(this).val());
                    });
             $('.siblingEducationalAttainment').each(function() {
                       getsiblingEducationalAttainment.push($(this).val());
                    });
             $('.siblingSchool').each(function() {
                       getsiblingSchool.push($(this).val());
                    });
             $('.siblingIncome').each(function() {
                       getsiblingIncome.push($(this).val());
                    });
             $('.siblingStatus').each(function() {
                       getsiblingStatus.push($(this).val());
                    });

             getsiblingName = getsiblingName.toString();
             getsiblingAge = getsiblingAge.toString();
             getsiblingEducationalAttainment = getsiblingEducationalAttainment.toString();
             getsiblingSchool = getsiblingSchool.toString();
             getsiblingIncome = getsiblingIncome.toString();
             getsiblingStatus = getsiblingStatus.toString();

            var getspouseName = $('#spouseName').val();
            if($('.spouseStatus').is(':checked')){
            var getspouseStatus = $(".spouseStatus:checked").val(); 
          }else{
            var getspouseStatus = ""; 
          }
            var getspouseAddress = $('#spouseAddress').val();
            var getspouseContactNo = $('#spouseContactNo').val();
            var getspouseOccupation = $('#spouseOccupation').val();
            var getspouseEmployer = $('#spouseEmployer').val();
            var getspouseEmployerAddress = $('#spouseEmployerAddress').val();
            if($('.spouseOccupationLocation').is(':checked')){
            var getspouseOccupationLocation = $(".spouseOccupationLocation:checked").val(); 
            }else{
            var getspouseOccupationLocation = ""; 
            }


             $('.childrenName').each(function() {
                       getchildrenName.push($(this).val());
                    });
             $('.childrenSex').each(function() {
                       getchildrenSex.push($(this).val());
                    });
             $('.childrenAge').each(function() {
                       getchildrenAge.push($(this).val());
                    });
             $('.childrenBirthDate').each(function() {
                       getchildrenBirthDate.push($(this).val());
                    });
             $('.childrenBirthPlace').each(function() {
                       getchildrenBirthPlace.push($(this).val());
                    });
             $('.childrenEducationalAttainment').each(function() {
                       getchildrenEducationalAttainment.push($(this).val());
                    });
             getchildrenName = getchildrenName.toString();
             getchildrenSex = getchildrenSex.toString();
             getchildrenAge = getchildrenAge.toString();
             getchildrenBirthDate = getchildrenBirthDate.toString();
             getchildrenBirthPlace = getchildrenBirthPlace.toString();
             getchildrenEducationalAttainment = getchildrenEducationalAttainment.toString();

             var getstudentOccupation = $('#studentOccupation').val();
             var getstudentEmployer = $('#studentEmployer').val();
             var getstudentEmployerAddress = $('#studentEmployerAddress').val();
             if($('.studentOccupationLocation').is(':checked')){
             var getstudentOccupationLocation = $(".studentOccupationLocation:checked").val();
             }
             else{
              var getstudentOccupationLocation = "";
             }


            var getguardianName = $('#guardianName').val();
            var getguardianRelation = $('#guardianRelation').val();
            var getguardianAddress = $('#guardianAddress').val();
            var getguardianZipCode = $('#guardianZipCode').val();
            var getguardianTelNo = $('#guardianTelNo').val();
            var getguardianMobileNo = $('#guardianMobileNo').val();
            var getguardianEmailAddress = $('#guardianEmailAddress').val();

            var getguardianName2 = $('#guardianName2').val();
            var getguardianRelation2 = $('#guardianRelation2').val();
            var getguardianAddress2 = $('#guardianAddress2').val();
            // var getguardianZipCode2 = $('#guardianZipCode2').val();
            var getguardianTelNo2 = $('#guardianTelNo2').val();
            var getguardianMobileNo2 = $('#guardianMobileNo2').val();
            var getguardianEmailAddress2 = $('#guardianEmailAddress2').val();


            var getelementaryName = $('#elementaryName').val();
            var getelementaryType = $(".elementaryType:checked").val();
            var getelementaryAward = $('#elementaryAward').val();
            var getelementaryAddress = $('#elementaryAddress').val();
            var getelementaryRegion = $('#elementaryRegion').val();
            var getelementaryGraduated = $('#elementaryGraduated').val();

            var getsecondaryName = $('#secondaryName').val();
            var getsecondaryType = $(".secondaryType:checked").val();
            var getsecondaryAward = $('#secondaryAward').val();
            var getsecondaryAddress = $('#secondaryAddress').val();
            var getsecondaryRegion = $('#secondaryRegion').val();
            var getsecondaryGraduated = $('#secondaryGraduated').val();

            var getcollegeName = $('#collegeName').val();
            if (getcollegeName == "") {
              var getcollegeRegion = "";
            } else {
              var getcollegeRegion = $('#collegeRegion').val();
            }

            if($('.collegeType').is(':checked')){
            var getcollegeType = $(".collegeType:checked").val();
            }
            else{
              var getcollegeType = "";
            }
            var getcollegeAward = $('#collegeAward').val();
            var getcollegeAddress = $('#collegeAddress').val();
            var getcollegeGraduated = $('#collegeGraduated').val();

            var getvocationalName = $('#vocationalName').val();
            if (getvocationalName == "") {
              var getvocationalRegion = "";
            } else {
              var getvocationalRegion = $('#vocationalRegion').val();
            }

            if($('.vocationalType').is(':checked')){
            var getvocationalType = $(".vocationalType:checked").val();
            }
            else{
              var getvocationalType = "";
            }

            var shsTrack = $("#shsTrack").val();
            shsTrack = shsTrack.toString();
            if (shsTrack == "Academic") {
              var shsTrackStrand = $('#shsTrackAcademic').val();
              shsTrackStrand = shsTrackStrand.toString();
            } else if (shsTrack == "Technology Vocational Livelihood") {
              var shsTrackStrand = $('#shsTrackTVL').val();
              shsTrackStrand = shsTrackStrand.toString();
            } else {
              var shsTrackStrand = "";
              shsTrackStrand = shsTrackStrand.toString();
            }

            var reasonEntryTCC = $("#reasonEntryTCC").val();
            reasonEntryTCC = reasonEntryTCC.toString();
            if (reasonEntryTCC == "Others") {
              var reasonEntryTCCOther = $('#reasonEntryTCCOther').val();
              reasonEntryTCCOther = reasonEntryTCCOther.toString();
            } else {
              var reasonEntryTCCOther = "";
              reasonEntryTCCOther = reasonEntryTCCOther.toString();
            }

            var getreligion = $("#religion").val();
            getreligion = getreligion.toString();
            if (getreligion == "Other") {
              var otherReligion = $('#otherReligion').val();
              otherReligion = otherReligion.toString();
            } else {
              var otherReligion = "";
              otherReligion = otherReligion.toString();
            }

            var knowAboutCollege = $("#knowAboutCollege").val();
            knowAboutCollege = reasonEntryTCC.toString();
            if (knowAboutCollege == "Others") {
              var knowAboutCollegeOther = $('#knowAboutCollegeOther').val();
              reasonEntryTCCOther = reasonEntryTCCOther.toString();
            } else {
              var knowAboutCollegeOther = "";
              knowAboutCollegeOther = knowAboutCollegeOther.toString();
            }

            var getvocationalAward = $('#vocationalAward').val();
            var getvocationalAddress = $('#vocationalAddress').val();
            var getvocationalGraduated = $('#vocationalGraduated').val();

            var getlearnersData = $('#learnersData').val();
            getlearnersData = getlearnersData.toString();
            var getgwAverage = $('#gwAverage').val();

            var getdiscontinuanceOfStudy = $(".discontinuanceOfStudy:checked").val();
            var getdiscontinuanceOfStudyReason= $('#discontinuanceOfStudyReason').val();
            var getacademicProblemFail = $(".academicProblemFail:checked").val();
            var getacademicProblemFailReason= $('#academicProblemFailReason').val();
            var getacademicProblemRepeat = $(".academicProblemRepeat:checked").val();
            var getacademicProblemRepeatReason= $('#academicProblemRepeatReason').val();
            var getdisciplinaryRecord = $(".disciplinaryRecord:checked").val();
            var getdisciplinaryRecordReason= $('#disciplinaryRecordReason').val();            

            var transferee = $(".transferee:checked").val();
            var enrolledCourse = $("#enrolledCourse").val();
            var prefferedPrograms = $('#prefferedPrograms').val();
            // prefferedPrograms = prefferedPrograms.toString();

            swal({
            title: "Are you sure?",
            text: "You want to apply",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "green",
            confirmButtonText: "Yes, apply!",
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
                        data:{getfirstName:getfirstName,getmiddleName:getmiddleName, getlastName:getlastName, getemailAddress:getemailAddress, gethomeAddress:gethomeAddress, getbirthPlace:getbirthPlace, getbirthDate:getbirthDate, getmobilePhoneNo:getmobilePhoneNo, gettelNo:gettelNo, getSex:getSex,  getAgeApplicant:getAgeApplicant,
                            getcivilStatus:getcivilStatus, getreligion:getreligion, getfatherStatus:getfatherStatus,
                            getfatherName:getfatherName, getfatherAddress:getfatherAddress, getfatherOccupation:getfatherOccupation, getfatherContactNumber:getfatherContactNumber, getfatherEducationalAttainment:getfatherEducationalAttainment, 

                            getmotherStatus:getmotherStatus,
                            getmotherName:getmotherName, getmotherAddress:getmotherAddress, getmotherOccupation:getmotherOccupation, getmotherContactNumber:getmotherContactNumber, getmotherEducationalAttainment:getmotherEducationalAttainment,
                            getspouseName:getspouseName,
                            getspouseStatus:getspouseStatus, getspouseAddress:getspouseAddress,
                            getspouseContactNo:getspouseContactNo, getspouseOccupation:getspouseOccupation, getspouseEmployer:getspouseEmployer, getspouseEmployerAddress:getspouseEmployerAddress, getspouseOccupationLocation:getspouseOccupationLocation, getchildrenName:getchildrenName, getchildrenSex:getchildrenSex, getchildrenAge:getchildrenAge, getchildrenBirthDate:getchildrenBirthDate, getchildrenBirthPlace:getchildrenBirthPlace, getchildrenEducationalAttainment:getchildrenEducationalAttainment, getstudentOccupation:getstudentOccupation, getstudentEmployer:getstudentEmployer, getstudentEmployerAddress:getstudentEmployerAddress, getstudentOccupationLocation:getstudentOccupationLocation, getguardianName:getguardianName, getguardianRelation:getguardianRelation, getguardianAddress:getguardianAddress, getguardianTelNo:getguardianTelNo, getguardianMobileNo:getguardianMobileNo, getguardianEmailAddress:getguardianEmailAddress,getguardianName2:getguardianName2, getguardianRelation2:getguardianRelation2, getguardianAddress2:getguardianAddress2, getguardianTelNo2:getguardianTelNo2, getguardianMobileNo2:getguardianMobileNo2, getguardianEmailAddress2:getguardianEmailAddress2, getelementaryName:getelementaryName, getelementaryType:getelementaryType, getelementaryAward:getelementaryAward, getelementaryAddress:getelementaryAddress, getelementaryRegion:getelementaryRegion, getelementaryGraduated:getelementaryGraduated, 

                            getsecondaryName:getsecondaryName, getsecondaryType:getsecondaryType, getsecondaryAward:getsecondaryAward, getsecondaryAddress:getsecondaryAddress, getsecondaryRegion:getsecondaryRegion, getsecondaryGraduated:getsecondaryGraduated,

                            getcollegeName:getcollegeName, getcollegeType:getcollegeType, getcollegeAward:getcollegeAward, getcollegeAddress:getcollegeAddress, getcollegeRegion:getcollegeRegion, getcollegeGraduated:getcollegeGraduated,

                            getvocationalName:getvocationalName, getvocationalType:getvocationalType, getvocationalAward:getvocationalAward, getvocationalAddress:getvocationalAddress, getvocationalRegion:getvocationalRegion, getvocationalGraduated:getvocationalGraduated,getlearnersData:getlearnersData,getgwAverage:getgwAverage,getGender:getGender,getregionApplicant:getregionApplicant,
                            getfunctionName:getfunctionName,reasonEntryTCC:reasonEntryTCC,shsTrack:shsTrack,shsTrackStrand:shsTrackStrand,reasonEntryTCCOther:reasonEntryTCCOther,knowAboutCollege:knowAboutCollege,knowAboutCollegeOther:knowAboutCollegeOther,otherReligion:otherReligion},

                        success:function(data){
                          var getData = data;

                            if($.trim(getData) == "success"){
                              swal("Applied","Your application has been sent.","success");
                              alert('Your application has been sent.');
                              window.location.href = "../index.php";
                            }
                            else{  
                              swal("Database","Query not executed","error");
                            }
                            // console.log("success");
                          }, 
                        error: function(jqXHR, exception){
                            console.log(jqXHR);
                          }  
                        });
                  }
                  else{
                      swal("Cancelled","No changes occured.","error");
                  }    
              });
          }
                 
    });

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'confirm': {
                equalTo: '#password'
            }
        }
    });

    function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
    }  
</script>
   </body>
</html>