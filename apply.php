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
        						<?php include 'form/personalInfo.php' ?>
      						<div class="tab-pane" id="tab_2_2_content">
                    <?php include 'form/familyBackground.php' ?>
      						</div>
      						<div class="tab-pane" id="tab_2_3_content">
      							<?php include 'form/additionalQuestions.php' ?>
      						</div>
      						<div class="tab-pane" id="tab_2_4_content">
      							<?php include 'form/academicInfo.php' ?>
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

<script type="text/javascript">
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
    $('#knowAboutCollege').change(function() {
        if ( $("#knowAboutCollege").val ()  ==  "Others") 
        {                              
            $('#knowAboutCollegeOther').show();
        }
        else
            $("#knowAboutCollegeOther").hide();
      }); 
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

  function addChild() {
    $('#tableChildren').find('tbody').append($(
      '<tr><td><input type="text" id="childrenName[]" name="childrenName[]" class="form-control childrenName" placeholder=""></td>' +
      '<td>'+
          '<div class="col-md-1">'+
            '<label class="radio-inline">'+
              '<input type="radio" name="childrenSex[]" id="childrenSex"  value="Male">Male<br>' +
              '<input type="radio" name="childrenSex[]" id="childrenSex" value="Female">Female' +
            '</label>' +
          '</div>' +
        '</td>' +
      '<td><input type="text" id="childrenAge[]" name="childrenAge[]" class="form-control childrenAge" placeholder=""></td>' +
      '<td><input type="date" id="childrenBirthDate[]" name="childrenBirthDate[]" class="form-control childrenBirthDate" placeholder=""></td>' +
      '<td><input type="text" id="childrenBirthPlace[]" name="childrenBirthPlace[]" class="form-control childrenBirthPlace" placeholder=""></td>' +
      '<td colspan="2"><input type="text" id="childrenEducationalAttainment[]" name="childrenEducationalAttainment[]" class="form-control childrenEducationalAttainment" placeholder=""></td></tr>'
       ));
    }

    function getAge(){
      var birthDate = document.getElementById('birthDate').value;
      birthDate = new Date(birthDate);
      var today = new Date();
      var ageApplicant = Math.floor((today - birthDate)/(365.25 * 24 * 60 * 60 *1000));
      document.getElementById('age').value = ageApplicant;
    } console.log(ageApplicant);
</script>
