<?

function setting_mg_main(){

	#
	# action
	switch ($_REQUEST['do']) {
		case 'save':
			foreach( $_REQUEST as $k => $r ){
				setting( $k, $r );
			}
		#
		# logo main
		$f = fileupload_upload(["input"=>"logo"]);
		if( $f[0] ){
			tab__temp('logo', true, $f[0]);
		}
		#
		# baner
		$f = fileupload_upload(["input"=>"baner"]);
		if( $f[0] ){
			tab__temp('baner', true, $f[0]);
		}
			break;
	}
	
	#
	# rw for `setting`
	if(! $rs0 =dbq(" SELECT * FROM `setting` WHERE 1 ") ){
		e(__FUNCTION__,__LINE__);
		return false;
	} else while( $rw0 = dbf($rs0) ){
		$rw[ $rw0['slug'] ] = $rw0['text'];
	}

	#
	# form open
	echo lmfo([
		'table' => 'setting' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&do=save',
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'rw' => $rw ,
	]);

	#
	# form elements
	echo lmfe([
		[setting_rw('tiny_title')['name'], 'text:tiny_title*','inDiv'],
		[setting_rw('main_title')['name'], 'text:main_title*','inDiv'],
		[setting_rw('keywords')['name'], 'text:keywords','inDiv'],
		[setting_rw('logo')['name'], 'file:logo','inDiv'],
		[setting_rw('baner')['name'], 'file:baner','inDiv'],
		[setting_rw('websitedescription')['name'], 'text:websitedescription','inDiv'],
		[setting_rw('html_extra_tags')['name'], 'textarea:html_extra_tags','inDiv'],
		[setting_rw('webstatus_main')['name'], 'toggle:webstatus_main','inDiv'],
		"<br><hr><br>",
		['submit:ثبت.submit_button','inDiv'],
	]);

	#
	# form close
	echo lmfc();

}

