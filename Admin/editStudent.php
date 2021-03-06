<?php
	require '../Database/database2.php';

 	include_once "../General/header.php";

 	include_once "../General/topBar.php";

 	include_once "../General/leftSideBar.php";



	if(isset($_GET["id"])) {
    
    $id = $_GET["id"];

    $query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$id'";
    $stmt = mysqli_query($conn, $query);
    if(mysqli_num_rows($stmt) > 0){

      $query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$id'";

      $res = mysqli_query($conn, $query);

      $user = mysqli_fetch_assoc($res);

      extract($user);
    } else {
      $query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$id'";

      $res = mysqli_query($conn, $query);

      $user = mysqli_fetch_assoc($res);
    }

  }

?>
<div class="page animsition">

    <div class="page-header">

        <h1 class="page-title">Add Student Profile</h1>

	        <ol class="breadcrumb">

	            <li><a href="../General/dashboard.php">Home</a></li>

	        	<li class="active">Student Profile</li>

	        </ol>

	    </div>

   <div class="page-content">

	    <div class="panel">

	        <div class="panel-body container-fluid">

	            <div class="row row-lg">

	                <div class="col-sm-12">

	                	<div class="col-sm-12">

<style type="text/css">

	.input-group{

		display: bold;

	}

</style>
<div class="row">
	<div class="col-md-12">
		<div class="c-content-panel">
			<div class="c-body">
          	<form class="form-horizontal" method="POST" action="../api/editStudent.php" id="apply-frms">
            <!-- page 1 -->
    				<div class="c-content-tab-1 c-theme c-margin-t-30">
    					<div class="clearfix">
    						<ul class="nav nav-tabs c-font-sbold pull-right">
    							<li class="active"><a href="#tab_2_1_content" onclick="javascript: void(0);" class="c-border-green">Personal Information</a></li>
    							<li><a href="#tab_2_2_content" onclick="javascript: void(0);" class="c-border-green">Family Background</a></li>
    							<li><a href="#tab_2_3_content" onclick="javascript: void(0);" class="c-border-green">Additional Questions</a></li>
    							<li><a href="#tab_2_4_content" onclick="javascript: void(0);" class="c-border-green">Academic Information</a></li>
    						</ul>
    					</div>
	    				<div class="tab-content c-bordered c-padding-lg">
	    					<?php include '../formStudent/personalInfo.php' ?>
	  						<div class="tab-pane" id="tab_2_2_content">
	                			<?php include '../formStudent/familyBackground.php' ?>
	  						</div>
	  						<div class="tab-pane" id="tab_2_3_content">
	  							<?php include '../formStudent/additionalQuestions.php' ?>
	  						</div>
	  						<div class="tab-pane" id="tab_2_4_content">
	  							<?php include '../formStudent/academicInfo.php' ?>
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

	            </div>

	        </div>

	    </div>

	</div>

</div>



<?php

   include_once "../General/footer.php";

?>
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>
<!-- <script type="text/javascript">
  var step = 1

  function nextStep () {
    console.log(`valid?`, $('#apply-frm')[0].checkValidity())
    let $myForm = $('#apply-frm');
    if ($myForm[0].checkValidity()) {
      step++
      $(`a[href="#tab_2_${step}_content"]`).tab('show')
    } else {
      $myForm.find(':submit').click();
    }
  }
  function prevStep () {
    step--
    $(`a[href="#tab_2_${step}_content"]`).tab('show')
  }
  $(function () {
    $(".all-nav").removeClass('c-active')
    $(".apply-nav").addClass('c-active')

    $('#apply-frm').ajaxForm({
      dataType: 'json',
      success: (o) => {
        console.log(o),
        alert(json.message)
      },
      beforeSubmit: (o) => {
        // notify('sending data...', 'info')
        // for (var i = 1; i < 4; i++) {
        //   setTimeout(function () {
        //     $(`a[href="#tab_2_${i}_content"]`).tab('show')
        //   }, 500)
        // }
        console.log(`trying to submit`)
      }
    })

    // UPDATES ---- BEN

    $('#reasonEntryTCC').change(function() {
      if ( $("#reasonEntryTCC").val ()  ==  "Others")
      {
          $('#reasonEntryTCCOther').show();
      }
      else
          $("#reasonEntryTCCOther").hide();
    });

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

    $('#reasonEntryTCC').change(function() {
        if ( $("#reasonEntryTCC").val ()  ==  "Others")
        {
            $('#reasonEntryTCCOther').show();
        }
        else
            $("#reasonEntryTCCOther").hide();
    });

    $('#knowAboutCollege').change(function() {
        if ( $("#knowAboutCollege").val ()  ==  "Others")
        {
            $('#knowAboutCollegeOther').show();
        }
        else
            $("#knowAboutCollegeOther").hide();
    });

    $(document).on('click', '#civilStatus2', function(){
      var status = $(this).val();
      if(status == "Married"){
        $("#for_married").show();
      }
      else if(status == "Single"){
        $("#for_married").hide();
      }
    });

    $('#religion').change(function() {
      if ( $("#religion").val ()  ==  "Other")
      {
          $('#otherReligion').show();
      }
      else
          $("#otherReligion").hide();
    });
  })

  function addChild() {
    $('#tableChildren').find('tbody').append($(
      '<tr><td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder=""></td>' +
      '<td>'+
          '<div class="col-md-1">'+
            '<label class="radio-inline">'+
              '<input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male<br>' +
              '</label>' + '<label>' +
              '<input type="radio" name="childrenSex[]" id="childrenSex2" value="Female">Female' +
            '</label>' +
          '</div>' +
        '</td>' +
      '<td><input type="date" id="childrenBirthDate" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder="" onblur="getAgeChildren()"></td>' +
      '<td><input type="text" id="childrenAge" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>' +
      '<td><input type="text" id="childrenBirthPlace" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>' +
      '<td colspan="2"><input type="text" id="childrenEducationalAttainment" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td></tr>'
    ));
  }

  function getAge(){
    var birthDate = document.getElementById('birthDate').value;
    birthDate = new Date(birthDate);
    var today = new Date();
    var ageApplicant = Math.floor((today - birthDate)/(365.25 * 24 * 60 * 60 *1000));
    document.getElementById('age').value = ageApplicant;
  }

  function getAgeChildren(){
    var childrenBirthDate = document.getElementById('childrenBirthDate').value;
    childrenBirthDate = new Date(childrenBirthDate);
    var today = new Date();
    var ageChildren = Math.floor((today - childrenBirthDate)/(365.25 * 24 * 60 * 60 *1000));
    document.getElementById('childrenAge').value = ageChildren;
  }
</script> -->
<script type="text/javascript">
    var sexStatus = document.getElementById('sexStatusCheck').value;
    var civilStatus = document.getElementById('civilStatusCheck').value;
    // var spouseStatus = document.getElementById('spouseStatusCheck').value;
    // var spouseLocationStatusCheck = document.getElementById('spouseLocationStatusCheck').value;
    var motherStatuses = document.getElementById('motherStatusCheck').value;
    var fatherStatuses = document.getElementById('fatherStatusCheck').value;
    // var childrenSex = document.getElementById('childrenSexStatusCheck').value;
    // var applicantLocation = document.getElementById('applicantLocation').value;
    var elementaryStatus = document.getElementById('elementaryStatus').value;
    var secondaryStatus = document.getElementById('secondaryStatus').value;
    var collegeStatus = document.getElementById('collegeStatus').value;
    var vocationalStatus = document.getElementById('vocationalStatus').value;
    var religions = document.getElementById('religionStatus').value;
    var regions = document.getElementById('regionStatus').value;
    var genders = document.getElementById('genderApplicant').value;

    var elementaryRegion = document.getElementById('elementaryStatusRegion').value;
    var secondaryRegion = document.getElementById('secondaryStatusRegion').value;
    var collegeRegion = document.getElementById('collegeStatusRegion').value;
    var vocationRegion = document.getElementById('vocationalStatusRegion').value;

    var learnersDataInfo = document.getElementById('learnersDataInfo').value;
    var shsTrackInfo = document.getElementById('shsTrackInfo').value;
    var reasonEntryTCCInfo = document.getElementById('reasonEntryTCCInfo').value;
    var knowAboutCollegeInfo = document.getElementById('knowAboutCollegeInfo').value;
    var shsTrackAcademicInfo = document.getElementById('shsTrackAcademicInfo').value;
    var shsTrackTVLInfo = document.getElementById('shsTrackTVLInfo').value;
    var localAbroadSpouse = document.getElementById('applicantLocation').value;


    $("input[name=sexApplicant][value=" + sexStatus + "]").attr('checked', 'checked');
    $("input[name=civilStatus][value=" + civilStatus + "]").attr('checked', 'checked');
    // $("input[name=marriedStatus][value=" + spouseStatus + "]").attr('checked', 'checked');
    // $("input[name=localAbroadSpouse][value=" + spouseLocationStatusCheck + "]").attr('checked', 'checked');
    $("input[name=motherStatus][value=" + motherStatuses + "]").attr('checked', 'checked');
    $("input[name=fatherStatus][value=" + fatherStatuses + "]").attr('checked', 'checked');
    // $("input[name=childrenSex][value=" + childrenSex + "]").attr('checked', 'checked');
    // $("input[name=localAbroadApplicant][value=" + applicantLocation + "]").attr('checked', 'checked');
    $("input[name=elementarySchoolType][value=" + elementaryStatus + "]").attr('checked', 'checked');
    $("input[name=secondarySchoolType][value=" + secondaryStatus + "]").attr('checked', 'checked');
    $("input[name=collegeSchoolType][value=" + collegeStatus + "]").attr('checked', 'checked');
    $("input[name=vocationalSchoolType][value=" + vocationalStatus + "]").attr('checked', 'checked');
    $("input[name=localAbroadApplicant][value=" + localAbroadSpouse + "]").attr('checked', 'checked');
    $("#religion option[value=" + religions + "]").attr('selected', true);
    $("#region option[value=" + regions + "]").attr('selected', true);
    $("#gender option[value=" + genders + "]").attr('selected', true);

    $("#elementaryRegion option[value=" + elementaryRegion + "]").attr('selected', true);
    $("#secondaryRegion option[value=" + secondaryRegion + "]").attr('selected', true);
    $("#collegeRegion option[value=" + collegeRegion + "]").attr('selected', true);
    $("#vocationRegion option[value=" + vocationRegion + "]").attr('selected', true);

    $("#learnersData option[value=" + learnersDataInfo + "]").attr('selected', true);
    $("#shsTrack option[value=" + shsTrackInfo + "]").attr('selected', true);
    $("#reasonEntryTCC option[value=" + reasonEntryTCCInfo + "]").attr('selected', true);
    $("#knowAboutCollege option[value=" + knowAboutCollegeInfo + "]").attr('selected', true);
    $("#shsTrackAcademic option[value=" + shsTrackAcademicInfo + "]").attr('selected', true);
    $("#shsTrackTVL option[value=" + shsTrackTVLInfo + "]").attr('selected', true);
</script>
<script type="text/javascript">
  var step = 1

  function nextStep () {
    console.log(`valid?`, $('#apply-frms')[0].checkValidity())
    let $myForm = $('#apply-frm');
    step++
    $(`a[href="#tab_2_${step}_content"]`).tab('show')
    // if ($myForm[0].checkValidity()) {
    //   step++
    //   $(`a[href="#tab_2_${step}_content"]`).tab('show')
    // } else {
    //   $myForm.find(':submit').click();
    //   console.log(`failed`)
    // }
  }
  function prevStep () {
    step--
    $(`a[href="#tab_2_${step}_content"]`).tab('show')
  }
  $(function () {
    $(".all-nav").removeClass('c-active')
    $(".apply-nav").addClass('c-active')

    $('#apply-frms').ajaxForm({
      dataType: 'json',
      success: (o) => {
        if(o.success){
          alert(o.message)
          location.href = 'students.php';
        } else {
          alert('Apply error')
        }
      },
      beforeSubmit: (o) => {
        // notify('sending data...', 'info')
        // for (var i = 1; i < 4; i++) {
        //   setTimeout(function () {
        //     $(`a[href="#tab_2_${i}_content"]`).tab('show')
        //   }, 500)
        // }
        alert('Apply Now?'),
        console.log(`trying to submit`)
      }
    })

    // UPDATES ---- BEN

    $('#reasonEntryTCC').ready(function() {
      if ( $("#reasonEntryTCC").val ()  ==  "Others")
      {
          $('#reasonEntryTCCOther').show();
      }
      else
          $("#reasonEntryTCCOther").hide();
    });

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

    $('#reasonEntryTCC').ready(function() {
        if ( $("#reasonEntryTCC").val ()  ==  "Others")
        {
            $('#reasonEntryTCCOther').show();
        }
        else
            $("#reasonEntryTCCOther").hide();
    });

    $('#knowAboutCollege').ready(function() {
        if ( $("#knowAboutCollege").val ()  ==  "Others")
        {
            $('#knowAboutCollegeOther').show();
        }
        else
            $("#knowAboutCollegeOther").hide();
    });

    $(document).on('click', '#civilStatus2', function(){
      var status = $(this).val();
      if(status == "Married"){
        $("#for_married").show();
      }
      else if(status == "Single"){
        $("#for_married").hide();
      }
    });

    $('#religion').ready(function() {
      if ( $("#religion").val ()  ==  "Other")
      {
          $('#otherReligion').show();
      }
      else
          $("#otherReligion").hide();
    });
  })

  function addChild() {
    $('#tableChildren').find('tbody').append($(
      '<tr><td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder=""></td>' +
      '<td>'+
          '<div class="col-md-1">'+
            '<label class="radio-inline">'+
              '<input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male<br>' +
              '</label>' + '<label>' +
              '<input type="radio" name="childrenSex[]" id="childrenSex2" value="Female">Female' +
            '</label>' +
          '</div>' +
        '</td>' +
      '<td><input type="date" id="childrenBirthDate" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder="" onblur="getAgeChildren()"></td>' +
      '<td><input type="text" id="childrenAge" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>' +
      '<td><input type="text" id="childrenBirthPlace" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>' +
      '<td colspan="2"><input type="text" id="childrenEducationalAttainment" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td></tr>'
    ));
  }

  function getAge(){
    var birthDate = document.getElementById('birthDate').value;
    birthDate = new Date(birthDate);
    var today = new Date();
    var ageApplicant = Math.floor((today - birthDate)/(365.25 * 24 * 60 * 60 *1000));
    document.getElementById('age').value = ageApplicant;
  }

  function getAgeChildren(){
    var childrenBirthDate = document.getElementById('childrenBirthDate').value;
    childrenBirthDate = new Date(childrenBirthDate);
    var today = new Date();
    var ageChildren = Math.floor((today - childrenBirthDate)/(365.25 * 24 * 60 * 60 *1000));
    document.getElementById('childrenAge').value = ageChildren;
  }
</script>
<script type="text/javascript">
  function cancel() {
    location.href = 'students.php';
  }
</script>