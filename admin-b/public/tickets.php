<?php
include('library/session_info.php');
$pagetitle = ' - Tickets';

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

                        <h4 class="page-title">Inbox</h4>
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
                            <a href="new-ticket" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light">Compose</a>

                            <div class="list-group mail-list  m-t-20">
                                <a href="#" class="list-group-item b-0 active"><i class="fa fa-download m-r-10"></i>Tickets Inbox <b>(8)</b></a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-star-o m-r-10"></i>Starred Tickets</a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-file-text-o m-r-10"></i>Draft Tickets<b> (20)</b></a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-paper-plane-o m-r-10"></i>Sent Tickets</a>
                                <a href="#" class="list-group-item b-0"><i class="fa fa-trash-o m-r-10"></i>Trashed Tickets<b> (354)</b></a>
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
                            <div class="col-lg-12">
                                <div class="btn-toolbar m-t-20" role="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary waves-effect waves-light "><i class="fa fa-inbox"></i></button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light "><i class="fa fa-exclamation-circle"></i></button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light "><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-folder"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary waves-effect waves-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tag"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary waves-effect waves-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          More
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="javascript:void(0);">Dropdown link</a></li>
                                          <li><a href="javascript:void(0);">Dropdown link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->

                        <div class="panel panel-default m-t-20">
                            <div class="panel-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mails m-0">
                                        <tbody>
                                            
                                            <tr class="unread">
                                                <td class="mail-select">
                                                    <div class="checkbox checkbox-primary m-r-15">
                                                        <input id="checkbox3" type="checkbox">
                                                        <label for="checkbox3"></label>
                                                    </div>

                                                    <i class="fa fa-star text-warning m-r-15"></i>

                                                    <i class="fa fa-circle m-l-5 text-success"></i>
                                                </td>

                                                <td>
                                                    <a href="ticket-view" class="email-name">Manager</a>
                                                </td>

                                                <td class="hidden-xs">
                                                    <a href="ticket-view" class="email-msg">Dolor sit amet, consectetuer adipiscing</a>
                                                </td>
                                                <td style="width: 20px;">
                                                    <i class="fa fa-paperclip"></i>
                                                </td>
                                                <td class="text-right">
                                                    03:00 AM
                                                </td>
                                            </tr>

                                           

                                           
                                           
                                            <tr>
                                                <td class="mail-select">
                                                    <div class="checkbox checkbox-primary m-r-15">
                                                        <input id="checkbox8" type="checkbox">
                                                        <label for="checkbox8"></label>
                                                    </div>

                                                    <i class="fa fa-star m-r-15 text-muted"></i>

                                                    <i class="fa fa-circle m-l-5 text-white"></i>
                                                </td>

                                                <td>
                                                    <a href="ticket-view" class="email-name">John Deo</a>
                                                </td>

                                                <td class="hidden-xs">
                                                    <a href="ticket-view" class="email-msg">Hi Bro, How are you?</a>
                                                </td>
                                                <td style="width: 20px;">
                                                    <i class="fa fa-paperclip"></i>
                                                </td>
                                                <td class="text-right">
                                                    10 Oct
                                                </td>
                                            </tr>

                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div> <!-- panel body -->
                        </div> <!-- panel -->

                        <div class="row">
                            <div class="col-xs-7">
                                Showing 1 - 20 of 289
                            </div>
                            <div class="col-xs-5">
                                <div class="btn-group pull-right">
                                  <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                  <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>



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

        <!-- App core js -->
        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>

    </body>

</html>