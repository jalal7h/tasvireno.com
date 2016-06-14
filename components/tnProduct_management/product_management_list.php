<?

function product_management_list(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			product_management_saveNew();
			break;
		
		case 'saveEdit':
			product_management_saveEdit();
			break;
		
		case 'remove':
			listmaker_remove( "product" );
			break;
		
		case 'flag':
			listmaker_flag( "product" );
			break;
			
		case 'prio':
			listmaker_priority( array('product') );

		default:
			# code...
			break;
	}

	#
	# list

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `product` WHERE 1 ORDER BY  `flag` ASC , `prio` ASC ";
	$list['tdd'] = 12;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';

	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

	$list['remove_url'] = true;
	$list['up_n_down'] = true ;
	$list['setflag_url'] = true;

	$list['list_array'] = array (
		array( "tag"=>"th", "picture" => '$rw[\'photo_medium\']'),
		array("head"=>lmtc("product:name"), "content" => '$rw[\'name\']'),
		array("head"=>lmtc("product:code"), "content" => '$rw[\'code\']'),
		array("head"=>lmtc("product:price"), "content" => 'cat_translate($rw[\'price\'])'),
		/*array("head"=>lmtc("product:cat_id"), "content" => 'cat_translate($rw[\'cat_id\'])'),
		array("head"=>lmtc("product:field_id"), "content" => 'cat_translate($rw[\'field_id\'])'),*/
		array("head"=>lmtc("product:brand_id"), "content" => 'cat_translate($rw[\'brand_id\'])'),
		
	);
	
	$list['paging_select'] = array(
		'cat_id' => "<option value=''>.. دسته بندی ..</option>".cat_display('cat',$is_array=false,$parent=0,$optionPreStr=""),		
		/*'field_id' => "<option value=''>.. زمینه ..</option>".cat_display('field',$is_array=false,$parent=0,$optionPreStr=""),
		'brand_id' => "<option value=''>.. برند..</option>".cat_display('brand',$is_array=false,$parent=0,$optionPreStr=""),*/
			
	);
	
	$list['search'] = array("name","description");

	echo listmaker_list($list);

}


