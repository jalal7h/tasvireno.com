<?
function back(){
	?>
	<div class="back">  
		<i class="fa fa-th-large" aria-hidden="true"></i> 
		<a href="./">صفحه اصلی</a>
		&nbsp;&nbsp;  / &nbsp;&nbsp; 
		<a href="./?page=102&cats=1">هدایای شرکت</a>
		&nbsp;&nbsp;  / &nbsp;&nbsp; 
		<a href="./?page=102&brands=1">برند هدایا</a>
		&nbsp;&nbsp; /&nbsp;&nbsp;
		<a href="./?page=102&fields=1">زمینه ها</a>
		&nbsp;&nbsp; /&nbsp;&nbsp;
		<?
		if(isset($_SERVER['HTTP_REFERER']))
		echo '<a href="'.$_SERVER['HTTP_REFERER'].'">برگشت به قبل</a>';
		else
		echo '<a href="'.$_SERVER['SERVER_NAME'].'">برگشت به قبل</a>';
		?>
	</div>
	<?
}