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
    include('../class/class_auth.php');
    
    // get token from header and validate.  if validation correct then result_token will be id
    $result_token =login_class::token_validate($headers['token']);
    if($result_token>0){
        include("../library/table_info.php");
        include('../class/class_common_access.php');
        // all access 
    
        if($_SERVER['REQUEST_METHOD'] === 'GET'){ 
            if(!empty($_GET['status'])){
                $get_all =Common_access::get_todo_by_status($result_token,$_GET['status'] );
                echo $get_all;
            }
            else{
                $get_all =Common_access::get_todo($result_token);
                echo $get_all;
            }
        }
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($_POST['description']) && !empty($_POST['name'])&& !empty($_POST['status'])){
                $res =Common_access::create_todo($_POST['name'], $_POST['description'], $result_token,$_POST['status']);
                if($res==1){
                    echo "todo Item Created";
                }
                else{
                    echo "todo Item failed to Create";
                }
            }else{
                echo "missing data IN";
            }

        }
        else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
            $item = json_decode(file_get_contents("php://input"), true);
            if(!empty($item)){
                if(!empty($item['id']) && !empty($item['name']) && !empty($item['description']) && !empty($item['status'])){
                    $res =Common_access::update_todo($item['id'], $item['name'], $item['description'], $result_token,$item['status']);
                    if($res==1){
                        echo "todo Item Updated";
                    }else{
                        echo "todo Item failed to Update";
                    }
                }else{
                    echo "missing data UP";
                }
            }
            else{
                echo "todo Item is empty";
            }
            
        }
        else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            $item = json_decode(file_get_contents("php://input"), true);
            if(!empty($item['id'])){
                $res =Common_access::delete_todo($item['id'],  $result_token);
                if($res==1){
                    echo "todo Item Deleted";
                }else{
                    echo "todo Item failed to Delete";
                }
            }
            else{
                echo $item['id'];
            }
            
        }
        else{
            
        }
	}
    else{
		header('WWW-Authenticate: Basic realm="Realm-Name"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<p>Not authorized access PW.</p>";
	}

?>