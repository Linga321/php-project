<?php
include('library/session_info.php');

$pagetitle = ' - Profile';

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

                        <h4 class="page-title">Profile</h4>
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $companyname; ?></a></li>
                            <li><a href="#">Users</a></li>
                            <li class="active">Profile</li>
                        </ol>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-4 col-lg-3">
                            <div class="profile-detail card-box">
                                <div>
                                    <img src="" class="img-circle" alt="profile-image">
          
                                    <hr>                                  
                                    <div class="text-left">
                                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $ac_fname." ".$ac_lname; ?></span></p>

                                        <p class="text-muted font-13"><strong>Tel :</strong><span class="m-l-15"><?php echo $ac_tel; ?></span></p>
										
                                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $ac_mobile; ?></span></p>

                                        <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $ac_email; ?></span></p>

                                        <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15"><?php echo $ac_add; ?></span></p>

                                    </div>                                  
                                </div>

                            </div>              
                        </div>

                        <div class="col-lg-9 col-md-8">
                           
                        </div>

                    </div>
				
				<!-- Footer -->
                <footer class="footer text-right">
                    <!-- Footer Section Starts-->
					<?php include("includes/footer.php"); ?>
					<!-- Footer Section Ends -->
                </footer>
                <!-- End Footer -->

            </div> 
			<!-- end container -->
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

        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

    </body>
</html>