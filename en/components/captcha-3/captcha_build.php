<?

# jalal7h@gmail.com
# 2017/01/20
# 3.0

$GLOBALS['do_action'][] = 'captcha_build';

function captcha_build(){
	
	#
	# find the name of captcha
	if(! $captcha_name = $_REQUEST['captcha_name'] ){
		die();
	}
	// session_destroy();
	# 
	# select the code and store it
	if( intval($_SESSION['captcha-wrong']) < 3 ){

		#
		# the code
		list( $rand_operation , $rand_number ) = captcha_build_math();
		$_SESSION['captcha-'.$captcha_name] = $rand_number;

		#
		# select the color
		$color_R = rand(170,220);
		$color_G = rand(170,220);
		// $color_B = 255 + 240 - $color_R - $color_G;
		$color_B = rand(170,220);

	} else {
		$rand = "";		
		$_SESSION['captcha-'.$captcha_name] = "N";
	}

	#
	# build the image
	$im = imagecreatefrompng( imgp('captcha'.rand(1,4).'.png') );
	$cl = imagecolorallocate( $im , $color_R , $color_G , $color_B );
	// imagestring($im,2,5,2,$rand_operation,$cl);

	$font = 'components/captcha-'.component_version('captcha').'/Tahoma.ttf';
	$rect = rand(-10,10);
	imagettftext($im, 20, $rect, 8, 30+($rect/2), $cl, $font, $rand_operation);

	#
	# print the captcha
	header('Content-type:image/png');
	header("Content-disposition: inline; filename=captcha".$captcha_name.".png");
	echo imagepng($im);
	imagedestroy($im);

	die();

}


function captcha_build_math(){

	$op_arr = [ '+', '-', 'x' ];
	$op = $op_arr[ rand(0,2) ];
	
	$numb1 = rand(1,20);
	$numb2 = rand(1,20);

	switch ($op) {

		case '+': 
			$numb1 = rand(1,20);
			$numb2 = rand(1,20);
			$number = $numb1 + $numb2;
			break;

		case '-': 
			$numb1 = rand(1,40);
			$numb2 = rand(1, $numb1 );
			$number = $numb1 - $numb2;
			break;

		case 'x': 
			$numb1 = rand(1,10);
			$numb2 = rand(1,10);
			$number = $numb1 * $numb2;
			break;
	}

	$operation = ( strlen($numb1)==1 ? " ".$numb1 : $numb1 )." ".$op." ".( strlen($numb2)==1 ? $numb2." " : $numb2);
	// $operation = "12+12";

	return [ $operation, $number ];

}









