<div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
  <h3 class="c-center c-font-uppercase c-font-bold">Additional Questions</h3>
  <div class="c-line-center c-theme-bg"></div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <h2 class="c-center c-font-uppercase c-font-bold">For Married: Information about spouse</h2>
  </div>
</div>

<div class="form-group">
  <label for="spouseName" class="col-md-2 control-label">Name</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="spouseName" placeholder="Spouse Name" name="spouseName">
  </div>

  <div class="col-md-5">
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus"  value="Living">Living
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus" value="Deceased">Deceased
    </label>
    <label class="radio-inline">
      <input type="radio" name="marriedStatus" id="marriedStatus" value="Separated">Separated
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
  <label for="employerOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerOccupation" placeholder="Employer Address" name="employerOccupation">
  </div>

  <label for="employerSpouseEmployer" class="col-md-2 control-label">Employer</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseEmployer" placeholder="Employer Name" name="employerSpouseEmployer">
  </div>
</div>

<div class="form-group">
  <label for="employerApplicantAddress" class="col-md-2 control-label">Employer's Address</label>
  <div class="col-md-6">
    <input type="text" class="form-control c-square c-theme" id="employerSpouseAddress" placeholder="Employer Address" name="employerApplicantAddress">
  </div>

  <div class="col-md-4">
    <!-- <label for="fatherName" class="col-md-4 control-label">Name</label> -->
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse"  value="Living">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroadSpouse" id="localAbroadSpouse" value="Deceased">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h2 class="c-center c-font-uppercase c-font-bold">Name of Children</h2>
  </div>
</div>

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
        <th><input type="button" class="btn btn-info" value="+" /></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder="Children Name"></td>
        <td>
          <div class="col-md-1">
            <label class="radio-inline">
              <input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male
              <input type="radio" name="childrenSex[]" id="childrenSex" value="Female">Female
            </label>
          </div>
        </td>
        <td><input type="text" id="childrenAge[]" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>
        <td><input type="date" id="childrenBirthDate[]" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder=""></td>
        <td><input type="text" id="childrenBirthPlace[]" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>
        <td colspan="2"><input type="text" id="childrenEducationalAttainment[]" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="form-group">
  <div class="col-md-3">
    <h2 class="c-center c-font-uppercase c-font-bold">If Employed</h2>
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
      <input type="radio" name="localAbroad" id="localAbroad"  value="Living">Local
    </label>
    <label class="radio-inline">
      <input type="radio" name="localAbroad" id="localAbroad" value="Deceased">Abroad
    </label>
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h2 class="c-center c-font-uppercase c-font-bold">Primary Guardian's Information</h2>
  </div>
</div>

<div class="form-group">
  <label for="guardianName" class="col-md-2 control-label">Name</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName" placeholder="Guardian Name" name="guardianName">
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation" placeholder="Guardian Relation" name="guardianRelation">
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress" placeholder="Guardian Address" name="guardianAddress">
  </div>

  <label for="guardianEmailAddress" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianEmailAddress" placeholder="Guardian Email Address" name="guardianEmailAddress">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno" class="col-md-2 control-label">Mobile No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno" placeholder="Guardian Mobile No." name="guardianMobileno">
  </div>

  <label for="employerApplicantAddress" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno" placeholder="Guardian Telephone No." name="guardianTelno">
  </div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h2 class="c-center c-font-uppercase c-font-bold">Secondary Guardian's Information</h2>
  </div>
</div>

<div class="form-group">
  <label for="guardianName2" class="col-md-2 control-label">Name</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianName2" placeholder="Guardian Name" name="guardianName2">
  </div>

  <label for="guardianRelation" class="col-md-2 control-label">Relationship</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianRelation2" placeholder="Guardian Relation" name="guardianRelation2">
  </div>
</div>

<div class="form-group">
  <label for="guardianAddress2" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianAddress2" placeholder="Guardian Address" name="guardianAddress2">
  </div>

  <label for="guardianEmailAddress2" class="col-md-2 control-label">Email Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianEmailAddress2" placeholder="Guardian Email Address" name="guardianEmailAddress2">
  </div>
</div>

<div class="form-group">
  <label for="guardianMobileno2" class="col-md-2 control-label">Mobile No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianMobileno2" placeholder="Guardian Mobile No." name="guardianMobileno2">
  </div>

  <label for="employerApplicantAddress2" class="col-md-2 control-label">Telephone No.</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="guardianTelno2" placeholder="Guardian Telephone No." name="guardianTelno2">
  </div>
</div>

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