<?

$GLOBALS['block_layers']['contact_vw_form'] = 'فرم تماس با ما';

function contact_vw_form(){
	
	switch($_REQUEST['do']) {
		case 'send':
			return contact_vw_send();
	}

	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ")){
		e(__FUNCTION__,__LINE__);
		
	} else if( dbn($rs)==0 ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		$vars['email_select_option'].= '<option value="'.$rw['slug'].'">'.str_replace('@','[at]',$rw['text']).'</option>';		
	}

	$vars['map'] = google_maps([
		'width' => '100%', // arz e kadr
		'height' => '265px', // ertefa e kadr
		'x,y' => '35.767146,51.476297', // mogheyat e joghrafiai
		'disable_marker' => true,
		]);
	
	echo template_engine('contact', $vars);

}




