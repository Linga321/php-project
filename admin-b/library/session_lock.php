<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors','off');

	$_SESSION["ac_admin_lock"] = array();
	$_SESSION["ac_admin_lock"]["username"] = $_SESSION["ac_admin_login"]["email"];
	$_SESSION["ac_admin_lock"]["branch"] = $_SESSION["ac_admin_login"]["branch"];
	
	$_SESSION['ac_admin_login']='';
	echo '<script type="text/javascript">window.location="../lock-screen?status";</script>';

?>