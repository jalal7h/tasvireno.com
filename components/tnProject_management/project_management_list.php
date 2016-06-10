<?

function project_management_list(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			project_management_saveNew();
			break;
		
		case 'saveEdit':
			project_management_saveEdit();
			break;
		
		case 'remove':
			listmaker_remove( "project" );
			break;
		
		case 'flag':
			listmaker_flag( "project" );
			break;
			
		case 'prio':
			listmaker_priority( array('project') );

		default:
			# code...
			break;
	}

	#
	# list

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `project` WHERE 1 ORDER BY  `flag` ASC , `prio` ASC ";
	$list['tdd'] = 12;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';

	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

	$list['remove_url'] = true;
	$list['up_n_down'] = true ;
	$list['setflag_url'] = true;

	$list['list_array'] = array (
		array( "tag"=>"th", "picture" => '$rw[\'image\']'),
		array("head"=>lmtc("project:name"), "content" => '$rw[\'name\']'),
		/*array("head"=>lmtc("project:description"), "content" => '$rw[\'description\']'),*/
	);
	
	/*$list['paging_select'] = array(
		'cat_id' => "<option value=''>.. دسته بندی ..</option>".cat_display('cat',$is_array=false,$parent=0,$optionPreStr=""),
			
	);*/
	
	$list['search'] = array("name","description");

	echo listmaker_list($list);

}


