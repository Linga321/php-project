<?php
/**
 * Created by PhpStorm.
 * User: Linga
 * Date: 08/18/2016
 * Time: 02:10 PM
 */
class Common_access
{   
	public static function load_user_level(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT rox_line_id, rox_u_level FROM rox_user_level WHERE rox_status='1'";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }

	public static function get_user($user_id=""){
		
		$register_rox_table_name = null;
		$conn = null;
		include("library/dbcon.php");
		include("library/table_info.php");
		$sql1 ="SELECT * FROM ".$register_rox_table_name." WHERE rox_admin_user_status !='Terminated' and rox_admin_role != 'Admin' AND rox_admin_id ='$user_id'";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function insert_user($f_name="",$l_name="" ,$u_gender="" ,$u_nationality="",$pass="",$u_email="",$u_address="",$u_tele="",$u_mobile="",$user_status="",$u_passwordmd5="",$user_type="",$auto_id="")
    {
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "INSERT INTO ".$register_rox_table_name."(rox_admin_fname, rox_admin_lname, rox_admin_gender, rox_admin_nationality, rox_pass, rox_admin_email, rox_admin_address, rox_admin_tele, rox_admin_mobile, rox_admin_user_status,rox_admin_role, rox_admin_resetcode, user_auto_id,rox_admin_password)  VALUES ('$f_name','$l_name','$u_gender' ,'$u_nationality','$pass','$u_email','$u_address','$u_tele','$u_mobile','$user_status','$user_type','$u_passwordmd5','$auto_id','rox_admin_password')";
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return 1;
		}
        mysqli_close($conn);	
    }
	
	public static function update_user($u_id="",$f_name="",$l_name="" ,$u_gender="" ,$u_nationality="",$pass="",$u_email="",$u_address="",$u_tele="",$u_mobile="",$user_status="",$user_type="")
    {
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		

        $sql = "UPDATE ".$register_rox_table_name." SET 
		rox_admin_fname='$f_name',
		rox_admin_lname='$l_name',
		rox_admin_gender='$u_gender',
		rox_admin_nationality='$u_nationality',
		rox_pass='$pass',
		rox_admin_email='$u_email',
		rox_admin_address='$u_address',
		rox_admin_tele='$u_tele',
		rox_admin_mobile='$u_mobile',
		rox_admin_user_status='$user_status',
		rox_admin_role='$user_type'
		WHERE rox_admin_id ='$u_id'";
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return 1;
		}
        mysqli_close($conn);	
    }
	
	public static function delete_user($user_id="")
    {
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");		

        $sql = "UPDATE ".$register_rox_table_name." SET 
		rox_admin_user_status='Terminated'
		WHERE rox_admin_id ='$user_id'";
		
        if (mysqli_query($conn, $sql)) {
			return 1;		
		} else {			
			return 2;
		}
        mysqli_close($conn);	
    }
	
	public static function load_user()
    {
	
		$conn = null;
		$register_rox_table_name = null;
		include("library/dbcon.php");
		include("library/table_info.php");
        $sql5 = "SELECT * FROM ".$register_rox_table_name." WHERE rox_admin_user_status !='Terminated' and rox_admin_role != 'Admin'";		
		$result5=mysqli_query($conn,$sql5);
        return  $result5;
        $conn->close();
    }
	
	public static function insert_user_level($user_level="")
    {
		$col = "rox_".$user_level;
		$conn = null;
		$register_rox_table_name = null;
		include("../library/dbcon.php");

        $sql1 = "INSERT INTO rox_user_level(rox_u_level, rox_status) VALUES ('$user_level','1')";
		
        if (mysqli_query($conn, $sql1)) {
			$sql3 = "ALTER TABLE rox_access ADD $col int Default 0;";
			if (mysqli_query($conn, $sql3)) {
				return 1;		
			} else {			
				return 2;
			}		
		} else {			
			return 2;
		}
        mysqli_close($conn);
    }
	
	
	public static function delete_user_level($u_lvl_id="",$lvl="")
    {
		$col = "rox_".$lvl;
		$conn = null;
		$register_rox_table_name = null;
		include("../library/dbcon.php");

        $sql1 = "DELETE FROM rox_user_level WHERE rox_line_id ='$u_lvl_id' AND rox_u_level='$lvl'";
		
        if (mysqli_query($conn, $sql1)) {
			$sql3 = "ALTER TABLE rox_access DROP COLUMN $col";
			if (mysqli_query($conn, $sql3)) {
				return 1;		
			} else {			
				return 2;
			}		
		} else {			
			return 2;
		}
        mysqli_close($conn);
    }
	
	public static function update_autority($line_id="",$access="",$column="",$val="")
    {		
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");

        $sql = "UPDATE rox_access SET $column ='$val' WHERE rox_line_id='$line_id' AND rox_web_access='$access'";
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return 1;
		}
        mysqli_close($conn);	
    }
	
	public static function load_access_level(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT * FROM rox_access";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function load_access_feild(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT * FROM rox_access";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function view_ticket()
    {

        $conn = null;

		require_once("library/dbcon-ticket.php");
        $sql = "SELECT id, title,content FROM article WHERE id=10";
        $result = $conn->query(($sql));
		return $result;
        $conn->close();
		
	}
	
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
		$sql1 ="SELECT * FROM rox_admin_branch";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	public static function load_branch(){
		
		$conn = null;
		include("library/dbcon.php");
		$sql1 ="SELECT * FROM rox_admin_branch";
		$result=mysqli_query($conn,$sql1);
		return $result;
        mysqli_close($conn);		
    }
	
	public static function get_branch($br_id=""){
		
		$conn = null;
		include("../library/dbcon.php");
		$sql1 ="SELECT * FROM rox_admin_branch WHERE rox_br_autoid='$br_id' ";
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
	

	/* Dashboard EVT*/
	public static function count_admin_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_active_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Admin' and rox_admin_user_status='Active' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	 public static function count_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");
		
        $sql3 = "SELECT * FROM rox_admin_user WHERE rox_admin_role != 'Admin' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	 public static function count_active_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");
		
        $sql3 = "SELECT * FROM rox_admin_user WHERE rox_admin_role='User' and rox_admin_user_status='Active' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_branch_users($bra="")
    {
		$conn = null;
		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Employee' and rox_admin_user_status='Active' AND rox_branch='$bra' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_branch_inactive_users($bra="")
    {
		$conn = null;
		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Employee' and rox_admin_user_status='Suspened' AND rox_branch='$bra' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	
	
}



?>