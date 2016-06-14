<?php
$GLOBALS['do_action'][] = 'share_ajax';

function share_ajax(){
		
	#
	# find it
	if(! $product_id = $_SESSION['product_id'] ){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
		<? 
		return false;
	} else if(! $rw1 = table("product", $product_id)){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
		<?		
		return false;
	}
	$photos_large = $rw1['photos_large'];
	$name = $rw1['name'];
	$code=$rw1['code'];
	$brand=$rw1['brand_id'];
	$id=$rw1['id'];
	$query = " SELECT * FROM `product_cat_id` WHERE  `product_id`='$id' ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else while( $rw = dbf($rs) ){

		$cat_name[] =cat_translate($rw['cat_id']) ;
		
	}	
	
	$catname = implode( '&nbsp;,&nbsp;' ,$cat_name );
	
	?>
	<div class="p_img_vw2"><img src="<?=img_product_src($photos_large);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" ></div>
	<div class="sharing">
	<div class="head">
			<div class="dotline"></div>
			<div class="text"><h3 style="font-size: 16px;color: #2ECC71"><?=$name;?></h3></div>
	</div>
	</div>	
	<div class="p_vw_cat">
		<h2 data-mh="img-responsive" style="height: 35px;">دسته :&nbsp;&nbsp; <?=$catname;?></h2>
	</div> 
	<?= $brand ? '<div class="p_vw_cat"><h2 data-mh="img-responsive" style="height: 35px;">برند&nbsp;&nbsp;:&nbsp;&nbsp; '.cat_translate($brand).'</h2></div> ' : ''; 
					        
	?>
	<br>
	<div>
		<?=tasvireno_sharing( $rw1 )?>
	</div>
	
</div>

<?
}