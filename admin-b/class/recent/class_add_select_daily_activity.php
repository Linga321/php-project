<?php
$check = $_POST["para0"];
$userid = $_POST["parauserid"]; 
$branch = $_POST["parabrn"];
$lvl = $_POST["paralevel"];   
if($check == "save_activity"){
	$conn = null;
	include("../library/dbcon.php");

	$description = $_POST["para1"];  
	$main_cate = $_POST["para2"]; 
	$sub_cate = $_POST["para3"]; 
	$unit_price = $_POST["para4"]; 

	$qty = $_POST["para5"]; 
	$discount_type = $_POST["para6"]; 
	$discount = $_POST["para7"]; 
	$total_price = $_POST["para8"]; 

	$net_price = $_POST["para9"]; 
	$type_of_entry = $_POST["para10"]; 
	$creditor = $_POST["para11"]; 
	$company = $_POST["para12"]; 
 
	
	
        $sql = "INSERT INTO rox_daily_activity(rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company,rox_dat_user_id,rox_dat_brn_id) VALUES ('$description','$main_cate ','$sub_cate ','$unit_price',  '$qty','$discount_type','$discount','$total_price'  ,'$net_price','$type_of_entry','$creditor','$company','$userid','$branch')";
		if (!mysqli_query($conn, $sql)) {
			
			
		} else {			
			$sql2 = "SELECT rox_line_id, rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company, rox_status, rox_auto_id FROM rox_daily_activity WHERE rox_dat_brn_id='$branch' AND DATE(rox_dat_date) = CURDATE()";

			$result = mysqli_query($conn,$sql2);

			$daily_activity = array();

			while( $row = mysqli_fetch_array($result) ){
				$rox_dat_description = $row['rox_dat_description'];
				$rox_dat_main_cate = $row['rox_dat_main_cate'];
				$rox_dat_sub_cate = $row['rox_dat_sub_cate'];
				$rox_dat_unit_price = $row['rox_dat_unit_price'];
				
				$rox_dat_qty = $row['rox_dat_qty'];
				$rox_dat_discount_type = $row['rox_dat_discount_type'];
				$rox_dat_discount = $row['rox_dat_discount'];
				$rox_dat_total_price = $row['rox_dat_total_price'];
				
				$rox_dat_net_price = $row['rox_dat_net_price'];
				$rox_dat_type_of_entry = $row['rox_dat_type_of_entry'];
				$rox_dat_creditor = $row['rox_dat_creditor'];
				$rox_dat_company = $row['rox_dat_company'];

				$daily_activity[] = array("description" => $rox_dat_description, "main_cate" => $rox_dat_main_cate,
									"sub_cate" => $rox_dat_sub_cate, "unit_price" => $rox_dat_unit_price,
									"qty" => $rox_dat_qty, "discount_type" => $rox_dat_discount_type,
									"discount" => $rox_dat_discount, "total_price" => $rox_dat_total_price,
									"net_price" => $rox_dat_net_price, "type_of_entry" => $rox_dat_type_of_entry,
									"creditor" => $rox_dat_creditor, "company" => $rox_dat_company);
			}

			// encoding array to json format
			echo json_encode($daily_activity);
		}
        mysqli_close($conn);
}

if( $check == "load_activity")
{
	$conn = null;
	include("../library/dbcon.php");
			
	$sql3 = "SELECT rox_line_id, rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company, rox_status, rox_auto_id FROM rox_daily_activity WHERE rox_dat_brn_id='$branch' AND DATE(rox_dat_date) = CURDATE()";

	$result = mysqli_query($conn,$sql3);

	$load_daily_activity = array();

	while( $row = mysqli_fetch_array($result) ){
		$rox_dat_description = $row['rox_dat_description'];
		$rox_dat_main_cate = $row['rox_dat_main_cate'];
		$rox_dat_sub_cate = $row['rox_dat_sub_cate'];
		$rox_dat_unit_price = $row['rox_dat_unit_price'];

		$rox_dat_qty = $row['rox_dat_qty'];
		$rox_dat_discount_type = $row['rox_dat_discount_type'];
		$rox_dat_discount = $row['rox_dat_discount'];
		$rox_dat_total_price = $row['rox_dat_total_price'];

		$rox_dat_net_price = $row['rox_dat_net_price'];
		$rox_dat_type_of_entry = $row['rox_dat_type_of_entry'];
		$rox_dat_creditor = $row['rox_dat_creditor'];
		$rox_dat_company = $row['rox_dat_company'];

		$load_daily_activity[] = array("description" => $rox_dat_description, "main_cate" => $rox_dat_main_cate,
									"sub_cate" => $rox_dat_sub_cate, "unit_price" => $rox_dat_unit_price,
									"qty" => $rox_dat_qty, "discount_type" => $rox_dat_discount_type,
									"discount" => $rox_dat_discount, "total_price" => $rox_dat_total_price,
									"net_price" => $rox_dat_net_price, "type_of_entry" => $rox_dat_type_of_entry,
									"creditor" => $rox_dat_creditor, "company" => $rox_dat_company);
			}

			// encoding array to json format
			echo json_encode($load_daily_activity);
		
        mysqli_close($conn);
}

if( $check == "load_date_activity")
{
	$paradate = $_POST["paradate"]; 
	$str_date = str_replace("/","-",$paradate);
	$conn = null;
	include("../library/dbcon.php");
	
	if($lvl=="Admin"){
			
	$sql3 = "SELECT rox_line_id, rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company, rox_status, rox_auto_id FROM rox_daily_activity WHERE DATE(rox_dat_date) = '$str_date'";
	}
	else{$sql3 = "SELECT rox_line_id, rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company, rox_status, rox_auto_id FROM rox_daily_activity WHERE rox_dat_brn_id='$branch' AND DATE(rox_dat_date) = '$str_date'";
	}
	

	$result = mysqli_query($conn,$sql3);

	$load_daily_activity = array();

	while( $row = mysqli_fetch_array($result) ){
		$rox_dat_description = $row['rox_dat_description'];
		$rox_dat_main_cate = $row['rox_dat_main_cate'];
		$rox_dat_sub_cate = $row['rox_dat_sub_cate'];
		$rox_dat_unit_price = $row['rox_dat_unit_price'];

		$rox_dat_qty = $row['rox_dat_qty'];
		$rox_dat_discount_type = $row['rox_dat_discount_type'];
		$rox_dat_discount = $row['rox_dat_discount'];
		$rox_dat_total_price = $row['rox_dat_total_price'];

		$rox_dat_net_price = $row['rox_dat_net_price'];
		$rox_dat_type_of_entry = $row['rox_dat_type_of_entry'];
		$rox_dat_creditor = $row['rox_dat_creditor'];
		$rox_dat_company = $row['rox_dat_company'];

		$load_daily_activity[] = array("description" => $rox_dat_description, "main_cate" => $rox_dat_main_cate,
									"sub_cate" => $rox_dat_sub_cate, "unit_price" => $rox_dat_unit_price,
									"qty" => $rox_dat_qty, "discount_type" => $rox_dat_discount_type,
									"discount" => $rox_dat_discount, "total_price" => $rox_dat_total_price,
									"net_price" => $rox_dat_net_price, "type_of_entry" => $rox_dat_type_of_entry,
									"creditor" => $rox_dat_creditor, "company" => $rox_dat_company);
			}

			// encoding array to json format
			echo json_encode($load_daily_activity);
		
        mysqli_close($conn);
}
 
if($lvl=="Manager")
{
	$conn = null;
	include("../library/dbcon.php");
			
	$sql3 = "SELECT rox_line_id, rox_dat_description, rox_dat_main_cate, rox_dat_sub_cate, rox_dat_unit_price, rox_dat_qty, rox_dat_discount_type, rox_dat_discount, rox_dat_total_price, rox_dat_net_price, rox_dat_type_of_entry, rox_dat_creditor, rox_dat_company, rox_status, rox_auto_id FROM rox_daily_activity WHERE rox_dat_brn_id='$branch' AND DATE(rox_dat_date) = CURDATE()";

	$result = mysqli_query($conn,$sql3);

	$load_daily_activity = array();

	while( $row = mysqli_fetch_array($result) ){
		$rox_dat_description = $row['rox_dat_description'];
		$rox_dat_main_cate = $row['rox_dat_main_cate'];
		$rox_dat_sub_cate = $row['rox_dat_sub_cate'];
		$rox_dat_unit_price = $row['rox_dat_unit_price'];

		$rox_dat_qty = $row['rox_dat_qty'];
		$rox_dat_discount_type = $row['rox_dat_discount_type'];
		$rox_dat_discount = $row['rox_dat_discount'];
		$rox_dat_total_price = $row['rox_dat_total_price'];

		$rox_dat_net_price = $row['rox_dat_net_price'];
		$rox_dat_type_of_entry = $row['rox_dat_type_of_entry'];
		$rox_dat_creditor = $row['rox_dat_creditor'];
		$rox_dat_company = $row['rox_dat_company'];

		$load_daily_activity[] = array("description" => $rox_dat_description, "main_cate" => $rox_dat_main_cate,
									"sub_cate" => $rox_dat_sub_cate, "unit_price" => $rox_dat_unit_price,
									"qty" => $rox_dat_qty, "discount_type" => $rox_dat_discount_type,
									"discount" => $rox_dat_discount, "total_price" => $rox_dat_total_price,
									"net_price" => $rox_dat_net_price, "type_of_entry" => $rox_dat_type_of_entry,
									"creditor" => $rox_dat_creditor, "company" => $rox_dat_company);
			}

			// encoding array to json format
			echo json_encode($load_daily_activity);
		
        mysqli_close($conn);
}
 
 
 
 
