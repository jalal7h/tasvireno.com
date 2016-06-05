<?php
$GLOBALS['do_action'][] = 'menu_ajax';

function menu_ajax(){
		
?>
<div class="tabmenu">
<div class="tabmenu_rast">
<h1> هدایای شرکت:</h1>	
<?tabmenu_rast_cat();?>
<h1> برندهای هدایا:</h1>	
<?tabmenu_rast_brand();?>
</div>
<div class="tabmenu_chap">
<h1> کالاهای پیشنهادی:</h1>
<?tabmenu_chap();?>
</div>	
</div>
<?

}

function tabmenu_chap(){
	$query1 = " SELECT * FROM `product` WHERE `flag`='1' ORDER BY rand() ASC LIMIT 2 ";
	        if(! $rs1 = dbq($query1) ){
				e(__FUNCTION__,__LINE__);
			
			} else if(! dbn($rs1) ){
				
				?>
				<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
				<?
			
			} else while( $rw1 = dbf($rs1) ){
				$photo_medium = $rw1['photos_large'];
				$name = $rw1['name'];
				$code=$rw1['code'];
				$size=$rw1['size'];
				$cat=$rw1['cat_id'];
				$brand=$rw1['brand_id'];
				$description=$rw1['description'];
				$min_order=$rw1['min_order'];
				$price=$rw1['price'];
			?>
			<a href="<?=tasvir_product_link($rw1);?>" class="cbp-item-wrapper">
			<div class="p_img_vw ">
			<img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive hvr-round" >
			</div>
			<div class="tabmenu_chap_name">
			<h2 data-mh="img-responsive" style="height: 35px;"> <?=$name;?></h2>
			</div>
			</a>
			
			<?
			}

}

function tabmenu_rast_cat(){
	?><ul class="cat-grid2"><?
	$query = " SELECT * FROM `cat` WHERE `cat`='cat' AND `parent` not in(0) ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
				<?
			
	} else{ while( $rw = dbf($rs) ){

				$cat_name = $rw['name'];
				$id=$rw['id'];
				$id=$rw['id'];
				?>
			<li class="">
			<a href="<?=tasvir_cat_link( table("cat", $id) );?>" class="">
			    <span data-mh="tile-category" style="height: 35px;"> <?=$cat_name;?></span>
			</a>
			</li>
	<?	 
			}
?>
	 </ul>


<?
	}
}

function tabmenu_rast_brand(){
	?><ul class="cat-grid2"><?
	$query = " SELECT * FROM `cat` WHERE `cat`='brand' ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
				<?
			
	} else{ while( $rw = dbf($rs) ){

				$cat_name = $rw['name'];
				$id=$rw['id'];
				$id=$rw['id'];
				?>
			<li class="">
			<a href="<?=tasvir_brand_link( table("cat", $id) );?>" class="">
			    <span data-mh="tile-category" style="height: 35px;"> <?=$cat_name;?></span>
			</a>
			</li>
	<?	 
			}
?>
	 </ul>


<?
	}
}