<?

# jalal7h@gmail.com
# 2016/07/01
# 1.1

# if we have this component(s)

function is_component( $component ){
	
	# 
	# loads all components in GLOBALS component_list
	is_component_load();

	# 
	# make sure to have an array of components
	if(! is_array($component) ){
		$component_arr[] = $component;

	} else {
		$component_arr = $component;
	}

	foreach ($component_arr as $i => $component_name) {
		if(! in_array( $component_name , $GLOBALS['component_list'] ) ){
			return false;
		}
	}

	return true;

}


function is_component_load(){
	
	if( $GLOBALS['component_list'] ){
		return true;
	
	} else if(! $dp = opendir("components") ){
		e(__FUNCTION__.__LINE__);
	
	} else while( $d = readdir($dp) ){
		
		if( substr($d,0,1)=='.' ){
			continue;

		} else {
			if( strstr($d, "-") ){
				$d = explode("-", $d);
				$the_component_name = $d[0];
				$the_component_version = $d[1];
			}
			$GLOBALS['component_list'][] = $the_component_name;
			$GLOBALS['component_version'][ $the_component_name ] = $the_component_version;
		}

	}

	closedir($dp);

}








