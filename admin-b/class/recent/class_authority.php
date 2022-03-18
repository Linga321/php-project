<?php
/*
 * Created by PhpStorm.
 * User: Linga
 * Date: 29/07/2017
 * Time: 05:18 PM
 * this class is used to verify user password and user id
 * when user login to system class will create the session for user
 * redirect to dashboard if user logon and if user log out system will redirect to home page it means login page.
 * */

class class_autority
{ 

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
}
?>