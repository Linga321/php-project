<?php

/*
 * Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Random code genarator class with given length
 * */

class Random_password
{

    public static function reset_code($length = 20)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

}

?>