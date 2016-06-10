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
<div class="product-grid" style="">
	 	   
	<?

	back();
	#
	# find it
	if(! $product_id = $_REQUEST['product_id'] ){
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
	$photo_medium = $rw1['photos_large'];
	$name = $rw1['name'];
	$code=$rw1['code'];
	$size=$rw1['size'];
	$cat=$rw1['cat_id'];
	$brand=$rw1['brand_id'];
	$description=$rw1['description'];
	$min_order=$rw1['min_order'];
	$price=$rw1['price'];
	$_SESSION['product_id']=$rw1['id'];
	?>
	<div class="p_img_vw"><img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" ></div>
		
	<div class="p_vw_name">
		<h2 data-mh="img-responsive" style="height: 35px;"><?=$name;?></h2>
	</div> 
	<div class="p_vw_cat">
		<h2 data-mh="img-responsive" style="height: 35px;">دسته :&nbsp;&nbsp; <?=cat_translate($cat);?></h2>
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
	        <td class="number1"><?=number_format($price);?> ریال</td>		        
	      </tr>
		  
	    </tbody></table>
    </div>
	<div class="txt"><p><?=nl2br($rw1['description'])?></p></div>

	<div class="p_vw_btn">
		<a href="<?=tasvir_order_link($rw1);?>" class="tasvir_button"> سفارش</a>
		<a href="./?do_action=pdf_html&product=<?=$rw1['id'];?>" class="tasvir_button"><i class="fa fa-download" aria-hidden="true"></i> دانلود</a>
		<span id="share" class="tasvir_button"><i class="fa fa-share" aria-hidden="true"></i> اشتراک</span>
	</div>
</div>

<?
}