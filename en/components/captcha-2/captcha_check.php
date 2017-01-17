<?

# jalal7h@gmail.com
# 2017/01/17
# 1.0

function captcha_check( $captcha_name , $captcha_code ){

	if( PhpCaptcha::Validate( $captcha_code ) ){
		return true;
	
	} else {
		return false;
	}

}







