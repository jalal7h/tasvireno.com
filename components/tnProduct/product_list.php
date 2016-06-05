<?
function product_list(){
	?>			

<div class="product-grid">
	<div class="back">  <i class="fa fa-th-large" aria-hidden="true"></i> <a href="./">صفحه اصلی</a>&nbsp;&nbsp;  / &nbsp;&nbsp; <a href="./?page=102&cats=1">هدایای شرکت</a>&nbsp;&nbsp;  / &nbsp;&nbsp; <a href="./?page=102&brands=1">برند هدایا</a>&nbsp;&nbsp; /&nbsp;&nbsp;
	<?
	if(isset($_SERVER['HTTP_REFERER']))
	echo '<a href="'.$_SERVER['HTTP_REFERER'].'">برگشت به قبل</a>';
	else
	echo '<a href="'.$_SERVER['SERVER_NAME'].'">برگشت به قبل</a>';
	?>
	</div>
	
	<?
	if( $_REQUEST['cats'] ){         /* دسته ها ها*/
		$link = _URL."/?page=102&cats=1";
	}else
	if( $_REQUEST['brands'] ){         /* برند ها*/
		$link = _URL."/?page=102&brands=1";
		$query_brand = "AND `brand_id` in(SELECT `id` FROM `cat` WHERE `cat`='brand')";
	}else
	if( $_REQUEST['brand'] ){         /* برند خاص  کلیک از صفحه اصلی*/
		$brand_id=$_REQUEST['brand'];
		$query_brand="AND `brand_id`='{$brand_id}'";
		?>
		<div class="CategoryHeading"><?echo table("cat", $brand_id,name);?></div>
		<?
	}else 

	if( $_REQUEST['cat'] ){           /* کلیک روی برند خاص */
		$cat_id = $_REQUEST['cat'];
		if ($cat_id==not_cat) {           /* کلیک بر روی برند خاص در داخل همه برندها*/
			$brand_id = $_REQUEST['brand_id'];
			$query_cat="";
			$query_brand="AND `brand_id`='{$brand_id}'";
			?>
		    <div class="CategoryHeading"><?echo table("cat", $brand_id,name);?></div>
		    <?
		    $link = _URL."/?page=102&brand_id=".$brand_id."&cat=not_cat";
		}else{
		                           /* کلیک بر روی برند در داخل یک دسته خاص*/
			$brand_id = $_REQUEST['brand_id'];
			$query_cat="AND `id`='{$cat_id}' OR `parent`='{$cat_id}'";
			$query_brand="AND `brand_id`='{$brand_id}'";
			?>
		    <div class="CategoryHeading"><?echo table("cat", $brand_id,name);?>   <i class="fa fa-angle-double-left" aria-hidden="true"></i>  <?echo table("cat", $cat_id,name);?>  </div>
		    <?
		    $link = _URL."/?page=102&brand_id=".$brand_id."&cat=".$cat_id;
		}


	}else if($cat_id = $_REQUEST['cat_id'] ){         /* کلیک روی دسته خاص */
        
		if ($_REQUEST['brand_id']) {        /* کلیک روی دسته خاص در داخل یک برند خاص */
			$query_brand="AND `brand_id`='".$_REQUEST['brand_id']."'" ;
			$query_cat="AND `id`='{$cat_id}' OR `parent`='{$cat_id}'" ;
			$link = _URL."/?page=102&cat_id=".$cat_id."&brand_id=".$_REQUEST['brand_id'];
			?>
			<div class="CategoryHeading"><?= table("cat", $_REQUEST['brand_id'],name);?> <i class="fa fa-angle-double-left" aria-hidden="true"></i> <?= table("cat", $cat_id,name);?></div>
			<?

		}else{
			
			?>
			<div class="CategoryHeading"><?echo table("cat", $cat_id,name);?></div>
			<?
			$query_cat="AND `id`='{$cat_id}' OR `parent`='{$cat_id}'" ;
			$link = _URL."/?page=102&cat_id=".$cat_id;	
		}
			
	} 
    # 
	# list of product
	$tdd = 12;
	$stt = $tdd * intval($_REQUEST['p']); 
	$query1 = " SELECT * FROM `product` WHERE `flag`='1'  $query_brand AND `cat_id` in(SELECT `id` FROM `cat` WHERE 1 $query_cat ) ORDER BY `prio` ASC LIMIT $stt , $tdd ";
	        if(! $rs1 = dbq($query1) ){
				e(__FUNCTION__,__LINE__);
			
			} else if(! dbn($rs1) ){
				/*e(__FUNCTION__,__LINE__);*/
				?>
<!-- 				<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
 -->				<?
			
			} else while( $rw1 = dbf($rs1) ){
				$cat_id = $rw1['cat_id'];
				$photo_medium = $rw1['photo_medium'];
				$name = $rw1['name'];
				$code=$rw1['code'];
				$size=$rw1['size'];
				?>
			<div class=" product-grid-spesc">
			<div class="tile">
			<div class="photo">
				<div class="tile_btn"><a href="<?=tasvir_product_link($rw1);?>" class="tasvir_button">نمایش محصول</a></div>
			</div>
			<img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" >
			<a href="<?=tasvir_product_link($rw1);?>" class="img-responsive">
			        <h2 data-mh="img-responsive" style="height: 35px;"><?=$name;?></h2>
			        <h3 data-mh="img-responsive" style="height: 35px;"><span>کد : </span><?=$code;?></h3>
			        <h3 data-mh="img-responsive" style="height: 35px;">
				        <?=
				         
							$size ? '<span>سایز : </span>'.$size	: ''; 
							        
						?>
					</h3>
			</a>			
						        
			
			</div>
			</div>
			<?
			}
	/*$link = _URL."/cat-".$cat_id."-%%-".cat_translate($cat_id).".html";*/
	echo listmaker_paging($query1, $link, $tdd, $debug=true);

?>
</div>
 <?
}
function img_product_src( $photo ){

	$link = _URL."/".$photo;
	return $link;
}