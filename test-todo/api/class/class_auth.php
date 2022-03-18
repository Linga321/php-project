<?php
/*
 * Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 05:18 PM
 * this class is used to verify user password and email
 * when user login to system class will create the JWT for user
 * redirect to dashboard (200) if user login and if user log out system will redirect to with 401 login page.
 * */

class login_class
{ 


    public static function login_authondicate($email="",$password_md5="")
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_pwd = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include('../class/jwt.php');
        $sql = "SELECT user_id, email, password FROM ".$user_table_name." WHERE ".$table_field_email."='".$email."' AND ".$table_field_pwd." = '".$password_md5."'";
        $result=pg_query($conn,$sql);
        $rowcount=pg_num_rows($result);
        if ($rowcount== 1) {
			$auth_result = pg_fetch_array($result);
			$token = JWT_AUTH::set_token($auth_result);
            return $token;
        }
		else{
			return null;
		}
        pg_close();		
    }

	public static function token_validate($token="")
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_pwd = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include('../class/jwt.php');
		$token_data = JWT_AUTH::get_token($token);
		
        $sql = "SELECT user_id, email, password FROM ".$user_table_name." WHERE ".$table_field_email."='".$token_data->email."' AND ".$table_field_pwd." = '".$token_data->password."'";
        $result=pg_query($conn,$sql);
        $rowcount=pg_num_rows($result);
        if ($rowcount== 1) {
            return $token_data->user_id;
        }
		else{
			return 0;
		}
        pg_close();		
    }
	
	
	public static function email_authondicate($email="")
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_pwd = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "SELECT * FROM ".$user_table_name." WHERE ".$table_field_email."='$email'";
        $result=pg_query($conn,$sql);
        $rowcount=pg_num_rows($result);
        if ($rowcount>0) {
            return 2;
        }else{
			return 1;
		}
        pg_close();		
    }


	public static function token_update($tokendata) // if remember me used
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_reset_token = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include("../class/class_rondom_password.php");
		include('../class/jwt.php');
		$token = JWT_AUTH::get_token($tokendata);
		$token_email =$token['email'];
	
        $sql = "UPDATE ".$user_table_name." SET 
				".$table_field_reset_token." ='$reset_codemd5' 
				WHERE ".$table_field_email."='$token_email'";
		
        if (!pg_query($conn, $sql)) {
			return 2;
			
		} else {			
			return $reset_code;
		}
        pg_close($conn);			
    }
	
	public static function reset_code_generate($email="")
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_reset_token = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include("../class/class_rondom_password.php");
		
		$reset_code = Random_password::reset_code(20);
		$reset_codemd5= md5($reset_code);
        $sql = "UPDATE ".$user_table_name." SET 
				".$table_field_reset_token." ='$reset_codemd5' 
				WHERE ".$table_field_email."='$email'";
		
        if (!pg_query($conn, $sql)) {
			return 2;
			
		} else {			
			return $reset_code;
		}
        pg_close($conn);	
    }
	
	
	public static function password_change($password_old="",$password_new="", $user_id="")
    {		
		$user_table_name = null;
		$table_field_pwd = null;
		$table_field_update =null;
		$table_field_reset_token =null;
		$table_field_id =null;
		
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "UPDATE ".$user_table_name." SET 
			".$table_field_pwd." = '".$password_new."',
			".$table_field_update."  = CURRENT_TIMESTAMP
			WHERE ".$table_field_pwd." ='".$password_old."' AND ".$table_field_id." =".$user_id.";";
		pg_query($conn, $sql);
		return pg_affected_rows($conn);
		pg_close($con);
    }

	public static function insert_user($email="",$password="")
    {
		$user_table_name = null;
		$table_field_email = null;
		$table_field_pwd = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
        $sql = "INSERT INTO ".$user_table_name." (".$table_field_email." , ".$table_field_pwd.") VALUES ('".$email."','".$password."');";
		
        if (!pg_query($conn, $sql)) {
			return 2;
		} else {			
			return 1;
		}
        pg_close($conn);	
    }
	
}
?>