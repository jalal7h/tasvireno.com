<?

function layout_post_extra(){
	
	#
	# action
	switch( $_REQUEST['do2'] ){
		case 'save':
			layout_post_extra_save();
			break;
	}
	
	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	} else if(! $rw = table("page_layer",$id) ){
		e(__FUNCTION__,__LINE__,$id);
	}

	#
	# form
	$rw['data'] = str_ireplace( "</textarea>", "&lt;/textarea&gt;", $rw['data'] );
	?>
	<script src="http://parsunix.com/cdn/js/tinymce/tinymce-set+func.js"></script>
	<form method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&id=<?=$_REQUEST['id']?>&do=<?=$_REQUEST['do']?>&do2=save">
	<fieldset class="<?=__FUNCTION__?>">
		<legend >ويرايش پست</legend>
		
		<textarea name="data" id="_data" ><?=$rw['data']?></textarea>

		<label class="framed_label">
			<input type="checkbox" name="framed" <?=($rw['framed']? "checked" :"")?> value="1" >
			<span>فريم اضافه شود</span>
		</label>

		<div class="types">
			<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','rtl');" value="TEXT" >Text</label>
			<label><input type="radio" name="type" onclick="tinyMCE_on('_data'); $('#_data').prop('dir','rtl');" value="HTML" >HTML</label>
			<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','ltr');" value="PHP5" >PHP</label>
		</div>

		<script>
		$(document).ready(function(){
			
			$('.<?=__FUNCTION__?> .types input[value="<?=$rw['type']?>"]').prop( "checked", true );
			
			<? if($rw['type']=='PHP5'){ ?>
				$('#_data').prop('dir','ltr');
			<? } ?>
			
			<? if($rw['type']=='HTML'){ ?>
				$(window).load(function(){
					tinyMCE_on('_data');
				});
			<? } ?>
			
		});
		</script>

		<?=ff('hr')?>

		<center>
			<input type="button" class="submit_button" onclick="location.href='./?page=admin&cp=<?=$_REQUEST['cp']?>'" value="بازگشت"/>
		
			<input type="submit" class="submit_button" value="ثبت تغييرات"/>
		</center>
		
	</fieldset>
	</form>	
	<?

}


function post_extra(){
	return layout_post_extra();
}




