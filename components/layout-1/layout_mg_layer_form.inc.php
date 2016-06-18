<?

function layout_mg_layer_form(){
	
	if( $layer_id = $_REQUEST['id'] ){
		$rw = table( "page_layer", $layer_id );
	}

	?>
	<fieldset class="<?=__FUNCTION__?>">
		<legend><?=($rw?"تغییر نوع لایه":"ايجاد لایه جديد")?></legend>
		<form action="./?page=admin&cp=<?=$_REQUEST['cp']?>&page_id=<?=$_REQUEST['page_id']?>&do=layer_save<?=($rw?"Edit&id=".$layer_id:"New")?>" method="post">
			
			<select name="func" >
				<option value="">.. نوع لایه ..</option>
				<?
				foreach($GLOBALS['block_layers'] as $func => $name){
					echo '<option value="'.$func.'">'.$name.'</option>';
				}
				?>
			</select>
			<? if($rw){ ?>
				<script type="text/javascript">
					$('.<?=__FUNCTION__?> select[name="func"]').val('<?=$rw['func']?>');
				</script>
			<? } ?>

			<input type="text" placeholder="عنوان لایه" name="name" value="<?=$rw['name']?>" >
			<?=ff("hr")?>
			<input type="submit" class="submit_button" value="ثبت" >
	
		</form>
	</fieldset>
	<?

	layout_mg_layer_form_extra( $rw );
}
