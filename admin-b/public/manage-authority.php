<?php
include('library/session_info.php');
$pagetitle = ' -';

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

                        <h4 class="page-title">Manage User Authority</h4>
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $companyname; ?></a></li>
                            <li><a href="#">System Users</a></li>
                            <li class="active">User Authority</li>
                        </ol>
                    </div>
                </div>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<div class="card-box">
							<form action="functions/function_common_access.php" method="POST" data-parsley-validate novalidate>
								<div class="row">						
									<div class="col-lg-12">
									 
										<h4 class="m-t-0 header-title"><b>Add User Level</b></h4>
										<p class="text-muted font-13 m-b-30">
											User Level added on here will be shown on down below.
										</p>								
										<div class="form-group col-lg-4">
											<input type="text" name="user_level" parsley-trigger="change" required placeholder="User Level" class="form-control" id="user_level">
										</div>
										<div class="form-group col-lg-4">
											<label for="user_level"</label>
											<button name="save_user_level" class="btn btn-primary waves-effect waves-light" type="submit">
												Submit
											</button>
											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>										
									</div>
								</div>
							</form>
						</div>
						<div class="panel">
							<div class="panel-body">
								<div class="">
									<table class="table table-striped" id="datatable-editable1">
										<thead>
											<tr>
												<th>ID</th>
												<th>Uer Level</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php

											include('class/class_common_access.php');
				
											$load_user_level= Common_access::load_user_level();
											while ($row1 = mysqli_fetch_array($load_user_level)) {
											?>  
											<tr class="gradeA">
												<td><?php echo $row1['rox_line_id']; ?></td>
												<td><?php echo $row1['rox_u_level']; ?></td>
												<td class="actions">
													<a href="#" id="del_u_level" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div> 
					</div> 
                </div> 
				<br>	
				<div class="col-lg-12">
					<div class="panel">
                    <div class="panel-body">
                        <div class="">
                            <table class="table table-striped" id="authority">
                                <thead>
                                    <tr> 
									<?php
					
										$load_access_field = Common_access::load_access_feild();
									while ($row_access_field = mysqli_fetch_field($load_access_field)) {
										$result_col =$row_access_field->name;
										$col = strtr ($result_col, array ('rox_' => ''));
										//$col= str_replace("rox_"," ",$result_col)
										echo '<td>' . $col . '</td>';
			
									}
									
									
									?> 
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
								 $i = 0;
									$load = Common_access::load_access_level();
									while ($row_access_level = mysqli_fetch_array($load)) {
										
										echo '<tr class="gradeA">';
											$load_access_field = Common_access::load_access_feild();
											while ($row_access_field = mysqli_fetch_field($load_access_field)) {
											$result_col =$row_access_field->name;
											$result_text = $row_access_level[$result_col];
												if($result_col=="rox_line_id"||$result_col=="rox_web_access"){
													echo '<td>' .$result_text.'</td>';
												}
												else
												{
													echo '<td>';
													if($result_text==1)
													{
														echo ' <input type="checkbox" value="'.$result_text.'" name="'.$result_col.'" Checked>';
													}
													else{
														echo ' <input type="checkbox" value="'.$result_text.'" name="'.$result_col.'">';
													}
													echo '</td>';
												}
											}
										echo '</tr>';
											
									}
									?>  

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
							
                
                    <!-- end: page -->

                </div> <!-- end Panel -->

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
		
	<!-- MODAL -->
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
		<!-- end Modal -->
	
	
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

        <script src="assets/site/js/jquery.core.js"></script>
        <script src="assets/site/js/jquery.app.js"></script>
        <!-- Examples -->
	    <script src="assets/site/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
	    <script src="assets/site/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="assets/site/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="assets/site/pages/datatables.editable.init.main.level.js"></script>
		<script src="assets/site/pages/datatables.editable.init.editable.js"></script>
	    <script src="assets/site/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="assets/site/plugins/tiny-editable/numeric-input-example.js"></script>

	  
		<script>

		
			
			

		
	</script>

    </body>
</html>