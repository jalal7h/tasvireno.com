<?

function layout_mg_meta_save(){
	
	foreach ($GLOBALS['layout-metatag'] as $k => $column) {
		$fields[] = "`".$column."`='".mysql_real_escape_string( $_REQUEST[ $column ] )."'";
	}
	
	if(!$id = $_REQUEST['id']){
		e(__FUNCTION__.__LINE__);
	} else if(! $rw = table("page", $id) ){
		e(__FUNCTION__.__LINE__);
	} else if(!dbq(" UPDATE `page` SET ".implode(',', $fields)." WHERE `id`='".$id."' LIMIT 1 ")){
		e(__FUNCTION__.__LINE__);
		echo dbe();
	} else {
		return true;
	}
	
}


