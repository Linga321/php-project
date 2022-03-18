<?php
/**
 * Created by PhpStorm.
 * User: Linga
 * Date: 10/15/2017
 * Time: 11:45 AM
 */
if (isset($_POST['save_admin_user'])) {

	$f_name = $_POST['fname'];
	$l_name = $_POST['lname'];
	$u_gender = $_POST['gender'];
	$u_nationality = $_POST['nationality'];
	$pass = $_POST['pass'];
	$u_email = $_POST['email'];
	$u_address = $_POST['address'];
	$u_tele = $_POST['tele'];
	$u_mobile = $_POST['mobile'];
	$user_type = $_POST['user_type'];
	$branch = $_POST['branch'];
	$user_status = $_POST['user_status'];

	include('../class/class_autoid.php');
	$auto_id = Autoid::get_users_id();
	include('../class/class_rondom_password.php');
	$u_password = Rrandom_password::reset_code();
	$u_passwordmd5 = md5($u_password);
	include('../class/class_common_access.php');

	$sec = Common_access::insert_user($f_name, $l_name, $u_gender, $u_nationality, $pass, $u_email, $u_address, $u_tele, $u_mobile, $user_status, $u_passwordmd5, $user_type, $auto_id);
	if ($sec == 1) {
		echo '<script type="text/javascript">window.location="../create-users?status=success";</script>';
	} else {
		echo '<script type="text/javascript">window.location="../create-users?status=failed";</script>';
	}
}

if (isset($_POST['update_admin_user'])) {
	$uid = $_GET['uid'];
	$f_name = $_POST['fname'];
	$l_name = $_POST['lname'];
	$u_gender = $_POST['gender'];
	$u_nationality = $_POST['nationality'];
	$pass = $_POST['pass'];
	$u_email = $_POST['email'];
	$u_address = $_POST['address'];
	$u_tele = $_POST['tele'];
	$u_mobile = $_POST['mobile'];
	$user_type = $_POST['user_type'];
	$branch = $_POST['branch'];
	$user_status = $_POST['user_status'];

	include('../class/class_common_access.php');
	$sec = Common_access::update_user($uid, $f_name, $l_name, $u_gender, $u_nationality, $pass, $u_email, $u_address, $u_tele, $u_mobile, $user_status, $user_type);
	if ($sec == 1) {
		echo '<script type="text/javascript">window.location="../update-users?status=success";</script>';
	} else {
		echo '<script type="text/javascript">window.location="../update-users?status=failed";</script>';
	}
}

if (isset($_GET['delid'])) {
	$user_id = $_GET['delid'];

	include('../class/class_common_access.php');
	$sec = Common_access::delete_user($user_id);
	if ($sec == 1) {
		echo '<script type="text/javascript">window.location="../manage-users?status=success";</script>';
	} else {
		echo '<script type="text/javascript">window.location="../manage-users?status=failed";</script>';
	}
}
if (isset($_POST["save_user_level"])) {
	$user_level = $_POST['user_level'];
	include('../class/class_common_access.php');
	$result = Common_access::insert_user_level($user_level);
	if ($result == 1) {
		echo  '<script type="text/javascript">window.location="../manage-authority?sa=success";</script>';
	} else {
		echo  '<script type="text/javascript">window.location="../manage-authirity?sa=failed";</script>';
	}
}

if (isset($_POST["u_lvl_id"])) {

	$u_lvl_id = $_POST['u_lvl_id'];
	$lvl = $_POST['lvl'];
	include('../class/class_common_access.php');
	$result = Common_access::delete_user_level($u_lvl_id, $lvl);

}
if (isset($_POST['update'])) {

	$line_id = $_POST['line_id'];
	$access = $_POST['access'];
	$column = $_POST['column'];
	$val = $_POST['val'];
	include('../class/class_common_access.php');
	$admin_login = Common_access::update_autority($line_id, $access, $column, $val);

}

if(isset($_POST["create_teckets"])){
	$conn = null;
			include("../library/dbcon-ticket.php");
			$title = "hll";//$_POST['files'];
			$content = mysqli_real_escape_string($conn,$_POST['contents']);
			
			//echo $des = str_replace("+","-",$content);
			//$des = mysql_real_escape_string($_POST['contents'],$conn);
			$sql ="INSERT INTO article (title,content,file) VALUES ('Test','$content','$title')";
			if (!mysqli_query($conn, $sql)) {
			return 1;
			
			} else {			
				return 2;
			}
			mysqli_close($conn);	
			//if($stmt->execute())
			//header("Location:new-ticket");
	
}
if(isset($_POST["paracall"])) {
		
	/* Branch Functions Info*/
	if($_POST["paracall"] == "get_branch"){
		$branch_info = array();
		$br_id=$_POST['paraid'];
		include('../class/class_common_access.php');
		$result= Common_access::get_branch($br_id);
		while( $row = mysqli_fetch_array($result) ){
				$rox_br_name = $row['rox_br_name'];
				$rox_br_tel = $row['rox_br_tel'];
				$rox_br_hot = $row['rox_br_hot'];
				$rox_br_add1 = $row['rox_br_add1'];
				$rox_br_add2 = $row['rox_br_add2'];
				$rox_br_city = $row['rox_br_city'];
				$rox_br_pcode = $row['rox_br_pcode'];
				$rox_br_province = $row['rox_br_province'];
				$rox_br_autoid = $row['rox_br_autoid'];
				$rox_br_starus = $row['rox_br_status'];

				$branch_info[] = array(	"br_name" => $rox_br_name, 	"br_tel" => $rox_br_tel,
										"br_hot" => $rox_br_hot, 	"br_add1" => $rox_br_add1,
										"br_add2" => $rox_br_add2,	"br_city" => $rox_br_city,
										"br_pcode" => $rox_br_pcode,"br_province" => $rox_br_province,
										"br_autoid" => $rox_br_autoid,	"br_status" => $rox_br_starus);										
			}
			echo json_encode($branch_info);
	}
	
	if($_POST["paracall"] == "save_branch"){
		$branch_info = array();

		include('../class/class_common_access.php');
		
		// $br_name=$_POST['parabr_name'];
		// $br_tel=$_POST['parabr_tel'];
		// $br_hot=$_POST['parabr_hot'];
		// $br_add1=$_POST['parabr_add1'];		
		// $br_add2=$_POST['parabr_add2'];
		// $br_loc=$_POST['parabr_loc'];
		// $br_pcode=$_POST['parabr_pcode'];
		// $br_province=$_POST['parabr_province'];
		// $br_status=$_POST['parabr_status'];
		// $get_letter = substr($br_loc, 0, 3);
		//$get_id =Autoid::get_branch_id();
		// $autoid_id= strtoupper($get_letter).$br_pcode;//strtoupper($get_letter).($get_id+999);

		//$result= User_access::insert_branch($br_name,$br_tel,$br_hot,$br_add1,$br_add2,$br_loc, $autoid_id,$br_pcode,$br_province,$br_status);
		
		
		$result1= Common_access::load_branch2();
		while( $row = mysqli_fetch_array($result1) ){
				$rox_br_name = $row['rox_br_name'];
				$rox_br_tel = $row['rox_br_tel'];
				$rox_br_hot = $row['rox_br_hot'];
				$rox_br_add1 = $row['rox_br_add1'];
				$rox_br_add2 = $row['rox_br_add2'];
				$rox_br_city = $row['rox_br_city'];
				$rox_br_pcode = $row['rox_br_pcode'];
				$rox_br_province = $row['rox_br_province'];
				$rox_br_autoid = $row['rox_br_autoid'];
				$rox_br_starus = $row['rox_br_status'];

				$branch_info[] = array(	"br_name" => $rox_br_name, 	"br_tel" => $rox_br_tel,
										"br_hot" => $rox_br_hot, 	"br_add1" => $rox_br_add1,
										"br_add2" => $rox_br_add2,	"br_city" => $rox_br_city,
										"br_pcode" => $rox_br_pcode,"br_province" => $rox_br_province,
										"br_autoid" => $rox_br_autoid,	"br_status" => $rox_br_starus);										
			}
			echo json_encode($branch_info);
		}
			
	if($_POST["paracall"] == "update_branch"){
		$branch_info = array();

		include('../class/class_common_access.php');
		$br_id=$_POST['parabr_id'];
		$br_name=$_POST['parabr_name'];
		$br_tel=$_POST['parabr_tel'];
		$br_hot=$_POST['parabr_hot'];
		$br_add1=$_POST['parabr_add1'];		
		$br_add2=$_POST['parabr_add2'];
		$br_loc=$_POST['parabr_loc'];
		$br_pcode=$_POST['parabr_pcode'];
		$br_status=$_POST['parabr_status'];
		$br_province=$_POST['parabr_province'];
		$get_letter = substr($br_loc, 0, 3);
		//$get_id =Autoid::get_branch_id();
		$autoid_id= strtoupper($get_letter).$br_pcode;//strtoupper($get_letter).($get_id+999);

		$result= Common_access::update_branch($br_id,$br_name,$br_tel,$br_hot,$br_add1,$br_add2,$br_loc, $autoid_id,$br_pcode,$br_province, $br_status);


		$result1= Common_access::load_branch2();
		while( $row = mysqli_fetch_array($result1) ){
				$rox_br_name = $row['rox_br_name'];
				$rox_br_tel = $row['rox_br_tel'];
				$rox_br_hot = $row['rox_br_hot'];
				$rox_br_add1 = $row['rox_br_add1'];
				$rox_br_add2 = $row['rox_br_add2'];
				$rox_br_city = $row['rox_br_city'];
				$rox_br_pcode = $row['rox_br_pcode'];
				$rox_br_province = $row['rox_br_province'];
				$rox_br_autoid = $row['rox_br_autoid'];
				$rox_br_starus = $row['rox_br_status'];

				$branch_info[] = array(	"br_name" => $rox_br_name, 	"br_tel" => $rox_br_tel,
										"br_hot" => $rox_br_hot, 	"br_add1" => $rox_br_add1,
										"br_add2" => $rox_br_add2,	"br_city" => $rox_br_city,
										"br_pcode" => $rox_br_pcode,"br_province" => $rox_br_province,
										"br_autoid" => $rox_br_autoid,	"br_status" => $rox_br_starus);										
			}
			echo json_encode($branch_info);
	}
			
			
	if($_POST["paracall"] == "delete_branch"){
		$branch_info = array();
		include('../class/class_common_access.php');
		$br_id=$_POST['parabr_id'];
		$result= Common_access::delete_branch($br_id);
		$result1= Common_access::load_branch2();
		while( $row = mysqli_fetch_array($result1) ){
			$rox_br_name = $row['rox_br_name'];
			$rox_br_tel = $row['rox_br_tel'];
			$rox_br_hot = $row['rox_br_hot'];
			$rox_br_add1 = $row['rox_br_add1'];
			$rox_br_add2 = $row['rox_br_add2'];
			$rox_br_city = $row['rox_br_city'];
			$rox_br_pcode = $row['rox_br_pcode'];
			$rox_br_province = $row['rox_br_province'];
			$rox_br_autoid = $row['rox_br_autoid'];
			$rox_br_starus = $row['rox_br_status'];

			$branch_info[] = array(	"br_name" => $rox_br_name, 	"br_tel" => $rox_br_tel,
									"br_hot" => $rox_br_hot, 	"br_add1" => $rox_br_add1,
									"br_add2" => $rox_br_add2,	"br_city" => $rox_br_city,
									"br_pcode" => $rox_br_pcode,"br_province" => $rox_br_province,
									"br_autoid" => $rox_br_autoid,	"br_status" => $rox_br_starus);										
			}
			echo json_encode($branch_info);
	}

	if($_POST["paracall"] == "load"){
		$branch_info = array();

		include('../class/class_common_access.php');

		$result7 = Common_access::load_branch2();
		while( $row = mysqli_fetch_array($result7) ){
				$rox_br_name = $row['rox_br_name'];
				$rox_br_tel = $row['rox_br_tel'];
				$rox_br_hot = $row['rox_br_hot'];
				$rox_br_add1 = $row['rox_br_add1'];
				$rox_br_add2 = $row['rox_br_add2'];
				$rox_br_city = $row['rox_br_city'];
				$rox_br_pcode = $row['rox_br_pcode'];
				$rox_br_province = $row['rox_br_province'];
				$rox_br_autoid = $row['rox_br_autoid'];
				$rox_br_starus = $row['rox_br_status'];

				$branch_info[] = array(	"br_name" => $rox_br_name, 	"br_tel" => $rox_br_tel,
										"br_hot" => $rox_br_hot, 	"br_add1" => $rox_br_add1,
										"br_add2" => $rox_br_add2,	"br_city" => $rox_br_city,
										"br_pcode" => $rox_br_pcode,"br_province" => $rox_br_province,
										"br_autoid" => $rox_br_autoid,	"br_status" => $rox_br_starus);										
		}
		echo json_encode($branch_info);
	}

}

?>
