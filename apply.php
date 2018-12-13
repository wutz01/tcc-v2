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
                        <div class="col-md-6">
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
                        </div>
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
