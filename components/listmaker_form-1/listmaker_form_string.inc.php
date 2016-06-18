<?

# jalal7h@gmail.com
# 2016/06/08
# Version 1.1

function listmaker_form_string( $string ){

	#
	# removing BOM
	$string = str_replace('﻿','',$string);

	#
	# form tags
	$arr = explode('[!', $string);
	for( $i=1; $i<sizeof($arr); $i++ ){
		
		$arr_this = $arr[$i];
		
		$arr_this_arr = explode('!]', $arr_this);
		$var = $arr_this_arr[0];

		$var = "[".$var."]";

		$arr_this_arr[0] = listmaker_form_string_var( $var );
		$arr[$i] = implode('', $arr_this_arr);
	}
	$string = implode('', $arr);
	
	#
	# php tags
	$string = preg_replace_callback(
		["/\<\?(.*)\?\>/" , "/\<\?(.*)\?\>/s"],
		// "|\<\?([ \n\t=>@!\/*\?\&\.a-zA-Z0-9آ-ی_,:\$".'\"'.";\-\(\)\'\[\]]+)\?\>|",
		create_function(
		'$matches',
		' return listmaker_form_string_php_var( $matches[0] );'),
		$string
	);

	return $string;

}


function listmaker_form_string_var( $var ){
	
	// return "::".$var."\n\n";

	eval("\$var = $var;");
	// return "::".implode(',', $var)."\n\n";

	#
	# form open
	if( array_key_exists("action",$var) or array_key_exists("table",$var) ){
		$content = listmaker_form_open($var);
		return $content;
	
	#
	# form close
	} else if( $var[0]=="close" ){
		return listmaker_form_close();

	// #
	// # form element
	} else {
		return listmaker_form_element( [$var], $comment=false );
	}

}




function listmaker_form_string_php_var( $tag ){
	
	if( substr(strtolower($tag), 0, 5)=='<?php' ){
		$tag = trim( substr( $tag, 5, -2 ) );
	} else {
		$tag = trim( substr( $tag, 2, -2 ) );
	}

	#
	# `=` => `echo`
	if( substr($tag,0,1)=='=' ){
		$tag = "echo ".substr($tag,1);
	}

	#
	# `` => `;`
	if( substr($tag,-1)!=';' ){
		$tag.=";";
	}	

	$rw = $GLOBALS['listmaker_form-rw'];

	ob_start();
	eval("$tag");
	$tag = ob_get_contents();
	ob_end_clean();

	return $tag;

}













