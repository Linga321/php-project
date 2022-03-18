<?php
/* Login and Lock Screen validations*/
/* 10-15-2017 4.30 PM*/
session_start();
error_reporting(E_ALL);
ini_set('display_errors','on');
	$ac_id = null;
	$ac_fname = null;
	$ac_lname = null;
	$ac_email = null;
	$ac_add = null;
	$ac_tel = null;
	$ac_mobile = null;
	$ac_role = null;
	if(isset($_SESSION['ac_admin_login']["email"])){
		$conn = null;
		$login_rox_table_name = null;
		$authority_rox_table_name = null;
		$login_rox_table_filed_email = null;
		$login_rox_table_filed_level = null;
		$authority_rox_status= null;
		$login_rox_user_level=null;
		// $roxwall_AUTH_ID = null;
		$authority_rox_table_filed_web_access =null;
		$authority_rox_table_filed_chief_acc = null;
		$authority_rox_table_filed_manager = null;
		$authority_rox_table_filed_employee = null;
		$authority_rox_table_filed_acc = null;
		$rowcount = null;
		$user_check = null;
		$user_checkmd5 = null;
		include('library/dbcon.php');
		include('library/table_info.php');
		$ez_access = $roxwall_AUTH_ID;
		$found = false;
		$user_check = $_SESSION["ac_admin_login"]["email"] ;
		$user_checkmd5 = md5($user_check);
		if ($user_check != null && $user_checkmd5 != null)
		{
			if( $ez_access == $user_checkmd5){

				$ac_id= 001;
				$ac_fname="Super Admin";
				$ac_lname="Master";
				$ac_email="Master";
				$ac_role="Admin";
				$found =true;
			}
			else{
				
				$sql_authn = "SELECT * FROM ".$login_rox_table_name." WHERE ".$login_rox_table_filed_email."='$user_check' AND ".$login_rox_table_filed_status." ='$login_rox_status'";
				$rst_authn=mysqli_query($conn,$sql_authn);
				while($row=mysqli_fetch_array($rst_authn))
				{
					$ac_id = $row['user_auto_id'];
					$ac_fname = $row['rox_admin_fname'];
					$ac_lname = $row['rox_admin_lname'];
					$ac_email = $row['rox_admin_email'];
					$ac_add = $row['rox_admin_address'];
					$ac_tel = $row['rox_admin_tele'];
					$ac_mobile = $row['rox_admin_mobile'];
					$ac_role=$row['rox_admin_role'];
					$found =true;
				}
			}
		}
		if($found == true)
		{
				$_SESSION['sendpage'] = null;
				$link = $_GET['page'];
				$_SESSION['sendpage'] = $link;
				$authority_rox_table_filed = null;
				if($ac_role != "Admin"){
				$rowcount = null;
				$sql_access = "SELECT count(*) FROM ".$authority_rox_table_name." WHERE ".$authority_rox_table_filed_web_access." = '$link' AND rox_".$ac_role." = '$authority_rox_status'";
				$rst_access=mysqli_query($conn,$sql_access);
					while($row = mysqli_fetch_array($rst_access))
					{
						$rowcount = $row[0];
					}
				}
				if($ac_role=="Admin"){
					$rowcount=1;
				}
				if($rowcount==0){
					echo '<script type="text/javascript">window.location="403";</script>';
				}		 
		}
		if(!isset($ac_id))
		{
			echo '<script type="text/javascript">window.location="index?status=fail";</script>';
		}
	}
	else if(isset($_SESSION['ac_admin_lock']['username']))
	{
		echo '<script type="text/javascript">window.location="lock-screen?status=success";</script>';
	}
	else{
		echo '<script type="text/javascript">window.location="index?status=4";</script>';
	}
?>