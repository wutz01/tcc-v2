<div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
  <h3 class="c-center c-font-uppercase c-font-bold">Family Background</h3>
  <div class="c-line-center c-theme-bg"></div>
</div>
<?php
  if(mysqli_num_rows($stmt) > 0){
?>
<div class="form-group">
  <div class="col-md-6 pull">
    <div style="text-align:center">
      <label class="radio-inline">
        <input type="radio" name="fatherStatus" id="fatherStatus"  value="Living">Living
      </label>
      <label class="radio-inline">
        <input type="radio" name="fatherStatus" id="fatherStatus2" value="Deceased">Deceased
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div style="text-align:center">
      <label class="radio-inline">
        <input type="radio" name="motherStatus" id="motherStatus"  value="Living">Living
      </label>
      <label class="radio-inline">
        <input type="radio" name="motherStatus" id="motherStatus2" value="Deceased">Deceased
      </label>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <h2 class="c-center c-font-uppercase c-font-bold">Father</h2>
  </div>

  <div class="col-md-6">
    <h2 class="c-center c-font-uppercase c-font-bold">Mother</h2>
  </div>
</div>

<div class="form-group">
  <label for="fatherName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherName" placeholder="Father Name" name="fatherName" value="<?php echo $fld_fatherName ?>" required>
  </div>

  <label for="motherName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherName" placeholder="Mother Name" name="motherName" value="<?php echo $fld_motherName ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="fatherAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherAddress" placeholder="Address" value="<?php echo $fld_fatherAddress ?>" name="fatherAddress">
  </div>

  <label for="motherAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherAddress" placeholder="Address" value="<?php echo $fld_motherAddress ?>" name="motherAddress">
  </div>
</div>

<div class="form-group">
  <label for="fatherOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherOccupation" placeholder="Occupation" value="<?php echo $fld_fatherOccupation ?>" name="fatherOccupation">
  </div>

  <label for="motherOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherOccupation" placeholder="Occupation" value="<?php echo $fld_motherOccupation ?>" name="motherOccupation">
  </div>
</div>

<div class="form-group">
  <label for="fatherContact" class="col-md-2 control-label">Contact Number</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherContact" placeholder="Contact Number" value="<?php echo $fld_fatherContactNumber ?>" name="fatherContact">
  </div>

  <label for="motherContact" class="col-md-2 control-label">Contact Number</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherContact" placeholder="Contact Number" value="<?php echo $fld_motherContactNumber ?>" name="motherContact">
  </div>
</div>

<div class="form-group">
  <label for="fatherEducationalAttainment" class="col-md-2 control-label">Educational Attainment</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherEducationalAttainment" value="<?php echo $fld_fatherEducationalAttainment ?>" placeholder="Educational Attainment" name="fatherEducationalAttainment">
  </div>

  <label for="motherEducationalAttainment" class="col-md-2 control-label">Educational Attainment</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherEducationalAttainment" value="<?php echo $fld_motherEducationalAttainment ?>" placeholder="Educational Attainment" name="motherEducationalAttainment">
  </div>
</div>

<input type="text" id="fatherStatusCheck" value="<?php echo $fld_fatherStatus ?>" hidden>
<input type="text" id="motherStatusCheck" value="<?php echo $fld_motherStatus ?>" hidden>
<?php
  } else {
?>
<div class="form-group">
  <div class="col-md-6 pull">
    <div style="text-align:center">
      <label class="radio-inline">
        <input type="radio" name="fatherStatus" id="fatherStatus"  value="Living">Living
      </label>
      <label class="radio-inline">
        <input type="radio" name="fatherStatus" id="fatherStatus2" value="Deceased">Deceased
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div style="text-align:center">
      <label class="radio-inline">
        <input type="radio" name="motherStatus" id="motherStatus"  value="Living">Living
      </label>
      <label class="radio-inline">
        <input type="radio" name="motherStatus" id="motherStatus2" value="Deceased">Deceased
      </label>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <h2 class="c-center c-font-uppercase c-font-bold">Father</h2>
  </div>

  <div class="col-md-6">
    <h2 class="c-center c-font-uppercase c-font-bold">Mother</h2>
  </div>
</div>

<div class="form-group">
  <label for="fatherName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherName" placeholder="Father Name" name="fatherName" required>
  </div>

  <label for="motherName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherName" placeholder="Mother Name" name="motherName" required>
  </div>
</div>

<div class="form-group">
  <label for="fatherAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherAddress" placeholder="Address" name="fatherAddress">
  </div>

  <label for="motherAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherAddress" placeholder="Address" name="motherAddress">
  </div>
</div>

<div class="form-group">
  <label for="fatherOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherOccupation" placeholder="Occupation" name="fatherOccupation">
  </div>

  <label for="motherOccupation" class="col-md-2 control-label">Occupation</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherOccupation" placeholder="Occupation" name="motherOccupation">
  </div>
</div>

<div class="form-group">
  <label for="fatherContact" class="col-md-2 control-label">Contact Number</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherContact" placeholder="Contact Number" name="fatherContact">
  </div>

  <label for="motherContact" class="col-md-2 control-label">Contact Number</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherContact" placeholder="Contact Number" name="motherContact">
  </div>
</div>

<div class="form-group">
  <label for="fatherEducationalAttainment" class="col-md-2 control-label">Educational Attainment</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="fatherEducationalAttainment" placeholder="Educational Attainment" name="fatherEducationalAttainment">
  </div>

  <label for="motherEducationalAttainment" class="col-md-2 control-label">Educational Attainment</label>
  <div class="col-md-4">
    <input type="text" class="form-control c-square c-theme" id="motherEducationalAttainment" placeholder="Educational Attainment" name="motherEducationalAttainment">
  </div>
</div>
<?php } ?>

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
