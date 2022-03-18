<?php
/**
* Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 02:10 PM
 * this class contains information about todo list and query
 * Fo this class to acces vaild token needed
 * redirect to dashboard (200) if vaild token and otherwise system will redirect to with 401 login page.
 */
class Common_access
{   
	public static function create_todo($name="",$desc="",$userid="",$status="")
    {		
		$todo_table_name = null;

		$table_field_name = null;
		$table_field_description = null;
		$table_field_id = null;
		$table_field_status = null;
	
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "INSERT INTO {$todo_table_name} ( 
				{$table_field_name},
				{$table_field_description},
				{$table_field_id},
				{$table_field_status}) VALUES (
				'{$name}','{$desc}','{$userid}','{$status}')";
		$result =pg_query($conn, $sql);
		return pg_affected_rows($result);
		pg_close($conn);	
    }

	public static function get_todo($userid="")
    {		
		$todo_table_name = null;

		$table_field_line_id = null;
		$table_field_name = null;
		$table_field_description = null;
		$table_field_id = null;
		$table_field_status = null;

		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");

        $sql = "SELECT {$table_field_name},
		{$table_field_line_id},
		{$table_field_description},
		{$table_field_id},
		{$table_field_status} FROM {$todo_table_name} WHERE {$table_field_id}='{$userid}'";
        $result=pg_query($conn,$sql);
        return json_encode(pg_fetch_array($result));
        pg_close($conn);		
    }

    public static function get_todo_by_status($userid="", $status="")
    {		
		$todo_table_name = null;
		$table_field_line_id = null;
		$table_field_name = null;
		$table_field_description = null;
		$table_field_id = null;
		$table_field_status = null;

		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");

        $sql = "SELECT {$table_field_line_id},
		{$table_field_name},
		{$table_field_description},
		{$table_field_id},
		{$table_field_status} FROM {$todo_table_name} WHERE {$table_field_id}='{$userid}' AND {$table_field_status}='{$status}'";
        $result=pg_query($conn,$sql);
        return json_encode(pg_fetch_array($result));
        pg_close($conn);		
    }
	
	
	public static function update_todo($lineid="", $name="",$desc="",$userid="",$status="")
    {		
		$todo_table_name = null;

		$table_field_line_id = null;
		$table_field_name = null;
		$table_field_description = null;
		$table_field_id = null;
		$table_field_status = null;
		$table_field_update =null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "UPDATE {$todo_table_name} SET 
				{$table_field_name} ='{$name}', 
				{$table_field_description} ='{$desc}', 
				{$table_field_status} ='{$status}', 
				{$table_field_update} = 'NOW()'
				WHERE {$table_field_id}='{$userid}' AND {$table_field_line_id}='{$lineid}'";
		
		$result =pg_query($conn, $sql);
		return pg_affected_rows($result);
		pg_close($conn);		
    }


	public static function delete_todo($lineid="",$userid="") 
    {		
		$todo_table_name = null;
		$table_field_email = null;
		$table_field_reset_token = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		$sql = "DELETE FROM {$todo_table_name} 
		WHERE {$table_field_id}='{$userid}' AND {$table_field_line_id}='{$lineid}'";
		$result =pg_query($conn, $sql);
		return pg_affected_rows($result);
		pg_close($conn);			
    }
}
?>