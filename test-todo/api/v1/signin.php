<?php

	/*
	* Created by PhpStorm.
	* Author: Linga
	* Date: 16/03/2022
	* Time: 05:18 PM
	*/
    header('Access-Control-Allow-Origin:*');
	header('Content-Type:application/json');

	if(!empty($_POST['user_name']) && !empty($_POST['user_password'])){
		include("../library/table_info.php");
		include('../class/class_auth.php');
		include('../class/class_validation.php');
		$email = $_POST['user_name'];
		$password = $_POST['user_password'];
		$result_email = validation::email_validate($email);
		$result_password = validation::password_validate($password);
		
		$password = md5($password);
		if($result_email==1 && $result_password==1){ // if email is valid
			$auth_result= login_class::login_authondicate($email,$password);
			if ($auth_result !== null) {  //if you info matched and  token if exist
				header('token:'.$auth_result);
				echo 'Welcome to todo';
				
			}else {
				header('WWW-Authenticate: Basic realm="Realm-Name"');
				header('HTTP/1.0 401 Unauthorized');
				echo 'Invalid Credentials';
			}
		}
		else{
				header('WWW-Authenticate: Basic realm="Realm-Name"');
				header('HTTP/1.0 401 Unauthorized');
				echo $result_email.$result_password;
		}
		
	}else{
		header('WWW-Authenticate: Basic realm="Realm-Name"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<p>Not authorized access.</p>";
	}
?>