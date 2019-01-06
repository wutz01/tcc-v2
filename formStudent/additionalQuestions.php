<div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
  <h3 class="c-center c-font-uppercase c-font-bold">Additional Questions</h3>
  <div class="c-line-center c-theme-bg"></div>
</div>
<?php
  if(mysqli_num_rows($stmt) > 0){
?>
<div id="for_married" style="display: none;">
<div class="form-group">
  <div class="col-md-6">
    <h4 class="c-center c-font-uppercase c-font-bold">For Married: Information about spouse</h4>
  </div>
</div>

<div class="form-group">
  <label for="spouseName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="spouseName" placeholder="Spouse Name" name="spouseName" value="<?php echo $fld_spouseName ?>">
  </div>

  <div class="col-md-5">
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus"  value="Living">Living
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus2" value="Deceased">Deceased
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus3" value="Separated">Separated
    </label>
  </div>
</div>

<div class="form-group">
  <label for="spouseAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="spouseAddress" placeholder="Spouse Address" name="spouseAddress" value="<?php echo $fld_spouseAddress ?>">
  </div>

  <label for="employerSpouseContact" class="col-md-2 control-label">Contact No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseContact" placeholder="Spouse Contact No." name="employerSpouseContact" value="<?php echo $fld_spouseContactNo ?>">
  </div>
</div>

<div class="form-group">
  <label for="employerSpouseOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseOccupation" placeholder="Employer Address" name="employerSpouseOccupation" value="<?php echo $fld_spouseOccupation ?>">
  </div>

  <label for="employerSpouseEmployer" class="col-md-2 control-label">Employer</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseEmployer" placeholder="Employer Name" name="employerSpouseEmployer" value="<?php echo $fld_spouseEmployer ?>">
  </div>
</div>

<div class="form-group">
  <label for="employerApplicantAddress" class="col-md-2 control-label">Employer's Address</label>
  <div class="col-md-6">
    <input type="text" class="form-control c-square c-theme" id="employerApplicantAddresss" placeholder="Employer Address" name="employerApplicantAddresss" value="<?php echo $fld_spouseEmployerAddress ?>">
  </div>

  <div class="col-md-4">
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse"  value="Local">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse2" value="Abroad">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h4 class="c-center c-font-uppercase c-font-bold">Name of Children</h4>
  </div>
</div>

<div class="col-md-12">
  <table id="tableChildren" class="table table-bordered">
    <thead>
      <tr>
        <th width="25%">Name</th>
        <th width="20%">Sex</th>
        <th width="15%">Birth Date</th>
        <th width="15%">Age</th>
        <th width="20%">Birth Place</th>
        <th width="10%">Educational Attainment</th>
        <th><input type="button" class="btn btn-info" value="+" onclick="addChild()" /></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" id="childrenName[]" name="childrenName" class="form-control childrenName" placeholder="Children Name" value="<?php echo $fld_childrenName ?>"></td>
        <td>
          <div class="col-md-1">
            <label class="radio-inline">
              <input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male
            </label>
            <label>
              <input type="radio" name="childrenSex[]" id="childrenSex2" value="Female">Female
            </label>
          </div>
        </td>
        <td><input type="text" id="childrenBirthDate" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder="" onblur="getAgeChildren()" value="<?php echo $fld_childrenBirthDate ?>"></td>
        <td><input type="text" id="childrenAge" name="childrenAge[]" class="form-control childrenAge" placeholder="" value="<?php echo $fld_childrenAge ?>"></td>
        <td><input type="text" id="childrenBirthPlace" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder="" value="<?php echo $fld_childrenBirthPlace ?>"></td>
        <td colspan="2"><input type="text" id="childrenEducationalAttainment" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder="" value="<?php echo $fld_childrenEducationalAttainment ?>"></td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h4 class="c-center c-font-uppercase c-font-bold">If Employed</h4>
  </div>
</div>

<div class="form-group">
  <label for="occupationApplicant" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="occupationApplicant" placeholder="Occupation" name="occupationApplicant" value="<?php echo $fld_studentOccupation ?>">
  </div>

  <label for="motherEducationalAttainment" class="col-md-2 control-label">Employer</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerApplicant" placeholder="Employer" name="employerApplicant" value="<?php echo $fld_studentEmployer ?>">
  </div>
</div>

<div class="form-group">
  <label for="employerApplicantAddress" class="col-md-2 control-label">Employer Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerApplicantAddress" placeholder="Employer Address" name="employerApplicantAddress" value="<?php echo $fld_studentEmployerAddress ?>">
  </div>

  <div class="col-md-5">
    <!-- <label for="fatherName" class="col-md-4 control-label">Name</label> -->
    <label class="radio-inline">
      <input type="radio" name="localAbroadApplicant" id="localAbroadApplicant"  value="Local">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroadApplicant" id="localAbroadApplicant2" value="Abroad">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h4 class="c-center c-font-uppercase c-font-bold">Primary Guardian's Information</h4>
  </div>
</div>

<div class="form-group">
  <label for="guardianName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName" placeholder="Guardian Name" name="guardianName" required value="<?php echo $fld_guardianName ?>">
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation" placeholder="Guardian Relation" name="guardianRelation" required value="<?php echo $fld_guardianRelation ?>">
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress" placeholder="Guardian Address" name="guardianAddress" value="<?php echo $fld_guardianAddress ?>">
  </div>

  <label for="guardianEmailAddress" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="email" class="form-control c-square c-theme" id="guardianEmailAddress" placeholder="Guardian Email Address" name="guardianEmailAddress" value="<?php echo $fld_guardianEmailAddress ?>">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno" class="col-md-2 control-label">Mobile No.<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno" placeholder="Guardian Mobile No." name="guardianMobileno" value="<?php echo $fld_guardianMobileNo ?>" required>
  </div>

  <label for="employerApplicantAddress" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno" placeholder="Guardian Telephone No." name="guardianTelno" value="<?php echo $fld_guardianTelNo ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h4 class="c-center c-font-uppercase c-font-bold">Secondary Guardian's Information</h4>
  </div>
</div>

<div class="form-group">
  <label for="guardianName2" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName2" placeholder="Guardian Name" name="guardianName2" required value="<?php echo $fld_guardianName2 ?>">
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation2" placeholder="Guardian Relation" name="guardianRelation2" required value="<?php echo $fld_guardianRelation2 ?>">
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress2" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress2" placeholder="Guardian Address" name="guardianAddress2" value="<?php echo $fld_guardianAddress2 ?>">
  </div>

  <label for="guardianEmailAddress2" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="email" class="form-control c-square c-theme" id="guardianEmailAddress2" placeholder="Guardian Email Address" name="guardianEmailAddress2" value="<?php echo $fld_guardianEmailaddress2 ?>">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno2" class="col-md-2 control-label">Mobile No.<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno2" placeholder="Guardian Mobile No." name="guardianMobileno2" value="<?php echo $fld_guardianMobileNo2 ?>" required>
  </div>

  <label for="employerApplicantAddress2" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno2" placeholder="Guardian Telephone No." value="<?php echo $fld_guardianTelNo2 ?>" name="guardianTelno2">
  </div>
</div>
<input type="text" id="applicantLocation" value="<?php echo $fld_spouseOccupationLocation ?>" hidden>
<?php
  } else {
?>
<div id="for_married" style="display: none;">
<div class="form-group">
  <div class="col-md-6">
    <h4 class="c-center c-font-uppercase c-font-bold">For Married: Information about spouse</h4>
  </div>
</div>

<div class="form-group">
  <label for="spouseName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="spouseName" placeholder="Spouse Name" name="spouseName">
  </div>

  <div class="col-md-5">
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus"  value="Living">Living
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus2" value="Deceased">Deceased
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus3" value="Separated">Separated
    </label>
  </div>
</div>

<div class="form-group">
  <label for="spouseAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="spouseAddress" placeholder="Spouse Address" name="spouseAddress">
  </div>

  <label for="employerSpouseContact" class="col-md-2 control-label">Contact No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseContact" placeholder="Spouse Contact No." name="employerSpouseContact">
  </div>
</div>

<div class="form-group">
  <label for="employerSpouseOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseOccupation" placeholder="Employer Address" name="employerSpouseOccupation">
  </div>

  <label for="employerSpouseEmployer" class="col-md-2 control-label">Employer</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseEmployer" placeholder="Employer Name" name="employerSpouseEmployer">
  </div>
</div>

<div class="form-group">
  <label for="employerApplicantAddress" class="col-md-2 control-label">Employer's Address</label>
  <div class="col-md-6">
    <input type="text" class="form-control c-square c-theme" id="employerApplicantAddresss" placeholder="Employer Address" name="employerApplicantAddresss">
  </div>

  <div class="col-md-4">
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse"  value="Local">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse2" value="Abroad">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h4 class="c-center c-font-uppercase c-font-bold">Name of Children</h4>
  </div>
</div>

<div class="col-md-12">
  <table id="tableChildren" class="table table-bordered">
    <thead>
      <tr>
        <th width="25%">Name</th>
        <th width="20%">Sex</th>
        <th width="15%">Birth Date</th>
        <th width="15%">Age</th>
        <th width="20%">Birth Place</th>
        <th width="10%">Educational Attainment</th>
        <th><input type="button" class="btn btn-info" value="+" onclick="addChild()" /></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" id="childrenName[]" name="childrenName" class="form-control childrenName" placeholder="Children Name" value="<?php echo $fld_childrenName ?>"></td>
        <td>
          <div class="col-md-1">
            <label class="radio-inline">
              <input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male
            </label>
            <label>
              <input type="radio" name="childrenSex[]" id="childrenSex2" value="Female">Female
            </label>
          </div>
        </td>
        <td><input type="text" id="childrenBirthDate" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder="" onblur="getAgeChildren()"></td>
        <td><input type="text" id="childrenAge" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>
        <td><input type="text" id="childrenBirthPlace" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>
        <td colspan="2"><input type="text" id="childrenEducationalAttainment" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h4 class="c-center c-font-uppercase c-font-bold">If Employed</h4>
  </div>
</div>

<div class="form-group">
  <label for="occupationApplicant" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="occupationApplicant" placeholder="Occupation" name="occupationApplicant">
  </div>

  <label for="motherEducationalAttainment" class="col-md-2 control-label">Employer</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerApplicant" placeholder="Employer" name="employerApplicant">
  </div>
</div>

<div class="form-group">
  <label for="employerApplicantAddress" class="col-md-2 control-label">Employer Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerApplicantAddress" placeholder="Employer Address" name="employerApplicantAddress">
  </div>

  <div class="col-md-5">
    <!-- <label for="fatherName" class="col-md-4 control-label">Name</label> -->
    <label class="radio-inline">
      <input type="radio" name="localAbroadApplicant" id="localAbroadApplicant"  value="Local">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroadApplicant" id="localAbroadApplicant2" value="Abroad">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h4 class="c-center c-font-uppercase c-font-bold">Primary Guardian's Information</h4>
  </div>
</div>

<div class="form-group">
  <label for="guardianName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName" placeholder="Guardian Name" name="guardianName" required value="<?php echo $fld_guardianName ?>">
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation" placeholder="Guardian Relation" name="guardianRelation" required>
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress" placeholder="Guardian Address" name="guardianAddress">
  </div>

  <label for="guardianEmailAddress" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="email" class="form-control c-square c-theme" id="guardianEmailAddress" placeholder="Guardian Email Address" name="guardianEmailAddress">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno" class="col-md-2 control-label">Mobile No.<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno" placeholder="Guardian Mobile No." name="guardianMobileno" required>
  </div>

  <label for="employerApplicantAddress" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno" placeholder="Guardian Telephone No." name="guardianTelno">
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h4 class="c-center c-font-uppercase c-font-bold">Secondary Guardian's Information</h4>
  </div>
</div>

<div class="form-group">
  <label for="guardianName2" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName2" placeholder="Guardian Name" name="guardianName2" required>
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation2" placeholder="Guardian Relation" name="guardianRelation2" required>
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress2" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress2" placeholder="Guardian Address" name="guardianAddress2">
  </div>

  <label for="guardianEmailAddress2" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="email" class="form-control c-square c-theme" id="guardianEmailAddress2" placeholder="Guardian Email Address" name="guardianEmailAddress2">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno2" class="col-md-2 control-label">Mobile No.<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno2" placeholder="Guardian Mobile No." name="guardianMobileno2" required>
  </div>

  <label for="employerApplicantAddress2" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno2" placeholder="Guardian Telephone No." name="guardianTelno2">
  </div>
</div>
<?php } ?>
<!-- <input type="text" id="spouseStatusCheck" value="<?php echo $fld_spouseStatus ?>" hidden>
<input type="text" id="spouseLocationStatusCheck" value="<?php echo $fld_spouseOccupationLocation ?>" hidden>
<input type="text" id="childrenSexStatusCheck" value="<?php echo $fld_childrenSex ?>" hidden> -->

<div class="row">
  <div class="col-md-12">
    <div class="form-group c-margin-t-40">
        <div class="col-sm-offset-9 col-md-4">
          <button class="btn btn-primary" type="button" onclick="cancel()">Cancel</button>
          <button type="button" class="btn btn-info" onclick="nextStep()">Next</button>
          <button type="button" class="btn btn-danger" onclick="prevStep()">Back</button>
        </div>
    </div>
  </div>
</div>
