<?php
//include('library/session_info.php');
$pagetitle = ' - Manage-faqs';

$pagedescr = ' ';

$pagekeywords = ' ';

include(INC_PATH . "system-info.php");

include(INC_PATH . "header.php");
?>
    <body>

		<!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <!-- Start TOP Navigation -->
				<?php include("includes/topmenu.php"); ?>
				<!-- End TOP Navigation -->	
            </div>

            <div class="navbar-custom">
                <!-- Start Main Menu -->
				<?php include("includes/mainmenu.php"); ?>
				<!-- End Main Menu -->   
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            <div class="container">


                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu drop-menu-right" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="page-title">Add your business branches</h4>
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $companyname; ?></a></li>
                            <li><a href="#">Main Access</a></li> 
                            <li class="active">Add Branch</li>
                        </ol>
                    </div>
                </div>
				
				<div class="card-box">
						<div class="row">						
							<div class="col-lg-12">
								<div class="card-box-rox">
									<h4 class="m-t-0 header-title"><b>Feed Branch Contact Information</b></h4>
									<p class="text-muted font-13 m-b-30">
										Branches added on here will be shown on down below.
									</p>
									<div class="form-group col-lg-3" style="display:none">
										<label for="br_id">Branch ID</label>
										<input type="text" name="br_id" parsley-trigger="change" required placeholder="Enter Branch Name" class="form-control" id="br_id">
									</div>	
									<div class="form-group col-lg-3">
										<label for="br_name">Branch Name</label>
										<input type="text" name="br_name" parsley-trigger="change" required placeholder="Enter Branch Name" class="form-control" id="br_name">
									</div>								
									<div class="form-group col-lg-2">
										<label for="br_tel">Telephone No</label>
										<input type="text" name="br_tel" parsley-trigger="change" required placeholder="Enter Telephone No" class="form-control" id="br_tel">
									</div>	
									<div class="form-group col-lg-2">
										<label for="br_hot">Hotline No</label>
										<input type="text" name="br_hot" parsley-trigger="change" required placeholder="Enter Hotline No" class="form-control" id="br_hot">
									</div>
									<div class="form-group col-lg-2">
										<label for="br_status">Branch Status*</label>
										<select name="br_status" id="br_status" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											<option value="Active">Active</option>
											<option value="Closed">Closed</option>
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="br_add1">Address Line 1</label>
										<input type="text" name="br_add1" parsley-trigger="change" required placeholder="Enter Address Line 1" class="form-control" id="br_add1">
									</div>
									<div class="form-group col-lg-3">
										<label for="br_add2">Address Line 2</label>
										<input type="text" name="br_add2" parsley-trigger="change" required placeholder="Enter Address Line 2" class="form-control" id="br_add2">
									</div>
									<div class="form-group col-lg-3">
										<label for="br_loc">City</label>
										<input type="text" name="br_loc" parsley-trigger="change" required placeholder="Enter City" class="form-control" id="br_loc">
									</div>	
									<div class="form-group col-lg-3">
										<label for="br_pcode">Postal Code</label>
										<input type="text" name="br_pcode" parsley-trigger="change" required placeholder="Enter Postal Code" class="form-control" id="br_pcode">
									</div>
									<div class="form-group col-lg-3">
										<label for="user_status">Province</label>
										<select class="selectpicker" data-live-search="true" required="" data-style="btn-white" name="br_province" id="br_province">
											<option value="Central Province">Central Province</option>
											<option value="Eastern Province">Eastern Province</option>
											<option value="North Central Province">North Central Province</option>
											<option value="North Western Province">North Western Province</option>
											<option value="Northern Province">Northern Province</option>
											<option value="Sabaragamuwa Province">Sabaragamuwa Province</option>
											<option value="Southern Province">Southern Province</option>
											<option value="Uva Province">Uva Province</option>
											<option value="Western Province">Western Province</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">				
							<div class="form-group text-center m-b-0">
								<button class="btn btn-primary waves-effect waves-light" type="submit" name="save_branch" id="save_branch">Submit</button>
								<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
									Cancel
								</button>
							</div>
						</div>
				</div>
				
            
				<div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">                           
                            <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                <thead>
                                    <tr>
                                        <th data-toggle="true">Branch ID</th>
                                        <th>Branch Name</th>
                                        <th data-hide="phone">Address</th>
                                        <th data-hide="phone, tablet">Hotline</th>
                                        <th data-hide="phone, tablet">Telephone</th>
                                        <th data-hide="phone">Status</th>
                                        <th data-hide="phone">Action</th>
                                    </tr>
                                </thead>
                                <div class="form-inline m-b-20">
                                    <div class="row">
                                        <div class="col-sm-6 text-xs-center">
                                            <div class="form-group">
                                                <label class="control-label m-r-5">Status</label>
                                                <select id="demo-foo-filter-status" class="form-control input-sm">
                                                    <option value="">Show all</option>
                                                    <option value="active">Active</option>
                                                    <option value="disabled">Disabled</option>
                                                    <option value="suspended">Suspended</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-xs-center text-right">
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tbody>
								
								
								
                                                                  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="12">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="footer text-right">
                    <!-- Footer Section Starts-->
					<?php include("includes/footer.php"); ?>
					<!-- Footer Section Ends -->
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		<div id="dialog" class="modal-block mfp-hide">
            <section class="panel panel-info panel-color">
                <header class="panel-heading">
                    <h2 class="panel-title">Are you sure?</h2>
                </header>
                <div class="panel-body">
                    <div class="modal-wrapper">
                        <div class="modal-text">
                            <p>Are you sure that you want to delete this row?</p>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                            <button id="dialogConfirm" class="btn btn-primary waves-effect waves-light">Confirm</button>
                            <button id="dialogCancel" class="btn btn-default waves-effect">Cancel</button>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <!-- jQuery  -->
        <script src="assets/site/js/jquery-1.12.0.min.js"></script>
		<script src="assets/site/js/bootstrap.min.js"></script>
        <script src="assets/site/js/detect.js"></script>
        <script src="assets/site/js/fastclick.js"></script>
        <script src="assets/site/js/jquery.slimscroll.js"></script>
        <script src="assets/site/js/jquery.blockUI.js"></script>
        <script src="assets/site/js/waves.js"></script>
        <script src="assets/site/js/wow.min.js"></script>
        <script src="assets/site/js/jquery.nicescroll.js"></script>
        <script src="assets/site/js/jquery.scrollTo.min.js"></script>

		<script src="assets/site/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/site/plugins/switchery/js/switchery.min.js"></script>
        <!-- <script type="text/javascript" src="assets/site/plugins/multiselect/js/jquery.multi-select.js"></script>-->
        <script type="text/javascript" src="assets/site/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <!--<script src="assets/site/plugins/select2/js/select2.min.js" type="text/javascript"></script>-->
        <script src="assets/site/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <!-- Pop Up Modal -->
        <script src="assets/site/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
	    <script src="assets/site/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="assets/site/plugins/datatables/dataTables.bootstrap.js"></script>
	    <script src="assets/site/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="assets/site/plugins/tiny-editable/numeric-input-example.js"></script>
 

        
		<script src="assets/site/plugins/footable/js/footable.all.min.js"></script>
		<!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

		<script src="assets/site/pages/jquery.footable.js"></script>
		<script src="assets/site/pages/datatables.editable.init.editable.js"></script>
		<script type="text/javascript">
		
		
		
		
		
		
		
		

		</script>
    </body>
</html>