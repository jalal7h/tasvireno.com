
function lmfetc( cat_name, parent, le_paluet, hidden_input_id, value_serial ) {

	// 
	// update the main hidden input
	$( '#'+hidden_input_id ).val( parent );
	
	//
	// request for next level
	urlpath = './';
	pars = 'do_action=listmaker_form_element_this_cat_getChild&cat_name='+cat_name+'&parent='+parent+'&hidden_input_id='+hidden_input_id;

	if( value_serial!='' ){
		pars = pars+'&value_serial='+value_serial;
	}

	wget( urlpath, le_paluet, pars );

}

