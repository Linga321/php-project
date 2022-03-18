<?php
/*
 * Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 07:18 PM
 * This class contains about create and get token
 * set_token is needs a parameter of user info
 * get_token is needs a parameter of token that created by set_token
 * */
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    require __DIR__ . '/../../vendor/autoload.php';
    class JWT_AUTH
    { 

        public static function set_token($token = array())
        {
            $secret_server_key =null;
            include("../library/table_info.php");
            return JWT::encode($token, $secret_server_key, 'HS256');
        }

        public static function get_token($token ="")
        {
            $secret_server_key =null;
            include("../library/table_info.php");
            return JWT::decode($token, new Key($secret_server_key, 'HS256'));
        }
    }
?>