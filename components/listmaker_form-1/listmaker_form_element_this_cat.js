
// 2016/06/10

function lmfetc_load( lmfetc_rahem, select_value ){

	// vars
	cat_name = lmfetc_rahem.closest('.lmfetc_container').attr('rel_cat_name');
	value_serial = lmfetc_rahem.attr('rel_value_serial');
	lmfetc_rahem.attr('rel_value_serial','');
	
	if( select_value ){
		parent = select_value;
	} else {
		parent = lmfetc_rahem.attr('rel_parent');
	}

	// cl( ';; ' + parent + ' ; ' + cat_name + ' ; ' + value_serial );

	//
	// update the `hidden` input
	lmfetc_rahem.closest('.lmfetc_container').find('> input[type="hidden"]').val( parent );

	if( select_value=='' ){
		lmfetc_rahem.html('');
	} else {
		$.ajax({
			method: "GET",
			url: './?do_action=listmaker_form_element_this_cat_fetchSubCat&cat_name='+cat_name+'&parent='+parent+'&value_serial='+value_serial
		
		}).done(function( html ) {
			lmfetc_rahem.html( html );
		});
	}

	// catcustomfield console
	if(typeof catcustomfield_console == 'function') { 
		catcustomfield_console( cat_name, parent /* as cat_id */ ); 
	}

}

jQuery(document).ready(function($) {
	
	$('.lmfetc_container').each(function( index ) {
		// console.log( index );
		lmfetc_load( $(this).find('> .lmfetc'), null );
	});
	
});



