<?php
    /*
	* Created by PhpStorm.
	* Author: Linga
	* Date: 16/03/2022
	* Time: 05:40 PM
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

        $auth_result= login_class::email_authondicate($email);
        if($auth_result==1){
            $password = md5($password);
            if($result_email==1 && $result_password==1){ // if email is valid
                $result= login_class::insert_user($email,$password);
                if ($result !== null) {  //if user info created
                    echo 'User Created';
                    
                }else {
                    header('500 Error');
                    echo 'Error Occured While creating';
                }
            }
            else{
                    header('402');
                    echo $result_email.$result_password;
            }
        }else{
            header('402');
            echo "Email already exists, please provide another one";
        }
		
		
	}else{
		header('WWW-Authenticate: Basic realm="Realm-Name"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<p>Not authorized access.</p>";
	}
    
?>