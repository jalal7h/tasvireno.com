<?
$GLOBALS['block_layers']['shearch'] = 'جستجو';

function shearch(){
	?>
	<div class="product_wv_list">
		 <div class="product_list">
		 <div class="product-grid">
		 <?shearch_product_list()?>
		 </div>
		 </div>
		 <div class="product_filter">
		 <? product_filter();?>
		 </div>
	 </div>

<?
} 

function shearch_product_list(){

	?>
    <div class="row1">	
    <?=breadcrumb();?>
	<div class="CategoryHeading">نتایج جستجو برای : <?=$_REQUEST['q'];?></div>
	
	
	<?
	$q_cat="OR `id` in (SELECT `product_id` FROM `product_cat_id` WHERE  `cat_id` in(SELECT `id` FROM `cat` WHERE `cat`='cat' AND `name`like '%".$_REQUEST['q']."%' ))";
	$q_field="OR `id` in (SELECT `product_id` FROM `product_field_id` WHERE  `field_id` in(SELECT `id` FROM `cat` WHERE `cat`='field' AND `name`like '%".$_REQUEST['q']."%' ))";
	$tdd = 12; 
	$stt = $tdd * intval($_REQUEST['p']); 
	$query1 = " 
	SELECT * FROM `product` WHERE `flag`='1' AND `name`like '%".$_REQUEST['q']."%'
	$q_cat $q_field
	OR `brand_id` in(SELECT `id` FROM `cat` WHERE `cat`='brand' AND `name`like '%".$_REQUEST['q']."%') ORDER BY `prio` ASC LIMIT $stt , $tdd ";
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


	$link = _URL."/?page=105&q=".$_REQUEST['q'];
	echo listmaker_paging($query1, $link, $tdd, $debug=true);
?>
</div>
<?
}