<?php
/*
 * Created by PhpStorm.
 * User: Linga
 * Date: 29/07/2017
 * Time: 05:18 PM
 */


	
	if(isset($_POST['update'])){

		$line_id = $_POST['line_id'];
		$access = $_POST['access'];
		$column = $_POST['column'];
		$val = $_POST['val'];


		include('../class/class_authority.php');
		$admin_login= class_autority::update_autority($line_id,$access,$column,$val);
			
		
	}
	
?>