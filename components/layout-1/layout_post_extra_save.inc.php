<?php

function layout_post_extra_save(){
	
	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	} else if(! $rw = table("page_layer", $id) ){
		e(__FUNCTION__,__LINE__);
	} else if(! $type = $_REQUEST['type'] ){
		e(__FUNCTION__,__LINE__);
	}
	
	$data = mysql_real_escape_string( $_REQUEST['data'] );
	$framed = intval($_REQUEST['framed']);

	if(! dbq(" UPDATE `page_layer` SET `data`='$data', `framed`='$framed', `type`='$type' WHERE `id`='$id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__,dbe());
	} else {
		return true;
	}
}

