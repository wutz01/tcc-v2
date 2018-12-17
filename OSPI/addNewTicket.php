<?php include_once "General/header.php"; ?>
<body>
	<div class="wrapper">
		<?php include_once "General/leftSideBar.php"; ?>
	    <div class="main-panel">
			<nav class="navbar navbar-default">
	            <div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar bar1"></span>
	                        <span class="icon-bar bar2"></span>
	                        <span class="icon-bar bar3"></span>
	                    </button>
	                    <a class="navbar-brand" href="#datatable">OSPI Carmona PLST - Product Lot Scrap Ticket</a>
	                </div>
	                <div class="collapse navbar-collapse">
	                    <ul class="nav navbar-nav navbar-right">
	                        <li>
	                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
	                                <i class="ti-panel"></i>
									<p>Stats</p>
	                            </a>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#notigfications" class="dropdown-toggle" data-toggle="dropdown">
	                                <i class="ti-bell"></i>
	                                <span class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notifications
										<b class="caret"></b>
									</p>
	                            </a>
	                        	<ul class="dropdown-menu">
	                                <li><a href="#not1">Notification 1</a></li>
	                                <li><a href="#not2">Notification 2</a></li>
	                                <li><a href="#not3">Notification 3</a></li>
	                                <li><a href="#not4">Notification 4</a></li>
	                                <li><a href="#another">Another notification</a></li>
	                            </ul>
	                        </li>
							<li>
	                            <a href="#settings" class="btn-rotate">
									<i class="ti-settings"></i>
									<p class="hidden-md hidden-lg">
										Settings
									</p>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                        	<div class="card-header">
	                                <h4 class="card-title">New Ticket</h4>
	                            </div>

	                            <div class="card-content">
	                              <form method="get" action="" class="form-horizontal">
	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">PLST #</label>
	                                            <div class="col-sm-5">
	                                                <input type="text" placeholder="" disabled="" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Status</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="Select Status" data-size="7">
		                                                <option value="Pending Approval">Pending Approval</option>
		                                            </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Area/Department</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="Select Area/Department" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Originator</label>
	                                            <div class="col-sm-5">
	                                                <input type="text" placeholder="Enter Originator" class="form-control">
	                                            </div>
	                                        </div>
	                                    </fieldset>

										<fieldset>
	                                        <legend>Approval Sections</legend>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Originator's Manager</label>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                            <div class="col-sm-4">
	                                                <input type="text" placeholder="" class="form-control">
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Operation's Manager</label>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Approver)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Product Engineering Manager</label>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Approver)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">QA Manager</label>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Approver)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Inventory Auditor</label>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                            <div class="col-sm-4">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Approver)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Next Action Assigned To</label>
	                                            <div class="col-sm-8">
	                                                <input type="text" placeholder="" class="form-control">
	                                                <input type="text" placeholder="" class="form-control">
	                                                <input type="text" placeholder="" class="form-control">
	                                                <span class="help-block">(to be filled up by originator - This will send an email notification to the next assigned person who will approve)</span>
	                                            </div>
	                                        </div>

	                                    </fieldset>

	                                    <fieldset>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">PLST Details</label>
	                                            <div class="col-sm-10">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="******************PLST Details Action******************" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <div class="col-sm-12">
	                                                <table class="table table-hover">
					                                    <thead>
					                                        <th>Device #</th>
					                                    	<th>Lot Class</th>
					                                    	<th>Lot #</th>
					                                    	<th>Quantity</th>
					                                    	<th>Bank Operation</th>
					                                    	<th>Reason for Scrapping</th>
					                                    	<th>Corrective Action/8D No.</th>
					                                    	<th>$ Value</th>
					                                    </thead>
					                                    <tbody>
					                                        <tr>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        </tr>
					                                        <tr>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        	<td><input type="text" placeholder="" class="form-control"></td>
					                                        </tr>
					                                    </tbody>
					                                </table>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Disposition for Scrap</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Action</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="(Select Action)" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Disposed By</label>
	                                            <div class="col-sm-5">
	                                                <input type="text" placeholder="" class="form-control">
	                                                <input type="text" placeholder="" class="form-control">
	                                                <input type="text" placeholder="" class="form-control">
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Safekeep By</label>
	                                            <div class="col-sm-5">
	                                                <input type="text" placeholder="" class="form-control">
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Change Log</label>
	                                            <div class="col-sm-8">
	                                                <textarea class="form-control" placeholder="" rows="3"></textarea>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Change Log History</label>
	                                            <div class="col-sm-5">
	                                                <label class="control-label">Originator - General description/ justification</label>
	                                                <label class="control-label">Approvers - Add'l comments/ remarks/ instructions</label>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Scrap transacted by</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Transaction Date</label>
	                                            <div class="col-sm-5">
	                                                <input type="date" placeholder="" class="form-control">
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Recalled Lots Custodian</label>
	                                            <div class="col-sm-5">
	                                                <select class="selectpicker" data-style="btn btn-default btn-block" title="" data-size="7">
		                                                <option value=""></option>
		                                            </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group">
	                                            <label class="col-sm-10 control-label">*All items endorsed for engineering evaluation must be physically removed from the production area.</label>
	                                        </div>

	                                    </fieldset>

	                                       
	                                </form>
	                            </div>
	                        </div><!--  end card  -->
	                    </div> <!-- end col-md-12 -->
	                </div> <!-- end row -->
	            </div>
	        </div>

	        <footer class="footer">
	            <div class="container-fluid">
					<div class="copyright pull-right">
	                    &copy; <script>document.write(new Date().getFullYear())</script>
	                </div>
	            </div>
	        </footer>
	    </div>
	</div>
</body>
<?php include_once "General/footer.php"; ?>