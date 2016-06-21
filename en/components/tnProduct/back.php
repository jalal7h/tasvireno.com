<?
function back(){
	?>
	<div class="back">
		&nbsp;&nbsp;&nbsp; 
		<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> 
		<?
		if(isset($_SERVER['HTTP_REFERER']))
		echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Back</a>';
		else
		echo '<a href="'.$_SERVER['SERVER_NAME'].'">Back</a>';
		?>
	</div>
	<?
}