<?php
/*
* Created by PhpStorm.
* Author: Linga
* Date: 17/03/2022
* Time: 04:00 PM
* This class contains and controls file path, so file path can called by just simple name
* */
    define('DS','/');
    define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/php-project'.'/test-todo');
    define('INC_PATH', SITE_ROOT.DS.'includes'.DS);
    define('LIB_PATH', SITE_ROOT.DS.'library'.DS);
    define('ClASS_PATH', SITE_ROOT.DS.'class'.DS);
    define('ADMIN_PATH', SITE_ROOT.DS.'admin'.DS);
    define('TEMPLATE', SITE_ROOT.DS.'template'.DS);

    include('class.template.php');

?>