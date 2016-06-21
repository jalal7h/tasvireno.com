<?

define('__order', 'سفارش');
define('__orders', 'سفارشات');

$GLOBALS['cmp']['order_management'] = 'مدیریت '.__orders;

function order_management(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_list" => "لیست ".__orders,
		
	);
	listmaker_tabmenu($menu,$url);
}

