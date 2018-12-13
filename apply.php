<?php
  include('templates/header.php');
  include('templates/top-nav.php');
  include('templates/modals.php');
  include('templates/right-sidebar.php');
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <div class="c-content-box c-size-md c-bg-white">
  	<div class="container" style="padding-top: 35px">
  		<!-- <div class="c-content-title-1">
  			<h3 class="c-center c-font-uppercase c-font-bold">Form Controls</h3>
  			<div class="c-line-center c-theme-bg"></div>
  			<p class="c-center">Multiple Form Control options</p>
  		</div> -->
  		<div class="row">
  			<div class="col-md-12">
  				<div class="c-content-panel">
  					<div class="c-body">
              <form class="form-horizontal" method="POST" action="api/apply.php" id="apply-frm">
                <!-- page 1 -->
        				<div class="c-content-tab-1 c-theme c-margin-t-30">
        					<div class="clearfix">
        						<ul class="nav nav-tabs c-font-sbold pull-right">
        							<li class="active"><a href="#tab_2_1_content" data-toggle="tab" class="c-border-green">Personal Information</a></li>
        							<li><a href="#tab_2_2_content" data-toggle="tab" class="c-border-green">Family Background</a></li>
        							<li><a href="#tab_2_3_content" data-toggle="tab" class="c-border-green">Additional Questions</a></li>
        							<li><a href="#tab_2_4_content" data-toggle="tab" class="c-border-green">Academic Information</a></li>
        						</ul>
        					</div>
        					<div class="tab-content c-bordered c-padding-lg">
        						<div class="tab-pane active" id="tab_2_1_content">
                      <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
          							<h3 class="c-center c-font-uppercase c-font-bold">Personal Information</h3>
          							<div class="c-line-center c-theme-bg"></div>
          						</div>

                      <div class="row">

                        <div class="col-md-21">
                          <div class="form-group">
                              <label for="Name" class="col-md-2 control-label">Name of Applicant</label>
                              <div class="col-md-3">
                                <input type="text" class="form-control c-square c-theme" id="firstName" placeholder="Firstname" name="firstName">
                              </div>
                              <div class="col-md-3">
                                <input type="text" class="form-control c-square c-theme" id="middleName" placeholder="Middlename" name="middleName">
                              </div>
                              <div class="col-md-3">
                                <input type="text" class="form-control c-square c-theme" id="lastName" placeholder="Lastname" name="lastName">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="homeAddress" class="col-md-2 control-label">Home Address</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control c-square c-theme" id="homeAddress" placeholder="Home Address" name="homeAddress">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="emailAddress" class="col-md-2 control-label">Email Address</label>
                              <div class="col-md-9">
                                <input type="email" class="form-control c-square c-theme" id="emailAddress" placeholder="Email Address" name="emailAddress">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="birthPlace" class="col-md-2 control-label">Birth Place</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control c-square c-theme" id="birthPlace" placeholder="Birth Place" name="birthPlace">
                              </div>

                              <label for="birthDate" class="col-md-2 control-label">Birthdate</label>
                              <div class="col-md-3">
                                <input type="date" class="form-control c-square c-theme" id="birthDate" placeholder="Birthdate" name="birthDate">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="mobileNo" class="col-md-2 control-label">Mobile Phone No.</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control c-square c-theme" id="mobileNo" placeholder="Mobile No" name="mobileNo">
                              </div>

                              <label for="telephoneNo" class="col-md-2 control-label">Telephone No.</label>
                              <div class="col-md-3">
                                <input type="text" class="form-control c-square c-theme" id="telephoneNo" placeholder="Telephone No." name="telephoneNo">
                              </div>
                          </div>

                          <div class="form-group">
                            <label  class="col-md-2 control-label">Sex</label>
                            <div class="col-md-2">
                              <label class="radio-inline">
                                <input type="radio" name="sex" id="sex"  value="Male">Male
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="sex" id="sex" value="Female">Female
                              </label>
                            </div>

                            <!-- <div class="form-group"> -->
                            <label for="inputPassword3" class="col-md-1 control-label">Gender</label>
                            <div class="col-md-2">
                              <select class="form-control c-square c-theme" id="gender" name="gender">
                                <option value="Not Specified">Not Specified</option>
                                <option value="Gay">Gay</option>
                                <option value="Lesbian">Lesbian</option>
                                <option value="Bisexual">Bisexual</option>
                                <option value="Transgender">Transgender</option>
                              </select>
                            </div>
                            <!-- </div> -->

                            <label for="inputPassword3" class="col-md-1 control-label">Region</label>
                            <div class="col-md-3">
                              <select class="form-control c-square c-theme" id="region" name="region">
                                <option value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
                                <option value="CAR">CAR (Cordillera Administrative Region)</option>
                                <option value="NCR">NCR (National Capital Region)</option>
                                <option value="Region 1">Region 1 (Ilocos Region)</option>
                                <option value="Region 2">Region 2 (Cagayan Valley)</option>
                                <option value="Region 3">Region 3 (Central Luzon)</option>
                                <option value="Region 4A">Region 4A (CALABARZON)</option>
                                <option value="Region 4B">Region 4B (MIMAROPA)</option>
                                <option value="Region 5">Region 5 (Bicol Region)</option>
                                <option value="Region 6">Region 6 (Western Visayas)</option>
                                <option value="Region 7">Region 7 (Central Visayas)</option>
                                <option value="Region 8">Region 8 (Eastern Visayas)</option>
                                <option value="Region 9">Region 9 (Zamboanga Peninsula)</option>
                                <option value="Region 10">Region 10 (Northern Mindanao)</option>
                                <option value="Region 11">Region 11 (Davao Region)</option>
                                <option value="Region 12">Region 12 (SOCCSKSARGEN)</option>
                                <option value="Region 13">Region 13 (Caraga Region)</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label  class="col-md-2 control-label">Civil Status</label>
                            <div class="col-md-2">
                              <label class="radio-inline">
                                <input type="radio" name="civilStatus" id="civilStatus" value="Single">Single
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="civilStatus" id="civilStatus" value="Married">Married
                              </label>
                            </div>

                            <label for="age" class="col-md-1 control-label">Age</label>
                            <div class="col-md-1">
                              <input type="email" class="form-control c-square c-theme" id="age" placeholder="Age" name="age" disabled>
                            </div>

                            <label for="age" class="col-md-1 control-label">Religion</label>
                            <div class="col-xs-2">
                              <select class="form-control c-square c-theme" id="religion" name="religion">
                                <option value="Roman Catholic">Roman Catholic</option>
                                <option value="Protestants">Protestants</option>
                                <option value="7th Day Adventist">7th Day Adventist</option>
                                <option value="Muslims">Muslims</option>
                                <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                <option value="Buddhists">Buddhists</option>
                                <option value="Jehovah's Witness">Jehovah's Witness</option>
                                <option value="Other">Other (please specify)</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <input type="email" class="form-control c-square c-theme" id="otherReligion" placeholder="Other" name="otherReligion">
                            </div>
                          </div>
                          
                        </div>


                        <!-- <div class="col-md-6">
                          <div class="form-group">
            							   	<label for="inputEmail3" class="col-md-4 control-label">Email</label>
            							   	<div class="col-md-6">
            							   		<input type="email" class="form-control c-square c-theme" id="inputEmail3" placeholder="Email" name="email">
            							  	</div>
            							</div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
            							   	<label for="inputPassword3" class="col-md-4 control-label">Password</label>
            							   	<div class="col-md-6">
            							   		<input type="password" class="form-control  c-square c-theme" id="inputPassword3" placeholder="Password" name="password">
            							   	</div>
            							</div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
            							   	<label for="inputPassword3" class="col-md-4 control-label">Dropdown</label>
            							   	<div class="col-md-6">
            							   		<select class="form-control c-square c-theme">
            									  	<option value="1">Option 1</option>
            								  		<option value="2">Option 2</option>
            									  	<option value="3">Option 3</option>
            									  	<option value="4">Option 4</option>
            									  	<option value="5">Option 5</option>
            									</select>
            							    </div>
            							</div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label  class="col-md-4 control-label">Inline Checkboxes</label>
                              <div class="col-md-6">
                                <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                              </label>
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label  class="col-md-4 control-label">Inline Radio Buttons</label>
                              <div class="col-md-6">
                                <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
                              </label>
                              </div>
                          </div>
                        </div> -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group c-margin-t-40">
              							   	<div class="col-sm-offset-9 col-md-4">
              							   		<button type="button" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Next</button>
              							  	</div>
              							</div>
                          </div>
                        </div>
                      </div> <!-- end row -->
        						</div> <!-- end tab -->
        						<div class="tab-pane" id="tab_2_2_content">
        							<p>
        								Lorem ipsum dolor sit amet, exerci et tation diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
        							<p>
        								Lorem ipsum dolor sit amet, consectetuer tation diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group c-margin-t-40">
                              <div class="col-sm-offset-9 col-md-4">
                                <button type="button" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Next</button>
                                <button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Back</button>
                              </div>
                          </div>
                        </div>
                      </div>
        						</div>
        						<div class="tab-pane" id="tab_2_3_content">
        							<p>
        								Lorem ipsum dolor sit amet, consectetuer adipiscing diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
        							<p>
        								Lorem ipsum dolor sit amet, consectetuer adipiscing elit,  nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group c-margin-t-40">
                              <div class="col-sm-offset-9 col-md-4">
                                <button type="button" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Next</button>
                                <button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Back</button>
                              </div>
                          </div>
                        </div>
                      </div>
        						</div>
        						<div class="tab-pane" id="tab_2_4_content">
        							<p>
        								Lorem ipsum dolor sit amet, consectetuer adipiscing diam nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
        							<p>
        								Lorem ipsum dolor sit amet, consectetuer adipiscing elit,  nisl ut aliquip ex ea commodo consequat euismod tincidunt ut laoreet dolore magna aluam
        								sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna sed elit diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
        							</p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group c-margin-t-40">
                              <div class="col-sm-offset-9 col-md-4">
                                <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Apply</button>
                                <button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Back</button>
                              </div>
                          </div>
                        </div>
                      </div>
        						</div>
        					</div>
        				</div>
  						</form>
  					</div>
  				</div>
        </div>
      </div>
    </div>
</div>
<!-- END: PAGE CONTAINER -->
<?php
  include('templates/footer.php');
?>
<script src="assets/plugins/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
  $(function () {
    $(".all-nav").removeClass('c-active')
    $(".apply-nav").addClass('c-active')

    $('#apply-frm').ajaxForm({
      dataType: 'json',
      success: (o) => {
        console.log(o)
      },
      beforeSubmit: (o) => {
        // notify('sending data...', 'info')
        alert('running this alert before sending data')
      }
    })
  })
</script>
