<?php
/**
* Created by PhpStorm.
 * Author: Linga
 * Date: 17/03/2022
 * Time: 02:10 PM
 * this class only for autoid genarator
 */
class Autoid
{	
    public static function get_users_id()
    {
		$conn = null;
		include("../library/dbcon.php");
        $sql3 = "SELECT  * FROM user";
        $result=pg_query($conn,$sql3);
		$rowcount=pg_num_rows($result);
        $autoid_id="STD".($rowcount+1899);
        return  $autoid_id;
        pg_close();
    }
}

?>
