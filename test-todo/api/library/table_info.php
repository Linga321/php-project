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

/*---------- Login table field details ----------*/
	$table_field_id = "user_id";
	$table_field_email = "email";
	$table_field_pwd = "password";
	$table_field_reset_token = "reset_token";

/*----------- common table details ---------------*/
	$status = "Active";
	$user_level = "Admin";
	$table_field_create ="created_timestamp";
	$table_field_update ="updated_timestamp";

/*---------- manage-authority table field details ----------*/
	$authority_rox_table_field_web_access = "rox_web_access";


/*----------- manage-authority table details ---------------*/
	$authority_rox_status = "1";

/*----------- Access Code ---------------*/
	$secret_server_key = "QWERTYUIasdfghjk";
	$lock_token = null;

		
?>