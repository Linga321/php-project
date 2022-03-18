<?php
/**
 * Created by PhpStorm.
 * User: Linga
 * Date: 08/18/2016
 * Time: 02:10 PM
 */
class User_access
{   

	/* Branch Sql Info*/
   public static function insert_branch($br_name="",$br_tel="",$br_hot="",$br_add1="",$br_add2="",$br_loc="", $autoid_id="",$br_pcode="",$br_province="",$br_status=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_admin_branch(rox_br_name, rox_br_tel, rox_br_hot, rox_br_add1, rox_br_add2, rox_br_city,rox_br_pcode , rox_br_province , rox_br_autoid, rox_br_status) VALUES ('$br_name','$br_tel','$br_hot','$br_add1','$br_add2','$br_loc','$br_pcode','$br_province','$autoid_id','$br_status')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function update_branch($br_id="",$br_name="",$br_tel="",$br_hot="",$br_add1="",$br_add2="",$br_loc="", $autoid_id="",$br_pcode="",$br_province="",$br_status=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "UPDATE rox_admin_branch SET rox_br_name='$br_name',rox_br_tel='$br_tel',rox_br_hot='$br_hot',rox_br_add1='$br_add1',rox_br_add2='$br_add2',rox_br_city='$br_loc',rox_br_pcode='$br_pcode',rox_br_province='$br_province',rox_br_status='$br_status' WHERE rox_br_autoid='$br_id'";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_branch2(){
		
		$conn = null;
		include("../library/dbcon.php");
		$sql1 ="SELECT rox_br_name, rox_br_tel, rox_br_hot, rox_br_add1, rox_br_add2, rox_br_city,rox_br_pcode, rox_br_province , rox_br_autoid, rox_br_status FROM rox_admin_branch";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	public static function load_branch(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_br_name, rox_br_tel, rox_br_hot, rox_br_add1, rox_br_add2, rox_br_city,rox_br_pcode, rox_br_province , rox_br_autoid, rox_br_status FROM rox_admin_branch";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function get_branch($br_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
		$sql1 ="SELECT rox_br_name, rox_br_tel, rox_br_hot, rox_br_add1, rox_br_add2, rox_br_city,rox_br_pcode, rox_br_province , rox_br_autoid , rox_br_status FROM rox_admin_branch WHERE rox_br_autoid='$br_id' ";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function delete_branch($br_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_admin_branch WHERE rox_br_autoid='$br_id' ";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	
	
	
	
	
	public static function insert_acc_main_cate($main_cate_id="",$main_cate="",$main_cate_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_acc_main_cate(rox_main_cate, rox_main_cate_des, rox_status, rox_auto_id) VALUES ('$main_cate','$main_cate_des','1','$main_cate_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function update_acc_main_cate($main_cate_id="",$main_cate="",$main_cate_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "UPDATE rox_acc_main_cate SET rox_main_cate='$main_cate',rox_main_cate_des='$main_cate_des' WHERE rox_auto_id='$main_cate_id'";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function delete_acc_main_cate($main_cate_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "UPDATE rox_acc_main_cate SET  rox_status ='0' WHERE rox_auto_id='$main_cate_id'";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	public static function load_acc_main_cate(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_line_id, rox_main_cate, rox_main_cate_des, rox_auto_id FROM rox_acc_main_cate WHERE rox_status='1'";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function select_acc_main_cate($id=""){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_main_cate FROM rox_acc_main_cate WHERE rox_auto_id ='$id'";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function insert_acc_sub_cate($cate_id="",$main_id="",$sub_cate="",$sub_cate_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_acc_sub_cate( rox_sub_cate, rox_sub_cate_des, rox_main_cate_id, rox_status, rox_auto_id) VALUES ('$sub_cate','$sub_cate_des','$main_id','1','$cate_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function update_acc_sub_cate($cate_id="",$main_id="",$sub_cate="",$sub_cate_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "UPDATE rox_acc_sub_cate SET rox_sub_cate='$sub_cate', rox_sub_cate_des='$sub_cate_des' WHERE rox_main_cate_id = '$main_id' AND rox_auto_id = '$cate_id'";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function delete_acc_sub_cate($cate_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "UPDATE rox_acc_sub_cate SET rox_status ='0' WHERE rox_auto_id='$cate_id'";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_acc_sub_cate(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_line_id, rox_sub_cate, rox_sub_cate_des, rox_main_cate_id, rox_auto_id FROM rox_acc_sub_cate WHERE rox_status = '1'";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function insert_country($coun_id="",$coun="",$coun_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_country( rox_country,rox_coun_des, rox_auto_id) VALUES ('$coun','$coun_des','$coun_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function insert_province($pro_id="",$pro_coun="",$pro=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_province(rox_country, rox_province, rox_auto_id) VALUES ('$pro_coun','$pro','$pro_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_country(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_line_id,rox_country,rox_coun_des, rox_auto_id FROM rox_country";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function load_province(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_line_id, rox_country, rox_province, rox_auto_id FROM rox_province";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function delete_country($coun_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_country WHERE rox_auto_id ='$coun_id' ";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function delete_province($pro_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_province WHERE rox_auto_id ='$pro_id' ";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	/* manage-airlines functions */
	
	public static function insert_airline($arl_name="",$iata_code="",$icao_code="",$arl_tel="",$arl_hot="",$arl_add1="",$arl_add2="",$arl_city="",$arl_pcode="",$arl_country="",$arl_province="",$arl_g_email=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_airlines(rox_arl_name, rox_arl_iata, rox_arl_icao, rox_arl_tel, rox_arl_hot, rox_arl_add1, rox_arl_add2, rox_arl_city, rox_arl_pcode, rox_arl_country, rox_arl_province, rox_arl_email) VALUES ('$arl_name','$iata_code','$icao_code','$arl_tel','$arl_hot','$arl_add1','$arl_add2','$arl_city','$arl_pcode','$arl_country','$arl_province','$arl_g_email')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_airline(){
		
		$conn = null;
		include("library/dbcon.php");
        $sql1 = "SELECT rox_line_id, rox_arl_name, rox_arl_iata, rox_arl_icao, rox_arl_tel, rox_arl_hot, rox_arl_add1, rox_arl_add2, rox_arl_city, rox_arl_pcode, rox_arl_country, rox_arl_province, rox_arl_email, rox_auto_id, rox_status FROM rox_airlines";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	
	public static function delete_airline($arl_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_airlines WHERE rox_line_id ='$arl_id' ";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	
	/* manage-flights functions */
	
	public static function insert_flights($arl_name="",$flt_name="",$flt_no="",$flt_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_flight(rox_arl_name, rox_flt_name, rox_flt_no, rox_flt_des) VALUES ('$arl_name','$flt_name','$flt_no','$flt_des')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_flights(){
		
		$conn = null;
		include("library/dbcon.php");
        $sql1 = "SELECT rox_line_id, rox_arl_name, rox_flt_name, rox_flt_no, rox_flt_des, rox_auto_id, rox_status FROM rox_flight";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	
	public static function delete_flights($flt_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_flight WHERE rox_line_id ='$flt_id' ";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	/* manage-destinations functions */
	
	public static function insert_destinations($dis_id="",$des_country="",$des_province="",$dest_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_destination(rox_desti_coun_name, rox_desti_provine, rox_desti, rox_auto_id) VALUES ('$des_country','$des_province','$dest_des','$dis_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_destinations(){
		
		$conn = null;
		include("library/dbcon.php");
        $sql1 = "SELECT rox_line_id, rox_desti_coun_name, rox_desti_provine, rox_desti, rox_auto_id, rox_status FROM rox_destination";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	
	public static function delete_destinations($desti_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_destination WHERE rox_auto_id = '$desti_id'";
		
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	/* Manage Airport*/
	
	public static function insert_airport($arp_id="",$arp="",$arp_des=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "INSERT INTO rox_airport( rox_arp,rox_arp_des, rox_auto_id) VALUES ('$arp','$arp_des','$arp_id')";
		if (!mysqli_query($conn, $sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function load_airport(){
		
		$conn = null;
		include("library/dbcon.php");
        $sql1 = "SELECT rox_line_id, rox_arp, rox_arp_des, rox_auto_id FROM rox_airport";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function delete_airport($arp_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
        $sql = "DELETE FROM rox_airport WHERE rox_auto_id ='$arp_id'";
		
		if (!mysqli_query($conn,$sql)) {
			return 1;
			
		} else {			
			return 2;
		}
        mysqli_close($conn);		
    }
	
	public static function send_reset_password_to_user($email="",$subject="",$message=""){

        date_default_timezone_set("Asia/Kolkata");
        $date = date('d-m-Y h:i:s A');
        $message= '';
        //echo $message;

		$to      = $email;   // give to email address
		//change subject of email
        $from    = 'Vigasa Support hello@vigasa.lk';        // give from email address
        $reply='hello@vigasa.lk';
        $subject='Message recived from VIGASA.LK';
        // give from email address

// mandatory headers for email message, change if you need something different in your setting.
		$headers  = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $reply . "\r\n";
		//$headers .= "BCC: pranavan@rosaannebeach.lk\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($to, $subject, $message, $headers);
		return 1;
	}
}

?>