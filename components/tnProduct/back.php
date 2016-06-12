<?
function back(){
	?>
	<div class="back">
		&nbsp;&nbsp;  
		<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> 
		&nbsp;
		<?
		if(isset($_SERVER['HTTP_REFERER']))
		echo '<a href="'.$_SERVER['HTTP_REFERER'].'">برگشت به قبل</a>';
		else
		echo '<a href="'.$_SERVER['SERVER_NAME'].'">برگشت به قبل</a>';
		?>
	</div>
	<?
}