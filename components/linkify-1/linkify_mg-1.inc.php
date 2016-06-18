<?

# jalal7h@gmail.com
# 2016/03/18
# Version 1.2

function linkify_mg(){
	
	switch ($_REQUEST['do']) {
		
		case 'form':
			return linkify_mg_form();

		case 'saveNew':
			linkify_mg_saveNew();
			break;

		case 'saveEdit':
			linkify_mg_saveEdit();
			break;

		case 'prio':
			listmaker_priority( array( "linkify", 'same'=>'parent,cat') );
			break;

		case 'remove':
			listmaker_remove( "linkify" );
			break;

		case 'flag':
			listmaker_flag( "linkify" );
			break;
	}

	linkify_mg_list();
}









