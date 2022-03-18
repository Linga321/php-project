<?php
/*
 * this class is used to verify user password and user id
 * when user login to system class will create the session for user
 * redirect to dashboard if user logon and if user log out system will redirect to home page it means login page.
 */
class Dashboard
{   
   public static function count_admin_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_active_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Admin' and rox_admin_user_status='Active' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	 public static function count_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");
		
        $sql3 = "SELECT * FROM rox_admin_user WHERE rox_admin_role != 'Admin' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	 public static function count_active_users()
    {
		$conn = null;		
		include("library/dbcon.php");
		//include("library/table_info.php");
		
        $sql3 = "SELECT * FROM rox_admin_user WHERE rox_admin_role='User' and rox_admin_user_status='Active' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_branch_users($bra="")
    {
		$conn = null;
		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Employee' and rox_admin_user_status='Active' AND rox_branch='$bra' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	public static function count_admin_branch_inactive_users($bra="")
    {
		$conn = null;
		
		include("library/dbcon.php");
		//include("library/table_info.php");	
        $sql3 = "SELECT  * FROM rox_admin_user WHERE rox_admin_role='Employee' and rox_admin_user_status='Suspened' AND rox_branch='$bra' ";
        $result=mysqli_query($conn,$sql3);
		$rowcount=mysqli_num_rows($result);
        return  $rowcount;
        $conn->close();
    }
	
	
}

?>