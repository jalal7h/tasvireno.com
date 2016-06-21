<?php

# jalal7h@gmail.com
# 2016/06/20
# Version 1.2

$GLOBALS['block_layers']['faq_display'] = 'سوالات متداول';

function faq_display($table_name=null, $page_id=null){
	
	if(! $rs = dbq(" SELECT * FROM `faq` WHERE 1 ORDER BY `name` ASC ") ){
		e("error on faq_display - ".__LINE__);
	
	} else if(!dbn($rs)){
		e("error on faq_display - ".__LINE__);
	
	} else while($rw = dbf($rs)){
		$list[] = array("name"=>$rw['name'], "text"=>$rw['text']);
	}

	$content = listmaker_clicktab($list);

	if($page_id){
		$title = table( $table_name , $page_id , "name" );
		layout_post_box( $title , "<br>".$content, $allow_eval=false, $framed=true, $position="center");
	} else {
		echo $content;
	}
}

