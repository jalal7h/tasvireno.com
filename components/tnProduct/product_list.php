<?
function product_list(){
	?>	
	<div class="product-grid">
	<?	
	back();
	?>
	<div class="row1">
	<?
	if ($cat_id = $_REQUEST['cat']) {
		
		$cat_link="cat=".$cat_id;
		$q_cat="AND( `cat_id` ='$cat_id' OR `cat_id` in(SELECT `id` FROM `cat` WHERE `cat`='cat' AND `parent`='$cat_id'))";
		
	}else if ($cat_id = $_REQUEST['cat_id']) {
		$cat_link="&cat_id=".$cat_id;
		$q_cat="AND `cat_id` ='$cat_id' OR `cat_id` in(SELECT `id` FROM `cat` WHERE `cat`='cat' AND `parent`='$cat_id') ";
	}
	if ($brand_id = $_REQUEST['brand_id']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}else if ($brand_id = $_REQUEST['brand']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}
	if ($field_id = $_REQUEST['field_id']) {
		
		$q_field="AND `field_id` ='$field_id'";
	}
	$link = _URL."/?page=102&field_id=".$field_id."&brand=".$brand_id."&". $cat_link."&p=".$_REQUEST['p'];
	$tdd = 12;
	$stt = $tdd * intval($_REQUEST['p']); 
	$query1 = " SELECT * FROM `product` WHERE `flag`='1'   $q_brand $q_field $q_cat ORDER BY `prio` ASC LIMIT $stt , $tdd ";
    if(! $rs1 = dbq($query1) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs1) ){
	
	?>
		<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
	<?
	
	} else while( $rw1 = dbf($rs1) ){
		$cat_id = $rw1['cat_id'];
				
		$photo_medium = $rw1['photo_medium']; 
		$name = $rw1['name'];
		$code=$rw1['code'];
		$size=$rw1['size'];
		?>
	<div class=" product-grid-spesc">
		<div class="tile">
			<a class="photo" href="<?=tasvir_product_link($rw1);?>">
					 
			</a>
			<img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" >
		    <a href="<?=tasvir_product_link($rw1);?>" class="img-responsive">
		       
		        <h2 data-mh="img-responsive" style="height: 40px;"><?=$name;?></h2>
		        <div class="p_w_h"> 
			        <h3 data-mh="img-responsive" style="height: 25px;"><span>کد &nbsp;&nbsp;&nbsp;: </span><?=$code;?></h3>
			        <h3 data-mh="img-responsive" style="height: 35px;">
				        <?=
				         
							$size ? '<span>سایز : </span>'.$size	: ''; 
							        
						?>
					</h3>
				</div>
			</a>			
				       
		
		</div>
	</div>
	<?
	}	 


	
	echo listmaker_paging($query1, $link, $tdd, $debug=true);


?>
</div>
</div>
<?
}
function img_product_src( $photo ){

	$link = _URL."/".$photo;
	return $link;
}