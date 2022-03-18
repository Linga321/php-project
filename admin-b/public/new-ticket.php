<?php
include('library/session_info.php');
$pagetitle = ' - New Tickets';

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
                            <!-- Start Settings Options -->
                            <?php include("includes/settings.php"); ?>
                            <!-- End Settings Options -->
                        </div>

                        <h4 class="page-title">Compose Mail</h4>
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $companyname; ?></a></li>
                            <li><a href="#">Support Tickets</a></li>
                            <li class="active">Tickets Inbox</li>
                        </ol>
                    </div>
                </div>

                <div class="row">

                    <!-- Left sidebar -->
                    <div class="col-lg-3 col-md-4">

                        <div class="p-20">
                            <a href="tickets" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light">Back to inbox</a>

                            <div class="list-group mail-list  m-t-20">
                                <a href="tickets" class="list-group-item b-0 active"><i class="fa fa-download m-r-10"></i>Inbox <b>(8)</b></a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-star-o m-r-10"></i>Starred</a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-file-text-o m-r-10"></i>Draft <b>(20)</b></a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-paper-plane-o m-r-10"></i>Sent Mail</a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-trash-o m-r-10"></i>Trash <b>(354)</b></a>
                            </div>


                            <h3 class="panel-title m-t-40">Labels</h3>

                            <div class="list-group b-0 mail-list">
                                <a href="#" class="list-group-item b-0"><span class="fa fa-circle text-info m-r-10"></span>Opened Tickets</a>
                                <a href="#" class="list-group-item b-0"><span class="fa fa-circle text-success m-r-10"></span>Answered Tickets</a>
                                <a href="#" class="list-group-item b-0"><span class="fa fa-circle text-purple m-r-10"></span>In Progress Tickets</a>
                                <a href="#" class="list-group-item b-0"><span class="fa fa-circle text-pink m-r-10"></span>Escalated Tickets</a>
                                <a href="#" class="list-group-item b-0"><span class="fa fa-circle text-warning m-r-10"></span>Closed Tickets</a>
                            </div>

                        </div>

                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="col-lg-9 col-md-8">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <div class="p-20">
                                        <!--<form role="form"> -->                                    
                                            <div class="form-group">
                                                <div class="row">                                                    
                                                    <div class="col-md-6">
                                                        <select class="form-control">
															<option>Select Department</option>
															<option>Technical Department</option>
															<option>Support Department</option>
															<option>Billing Department</option>
															<option>General Department</option>
														</select>
                                                    </div>
													<div class="col-md-6">
                                                        <select class="form-control">
															<option>Ticket Priority</option>
															<option>High level priority</option>
															<option>Medium level priority</option>
															<option>Low level priority</option>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group" >
                                                <div class="summernote" >
                                                    <h6>Hello Summernote</h6>
                                                    <ul>
                                                        <li>
                                                            Select a text to reveal the toolbar.
                                                        </li>
                                                        <li>
                                                            Edit rich document on-the-fly, so elastic!
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        End of air-mode area
                                                    </p>

                                                </div>
                                            </div>

                                            <div class="btn-toolbar form-group m-b-0">
                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button>
                                                    <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                                    <button class="btn btn-purple waves-effect waves-light" onclick="ticket_view()" > <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                </div>
                                            </div>          
                                        <!--</form> --> 
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- End row -->


                    </div> <!-- end Col-9 -->

                </div><!-- End row -->

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
		<script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 250,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
            });
        </script>
        <!--Summernote js-->
        <script src="assets/site/plugins/summernote/summernote.min.js"></script>
		<script src="assets/site/pages/datatables.editable.init.editable.js"></script>
        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

       


    </body>

</html>