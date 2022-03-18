<?php
$pagetitle = ' - Recover Password';

$pagedescr = ' ';

$pagekeywords = ' ';

include(INC_PATH . "system-info.php");

include(INC_PATH . "header.php");
?>
	<body>
		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Reset password for <strong class="text-custom"><br/>Roxwall Group</strong> Client Portal </h3>
				</div>
	
				<div class="panel-body">
					<form method="post" action="functions/function_login" role="form" class="text-center">
					<?php
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status == 'failed') {
                    echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Oops! Unregisterd <b> Email </b>Address
							</div>';
                }
                if ($status == 'success') {
                    echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							The recover password link send to your <b>Email</b> please check and follow the instructions!
							</div>';
                }
				if ($status == '4') {
                   echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Oops! <b>System Time out, connection Closed </b>
							</div>';
                }
				
				if ($status == '5') {
                   echo '<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
								Enter your <b>Email</b> and instructions will be sent to you!
							</div>';
                }     
            }
			else{
				 echo '<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>';
			}
        ?>
					
						
						<div class="form-group m-b-0">
							<div class="input-group">
								<input type="email" class="form-control" name="user_mail" placeholder="Enter Email" required="">
								<span class="input-group-btn">
									<button type="submit" name="reset_passowrd" value="recover_passowrd" class="btn btn-pink w-sm waves-effect waves-light">
										Reset
									</button> 
								</span>
							</div>
						</div>

					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						You remembered your password? <a href="./" class="text-primary m-l-5"><b>Sign In</b></a>
					</p>
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