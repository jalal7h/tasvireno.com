<?

# jalal7h@gmail.com
# 2016/04/21
# Version 1.0

function lmfc(){
	return listmaker_form_close();
}

function listmaker_form_close(){

	unset($GLOBALS['listmaker_form-rw']);
	unset($GLOBALS['listmaker_form-formTable']);
	unset($GLOBALS['listmaker_form-formName']);

	return "</form>\n";

}

