<?

function slideshow_management_list(){

	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			slideshow_management_saveNew();
			break;
		
		case 'saveEdit':
			slideshow_management_saveEdit();
			break;
		
		case 'remove':
			$id = intval($_REQUEST['id']);
			dbq(" DELETE FROM `slideshow` WHERE `id`='$id' LIMIT 1 ");
			break;

		default:
			# code...
			break;
	}

	#
	# list

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `slideshow` WHERE 1 ORDER BY `id` ASC ";
	$list['tdd'] = 15;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';

	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

	$list['remove_url'] = true;
	$list['up_n_down'] = false ;
	$list['setflag_url'] = false;
	$list['addnew_url'] = false;

	$list['list_array'] = array (
		array( "tag"=>"th", "picture" => '$rw[\'pic\']'),
		array("head"=>lmtc("slideshow:name"), "content" => '$rw[\'name\']'),
		array("head"=>lmtc("slideshow:description"), "content" => '$rw[\'description\']'),
		array("head"=>lmtc("slideshow:link"), "content" => '$rw[\'link\']'),
		array("head"=>lmtc("slideshow:slide_id"), "content" => 'cat_translate($rw[\'slide_id\'])'),
		
	);
	
	

	echo listmaker_list($list);

}

