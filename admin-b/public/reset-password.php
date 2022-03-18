<?php
$pagedescr = ' ';
$pagekeywords ='';
$pagetitle=' - Reset Portal Password';

include(INC_PATH . "system-info.php");

include(INC_PATH . "header.php");
?>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Change Password</h3>
            </div> 

            <div class="panel-body">
				<form class="form-horizontal m-t-20" action="functions/function_login.php" method="get">
					<?php
						if (isset($_GET['rst_cd'])) {
							$rst_cd = $_GET['rst_cd'];
							if ($rst_cd == '') {
								echo '<script type="text/javascript">window.location="recover-password?status=5";</script>';
							}
							if ($rst_cd != '') {
							   echo '<div class="form-group ">
										<label for="pass1">Reset Code*</label>
											<input class="form-control" type="text" name="code_reset" value="'.$rst_cd.'" readonly required="" placeholder="Reset Code">
									</div>
									<div class="form-group">
										<label for="pass1">Password*</label>
										<input id="pass1" type="password" name="password_new" placeholder="Password" required class="form-control">
									</div>
									<div class="form-group">
										<label for="passWord2">Confirm Password *</label>
										<input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
									</div>
									
									<div class="form-group text-center m-t-40">
										<div class="col-xs-12">
											<button name="reset_password" value="change" class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit" value="reset_password">Change Password</button>
										</div>
									</div>';
							}     
						}
						else{
							 // echo '<div class="alert alert-info alert-dismissable">
										// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
											// ×
										// </button>
										// Enter your <b>Email</b> and instructions will be sent to you!
									// </div>';
									echo '<script type="text/javascript">window.location="recover-password";</script>';
						}
					?>
				</form> 
            
            </div>   
            </div>                              
                <div class="row">
            	<div class="col-sm-12 text-center">
            		&copy; <?php echo DATE('Y'); ?> Design &amp; Developed By <a href="<?php echo $authorurl; ?>" target="_blank" class="text-primary m-l-5"><b><?php echo $author; ?></b></a>
                    </div>
            </div>
            
        </div>
        
        

        
    	<script>
            var resizefunc = [];
        </script>

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
	
	</body>
</html>