<?php
include('library/session_info.php');
$pagetitle = ' - Create Students';

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

                        <h4 class="page-title">Create User</h4>
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $companyname; ?></a></li>
							<li><a href="#">Main Access</a></li> 
							<li><a href="#">System Users</a></li> 
                            <li class="active">Create User</li>
                        </ol>
                    </div>
                </div>
				
				<div class="card-box">
					<form method="POST" action="functions/function_common_access.php" data-parsley-validate novalidate>
						<div class="row">						
							<div class="col-lg-12">
								<div class="card-box-rox">
									<h4 class="m-t-0 header-title"><b>Feed Customer Basic Information</b></h4>
									<p class="text-muted font-13 m-b-30">
										Your awesome text goes here.
									</p>
									<div class="form-group col-lg-3">
										<label for="fname">First Name*</label>
										<input type="text" name="fname" parsley-trigger="change" required placeholder="Enter First Name" class="form-control" id="fname">
									</div>
									<div class="form-group col-lg-3">
										<label for="lname">Last Name*</label>
										<input type="text" name="lname" parsley-trigger="change" required placeholder="Enter Last Name" class="form-control" id="lname">
									</div>
									<div class="form-group col-lg-3">
										<label for="gender">Gender*</label>
										<select name="gender" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Not Specified">Not Specified</option>
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="nationality">Nationality*</label>
										<input type="text" name="nationality" parsley-trigger="change" required placeholder="Enter Nationality" class="form-control" id="nationality">
									</div>
									<div class="form-group col-lg-3">
										<label for="pass">NIC/ Passport No*</label>
										<input type="text" name="pass" parsley-trigger="change" required placeholder="Enter NIC/ Passport No" class="form-control" id="pass">
									</div>
									<div class="form-group col-lg-3">
										<label for="emailAddress">Email Address*</label>
										<input type="email" name="email" parsley-trigger="change" required placeholder="Enter Email Address" class="form-control" id="emailAddress">
									</div>
									<div class="form-group col-lg-3">
										<label for="address">Residential Address*</label>
										<input type="text" name="address" parsley-trigger="change" required placeholder="Enter Residential Address" class="form-control" id="address">
									</div>
									<div class="form-group col-lg-3">
										<label for="tele">Telephone*</label>
										<input type="text" name="tele" parsley-trigger="change" required placeholder="Enter Telephone" class="form-control" id="tele">
									</div>
									<div class="form-group col-lg-3">
										<label for="mobile">Mobile*</label>
										<input type="text" name="mobile" parsley-trigger="change" required placeholder="Enter Mobile" class="form-control" id="mobile">
									</div>
									<div class="form-group col-lg-3">
										<label for="user_type">User Type*</label>
										<select name="user_type" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											
											<?php

											include('class/class_common_access.php');
											$load_user_level= Common_access::load_user_level();
										
											while ($row_level = mysqli_fetch_array($load_user_level)) {
											?> 
											<option value="<?php echo $row_level['rox_u_level']; ?>" ><?php echo $row_level['rox_u_level']; ?></option>
											<?php
											}
											?> 
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="branch">Branch*</label>
										<select name="branch" class="selectpicker" data-live-search="true" required="" data-style="btn-white">	

											<?php

											include('class/class_user_access.php');
											$load_branch= User_access::load_branch();
										
											while ($row_branch = mysqli_fetch_array($load_branch)) {
											?> 
										<option value="<?php echo $row_branch['rox_br_autoid']; ?>" ><?php echo $row_branch['rox_br_city']; ?></option>
										<?php
											}
										?> 
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="user_status">User Status*</label>
										<select name="user_status" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											<option value="Active">Active</option>
											<option value="Suspended">Suspended</option>
											<option value="Terminated">Terminated</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">				
							<div class="form-group text-center m-b-0">
								<button class="btn btn-primary waves-effect waves-light" name="save_admin_user" type="submit">
									Submit
								</button>
								<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                          
                            <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                <thead>
                                    <tr>
                                        <th data-toggle="true">Name</th>
                                        <th>Email</th>
                                        <th data-hide="phone, tablet">Branch</th>
                                        <th data-hide="phone">Mobile No</th>
                                        <th data-hide="phone">Registered Date</th>
                                        <th data-hide="phone, tablet">Status</th>
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
                                    <tr>
                                        <td>Isidra</td>
                                        <td>isidra@aircom.lk</td>
                                        <td>Colombo</td>
                                        <td>0770045855</td>
                                        <td>22 Jun 1972</td>
                                        <td><span class="label label-table label-success">Active</span></td>
										<td>
											<a href="#" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
											<a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
										</td>
                                    </tr>                                    
                                    <tr>
                                        <td>Pranavan</td>
                                        <td>isidra@aircom.lk</td>
                                        <td>Colombo</td>
                                        <td>0770045855</td>
                                        <td>22 Jun 1972</td>
                                        <td><span class="label label-table label-success">Active</span></td>
										<td>
											<a href="#" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
											<a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
										</td>
                                    </tr>
                                    <tr>
                                        <td>Isidra</td>
                                        <td>isidra@aircom.lk</td>
                                        <td>Colombo</td>
                                        <td>0770045855</td>
                                        <td>22 Jun 1972</td>
                                        <td><span class="label label-table label-danger">Suspended</span></td>
										<td>
											<a href="#" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
											<a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
										</td>
                                    </tr>
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



        <!-- jQuery  -->
        <script src="assets/site/js/jquery.min.js"></script>
        <script src="assets/site/js/bootstrap.min.js"></script>
        <script src="assets/site/js/detect.js"></script>
        <script src="assets/site/js/fastclick.js"></script>
        <script src="assets/site/js/jquery.slimscroll.js"></script>
        <script src="assets/site/js/jquery.blockUI.js"></script>
        <script src="assets/site/js/waves.js"></script>
        <script src="assets/site/js/wow.min.js"></script>
        <script src="assets/site/js/jquery.nicescroll.js"></script>
        <script src="assets/site/js/jquery.scrollTo.min.js"></script>

        <!-- Parsly js -->
        <script type="text/javascript" src="assets/site/plugins/parsleyjs/parsley.min.js"></script>

        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
		
        <script src="assets/site/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/site/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/site/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/site/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/site/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="assets/site/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="assets/site/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="assets/site/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/site/pages/autocomplete.js"></script>

        <script type="text/javascript" src="assets/site/pages/jquery.form-advanced.init.js"></script>
		
		<!--FooTable Example-->
		<script src="assets/site/pages/jquery.footable.js"></script>
		<script src="assets/site/plugins/footable/js/footable.all.min.js"></script>
		
        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

    </body>
</html>