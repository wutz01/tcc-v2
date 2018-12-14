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
