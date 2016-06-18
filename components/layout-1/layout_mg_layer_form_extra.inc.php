<?

function layout_mg_layer_form_extra( $rw ){

	$func_name = $rw['func']."_extra";

	if(! function_exists($func_name) ){
		echo "\n<!-- cant find function `$func_name()` -->\n";
		return true;
	} else {
		return $func_name();
	}

}

