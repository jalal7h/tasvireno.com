<?php

function layout_mg_layer_saveEdit(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	} else if(! dbq(" UPDATE `page_layer` set 
		 `name`='".$_REQUEST['name']."'
		,`func`='".$_REQUEST['func']."'
	 WHERE 1 and `id`='".$_REQUEST['id']."' limit 1 ")){
		e( __FUNCTION__ , __LINE__ );
		echo dbe();
	} else {
		?>
		<script type="text/javascript">
			location.href = './?page=admin&cp=<?=$_REQUEST['cp']?>&id=<?=$id?>&do=layer_form';
		</script>
		<?
		die();
	}

}

