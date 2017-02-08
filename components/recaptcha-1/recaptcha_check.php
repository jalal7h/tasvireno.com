<?php

# jalal7h@gmail.com
# 2017/01/25
# 1.0

function recaptcha_check(){
	
	if(! $response = trim($_REQUEST['g-recaptcha-response']) ){
		e(__FUNCTION__, __LINE__);

	} else if(! $res = curl( 'https://www.google.com/recaptcha/api/siteverify', [
		'secret'	=> recaptcha_secred_key , 
		'response'	=> $response
	] ) ){
		e(__FUNCTION__, __LINE__);

	} else {

		$res = json_decode($res, true);

		if( $res['success'] === true ){
			return true;
		} else {
			e(__FUNCTION__, __LINE__);
		}

	}

	e(__FUNCTION__, __LINE__);

	return false;

}




