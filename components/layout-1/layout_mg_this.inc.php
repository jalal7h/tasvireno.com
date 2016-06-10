<?php

function layout_mg_this( $rw ){
	
	?>
	<div class="this">
		
		<div class="the_name">
			<a class="name" href="<?=_URL?>/?page=<?=$rw['id']?>" target="_blank"><?=$rw['name']?></a>
			<form class="rename_form" method="post" >
				<input type="hidden" name="id" value="<?=$rw['id']?>" />
				<input type="text" name="name" value="<?=$rw['name']?>"/>
				<input type="submit" class="submit_button" value="ثبت"/>
			</form>
			<div class="rename_button_container">
				<a href="#" class="rename_button">تغییر نام</a>
			</div>
		</div>
		
		<? layout_mg_this_layer( $rw['id'] ) ?>
		
		<a class="the_meta" href="<?=_URL?>/?page=admin&cp=<?=$_REQUEST['cp']?>&do=meta_form&id=<?=$rw['id']?>">
			<icon></icon>
		</a>

		<? if( $rw['id'] > 1 ){ ?>
		<a onclick="if(!confirm('آیا مایل به حذف هستید؟'))return false;" class="the_remove_button" href="<?=_URL?>/?page=admin&cp=<?=$_REQUEST['cp']?>&do=remove&id=<?=$rw['id']?>">
			<icon></icon>
		</a>
		<? } ?>

	</div>
	<?

}

