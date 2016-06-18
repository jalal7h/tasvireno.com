<?

# jalal7h@gmail.com
# 2016/06/07
# Version 1.2

/*
	echo 
	listmaker_form([
		
		[
			'table' => 'ipopup' ,
			'name' => __FUNCTION__ , // if not define , it will be some random name
			'class' => __FUNCTION__ , // if define , it will be
			'method' => 'post' , // if not method define , it will be 'post'
			'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func=ipopup_mg_list', // must define
			'save_switch' => 'do', // if define , it will be saveNew/saveEdit
			'title_in_span'=> true, // if define , it will be in ff
			'rw'=>$rw, // if not defined , it will be table( $table, $_REQUEST['id'] );
		],
		
		"<div>",

		[ 'n:page_id*'=>$rw , 'option'=>listmaker_option($table_name="page",$condition="",$returnArray=true) ],

		"</div>",

		"<div>
			<span>".lmtc('ipopup:url')."</span>",

		[ 'n:dest'=>$rw , 'option'=>listmaker_option($table_name="page",$condition="",$returnArray=true),'title_in_span'=> false],

		[ 'http://', 't:url', 'n:url*'=>$rw,'title_in_span'=> false ],

		"</div>",

		[ 'n:ipopup[]*'=>'','accept'=>'image/*','inDiv' ],

		'clear',
		'hr',
		'br',
	
		'<div><span></span>',

		[ 'n:onetime'=>$rw, 't:checkbox' ],

		[ 'n:logged'=>$rw, 'option'=>['in'=>'فقط لاگین شده','out'=>'فقط لاگین نشده'] ,'title_in_span'=> false ],
	
		'</div>',

		'clear',
		'hr',
		'br',

		['t:submit','class'=>'submit_button','n:submit'=>'ثبت','inDiv'],
	
	]);

/*README*/



function listmaker_form( $mixed, $listifcsselements=false ){
	
	if( is_string($mixed) ){
		return listmaker_form_string( $mixed );

	} else if(! is_array($mixed) ){
		e(__FUNCTION__,__LINE__);
		return false;
	} else if(! sizeof($mixed) ){
		e(__FUNCTION__,__LINE__);
		return false;
	} else foreach( $mixed as $k => $field ){
		if( is_string($field) ){
			if( in_array($field,['hr','br','clear']) ){
				$c.= ff( $field ); 
			} else {
				$c.= $field;
			}
		} else if( isset($field['action']) ){
			$c.= fm( $field );
		} else {
			$c.= ff( $field );
		}
	}

	$c.= fm('close' , $listifcsselements );

	return $c;
}











