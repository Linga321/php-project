<?php

$pagetitle = ' - Aircom Admin Panel';

$pagedescr = ' ';

$pagekeywords = ' ';

include(INC_PATH . "system-info.php");

include(INC_PATH . "header.php");

?>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		
		<div class="wrapper-page">
			<div class="card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Sign In to <strong class="text-custom"><?php echo $companyname; ?></strong></h3>
				</div>
		<?php
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status == 'ERI1095B84CPH6MOL3KS') {
                    echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Done <b>Login With your new password </b>
							</div>';
                }
                if ($status == 'failed') {
                    echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Oops! <b>Invalid Credentials    </b>
							</div>';
                }
                if ($status == 'invaid') {
                    echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Oops! <b>Invalid Logout    </b>
							</div>';
                }
				if ($status == 'fail') {
                    echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								<i class="fa fa-close"></i>
							</button>
							Oops! <b>Invalid Logout    </b>
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
            }
        ?>
				<div class="panel-body">
					<form class="form-horizontal m-t-20" method="POST" action="functions/function_login.php">

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="user_name" required="" placeholder="Username">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" name="user_password"required="" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<select class="selectpicker" type="text" name="branch" required="">
								<?php
									include('class/class_common_access.php');
									$load_branch= Common_access::load_branch();								
									while ($row_branch = mysqli_fetch_array($load_branch)) {
								?> 
								<option value="<?php echo $row_branch['rox_br_autoid']; ?>"><?php echo $row_branch['rox_br_city']; ?></option>
								<?php } ?> 
								</select>
							</div>
						</div>
						<div class="form-group ">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox" name="checkbox-signup">
									<label for="checkbox-signup"> Remember me </label>
								</div>

							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button name="user_admin_login" value="login" class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
									Log In
								</button>
							</div>
						</div>

						<div class="form-group m-t-20 m-b-0">
							<div class="col-sm-12">
								<a href="recover-password" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
							</div>
						</div>
					</form>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						&copy; <?php echo DATE('Y'); ?> Design &amp; Developed By <a href="<?php echo $authorurl; ?>" target="_blank" class="text-primary m-l-5"><b><?php echo $author; ?></b></a>
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
		
		 <script src="assets/site/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/site/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/site/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/site/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/site/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/site/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

	</body>
</html>