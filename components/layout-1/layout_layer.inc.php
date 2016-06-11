<?php

function layout_layer($position){

	ob_start();

	switch($position){
		case 'center' : 
		$query = " SELECT `id`,`page_id`,`func` from `page_layer` where `page_id`='"._PAGE."' and `flag`=1 order by `prio`,`id` ";
		$table_name = "page_layer";
		break;
		
		DEFAULT : 
		$query = " SELECT `id`,`func` from `page_frame` where `position`='$position' and `flag`=1 order by `prio`,`id` ";
		$table_name = "page_frame";
		break;
	}
	
	if($res = dbq($query)){
		$numrows = dbn($res);
		for($i=0; $i<$numrows; $i++){
			$rec = dbf($res);
			if(function_exists($rec['func'])){
				call_user_func($rec['func'], $table_name, $rec['id']);
			} else {
				e(__FUNCTION__,__LINE__);
			}
		}
	} else {
		e(__FUNCTION__,__LINE__);
	}

	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}

