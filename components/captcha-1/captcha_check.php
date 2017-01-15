<?

function captcha_check( $captcha_name , $captcha_code ){

	if(! $captcha_code ){
		//

	} else if(! $_SESSION['captcha-'.$captcha_name] ){
		//

	} else if( $captcha_code != $_SESSION['captcha-'.$captcha_name] ){
		//
		
	} else {
		return true;
	}
	
	$_SESSION['captcha-wrong']++;
	return false;

}



