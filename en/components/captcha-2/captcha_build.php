<?

# jalal7h@gmail.com
# 2017/01/17
# 1.0

$GLOBALS['do_action'][] = 'captcha_build';

function captcha_build(){

	#
	# find the name of captcha
	if(! $captcha_name = $_REQUEST['captcha_name'] ){
		die();
	}

	$main_dir_name = dirname($_SERVER['SCRIPT_FILENAME'])."/";
	$font = dirname(__FILE__);
	$font = str_replace( $main_dir_name, '', $font );
	$font.= "/fonts";

	$aFonts = array( $font.'/VeraBd.ttf', $font.'/VeraIt.ttf', $font.'/Vera.ttf');
	$c = new PhpCaptcha($aFonts, 200, 60);
	$c->UseColour(true);
	// $c->SetWidth(113);
	// $c->SetHeight(34);
	// $c->DisplayShadow(true);
	$c->Create();
	
}


