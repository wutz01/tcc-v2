<div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
  <h3 class="c-center c-font-uppercase c-font-bold">Academic Information</h3>
  <div class="c-line-center c-theme-bg"></div>
</div>
<hr><br>

<div class="form-group">
  <div class="col-md-2">
    <h4 class="c-center c-font-uppercase c-font-bold">Elementary</h4>
  </div>
</div>

<div class="form-group">
  <label for="elementarySchoolName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="elementarySchoolName" placeholder="School Name" name="elementarySchoolName" required value="<?php echo $fld_elementaryName ?>">
  </div>

  <div class="col-md-1">
    <label class="radio-inline" required>
      <input type="radio" name="elementarySchoolType" id="elementarySchoolType"  value="Public">Public
      <input type="radio" name="elementarySchoolType" id="elementarySchoolType2" value="Private">Private
    </label>
  </div>

  <label for="elementaryAward" class="col-md-2 control-label">Award</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="elementaryAward" placeholder="Award" name="elementaryAward" value="<?php echo $fld_elementaryAward ?>">
  </div>
</div>

<div class="form-group">
  <label for="elementaryAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="elementaryAddress" placeholder="Address" name="elementaryAddress" value="<?php echo $fld_elementaryAddress ?>">
  </div>

  <label for="elementaryRegion" class="col-md-1 control-label">Region</label>
  <div class="col-md-3">
	  <select class="form-control c-square c-theme" id="elementaryRegion" name="elementaryRegion">
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

  <label for="elementaryYearGrad" class="col-md-1 control-label">Year Graduated<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-2">
    <input type="number" class="form-control c-square c-theme" id="elementaryYearGrad" placeholder="Year Graduated" name="elementaryYearGrad" required value="<?php echo $fld_elementaryGraduated ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
    <h4 class="c-center c-font-uppercase c-font-bold">Secondary</h4>
  </div>
</div>

<div class="form-group">
  <label for="secondarySchoolName" class="col-md-2 control-label">Name<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="secondarySchoolName" placeholder="School Name" name="secondarySchoolName" required value="<?php echo $fld_secondaryName ?>">
  </div>

  <div class="col-md-1">
    <label class="radio-inline" required>
      <input type="radio" name="secondarySchoolType" id="secondarySchoolType"  value="Public">Public
      <input type="radio" name="secondarySchoolType" id="secondarySchoolType2" value="Private">Private
    </label>
  </div>

  <label for="secondaryAward" class="col-md-2 control-label">Award</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="secondaryAward" placeholder="Award" name="secondaryAward" value="<?php echo $fld_secondaryAward ?>">
  </div>
</div>

<div class="form-group">
  <label for="secondaryAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="secondaryAddress" placeholder="Address" name="secondaryAddress" value="<?php echo $fld_secondaryAddress ?>">
  </div>

  <label for="secondaryRegion" class="col-md-1 control-label">Region</label>
  <div class="col-md-3">
	  <select class="form-control c-square c-theme" id="secondaryRegion" name="secondaryRegion">
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

  <label for="secondaryYearGrad" class="col-md-1 control-label">Year Graduated<span style="color:red; font-size: 18px;">*</span></label>
  <div class="col-md-2">
    <input type="number" class="form-control c-square c-theme" id="secondaryYearGrad" placeholder="Year Graduated" name="secondaryYearGrad" required value="<?php echo $fld_secondaryGraduated ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
    <h4 class="c-center c-font-uppercase c-font-bold">College</h4>
  </div>
</div>

<div class="form-group">
  <label for="collegeSchoolName" class="col-md-2 control-label">Name</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="collegeSchoolName" placeholder="School Name" name="collegeSchoolName" value="<?php echo $fld_collegeName ?>">
  </div>

  <div class="col-md-1">
    <label class="radio-inline">
      <input type="radio" name="collegeSchoolType" id="collegeSchoolType"  value="Public">Public
      <input type="radio" name="collegeSchoolType" id="collegeSchoolType2" value="Private">Private
    </label>
  </div>

  <label for="collegeAward" class="col-md-2 control-label">Award</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="collegeAward" placeholder="Award" name="collegeAward" value="<?php echo $fld_collegeAward ?>">
  </div>
</div>

<div class="form-group">
  <label for="collegeAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="collegeAddress" placeholder="Address" name="collegeAddress" value="<?php echo $fld_collegeAddress ?>">
  </div>

  <label for="collegeRegion" class="col-md-1 control-label">Region</label>
  <div class="col-md-3">
	  <select class="form-control c-square c-theme" id="collegeRegion" name="collegeRegion">
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

  <label for="collegeYearGrad" class="col-md-1 control-label">Year Graduated</label>
  <div class="col-md-2">
    <input type="number" class="form-control c-square c-theme" id="collegeYearGrad" placeholder="Year Graduated" name="collegeYearGrad" value="<?php echo $fld_collegeGraduated ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
    <h4 class="c-center c-font-uppercase c-font-bold">Vocational</h4>
  </div>
</div>

<div class="form-group">
  <label for="vocationalSchoolName" class="col-md-2 control-label">Name</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="vocationalSchoolName" placeholder="School Name" name="vocationalSchoolName" value="<?php echo $fld_vocationalName ?>">
  </div>

  <div class="col-md-1">
    <label class="radio-inline">
      <input type="radio" name="vocationalSchoolType" id="vocationalSchoolType"  value="Public">Public
      <input type="radio" name="vocationalSchoolType" id="vocationalSchoolType2" value="Private">Private
    </label>
  </div>

  <label for="vocationalAward" class="col-md-2 control-label">Award</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="vocationalAward" placeholder="Award" name="vocationalAward" value="<?php echo $fld_vocationalAward ?>">
  </div>
</div>

<div class="form-group">
  <label for="vocationalAddress" class="col-md-2 control-label">Address</label>
  <div class="col-md-3">
    <input type="text" class="form-control c-square c-theme" id="vocationalAddress" placeholder="Address" name="vocationalAddress" value="<?php echo $fld_vocationalAddress ?>">
  </div>

  <label for="vocationalRegion" class="col-md-1 control-label">Region</label>
  <div class="col-md-3">
	  <select class="form-control c-square c-theme" id="vocationalRegion" name="vocationalRegion">
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

<label for="vocationalYearGrad" class="col-md-1 control-label">Year Graduated</label>
	<div class="col-md-2">
	<input type="number" class="form-control c-square c-theme" id="vocationalYearGrad" placeholder="Year Graduated" name="vocationalYearGrad" value="<?php echo $fld_vocationalGraduated ?>">
	</div>
</div>

<div class="form-group">
  <div class="col-md-5">
    <h4 class="c-center c-font-uppercase c-font-bold">SENIOR HIGH SCHOOL LEARNER'S DATA</h4>
  </div>
</div>

<div class="form-group">
<label for="vocationalRegion" class="col-md-2 control-label"></label>
  <div class="col-md-4">
	  <select class='form-control' id='learnersData' name="learnersData">
        <option value="Balik-Aral">Balik-Aral</option>
        <option value="Indigenous Peoples Learner">Indigenous Peoples Learner</option>
        <option value="Muslim Learner">Muslim Learner</option>
        <option value="Repeater">Repeater</option>
      </select>
	</div>
</div>

<div class="form-group">
  <div class="col-md-4">
    <h4 class="c-center c-font-uppercase c-font-bold">SENIOR HIGH SCHOOL TRACK</h4>
  </div>
</div>

<div class="form-group">
  <label for="shsTrack" class="col-md-2 control-label"></label>
  <div class="col-md-4">
	<select class='form-control' id='shsTrack' name="shsTrack">
		<option value="Arts and Design">Arts and Design</option>
		<option value="Academic">Academic</option>
		<option value="Sports">Sports</option>
		<option value="Technology Vocational Livelihood">Technology Vocational Livelihood</option>
	</select>
	</div>

	<div class="col-md-4">
		<select class='form-control' id='shsTrackAcademic' name="shsTrackAcademic" style="display: none;">
			<option value="STEM">STEM</option>
			<option value="ABM">ABM</option>
			<option value="HUMMS">HUMMS</option>
			<option value="GAS">GAS</option>
		</select>
		<select class='form-control' id='shsTrackTVL' name="shsTrackTVL" style="display: none;">
			<option value="Home Economics">Home Economics</option>
			<option value="Agri-Fishery">Agri-Fishery</option>
			<option value="Industrial Arts">Industrial Arts</option>
			<option value="Information Communication Technology">Information Communication Technology
			</option>
		</select>
	</div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <h4 class="c-center c-font-uppercase c-font-bold">REASONS FOR APPLYING AT TANAUAN CITY COLLEGE</h4>
  </div>
</div>

<div class="form-group">
	<label for="reasonEntryTCC" class="col-md-2 control-label"></label>
	  <div class="col-md-4">
		<select class='form-control' id='reasonEntryTCC' name="reasonEntryTCC">
			<option value="Quality Education">Quality Education</option>
			<option value="Proximity">Proximity</option>
			<option value="Competent Professor">Competent Professor</option>
			<option value="Recommended by Relatives">Recommended by Relatives</option>
			<option value="Campus Environment">Campus Environment</option>
			<option value="Good Facilities">Good Facilities</option>
			<option value="Availability of Program">Availability of Program</option>
			<option value="With National Government Subsidy">With National Government Subsidy</option>
			<option value="With Local Government Subsidy">With Local Government Subsidy</option>
			<option value="Others">Others (please specify)</option>
	    </select>
	</div>

	<div class="col-md-4">
		<input type="text" class="form-control c-square c-theme" id="reasonEntryTCCOther" placeholder="Other Reason" name="reasonEntryTCCOther" style="display: none" value="<?php echo $fld_reasonEntryTCCOther ?>">
	</div>
</div>

<div class="form-group">
  <div class="col-md-4">
    <h4 class="c-center c-font-uppercase c-font-bold">GENERAL WEIGHTED AVERAGE<span style="color:red; font-size: 18px;">*</span></h4>
  </div>
</div>

<div class="form-group">
	<label for="gwAverage" class="col-md-2 control-label"></label>
	<div class="col-md-3">
		<input type="number" class="form-control c-square c-theme" id="gwAverage" placeholder="General Average" name="gwAverage" required value="<?php echo $fld_gwAverage ?>">
	</div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <h4 class="c-center c-font-uppercase c-font-bold">HOW DID YOU GET TO KNOW ABOUT TANAUAN CITY COLLEGE?</h4>
  </div>
</div>

<div class="form-group">
	<label for="knowAboutCollege" class="col-md-2 control-label"></label>
	<div class="col-md-4">
		<select class='form-control' id='knowAboutCollege' name="knowAboutCollege">
			<option value="Career Orientation">Career Orientation</option>
			<option value="Social Media">Social Media</option>
			<option value="Employee of TCC">Employee of TCC</option>
			<option value="Student of TCC">Student of TCC</option>
			<option value="Others">Others(please specify)</option>
		</select>
	</div>

	<div class="col-md-4">
		<input type="text" class="form-control c-square c-theme" id="knowAboutCollegeOther" placeholder="Other reason." name="knowAboutCollegeOther"  style="display: none" value="<?php echo $fld_knowAboutCollegeOther ?>">
	</div>

</div>
<input type="text" id="elementaryStatus" value="<?php echo $fld_elementaryType ?>" hidden>
<input type="text" id="secondaryStatus" value="<?php echo $fld_secondaryType ?>" hidden>
<input type="text" id="collegeStatus" value="<?php echo $fld_collegeType ?>" hidden>
<input type="text" id="vocationalStatus" value="<?php echo $fld_vocationalType ?>" hidden>
<input type="text" id="elementaryStatusRegion" value="<?php echo $fld_elementaryRegion ?>" hidden>
<input type="text" id="secondaryStatusRegion" value="<?php echo $fld_secondaryRegion ?>" hidden>
<input type="text" id="collegeStatusRegion" value="<?php echo $fld_collegeRegion ?>" hidden>
<input type="text" id="vocationalStatusRegion" value="<?php echo $fld_vocationalRegion ?>" hidden>

<input type="text" id="learnersDataInfo" value="<?php echo $fld_learnersData ?>" hidden>
<input type="text" id="shsTrackInfo" value="<?php echo $fld_shsTrack ?>" hidden>
<input type="text" id="reasonEntryTCCInfo" value="<?php echo $fld_reasonEntryTCC ?>" hidden>
<input type="text" id="knowAboutCollegeInfo" value="<?php echo $fld_knowAboutCollege ?>" hidden>
<input type="text" id="shsTrackAcademicInfo" value="<?php echo $fld_shsTrackStrand ?>" hidden>
<input type="text" id="shsTrackTVLInfo" value="<?php echo $fld_shsTrackStrand ?>" hidden>
<div class="row">
	<div class="col-md-12">
	  <div class="form-group c-margin-t-40">
	      <div class="col-sm-offset-9 col-md-4">
	        <button type="submit" class="btn btn-success">Apply</button>
	        <button type="button" class="btn btn-danger" onclick="prevStep()">Back</button>
	      </div>
	  </div>
	</div>
</div>
