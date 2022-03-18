<?php
/*
 * Created by PhpStorm.
 * User: Linga
 * Date: 29/07/2017
 * Time: 05:18 PM
 * this class is used to verify user password and user id
 * when user login to system class will create the session for user
 * redirect to dashboard if user logon and if user log out system will redirect to home page it means login page.
 * */

class login_class
{ 

    public static function admin_login_authondicate($email="",$password_md5="")
    {		
		$login_rox_table_name = null;
		$login_rox_table_filed_email = null;
		$login_rox_table_filed_pwd = null;
		$login_rox_table_filed_branch = null;
		$login_rox_status =null;
		$login_rox_user_level=null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "SELECT * FROM ".$login_rox_table_name." WHERE ".$login_rox_table_filed_email."='$email' AND ".$login_rox_table_filed_pwd." = '".$password_md5."' AND ".$login_rox_table_filed_status." ='$login_rox_status'";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount>= 1) {
            return 1;
        }
        $conn->close();		
    }
	
	
	public static function admin_email_authondicate($email="")
    {		
		$login_rox_table_name = null;
		$login_rox_table_filed_email = null;
		$login_rox_table_filed_pwd = null;
		$login_rox_table_filed_branch = null;
		$login_rox_status =null;
		$login_rox_user_level=null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		
        $sql = "SELECT * FROM ".$login_rox_table_name." WHERE ".$login_rox_table_filed_email."='$email' AND ".$login_rox_table_filed_status." ='$login_rox_status'";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount>= 1) {
            return 1;
        }
        $conn->close();		
    }
	
	public static function admin_reset_code_generate($email="")
    {		
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include("../class/class_rondom_password.php");
		
		$reset_code = Rrandom_password::reset_code(20);
		$reset_codemd5= md5($reset_code);
        $sql = "UPDATE ".$register_rox_table_name." SET 
			rox_admin_resetcode ='$reset_codemd5' WHERE rox_admin_email='$email'";
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return $reset_code;
		}
        mysqli_close($conn);	
    }
	
	
	public static function admin_password_change($code_reset="",$password_new="")
    {		
		$register_rox_table_name = null;
		$conn = null;
		include("../library/dbcon.php");
		include("../library/table_info.php");
		include("../class/class_rondom_password.php");
		
		$reset_codemd5= md5($code_reset);
		$$password_newmd5= md5($password_new);
        $sql = "UPDATE ".$register_rox_table_name." SET rox_admin_resetcode ='' , rox_admin_password ='$$password_newmd5' WHERE rox_admin_resetcode ='$reset_codemd5'";
		
        if (!mysqli_query($conn, $sql)) {
			return 2;
			
		} else {			
			return $reset_code;
		}
        mysqli_close($conn);	
    }
	
	public static function admin_mail_link_generate($email="",$reset_code="")
    {		
		include(INC_PATH . "system-info.php");
		date_default_timezone_set("Asia/Kolkata");
        $date = date('d-m-Y h:i:s A');
        $message= '<!DOCTYPE html>
						<html >
						<head>

						<style type="text/css">

						@import "compass/css3";

						// Font imports

						@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);

						// Color vars

						$white: #fff;
						$grey: #ccc;
						$dark_grey: #555;
						$blue: #4f6fad;
						$pink: #ee9cb4;

						// Mixins

						@mixin lato-book { font-family: "Lato", sans-serif; font-weight: 300; }
						@mixin lato-reg { font-family: "Lato", sans-serif; font-weight: 400; }
						@mixin lato-bold { font-family: "Lato", sans-serif; font-weight: 700; }
						@mixin btn($color) {
						  background-color: $color;
						  border-bottom-color: darken($color, 15%);
						  &:hover {
							  background-color: lighten($color, 5%);
							}
						}

						// Functions

						@function pxtoem($target, $context){
						  @return ($target/$context)+0em;
						}

						//

						body {
						  background-color: lighten($grey, 10%);
						  font-size: 100%;
						  @include lato-reg;
						}
						div, textarea, input {
						  @include box-sizing(border-box); 
						}  
						.container {  
						  max-width: 510px;
						  min-width: 324px;
						  margin: 50px auto 0px;
						  background-color: $white;
						  border: 1px solid lighten($grey, 1%); 
						  border-bottom: 3px solid $grey;
						}
						.row {
						  width: 100%;
						  margin: 0 0 1em 0;
						  padding: 0 2.5em;
						  &.header {
							padding: 1.5em 2.5em;
							border-bottom: 1px solid $grey; 
							background: url(css/bg.jpg) left -80px;
							color: $white;
						  }
						  &.body {
							padding: .5em 2.5em 1em;
						  }
						}
						.pull-right {
						  float: right; 
						}
						h1 {
						  @include lato-book;
						  display: inline-block;
						  font-weight: 100;
						  font-size: pxtoem(45, 16);
						  border-bottom: 1px solid hsla(100%, 100%, 100%, 0.3);
						  margin: 0 0 0.1em 0;
						  padding: 0 0 0.4em 0;
						}
						h3 {
						  @include lato-reg;
						  font-size: pxtoem(20, 16);
						  margin: 1em 0 0.4em 0;
						}
						.btn {
						  font-size: pxtoem(17, 16);
						  display: inline-block;
						  padding: 0.74em 1.5em;
						  margin: 1.5em 0 0;
						  color: $white;
						  border-width: 0 0 0 0;
						  border-bottom: 5px solid;
						  text-transform: uppercase;
						  @include btn(darken($grey, 10%));
						  @include lato-book;
						  &.btn-submit {
							@include btn($blue);
						  }
						}

						form {
						  max-width: 100%;
						  display: block;
						  ul {
							margin: 0;
							padding: 0;
							list-style: none;
							li {
							  margin: 0 0 0.25em 0; 
							  clear: both;
							  display: inline-block;
							  width: 100%;
							  &:last-child {
								  margin: 0;    
								}
								p {
								  margin: 0;
								  padding: 0;
								  float: left;
								  &.right {
									float: right;
								  }
								}     
								.divider {
								  margin: 0.5em 0 0.5em 0;
								  border: 0;
								  height: 1px;
								  width: 100%;
								  display: block;
								  background-color: $blue;
								  background-image: linear-gradient(to right, $pink, $blue);
								}
								.req {
								  color: $pink; 
								}
							}
						  }
						  label {
							display: block;
							margin: 0 0 0.5em 0;
							color: $blue;
							font-size: pxtoem(16, 16);
						  }
						  input {
							margin: 0 0 0.5em 0;
							border: 1px solid $grey;
							padding: 6px 10px;
							color: $dark_grey;
							font-size: pxtoem(16, 16);
						  }
						  textarea {
							border: 1px solid $grey;
							padding: 6px 10px;
							width: 100%;
							color: $dark_grey;
						  }
						  small {
							color: $blue;
							margin: 0 0 0 0.5em;
						  }
						}

						// Media Queries

						@media only screen and (max-width:480px) {
						  .pull-right {
							float: none; 
						  }
						  input {
							width: 100%; 
						  }
						  label {
							width: 100%;
							display: inline-block;
							float: left;
							clear: both;
						  }
						  li, p {
						   width: 100%; 
						  }
						  input.btn {
						   margin: 1.5em 0 0.5em; 
						  }
						  h1 {
						   font-size: pxtoem(36, 16); 
						  }
						  h3 {
							font-size: pxtoem(18, 16)
						  }
						  li small {
						   display: none; 
						  }
						}
						  body {
						   padding-top: 0 !important;
						   padding-bottom: 0 !important;
						   padding-top: 0 !important;
						   padding-bottom: 0 !important;
						   margin:0 !important;
						   width: 100% !important;
						   -webkit-text-size-adjust: 100% !important;
						   -ms-text-size-adjust: 100% !important;
						   -webkit-font-smoothing: antialiased !important;
						 }
						 .tableContent img {
						   border: 0 !important;
						   display: block !important;
						   outline: none !important;
						 }

						p, h2{
						  margin:0;
						}

						div,p,ul,h2,h2{
						  margin:0;
						}

						h2.bigger,h2.bigger{
						  font-size: 32px;
						  font-weight: normal;
						}

						h2.big,h2.big{
						  font-size: 21px;
						  font-weight: normal;
						}

						a.link1{
						  color:#62A9D2;font-size:13px;font-weight:bold;text-decoration:none;
						}

						a.link2{
						  padding:8px;background:#62A9D2;font-size:13px;color:#ffffff;text-decoration:none;font-weight:bold;
						}

						a.link3{
						  background:#62A9D2; color:#ffffff; padding:8px 10px;text-decoration:none;font-size:13px;
						}
						.bgBody{
						background: #F6F6F6;
						}
						.bgItem{
						background: #ffffff;
						}

						@media only screen and (max-width:480px)
								
						{
								
						table[class="MainContainer"], td[class="cell"] 
							{
								width: 100% !important;
								height:auto !important; 
							}
						td[class="specbundle"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								
							}
							td[class="specbundle1"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								padding-bottom:20px !important;
								
							}	
						td[class="specbundle2"] 
							{
								width:90% !important;
								float:left !important;
								font-size:14px !important;
								line-height:18px !important;
								display:block !important;
								padding-left:5% !important;
								padding-right:5% !important;
							}
							td[class="specbundle3"] 
							{
								width:90% !important;
								float:left !important;
								font-size:14px !important;
								line-height:18px !important;
								display:block !important;
								padding-left:5% !important;
								padding-right:5% !important;
								padding-bottom:20px !important;
								text-align:center !important;
							}
							td[class="specbundle4"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								padding-bottom:20px !important;
								text-align:center !important;
								
							}
								
						td[class="spechide"] 
							{
								display:none !important;
							}
								img[class="banner"] 
							{
									  width: 100% !important;
									  height: auto !important;
							}
								td[class="left_pad"] 
							{
									padding-left:15px !important;
									padding-right:15px !important;
							}
								 
						}
							
						@media only screen and (max-width:540px) 

						{
								
						table[class="MainContainer"], td[class="cell"] 
							{
								width: 100% !important;
								height:auto !important; 
							}
						td[class="specbundle"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								
							}
							td[class="specbundle1"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								padding-bottom:20px !important;
								
							}		
						td[class="specbundle2"] 
							{
								width:90% !important;
								float:left !important;
								font-size:14px !important;
								line-height:18px !important;
								display:block !important;
								padding-left:5% !important;
								padding-right:5% !important;
							}
							td[class="specbundle3"] 
							{
								width:90% !important;
								float:left !important;
								font-size:14px !important;
								line-height:18px !important;
								display:block !important;
								padding-left:5% !important;
								padding-right:5% !important;
								padding-bottom:20px !important;
								text-align:center !important;
							}
							td[class="specbundle4"] 
							{
								width: 100% !important;
								float:left !important;
								font-size:13px !important;
								line-height:17px !important;
								display:block !important;
								padding-bottom:20px !important;
								text-align:center !important;
								
							}
								
						td[class="spechide"] 
							{
								display:none !important;
							}
								img[class="banner"] 
							{
									  width: 100% !important;
									  height: auto !important;
							}
								td[class="left_pad"] 
							{
									padding-left:15px !important;
									padding-right:15px !important;
							}
								
							.font{
								font-size:15px !important;
								line-height:19px !important;
								
								}
						}
						</style>
						<!-- CSS goes in the document HEAD or added to your external stylesheet -->
						<style type="text/css">
						table.hovertable {
							font-family: verdana,arial,sans-serif;
							font-size:11px;
							color:#333333;
							border-width: 1px;
							border-color: #999999;
							border-collapse: collapse;
						}
						table.hovertable th {
							background-color:#62A9D2;
							border-width: 1px;
							padding: 8px;
							border-style: solid;
							border-color: #a9c6c9;
						}
						table.hovertable tr {
							background-color:#62A9D2;
						}
						table.hovertable td {
							border-width: 1px;
							padding: 8px;
							border-style: solid;
							border-color: #62A9D2;
						}
						</style>



						<style>

						</style>
						</head>

						<body>
						  
						<div class="container">
						  <div class="row header">
						   <img src="css/logo.png" alt="Compagnie logo" data-default="placeholder" data-max-width="300" width="30" height="30">
							<center><h1>Pasword Recover</h1></center>
						  </div>
						  <div class="row body">
							<form action="#"> 
							  <ul>
								
								<li>
								  <H1 class="left">
									Hi!
								  </h1>
								  <p class="pull-right">
								  For your password recover 
									  <a href="https://demo.roxwallwebs.com/mr.aircom/admin/reset-password?rst_cd='.$reset_code.'"><b>Click Here!</b></a>
								  </p>
								</li>
								
								
								
								
								
										
								<li><div class="divider"></div></li>
								</div>
								<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
										
									</div>

								
							   
								
							<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
										  <tr><td height="20" bgcolor="#62A9D2"></td></tr>
											<tr>
											  <td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top" bgcolor="62A9D2">
												  <tr>
													<td width="25"></td>
													<td width="475" valign="middle">
													  <div class="contentEditableContainer contentTextEditable">
														<div class="contentEditable" style="font-family:Georgia;font-style:italic;color:#0F4666;font-size:15px;line-height:19px;">
														  <p style="color:#0F4666;"></p>
														</div>
													  </div>
													</td>
													<td width="20" valign="top">
													  <div class="contentEditableContainer contentFacebookEditable">
														<div class="contentEditable">
														<a href="https://twitter.com/roxwallgroup">
														 <img src="twitter.png" alt="facebook" data-default="placeholder" data-customIcon="true" data-max-width="45" width="20" height="20" >
														 </a>
														</div>
													  </div>
													</td>
													<td width="20" valign="top">
													  <div class="contentEditableContainer contentFacebookEditable">
														<div class="contentEditable">
														<a href="https://twitter.com/roxwallgroup">
														 <img src="googleplus.png" alt="facebook" data-default="placeholder" data-customIcon="true" data-max-width="45" width="20" height="20" >
														 </a>
														</div>
													  </div>
													</td>
													<td width="20" valign="top">
													  <div class="contentEditableContainer contentFacebookEditable">
														<div class="contentEditable">
														<a href="https://twitter.com/roxwallgroup">
														 <img src="linkedin.png" alt="facebook" data-default="placeholder" data-customIcon="true" data-max-width="45" width="20" height="20" >
														 </a>
														</div>
													  </div>
													</td>
													<td width="5"></td>
													<td width="20" valign="top">
													  <div class="contentEditableContainer contentTwitterEditable">
														<div class="contentEditable">
														  <a href="https://www.facebook.com/roxwallgroup"> 
														  <img src="facebook.png" alt="Twitter" data-default="placeholder" data-customIcon="true" data-max-width="45" width="20" height="20
						"  >
														  </a>
														</div>
													  </div>  
													</td>
													<td width="10"></td>
												  </tr>
												</table>
											  </td>
											</tr>
											<tr><td height="10" bgcolor="#55a3d1"></td></tr>
										</table>
									</div>
							</form>  

						</div>
						  
						  
						</body>
						</html>';
        //echo $message;

		$to      = $email;   // give to email address
		//change subject of email
        $from    = ''.$companysupportemail.'';        // give from email address
        $reply=''.$companyinquiryemail.'';
        $subject='Pasword Recover Support System';
        // give from email address

// mandatory headers for email message, change if you need something different in your setting.
		$headers  = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $reply . "\r\n";
		//$headers .= "BCC: pranavan@rosaannebeach.lk\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($to, $subject, $message, $headers);
		return 1;	
    }
	
	
	
}
?>