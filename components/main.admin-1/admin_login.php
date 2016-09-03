<?php

# jalal7h@gmail.com
# 2016/05/15
# Version 1.1

function admin_logged(){
	
	$rand = $_SESSION['hcfalf'];
	// e($rand);
	$su = 'ssus'.$rand;
	$sp = 'sspw'.$rand;
	
	if( $_SESSION['admin'.$su] ){
		return true;
	
	} else {
		return false;
	}

}

function admin_check( $username , $password ){
	
	if(empty($username)){
		return false;
	}
	
	if(empty($password)){
		IncAtc();
		return false;
	}
	
	$query = " select `username` from `users` where `username`='$username' and `password`='".$password."' and `permission`='2' limit 1 ";
	
	if(!$res = dbq($query)){
		IncAtc();
		return false;
	
	} else {
		if(dbn($res)!=1){
			$_REQUEST['REPORT'] = "خطا در نام کاربری / کلمه عبور";
			IncAtc();
			return false;
		} else {
			return true;
		}
	}
}

function admin_login( $username , $password ){ // just first
	
	if(!$username){
		return false;
	}
	
	$rand = $_SESSION['hcfalf'];
	$fc = cpt('fc2#'.$rand, true);
	$sc = cpt('secn'.$rand, true);
	$su = 'ssus'.$rand;
	$sp = 'sspw'.$rand;
	$FixedCode=intval($_POST[$fc]);
	
	$captcha_name = "admin-login";
	$captcha_code = $_POST[ $sc ];

	if(! defined('__FC') ){
		IncAtc();
		return false;
	
	} else if( $FixedCode!=__FC ){
		$_REQUEST['REPORT']="خطا در کد ۳ رقمی";
		IncAtc();
		return false;
	
	} else if(! captcha_check( $captcha_name , $captcha_code ) ){
		$_REQUEST['REPORT']="خطا در کد کپچا";
		IncAtc();
		return false;
	
	} else {
		if( admin_check( $username, $password ) ){
			$_SESSION['admin'.$su] = $username;
			$_SESSION['admin'.$sp] = $password;
			return true;
		} else {
			return false;
		}
	}
}


function admin_login_id(){

	$rand = $_SESSION['hcfalf'];
	$su = 'ssus'.$rand;
	
	if(! $username = $_SESSION['admin'.$su] ){
		return false;
	} else {
		return table( 'users', $username, 'id', 'username' );
	}

}


function admin_login_form(){

	$rand = rand(10000000,99999999);
	$_SESSION['hcfalf'] = $rand;
	$us = cpt('user'.$rand, true);
	$pw = cpt('pass'.$rand, true);
	$fc = cpt('fc2#'.$rand, true);
	$sc = cpt('secn'.$rand, true);
	
	?>
	<form method="post" action="" >
	<input type="hidden" name="do" value="admin_login">
	
	<div class="admin_login_form" >
		<div class="legend">مدیریت سایت</div>
		<div class="container">
		<input autocomplete="off" placeholder="Username .." type="text" class="username" name="<?=$us?>" >
		<input autocomplete="off" placeholder="Password .." type="password" class="password" name="<?=$pw?>" >
		<input autocomplete="off" placeholder="FC2" maxlength="3" type="password" class="fc2 numeric" name="<?=$fc?>" title="کد مشخصه ثابت برای هر لایسنس" >
		<table cellpadding="0" cellspacing="0" ><tr>
		<td><input autocomplete="off" maxlength="4" type="text" name="<?=$sc?>" class="captcha numeric"></td>
		<td><img dir="rtl" class="captcha_img" title="این قسمت برای مقابله با روبوت های brute force در نظر گرفته شده، با وارد کردن شماره در فرم ادامه دهید" 
			src="<?=_URL?>/captcha-admin-login.png&nocache=<?=rand(10000000,99999999)?>" >
		</td>
		<td><input type="submit" value="Login" class="submit" ></td>
		</tr></table>
		</div>
	</div>
	
	</form>
	<center class="TX2">&nbsp;<?=$_REQUEST['REPORT'] ?></center>
	
	<a href="./" class="admin_login_form_back">
		<icon></icon>
		بازگشت به سایت
	</a>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.admin_login_form').css({'transform':'rotate(0deg)','opacity':'1.0'});
	});
	</script>
	<?
}

