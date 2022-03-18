<?php
/*
 * Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 05:18 PM
 * This class contains validation of input information
 * */

class validation
{ 
    public static function email_validate($email="") // Validate email
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "Invalid email format";
        }
        else{
            return 1;
        }
    }

	public static function password_validate($password="")// Validate password strength
    {
        
        $uppercase = preg_match('@[A-Z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        if(!$uppercase || !$number || strlen($password) < 6) {
            echo 'Password should be at least 6 characters with at least one upper case lette and number';
        }else{
            return 1;
        }
    }
    
}
?>