<?

# jalal7h@gmail.com
# 2016/04/19
# Version 1.2

$GLOBALS['cmp']['setting_mg'] = 'تنظيمات';

function setting_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp'].'_main' => 'تنظیمات کلی',

	);
	listmaker_tabmenu($menu,$url);

}
		







