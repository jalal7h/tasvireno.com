<?php

$GLOBALS['do_action'][] = "include_all_font";

function include_all_font(){
	$path = "templates/"._THEME."/font/";
	@header("Content-disposition: filename=styles.css");
	@header("Content-type: text/css");
	if(!$dp = opendir($path)){
		echo "err - ".__LINE__;
	} else while($d = readdir($dp)){
		if(substr($d,0,1)=='.'){
			continue;
		} else {
			$files[] = $path.$d;
		}
	}
	sort($files);
	foreach($files as $k => $file){
		$filename = basename( $file );
		$ext = strrchr( $filename , ".");
		$filefile = substr( $filename , 0 , -1*strlen($ext) );
		$list_of_fonts[ $filefile ][] = $file;
	}
	foreach ($list_of_fonts as $font => $list_of_files) {
		echo "\n@font-face {\n".
			"\tfont-family: '".$font."';\n".
			"\tsrc: ".include_all_font__list_of_files( $list_of_files ).";\n".
			"\tfont-weight: normal;\n".
			"\tfont-style: normal;\n".
		"}\n\n";
	}
}


function include_all_font__list_of_files( $list_of_files ){

	$extra_ext_replace = array( "ttf"=>"truetype" );

	foreach ($list_of_files as $i => $file) {
		$ext = substr( strrchr( $file , "." ) , 1);
		$fonts[] = "url(".basename($file).") format('".( $extra_ext_replace[ $ext ] ? $extra_ext_replace[ $ext ] : $ext )."')";
	}
	return implode(",\n\t\t", $fonts);
}

