<?php
$conn = null;
include("../library/dbcon.php");
$main_cate_id = $_POST["main_cate_id"]; 
$sql = "SELECT rox_sub_cate, rox_main_cate_id, rox_auto_id FROM rox_acc_sub_cate WHERE rox_main_cate_id = '$main_cate_id' AND rox_status='1'";

$result = mysqli_query($conn,$sql);

$sub_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $sub_cateid = $row['rox_sub_cate'];
    $sub_cate_name = $row['rox_sub_cate'];

    $sub_arr[] = array("sub_id" => $sub_cateid, "sub_name" => $sub_cate_name);
}

// encoding array to json format
echo json_encode($sub_arr);