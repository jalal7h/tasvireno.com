<?
$GLOBALS['block_layers']['slide'] = 'اسلایدر';

function slide(){
	?>
<div class="slide"> 
	<div class="banner-slider">
		<?
	    $query = " SELECT pic,link FROM `slideshow` WHERE  `slide_id`='67'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) ){
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) ){
					?>
					<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
					<?
				
		} else while( $rw = dbf($rs) ){
			$path[]=$rw;
		}
		echo slideit( $path , 3000,"p","پروژه های انجام شده");
	
		?>
	</div>
	<div class="banner-slider">
		<?
	    $query = " SELECT pic,link FROM `slideshow` WHERE  `slide_id`='68'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) ){
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) ){
					?>
					<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
					<?
				
		} else while( $rw = dbf($rs) ){
			$path2[]=$rw;
		}
		echo slideit( $path2 , 3000 ,newslider,"محصولات جدید");
	
		?>
	</div>
	<div class="banner-slider">
		<?
	    $query = " SELECT pic,link FROM `slideshow` WHERE  `slide_id`='69'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) ){
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) ){
					?>
					<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
					<?
				
		} else while( $rw = dbf($rs) ){
			$path3[]=$rw;
		}
		echo slideit( $path3 , 3000 ,Catalog , "کاتالوگ محصولات");
	
		?>
	</div>
</div>
<?
}

