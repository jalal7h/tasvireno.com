<?

function listmaker_form_element_this_cat( $info ){

	if( $info['value'] ){
		$value_serial = cat_id_serial( $info['value'] );
		$value_serial = array_reverse($value_serial);
		$value_serial = implode(',', $value_serial);
	
	} else {
		$value_serial = '';		
	}

	$c.= lmfe_tnit( $info );

	if(! $info['cat_name'] ){
		echo "no cat defined !";
		return false;
	}

	$hidden_input_id = "lmfetc_hidden_".$info['name']."_".$info['cat_name'];

	$c.= $info['PreTab']."<input type=\"hidden\" id=\"".$hidden_input_id."\"".
		" name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		"/>\n";

	$c.= "<span id='lmfetcX_".$info['name']."_".$info['cat_name']."' ></span>\n";
	$c.= "<script> lmfetc( '".$info['cat_name']."', 0, 'lmfetcX_".$info['name']."_".$info['cat_name']."', '".$hidden_input_id."', '$value_serial' ); </script>";

	return $c;

}


$GLOBALS['do_action'][] = 'listmaker_form_element_this_cat_getChild';

function listmaker_form_element_this_cat_getChild(){
	
	$hidden_input_id = trim( strip_tags($_REQUEST['hidden_input_id']) );
	$cat_name = trim( strip_tags($_REQUEST['cat_name']) );
	$parent = intval($_REQUEST['parent']);
	$div_id = 'lmfetc'.$parent;

	if( $_REQUEST['value_serial'] ){

		$value_serial = trim( strip_tags($_REQUEST['value_serial']) );
		$value_this = strstr($value_serial, ",", 1);
		$value_serial_else = substr( strstr( $value_serial, "," ), 1 );

		if(! $value_this ){
			$value_this = $value_serial;
			$value_serial_else = "";
		}

	}

	if(! $rs = dbq(" SELECT * FROM `cat` WHERE `cat`='$cat_name' AND `parent`='$parent' ")){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		// echo "00";
	
	} else {
		echo '<select id="'.$div_id.'_select" onchange="lmfetc( \''.$cat_name.'\', this.value, \''.$div_id.'\', \''.$hidden_input_id.'\', \'\' );" >'."\n";
		echo "<option value=''>..</option>\n";
		while( $rw = dbf($rs) ){
			echo "<option value='".$rw['id']."'>".$rw['name']."</option>\n";
		}
		echo "</select>\n";
		echo "<span id='$div_id'></span>\n";
		
		echo '
		<script>
			$(document).ready(function($) {
				
				
				'.($value_this ? '
				lmfetc( \''.$cat_name.'\', '.$value_this.' , \''.$div_id.'\', \''.$hidden_input_id.'\', \''.$value_serial_else.'\' );
				' :'' ).'

				$("#'.$div_id.'_select").val("'.$value_this.'");

			});
		</script>
		';
		error_log(__LINE__);

	}


}








