<?

define('__project', 'پروژه');
define('__projects', 'پروژه ها');

$GLOBALS['cmp']['project_management'] = 'مدیریت '.__projects;

function project_management(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_list" => "لیست ".__projects,
		$_REQUEST['cp']."_form" => "ثبت ".__project." جدید",
	);
	listmaker_tabmenu($menu,$url);
}

