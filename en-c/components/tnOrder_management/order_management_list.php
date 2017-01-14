<?

function order_management_list(){
	
	#
	# action
	switch ($_REQUEST['do']) {	
		
		case 'remove':
			listmaker_remove( "orders" );
			break;
		
	}

	#
	# list

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `orders` WHERE 1 ORDER BY `id` DESC ";
	$list['tdd'] = 12;

	$list['base_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';


	$list['remove_url'] = true;
	$list['up_n_down'] = false ;
	$list['setflag_url'] = false;
	$list['addnew_url'] = false;
	$list['linkTo'][] = array(
		'url' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=order_management_show&p=".$_REQUEST["p"]."&do=show&id=".$rw["id"]',
		'name' => 'نمایش',
		'width' => 70,
	);

	$list['list_array'] = array (
		array("head"=>lmtc("orders:name"), "content" => '$rw[\'name\']'),
		array("head"=>lmtc("orders:company"), "content" => '$rw[\'company\']'),
		array("head"=>lmtc("orders:cell"), "content" => '$rw[\'cell\']',"attr" => array("align" => 'center',"dir" => "rtl")),
		array("head"=>lmtc("orders:tell"), "content" => '$rw[\'tell\']',"attr" => array("align" => 'center',"dir" => "rtl")),
		array("head"=>lmtc("orders:number"), "content" => '$rw[\'number\']',"attr" => array("align" => 'center',"dir" => "rtl")),
		array("head"=>'محصول', "content" => 'table("product",$rw[\'product_id\'] , "name")'),
		array(	"head"=>lmtc("orders:date_created"),"content" => 'vaght_2_taghvim(u2vaght($rw["date_created"]))'),
		

		
	);
	
	$list['paging_select'] = array(
		'product_id' => "<option value=''>.. محصول ..</option>".listmaker_option("product", $condition="", $returnArray=false ),
		
			
	);
	
	$list['search'] = array("name","company");

	echo listmaker_list($list);

}


