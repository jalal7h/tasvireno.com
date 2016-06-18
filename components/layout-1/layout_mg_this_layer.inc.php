<?

function layout_mg_this_layer( $page_id ){
	
	?>
	<div class="the_layers">
		<?
		if(! $rs = dbq(" SELECT * FROM `page_layer` WHERE `page_id`='$page_id' ORDER BY `prio` ASC , `id` ASC ") ){
			e(__FUNCTION__,__LINE__);
		} else while( $rw = dbf($rs) ){
			layout_mg_this_layer_this( $rw );	
		}
		?>
		<a href="./?page=admin&cp=<?=$_REQUEST['cp']?>&page_id=<?=$page_id?>&do=layer_form" class="new">لایه جدید</a>
	</div>
	<?

}

