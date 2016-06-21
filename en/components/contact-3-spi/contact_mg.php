<?
$GLOBALS['cmp']['contact_mg'] = 'ارتباط با ما';

function contact_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	
	$menu = array(
		__FUNCTION__."_list" => "آخرین پیام ها",
		__FUNCTION__."_config" => "تنظیمات تماس",
	);
	
	listmaker_tabmenu($menu,$url);

}


