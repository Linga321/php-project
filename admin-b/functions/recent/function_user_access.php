<?php
/**
 * Created by PhpStorm.
 * User: Linga
 * Date: 08/18/2016
 * Time: 02:10 PM
 */
	
	/* Branch functions */
	
	/*if(isset($_POST["save_branch"])) {
			
		//include('../class/class_autoid.php'); 
		$br_name=$_POST['br_name'];
		$br_tel=$_POST['br_tel'];
		$br_hot=$_POST['br_hot'];
		$br_add1=$_POST['br_add1'];		
		$br_add2=$_POST['br_add2'];
		$br_loc=$_POST['br_loc'];
		$br_pcode=$_POST['br_pcode'];
		$br_province=$_POST['br_province'];
		$get_letter = substr($br_loc, 0, 3);
		
		//$get_id =Autoid::get_branch_id();
		$autoid_id= strtoupper($get_letter).$br_pcode;//strtoupper($get_letter).($get_id+999);
		//echo $autoid_id;
		include('../class/class_user_access.php');
		$result= User_access::insert_branch($br_name,$br_tel,$br_hot,$br_add1,$br_add2,$br_loc, $autoid_id,$br_pcode,$br_province);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-branch?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-branch?sa=failed";</script>';
		}
	}
	*/
	
	/*if(isset($_POST["delete_branch"])) {
		
		$br_id =$_POST['delete_branch'];
		include('../class/class_user_access.php');
		$result= User_access::delete_branch($br_id);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-branch?dsa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-branch?dsa=failed";</script>';
		}
	}*/
	
	
	
	if(isset($_POST["paracall"])) {
		
		/* Branch Functions Info*/
		if($_POST["paracall"] == "get_branch"){
		$branch_info = array();
		$br_id=$_POST['paraid'];
		include('../class/class_user_access.php');
		$result= User_access::get_branch($br_id);
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

		include('../class/class_user_access.php');
		
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
		
		
		$result1= User_access::load_branch2();
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

		include('../class/class_user_access.php');
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

		$result= User_access::update_branch($br_id,$br_name,$br_tel,$br_hot,$br_add1,$br_add2,$br_loc, $autoid_id,$br_pcode,$br_province, $br_status);
		
		
		$result1= User_access::load_branch2();
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

		include('../class/class_user_access.php');
		$br_id=$_POST['parabr_id'];


		$result= User_access::delete_branch($br_id);
		
		
		$result1= User_access::load_branch2();
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

		include('../class/class_user_access.php');
	
		$result1= User_access::load_branch2();
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
		
		
		
	}
		
	
	
	

	/* Main- Category functions */

	if(isset($_POST["save_main_cate"])) {
		
		$main_cate_id =$_POST['main_cate_id'];
		$main_cate =$_POST['main_cate'];
		$main_cate_des =$_POST['main_cate_des'];

		include('../class/class_user_access.php');
		
		$result= User_access::insert_acc_main_cate($main_cate_id,$main_cate,$main_cate_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-categories?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-categories?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["mainid"])) {
		
		$main_cate_id =$_POST['mainid'];
		$main_cate =$_POST['maincate'];
		$main_cate_des =$_POST['maindes'];

		include('../class/class_user_access.php');
		
		$result= User_access::update_acc_main_cate($main_cate_id,$main_cate,$main_cate_des);
		echo "Success";
		
	}
	
	if(isset($_POST["deletemaincate"])) {
		
		$main_cate_id =$_POST['deletemaincate'];

		include('../class/class_user_access.php');
		
		$result= User_access::delete_acc_main_cate($main_cate_id);
		
	}
	
	/* Sub- Category functions */
	if(isset($_POST["save_sub_cate"])) {
		
		$cate_id =$_POST['cate_id'];
		$main_id =$_POST['main_id'];
		$sub_cate =$_POST['sub_cate'];
		$sub_cate_des =$_POST['sub_cate_des'];

		include('../class/class_user_access.php');
		
		$result= User_access::insert_acc_sub_cate($cate_id,$main_id,$sub_cate,$sub_cate_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-sub-categories?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-sub-categories?sa=failed";</script>';
		}
	}
	
	if(isset($_POST['cateid'])) {
		
		$cate_id =$_POST['cateid'];
		$main_id =$_POST['mainsubid'];
		$sub_cate =$_POST['subcate'];
		$sub_cate_des =$_POST['subcatedes'];

		include('../class/class_user_access.php');
		
		User_access::update_acc_sub_cate($cate_id,$main_id,$sub_cate,$sub_cate_des);
		
	}
	
	if(isset($_POST['deletesubcate'])) {
		
		$cate_id =$_POST['deletesubcate'];
		include('../class/class_user_access.php');	
		User_access::delete_acc_sub_cate($cate_id);
		
	}
	
	/* Save- Country functions */
	
	if(isset($_POST["save_country"])) {
		
		$coun_id =$_POST['coun_id'];
		$coun =$_POST['coun'];
		$coun_des =$_POST['coun_des'];


		include('../class/class_user_access.php');
		
		$result= User_access::insert_country($coun_id,$coun,$coun_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-country?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-country?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["save_province"])) {
		
		$pro_id =$_POST['pro_id'];
		$pro_coun =$_POST['pro_coun'];
		$pro =$_POST['pro'];

		include('../class/class_user_access.php');
		
		$result= User_access::insert_province($pro_id,$pro_coun,$pro);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-states-province?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-states-province?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["deleteprovince"])) {
		
		$pro_id =$_POST['deleteprovince'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_province($pro_id);
		
	}
	
	if(isset($_POST["deletecountry"])) {
		
		$coun_id =$_POST['deletecountry'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_country($coun_id);
		
	}
	
	
	/* manage-airlines functions */
	
	if(isset($_POST["save_airline"])) {
		
		$arl_name =$_POST['arl_name'];
		$iata_code =$_POST['iata_code'];
		$icao_code =$_POST['icao_code'];
		$arl_tel =$_POST['arl_tel'];		
		$arl_hot =$_POST['arl_hot'];
		$arl_add1 =$_POST['arl_add1'];
		
		$arl_add2 =$_POST['arl_add2'];
		$arl_city =$_POST['arl_city'];
		$arl_pcode =$_POST['arl_pcode'];
		$arl_country =$_POST['arl_country'];
		$arl_province =$_POST['arl_province'];
		$arl_g_email =$_POST['arl_g_email'];
		include('../class/class_user_access.php');
		
		$result= User_access::insert_airline($arl_name,$iata_code,$icao_code,$arl_tel,$arl_hot,$arl_add1,$arl_add2,$arl_city,$arl_pcode,$arl_country,$arl_province,$arl_g_email);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-airlines?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-airlines?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["delete_airline"])) {
		
		$arl_id =$_POST['delete_airline'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_airline($arl_id);
		
	}
	
		/* manage-flights functions */
	
	if(isset($_POST["save_flight"])) {
		
		$arl_name =$_POST['arl_name'];
		$flt_name =$_POST['flt_name'];
		$flt_no =$_POST['flt_no'];
		$flt_des =$_POST['flt_des'];		

		include('../class/class_user_access.php');
		
		$result= User_access::insert_flights($arl_name,$flt_name,$flt_no,$flt_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-flights?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-flights?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["delete_flight"])) {
		
		$flt_id =$_POST['delete_flight'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_flights($flt_id);
		
	}
	
	
	/* manage-destinations functions */
	
	if(isset($_POST["save_destinations"])) {
		
		$dis_id =$_POST['dis_id'];
		$des_country =$_POST['des_country'];
		$des_province =$_POST['des_province'];
		$dest_des =$_POST['dest_des'];		

		include('../class/class_user_access.php');
		
		$result= User_access::insert_destinations($dis_id,$des_country,$des_province,$dest_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-destinations?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-destinations?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["delete_desti"])) {
		
		$desti_id =$_POST['delete_desti'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_destinations($desti_id);
		
		//echo "Deleted Success";
		
	}
	/* Save Airport*/
	if(isset($_POST["save_airport"])) {
		
		$arp_id =$_POST['arp_id'];
		$arp =$_POST['arp'];
		$arp_des =$_POST['arp_des'];


		include('../class/class_user_access.php');
		
		$result= User_access::insert_airport($arp_id,$arp,$arp_des);
		if($result==2)
		{
			echo  '<script type="text/javascript">window.location="../manage-airports?sa=success";</script>';
		}
		else
		{
			echo  '<script type="text/javascript">window.location="../manage-airports?sa=failed";</script>';
		}
	}
	
	if(isset($_POST["deletearp"])) {
		
		$arp_id =$_POST['deletearp'];
		
		include('../class/class_user_access.php');
		
		$result= User_access::delete_airport($arp_id);
		
		//echo "Deleted Success";
		
	}
?>