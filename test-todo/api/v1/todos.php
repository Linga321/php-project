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
                // all access 



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