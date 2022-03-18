<?php

     /*
	* Created by PhpStorm.
	* Author: Linga
	* Date: 16/03/2022
	* Time: 05:45 PM
	*/

    header('Access-Control-Allow-Origin:*');
	header('Content-Type:application/json');

    $headers = apache_request_headers();
    $post_vars = json_decode(file_get_contents("php://input"), true);
	if(!empty($post_vars)){
		include("../library/table_info.php");
		include('../class/class_auth.php');
		include('../class/class_validation.php');
        // get token from header and validate.  if validation correct then result_token will be id
        $result_token =login_class::token_validate($headers['token']);
            if($result_token>0){
                $password_old = $post_vars['password_old'];
                $password_new = $post_vars['password_new'];
                
                $result_password = validation::password_validate($password_new);
                // make it md5 for storing
                $password_new = md5($password_new);
                $password_old = md5($password_old);

              if($result_password==1){ // if email is valid
                   $result= login_class::password_change($password_old,$password_new, $result_token);
                   if ($result == 1) {  //if user info created

                       header('WWW-Authenticate: Basic realm="Realm-Name"');
                       header('HTTP/1.0 401 Unauthorized');
                       echo 'User password changed';
                   }else {
                       header('500 Error');
                       echo 'Error Occured While updating';
                   }
               }
               else{
                       header('402');
                       echo $result_password;
               }
            }else{
                header('401 Unauthorized');
                echo "Something wrong with token!";
            }
        
	}else{
		header('WWW-Authenticate: Basic realm="Realm-Name"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<p>Not authorized access PW.</p>";
	}

?>