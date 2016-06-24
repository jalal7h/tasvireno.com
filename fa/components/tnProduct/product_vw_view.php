<?
$GLOBALS['block_layers']['product_vw_view'] = 'نمایش محصول ';

function product_vw_view(){
	?>
	<div class="product_wv_list">
		 <div class="product_list">
		 <?product_vw()?>
		 </div>
		 <div class="product_filter">
		 <? product_filter();?>
		 </div>
	 </div>

<?	 
}
function product_vw(){
	?>
<div class="product_vw" style="">
	 	   
	<?
	if($product_id = $_REQUEST['product'] ){
		unset($_SESSION['cat']);
		unset($_SESSION['cat_id']);
		unset($_SESSION['brand']);
		unset($_SESSION['field_id']);
		unset($_SESSION['brand_id']);
	}else{$product_id = $_REQUEST['product_id'];}
	
	breadcrumb_product();
	#
	# find it
	if(!$product_id){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div></div>
		<? 
		return false;
	} else if(! $rw1 = table("product", $product_id)){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div></div>
		<?		
		return false;
	}
	$photo_medium = $rw1['photos_large'];
	$name = $rw1['name'];
	$code=$rw1['code'];
	$size=$rw1['size'];
	$brand=$rw1['brand_id'];
	$description=$rw1['description'];
	$min_order=$rw1['min_order'];
	$id=$rw1['id'];
	$price=$rw1['price'];

	$query = " SELECT * FROM `product_cat_id` WHERE  `product_id`='$id' ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else while( $rw = dbf($rs) ){

		$cat_name[] =cat_translate($rw['cat_id']) ;
		
	}
		
	$catname = implode( '&nbsp;,&nbsp;' ,$cat_name );
	
	if(! $cat = table("product_cat_id",$id,"cat_id","product_id")){
		e( __FUNCTION__ , __LINE__ );	
		return false;
	}
	$_SESSION['product_id']=$rw1['id'];
	?>
	<div class="p_img_vw">
		<img class="zoom img-responsive" src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>"  data-zoom-image="<?=img_product_src($photo_medium);?>" >
	</div>
	<script>
	$(".zoom").elevateZoom({     

        cursor: "crosshair",       	
		lensShape:"round",
		scrollZoom:true

	});
	</script>
	<div class="p_vw">	
		<div class="p_vw_name"> 
			<h2 data-mh="img-responsive" style="height: 35px;"><?=$name;?></h2>
		</div> 
		<div class="p_vw_cat">
			<h2 data-mh="img-responsive" style="height: 35px;">دسته :&nbsp;&nbsp; <?=$catname;?></h2>
		</div> 
		<?= $brand ? '<div class="p_vw_cat"><h2 data-mh="img-responsive" style="height: 35px;">برند&nbsp;&nbsp;:&nbsp;&nbsp; '.cat_translate($brand).'</h2></div> ' : ''; 
						        
		?>
		<div class="table-responsive">
			<table id="price-grid" class="table table-bordered">
		      <tbody>
		      <tr id="price-qty-row">
		      	<td>حداقل سفارش</td>
		        <td class="number1"><?=number_format($min_order);?> عدد</td>		        
		      </tr>	
		      <tr>
		        <td>قیمت برای هر عدد کالا</td>
		        <td class="number1"><?=cat_translate($price);?></td>		        
		      </tr>
			  
		    </tbody></table>
	    </div>
		<div class="txt"><p><?=nl2br($rw1['description'])?></p></div>

		<div class="p_vw_btn">
			<a href="<?=tasvir_order_link($rw1); ?>" class="tasvir_button" target="_blank"> سفارش</a>
			<a target="_blank" href="./?do_action=pdf_html&product=<?=$rw1['id'];?>" class="tasvir_button"><i class="fa fa-download" aria-hidden="true"></i> دانلود</a>
			<span id="share" class="tasvir_button"><i class="fa fa-share" aria-hidden="true"></i> اشتراک</span>
		</div>
	</div>

</div>

<?
}