<?php
/**
* Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 02:10 PM
 */
class Common_access
{   
	public static function create_todo($email="",$password_md5="")
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
		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
		mysqli_close($con);	
    }

	public static function get_todo($status="")
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
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount== 1) {
            return $token_data->user_id;
        }
		else{
			return 0;
		}
        $conn->close();		
    }

    public static function get_todo_by_status($status="")
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
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount== 1) {
            return $token_data->user_id;
        }
		else{
			return 0;
		}
        $conn->close();		
    }
	
	
	public static function update_todo($email="")
    {		
		$user_table_name = null;
		$table_field_email = null;
		$table_field_pwd = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "SELECT * FROM ".$user_table_name." WHERE ".$table_field_email."='$email'";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount>= 1) {
            return 2;
        }else{
			return 1;
		}
        $conn->close();		
    }


	public static function delete_todo($tokendata) // if remember me used
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
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return $reset_code;
		}
        mysqli_close($conn);			
    }
	
	
}



?>