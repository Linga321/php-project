<?php
/*
* Created by PhpStorm.
* Author: Linga
* Date: 17/03/2022
* Time: 04:15 PM
* This class contains and information about database table and feild 
* */
/*------------------- Table----------------------*/
	$user_table_name = "USER_INFO";
	$todo_table_name = "to_do";

/*---------- User table field details ----------*/
	$table_field_id = "user_id";
	$table_field_email = "email";
	$table_field_pwd = "password";
	$table_field_reset_token = "reset_token";

/*---------- Todo table field details ----------*/
	$table_field_line_id = "line_id";
	$table_field_name = "name";
	$table_field_description = "description";
	$table_field_status = "status";

/*----------- common table details ---------------*/

	$table_field_create ="created_timestamp";
	$table_field_update ="updated_timestamp";

/*----------- Access Code ---------------*/
	$secret_server_key = "QWERTYUIasdfghjk";
	$lock_token = null;
		
?>