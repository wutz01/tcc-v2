<div class="tab-pane active" id="tab_2_1_content">
  <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
		<h3 class="c-center c-font-uppercase c-font-bold">Personal Information</h3>
		<div class="c-line-center c-theme-bg"></div>
	</div>
<?php
$fld_studentno = $_GET['id'];

  $query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$fld_studentno'";
  $stmt = mysqli_query($conn, $query);
  if(mysqli_num_rows($stmt) > 0){
?>
  <div class="row">
    <div class="col-md-22">
      <div class="form-group">
          <label for="Name" class="col-md-2 control-label">Name of Applicant<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="firstName" placeholder="Firstname" name="firstName" value="<?php echo $fld_firstName ?>" required>
          </div>
          <div hidden>
            <input type="text" name="studentNo" value="<?php echo $fld_studentNo ?>">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" id="middleName" placeholder="Middlename" name="middleName" value="<?php echo $fld_middleName ?>" required>
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" id="lastName" placeholder="Lastname" name="lastName" value="<?php echo $fld_lastName ?>" required>
          </div>
      </div>

      <div class="form-group">
          <label for="homeAddress" class="col-md-2 control-label">Home Address<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="homeAddress" placeholder="Home Address" name="homeAddress" value="<?php echo $fld_homeAddress ?>" required>
          </div>

          <label for="emailAddress" class="col-md-2 control-label">Email Address<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="email" class="form-control" id="emailAddress" placeholder="Email Address" name="emailAddress" value="<?php echo $fld_emailAddress ?>" required>
          </div>
      </div>

      <div class="form-group">
          <label for="birthPlace" class="col-md-2 control-label">Birth Place<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control c-square c-theme" id="birthPlace" placeholder="Birth Place" name="birthPlace" value="<?php echo $fld_birthPlace ?>" required>
          </div>

          <label for="birthDate" class="col-md-2 control-label">Birthdate<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="date" class="form-control c-square c-theme" id="birthDate" placeholder="Birthdate" name="birthDate" value="<?php echo $fld_birthDate ?>" onblur="getAge()" required>
          </div>
      </div>

      <div class="form-group">
          <label for="mobileNo" class="col-md-2 control-label">Mobile Phone No.<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control c-square c-theme" id="mobileNo" placeholder="Mobile No" name="mobileNo" value="<?php echo $fld_mobilePhoneNo ?>" required>
          </div>

          <label for="telephoneNo" class="col-md-2 control-label">Telephone No.</label>
          <div class="col-md-3">
            <input type="text" class="form-control c-square c-theme" id="telephoneNo" placeholder="Telephone No." value="<?php echo $fld_telNo ?>" name="telephoneNo">
          </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">Sex<span style="color:red; font-size: 18px;">*</span></label>
        <div class="col-md-3">
          <label class="radio-inline">
            <input type="radio" name="sexApplicant" id="sexApplicant"  value="Male">Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="sexApplicant" id="sexApplicant2" value="Female">Female
          </label>
        </div>

        <label for="gender" class="col-md-1 control-label">Gender<span style="color:red; font-size: 18px;">*</span></label>
        <div class="col-md-2">
          <select class="form-control c-square c-theme" id="gender" name="gender">
            <option value="NotSpecified">Not Specified</option>
            <option value="Gay">Gay</option>
            <option value="Lesbian">Lesbian</option>
            <option value="Bisexual">Bisexual</option>
            <option value="Transgender">Transgender</option>
          </select>
        </div>

        <label for="region" class="col-md-1 control-label">Region</label>
        <div class="col-md-2">
          <select class="form-control c-square c-theme" id="region" name="region">
            <option value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
            <option value="CAR">CAR (Cordillera Administrative Region)</option>
            <option value="NCR">NCR (National Capital Region)</option>
            <option value="Region1">Region 1 (Ilocos Region)</option>
            <option value="Region2">Region 2 (Cagayan Valley)</option>
            <option value="Region3">Region 3 (Central Luzon)</option>
            <option value="Region4A">Region 4A (CALABARZON)</option>
            <option value="Region4B">Region 4B (MIMAROPA)</option>
            <option value="Region5">Region 5 (Bicol Region)</option>
            <option value="Region6">Region 6 (Western Visayas)</option>
            <option value="Region7">Region 7 (Central Visayas)</option>
            <option value="Region8">Region 8 (Eastern Visayas)</option>
            <option value="Region9">Region 9 (Zamboanga Peninsula)</option>
            <option value="Region10">Region 10 (Northern Mindanao)</option>
            <option value="Region11">Region 11 (Davao Region)</option>
            <option value="Region12">Region 12 (SOCCSKSARGEN)</option>
            <option value="Region13">Region 13 (Caraga Region)</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">Civil Status</label>
        <div class="col-md-3">
          <label class="radio-inline">
            <input type="radio" name="civilStatus" id="civilStatus" value="Single">Single
          </label>
          <label class="radio-inline">
            <input type="radio" name="civilStatus" id="civilStatus2" value="Married">Married
          </label>
        </div>

        <label for="age" class="col-md-1 control-label">Age</label>
        <div class="col-md-1">
          <input type="text" class="form-control c-square c-theme" id="age" placeholder="Age" name="age" value="<?php echo $fld_ageApplicant ?>">
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
          <input type="text" class="form-control c-square c-theme" id="otherReligion" placeholder="Other" name="otherReligion" value="<?php echo $fld_otherReligion ?>" style="display: none">
        </div>
      </div>
<input type="text" id="sexStatusCheck" value="<?php echo $fld_sex ?>" hidden>
<input type="text" id="civilStatusCheck" value="<?php echo $fld_civilStatus ?>" hidden>
<input type="text" id="religionStatus" value="<?php echo $fld_religion ?>" hidden>
<input type="text" id="regionStatus" value="<?php echo $fld_regionApplicant ?>" hidden>
<input type="text" id="genderApplicant" value="<?php echo $fld_gender ?>" hidden>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group c-margin-t-40">
				   	<div class="col-sm-offset-9 col-md-4">
              <button class="btn btn-primary" type="button" onclick="cancel()">Cancel</button>
				   		<button type="button" class="btn btn-info" onclick="nextStep()">Next</button>
				  	</div>
				</div>
      </div>
    </div>
  </div> <!-- end row -->
<?php
  } else {
    $queryUser = "SELECT * FROM tbl_student WHERE fld_studentNo = '$fld_studentno'";
    $stmtUser = mysqli_query($conn, $queryUser);
    $resUser = mysqli_fetch_assoc($stmtUser);
    extract($resUser);
?>
  <div class="row">
    <div class="col-md-22">
      <div class="form-group">
          <label for="Name" class="col-md-2 control-label">Name of Applicant<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="firstName" placeholder="Firstname" name="firstName" value="<?php echo $fld_firstName ?>" required>
          </div>
            <input type="hidden" name="studentNo" value="<?php echo $fld_studentno ?>">
          <div class="col-md-3">
            <input type="text" class="form-control" id="middleName" placeholder="Middlename" name="middleName" value="<?php echo $fld_middleName ?>" required>
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" id="lastName" placeholder="Lastname" name="lastName" value="<?php echo $fld_lastName ?>" required>
          </div>
      </div>

      <div class="form-group">
          <label for="homeAddress" class="col-md-2 control-label">Home Address<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="homeAddress" placeholder="Home Address" name="homeAddress" value="<?php echo $fld_homeAddress ?>" required>
          </div>

          <label for="emailAddress" class="col-md-2 control-label">Email Address<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="email" class="form-control" id="emailAddress" placeholder="Email Address" name="emailAddress" required>
          </div>
      </div>

      <div class="form-group">
          <label for="birthPlace" class="col-md-2 control-label">Birth Place<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control c-square c-theme" id="birthPlace" placeholder="Birth Place" name="birthPlace" required>
          </div>

          <label for="birthDate" class="col-md-2 control-label">Birthdate<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-3">
            <input type="date" class="form-control c-square c-theme" id="birthDate" placeholder="Birthdate" name="birthDate" value="<?php echo $fld_birthDate ?>" onblur="getAge()" required>
          </div>
      </div>

      <div class="form-group">
          <label for="mobileNo" class="col-md-2 control-label">Mobile Phone No.<span style="color:red; font-size: 18px;">*</span></label>
          <div class="col-md-4">
            <input type="text" class="form-control c-square c-theme" id="mobileNo" placeholder="Mobile No" name="mobileNo" value="<?php echo $fld_mobilePhoneNo ?>" required>
          </div>

          <label for="telephoneNo" class="col-md-2 control-label">Telephone No.</label>
          <div class="col-md-3">
            <input type="text" class="form-control c-square c-theme" id="telephoneNo" placeholder="Telephone No." name="telephoneNo">
          </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">Sex<span style="color:red; font-size: 18px;">*</span></label>
        <div class="col-md-3">
          <label class="radio-inline">
            <input type="radio" name="sexApplicant" id="sexApplicant"  value="Male">Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="sexApplicant" id="sexApplicant2" value="Female">Female
          </label>
        </div>

        <label for="gender" class="col-md-1 control-label">Gender<span style="color:red; font-size: 18px;">*</span></label>
        <div class="col-md-2">
          <select class="form-control c-square c-theme" id="gender" name="gender">
            <option value="NotSpecified">Not Specified</option>
            <option value="Gay">Gay</option>
            <option value="Lesbian">Lesbian</option>
            <option value="Bisexual">Bisexual</option>
            <option value="Transgender">Transgender</option>
          </select>
        </div>

        <label for="region" class="col-md-1 control-label">Region</label>
        <div class="col-md-2">
          <select class="form-control c-square c-theme" id="region" name="region">
            <option value="ARMM">ARMM (Autonomous Region in Muslim Mindanao)</option>
            <option value="CAR">CAR (Cordillera Administrative Region)</option>
            <option value="NCR">NCR (National Capital Region)</option>
            <option value="Region1">Region 1 (Ilocos Region)</option>
            <option value="Region2">Region 2 (Cagayan Valley)</option>
            <option value="Region3">Region 3 (Central Luzon)</option>
            <option value="Region4A">Region 4A (CALABARZON)</option>
            <option value="Region4B">Region 4B (MIMAROPA)</option>
            <option value="Region5">Region 5 (Bicol Region)</option>
            <option value="Region6">Region 6 (Western Visayas)</option>
            <option value="Region7">Region 7 (Central Visayas)</option>
            <option value="Region8">Region 8 (Eastern Visayas)</option>
            <option value="Region9">Region 9 (Zamboanga Peninsula)</option>
            <option value="Region10">Region 10 (Northern Mindanao)</option>
            <option value="Region11">Region 11 (Davao Region)</option>
            <option value="Region12">Region 12 (SOCCSKSARGEN)</option>
            <option value="Region13">Region 13 (Caraga Region)</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">Civil Status</label>
        <div class="col-md-3">
          <label class="radio-inline">
            <input type="radio" name="civilStatus" id="civilStatus" value="Single">Single
          </label>
          <label class="radio-inline">
            <input type="radio" name="civilStatus" id="civilStatus2" value="Married">Married
          </label>
        </div>

        <label for="age" class="col-md-1 control-label">Age</label>
        <div class="col-md-1">
          <input type="text" class="form-control c-square c-theme" id="age" placeholder="Age" name="age">
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
          <input type="text" class="form-control c-square c-theme" id="otherReligion" placeholder="Other" name="otherReligion" style="display: none">
        </div>
      </div>
<!-- <input type="text" id="sexStatusCheck" value="<?php echo $fld_sex ?>" hidden>
<input type="text" id="civilStatusCheck" value="<?php echo $fld_civilStatus ?>" hidden>
<input type="text" id="religionStatus" value="<?php echo $fld_religion ?>" hidden>
<input type="text" id="regionStatus" value="<?php echo $fld_regionApplicant ?>" hidden>
<input type="text" id="genderApplicant" value="<?php echo $fld_gender ?>" hidden> -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group c-margin-t-40">
            <div class="col-sm-offset-9 col-md-4">
              <button class="btn btn-primary" type="button" onclick="cancel()">Cancel</button>
              <button type="button" class="btn btn-info" onclick="nextStep()">Next</button>
            </div>
        </div>
      </div>
    </div>
  </div> 
<?php } ?>
</div> <!-- end tab -->
