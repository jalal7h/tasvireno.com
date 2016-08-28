<?

# jalal7h@gmail.com
# 2016/04/19
# Version 1.2

$GLOBALS['cmp']['setting_mg'] = 'تنظيمات';
$GLOBALS['cmp-icon']['setting_mg'] = '085';

function setting_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$cp = $_REQUEST['cp'];

	$menu = array(
		$cp.'_main' => 'تنظیمات کلی',
	);
	listmaker_tabmenu($menu,$url);

}
		







