<?

# jalal7h@gmail.com
# 2016/05/22
# Version 1.9.5

function template_engine( $tpl=NULL, $vars=NULL, $tplFrame=NULL ){
	
	$tplAddr = $GLOBALS['include_all_template'][$tpl.'.template.htm'];
	

	if(!$tpl){
		$tpl.='<br>no TPL-file defined!';
	
	} else if(! file_exists($tplAddr) ){
		$tpl.='<br>template file `'.$tpl.' / '.$tplAddr.'` not found!'.__LINE__;
	
	} else if(! $tpl = @file($tplAddr) ){
		$tpl.='<br>error in opening TPL-file, its empty, '.__LINE__;
	
	} else if(! $tpl = trim(@implode('',$tpl)) ){
		$tpl.='<br>error in opening TPL-file, can`t implode, '.__LINE__;
	}

	$tpl.= "\n";

	if($vars){
		foreach($vars as $k=>$r){
			$tpl = str_replace('{'.$k.'}',$r,$tpl);
		}
	}
	

	$tpl = preg_replace_callback(
		"|{([\.a-zA-Z0-9_,:\$".'\"'."\-\(\)\'\[\]]+)}|",
		create_function(
		'$matches',
		' return template_engine_var( $matches , $var );'),
		$tpl
	);
	
	$tpl = str_replace('﻿','',$tpl);
	return $tpl;
}

function template_engine_var( $matches , $var ){
	
	$var = substr($matches[0],1,-1);
#	$var_fn = (strstr($var,"(")?substr($var, 0, strpos($var, "(") ) : $var);
	
	// if( strstr( $var, "(" )){
	// 	$vars = explode( "(", $var );
	// 	$func = $vars[0];
	// 	$vars = $vars[1];
	// 	$vars = explode(")", $vars);
	// 	$vars = trim($vars[0]);
	// 	if(! $vars ){
	// 		return call_user_func( $func );
	// 	} else {
	// 		$vars = explode(",", $vars);
	// 		foreach ($vars as $k => $r) {
	// 			$r = trim($r);
	// 			if( in_array( substr($r,0,1) , array('"',"'") ) 
	// 			and in_array( substr($r,-1) , array('"',"'") ) ){
	// 				$r = substr( $r , 1 , -1 );
	// 			}
	// 			$vars[$k] = $r;
	// 		}
	// 		return call_user_func_array( $func , $vars );
	// 	}
	// }

	$debug = false;

	if( function_exists($var) ){
		if( $debug )e(__FUNCTION__,__LINE__,$var);
		return $var();

	} else if(defined($var)){
		if( $debug )e(__FUNCTION__,__LINE__,$var);
		return constant($var);

	} else if($_REQUEST["$var"]) {
		if( $debug )e(__FUNCTION__,__LINE__,$var);
		return $_REQUEST["$var"];

	} else if($GLOBALS["include_all_image"]["$var"]) {
		if( $debug )e(__FUNCTION__,__LINE__,$var);
		return $GLOBALS["include_all_image"]["$var"];

	} else if( mb_ereg_replace('[^A-Za-z0-9_\-]+','',$var)==$var and ($setting_value = setting("$var")) ) {
		if( $debug )e(__FUNCTION__,__LINE__,$var);
		return $setting_value;

	} else {
		// error_log(mb_ereg_replace('[^A-Za-z0-9_\-]+','',$var));
		if( $var == mb_ereg_replace('[^A-Za-z0-9_\-]+','',$var) ){
			if( $debug )e(__FUNCTION__,__LINE__,$var);
			return "";
		} else {
			// error_log("eval " . $var);
			if( $debug )e(__FUNCTION__,__LINE__,$var);
			eval("\$var = $var;");
			return $var;
		}
	}
}

