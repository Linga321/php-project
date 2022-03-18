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
                            <li class="active">Create User</li>
                        </ol>
                    </div>
                </div>
				
				<div class="card-box">
				<?php
				 if(isset($_GET['id']))
				 {
					$user_id=$_GET['id'];
					include('class/class_common_access.php');

					$get_user = Common_access::get_user($user_id);
				
					while ($row_user = mysqli_fetch_array($get_user)) {
				?>
					<form method="POST" action="functions/function_common_access.php?uid=<?php echo $_GET['id'];?>" data-parsley-validate novalidate>
						<div class="row">						
							<div class="col-lg-6">
								<div class="card-box-rox">
									<h4 class="m-t-0 header-title"><b>Feed Customer Basic Information</b></h4>
									<p class="text-muted font-13 m-b-30">
										Your awesome text goes here.
									</p>
									<div class="form-group">
										<label for="fname">First Name*</label>
										<input type="text" name="fname" parsley-trigger="change" required placeholder="Enter First Name" class="form-control" id="fname" value="<?php echo $row_user['rox_admin_fname']; ?>">
									</div>
									<div class="form-group">
										<label for="lname">Last Name*</label>
										<input type="text" name="lname" parsley-trigger="change" required placeholder="Enter Last Name" class="form-control" id="lname" value="<?php echo $row_user['rox_admin_lname']; ?>">
									</div>
									<div class="form-group ">
										<label for="gender">Gender*</label>
										<select name="gender" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											<option value="<?php echo $row_user['rox_admin_gender']; ?>"><?php echo $row_user['rox_admin_gender']; ?></option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Not Specified">Not Specified</option>
										</select>
									</div>
									<div class="form-group">
										<label for="nationality">Nationality*</label>
										<input type="text" name="nationality" parsley-trigger="change" required placeholder="Enter Nationality" class="form-control" id="nationality" value="<?php echo $row_user['rox_admin_nationality']; ?>">
									</div>
									<div class="form-group">
										<label for="pass">NIC/ Passport No*</label>
										<input type="text" name="pass" parsley-trigger="change" required placeholder="Enter NIC/ Passport No" class="form-control" id="pass" value="<?php echo $row_user['rox_pass']; ?>">
									</div>
									<div class="form-group">
										<label for="emailAddress">Email Address*</label>
										<input type="email" name="email" parsley-trigger="change" required placeholder="Enter Email Address" class="form-control" id="emailAddress" value="<?php echo $row_user['rox_admin_email']; ?>">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card-box-rox">
									<h4 class="m-t-0 header-title"><b>Feed Customer Contact Information</b></h4>
									<p class="text-muted font-13 m-b-30">
										Your awesome text goes here.
									</p>
									<div class="form-group">
										<label for="address">Residential Address*</label>
										<input type="text" name="address" parsley-trigger="change" required placeholder="Enter Residential Address" class="form-control" id="address" value="<?php echo $row_user['rox_admin_address']; ?>">
									</div>
									<div class="form-group">
										<label for="tele">Telephone*</label>
										<input type="text" name="tele" parsley-trigger="change" required placeholder="Enter Telephone" class="form-control" id="tele" value="<?php echo $row_user['rox_admin_tele']; ?>">
									</div>
									<div class="form-group">
										<label for="mobile">Mobile*</label>
										<input type="text" name="mobile" parsley-trigger="change" required placeholder="Enter Mobile" class="form-control" id="mobile" value="<?php echo $row_user['rox_admin_mobile']; ?>">
									</div>
									<div class="form-group ">
										<label for="user_type">User Type*</label>
										<select name="user_type" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
										<option value="<?php echo $row_user['rox_admin_role']; ?>"><?php echo $row_user['rox_admin_role']; ?></option>
											<?php

											include('class/class_common_access.php');
											$load_user_level= Common_access::load_user_level();
										
											while ($row_level = mysqli_fetch_array($load_user_level)) {
											?> 
											<option value="<?php echo $row_level['rox_line_id']; ?>" ><?php echo $row_level['rox_u_level']; ?></option>
											<?php
											}
											?> 
										</select>
									</div>									
									<div class="form-group ">
										<label for="user_status">User Status*</label>
										<select name="user_status" class="selectpicker" data-live-search="true" required="" data-style="btn-white">
											<option value="<?php echo $row_user['rox_admin_user_status']; ?>"><?php echo $row_user['rox_admin_user_status']; ?></option>
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
								<button class="btn btn-primary waves-effect waves-light" name="update_admin_user" type="submit">
									Submit
								</button>
								<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
									Cancel
								</button>
							</div>
						</div>
					</form>
				<?php
					}
				}
				else{
					echo  '<script type="text/javascript">window.location="../manage-users?status=5";</script>';
				}
				?>
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

        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

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


        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

    </body>
</html>