<?php
include('library/session_info.php');
$pagetitle = ' - Common_access';

$pagedescr = ' ';

$pagekeywords = ' ';

include(INC_PATH . "system-info.php");

include(INC_PATH . "header.php");
include('class/class_common_access.php');

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
                            <!-- Start Settings Options -->
							<?php include("includes/settings.php"); ?>
							<!-- End Settings Options -->
                        </div>

                        <h4 class="page-title">Common_access</h4>
                        <p class="text-muted page-title-alt"><?php /*echo $_SESSION['username'];*/?></p>
                    </div>
                </div>
				
				<?php if($ac_role=="Admin") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Users</h4>
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_admin_users(); ?></span></h2>
                            <p class="text-muted">Inactive Users: <?php echo $count_admin_users = Common_access::count_admin_active_users(); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>
                            <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_users(); ?></span></h2>
                            <p class="text-muted">Inactive Emps: <?php echo $count_admin_users = Common_access::count_active_users(); ?></p>
                        </div>
                    </div>        
                </div>
				
				<?php } ?>
				
				<?php if($ac_role=="Accountant") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Users</h4>
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_admin_users(); ?></span></h2>
                            <p class="text-muted">Inactive Users: <?php echo $count_admin_users = Common_access::count_admin_active_users(); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>
                            <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_users(); ?></span></h2>
                            <p class="text-muted">Inactive Emps: <?php echo $count_admin_users = Common_access::count_active_users(); ?></p>
                        </div>
                    </div>        
                </div>
				
				<?php } ?>
								
				<?php if($ac_role=="Chief Accountant") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Users</h4>
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_admin_users(); ?></span></h2>
                            <p class="text-muted">Inactive Users: <?php echo $count_admin_users = Common_access::count_admin_active_users(); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>
                            <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_users(); ?></span></h2>
                            <p class="text-muted">Inactive Emps: <?php echo $count_admin_users = Common_access::count_active_users(); ?></p>
                        </div>
                    </div>        
                </div>
				
				<?php } ?>
								
				<?php if($ac_role=="Manager") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>	 
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php  $bra = $_SESSION["ac_admin_login"]["branch"];  echo $count_admin_branch_users = Common_access::count_admin_branch_users($bra); ?></span></h2>
                            <p class="text-muted">Inactive Employee: <?php $bra = $_SESSION["ac_admin_login"]["branch"]; echo $count_admin_branch_inactive_users = Common_access::count_admin_branch_inactive_users(); ?></p>
                        </div>
                    </div>

                           
                </div>
				
				<?php } ?>
								
				<?php if($ac_role=="Employee") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Users</h4>
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_admin_users(); ?></span></h2>
                            <p class="text-muted">Inactive Users: <?php echo $count_admin_users = Common_access::count_admin_active_users(); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>
                            <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_users(); ?></span></h2>
                            <p class="text-muted">Inactive Emps: <?php echo $count_admin_users = Common_access::count_active_users(); ?></p>
                        </div>
                    </div>        
                </div>
				
				<?php } ?>
								
				<?php if($ac_role=="User") { ?>
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Users</h4>
                            <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_admin_users(); ?></span></h2>
                            <p class="text-muted">Inactive Users: <?php echo $count_admin_users = Common_access::count_admin_active_users(); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-2">
                        <div class="card-box widget-box-1 bg-white">
                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                            <h4 class="text-dark">Employee</h4>
                            <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $count_admin_users = Common_access::count_users(); ?></span></h2>
                            <p class="text-muted">Inactive Emps: <?php echo $count_admin_users = Common_access::count_active_users(); ?></p>
                        </div>
                    </div>        
                </div>
				
				<?php } ?>
				
                <!-- End row-->
				

                <!-- Footer -->
                <footer class="footer text-right">
                    <!-- Footer Section Starts-->
					<?php include("includes/footer.php"); ?>
					<!-- Footer Section Ends -->
                </footer>
                <!-- End Footer -->

            </div>
        </div>

        <!-- jQuery  -->
        <script src="assets/site/js/jquery.min.js"></script>
        <script src="assets/site/js/bootstrap.min.js"></script>
        <script src="assets/site/js/jquery.nicescroll.js"></script>
        <script src="assets/site/js/jquery.scrollTo.min.js"></script>


		<!-- <script src="assets/site/js/detect.js"></script>	-->
        <script src="assets/site/js/fastclick.js"></script>
        <script src="assets/site/js/jquery.slimscroll.js"></script>
        <script src="assets/site/js/jquery.blockUI.js"></script>
        <script src="assets/site/js/waves.js"></script>
        <script src="assets/site/js/wow.min.js"></script>

        <!-- Counterup  -->
        <script src="assets/site/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/site/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Morris chart js 
        <script src="assets/site/plugins/morris/morris.min.js"></script>
        <script src="assets/site/plugins/raphael/raphael-min.js"></script>-->

        <!-- Common_access 4 js 
		<script src="assets/site/pages/jquery.Common_access_4.js"></script>
		-->
        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

    </body>
</html>
