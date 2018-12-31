<?php
	require '../Database/database2.php';
 // 	include_once "../General/header.php";
 // 	include_once "../General/topBar.php";
 // 	include_once "../General/leftSideBar.php";
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
		$query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$id'";
		$res = mysqli_query($conn, $query);
		$user = mysqli_fetch_assoc($res);
		print_r($user);
		die();
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
          		<form class="form-horizontal" method="POST" action="api/apply.php" id="apply-frm">
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
  var step = 1

  function nextStep () {
    console.log(`valid?`, $('#apply-frm')[0].checkValidity())
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

    $('#apply-frm').ajaxForm({
      dataType: 'json',
      success: (o) => {
        if(o.success){
          alert(o.message)
          location.reload();
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
</script>
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>
