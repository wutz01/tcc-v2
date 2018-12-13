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
	                            <div class="card-content">
	                                <div class="toolbar">
	                                    <button type="button" class="btn btn-wd btn-rotate" onclick='location.href="addNewTicket.php"'>
	                                        <span class="btn-label">
	                            	            <i class="ti-plus"></i>
	                                        </span>
	                                        Add New Item
	                                    </button>
	                                    &nbsp;
	                                </div>
	                                <table id="bootstrap-table" class="table">
	                                    <thead>
	                                        <th data-field="state" data-checkbox="true"></th>
	                                        <th data-field="psltNo" class="text-center">PLST #</th>
	                                    	<th data-field="status" data-sortable="true">Status</th>
	                                    	<th data-field="originator" data-sortable="true">Originator</th>
	                                    	<th data-field="created" data-sortable="true">Created</th>
	                                    	<th data-field="modified" data-sortable="true">Modified</th>
	                                    	<th data-field="modifiedBy" data-sortable="true">Modified By</th>
	                                    	<th data-field="areaDepartmentBy">Area/Department</th>
	                                    	<th data-field="sectionManager">Section Manager</th>
	                                    	<th data-field="dispositionForScrap">Disposition for Scrap</th>
	                                    	<th data-field="transactionDate">Transaction Date</th>
	                                    	<th data-field="safekeepBy">Safekeep by</th>
	                                    	<th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                            <td></td>
	                                        	<td>858</td>
	                                        	<td>New</td>
	                                        	<td>Phia Idanan</td>
	                                        	<td>About an hour ago</td>
	                                        	<td>About an hour ago</td>
	                                        	<td>Phia Idanan</td>
	                                        	<td>Plant 1 & 2 EBR Planning</td>
	                                        	<td>Anne Lazar</td>
	                                        	<td>For physical disposal into the reject bin</td>
	                                        	<td></td>
	                                        	<td></td>
	                                        	<td></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
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
	