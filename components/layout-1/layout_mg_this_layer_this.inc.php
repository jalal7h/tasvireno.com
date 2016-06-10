<?php

function layout_mg_this_layer_this( $rw ){
	
	$base_url = "./?page=admin&cp=".$_REQUEST['cp']."&id=".$rw['id']."&do=layer_";

	?>
	<div class="layout_mg_this_layer<?=($rw['flag']==0?" layout_mg_this_layer_off":"")?>">
		
		<div class="name"><?=$rw['name']?></div>

		<div class="tools">
			<a class="form" href="<?=$base_url?>form"><icon></icon></a>
			<a class="prio_up" href="<?=$base_url?>prio&up_or_down=up"><icon></icon></a>
			<a class="prio_down" href="<?=$base_url?>prio&up_or_down=down"><icon></icon></a>
			<a onclick="if(!confirm('آیا مایل به حذف هستید؟'))return false;" class="remove" href="<?=$base_url?>remove"><icon></icon></a>
			<a class="flag_<?=($rw['flag']==0?'off':'on')?>" href="<?=$base_url?>flag"><icon></icon></a>
		</div>
	
	</div>
	<?

}

