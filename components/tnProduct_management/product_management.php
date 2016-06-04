<?

define('__product', 'محصول');
define('__products', 'محصول ها');

$GLOBALS['cmp']['product_management'] = 'مدیریت '.__products;

function product_management(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_list" => "لیست ".__products,
		$_REQUEST['cp']."_form" => "ثبت ".__product." جدید",
	);
	listmaker_tabmenu($menu,$url);
}

