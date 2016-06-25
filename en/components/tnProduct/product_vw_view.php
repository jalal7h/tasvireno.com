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
			<div class="errors"><h1>The case was not found for your request1.</h1></div></div>
		<? 
		return false;
	} else if(! $rw1 = table("product", $product_id)){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>The case was not found for your request.</h1></div></div>
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
	$printing_Type=$rw1['printing_Type']; 

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
			scrollZoom:false,
			

		});
	
	</script>
	<div class="p_vw">	
		<div class="p_vw_name"> 
			<h2><?=$name;?></h2>
		</div> 
		<div class="p_vw_cat">
			<h2>Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; <?=$catname;?></h2>
		</div> 
		<?= $brand ? '<div class="p_vw_cat"><h2>Brand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; '.cat_translate($brand).'</h2></div> ' : ''; 
						        
		?>
		<?= $printing_Type ? '<div class="p_vw_cat"><h2>Printing Type&nbsp;&nbsp;:&nbsp;&nbsp; '.$printing_Type.'</h2></div> ' : ''; 
						        
		?>
		<div class="table-responsive">
			<table id="price-grid" class="table table-bordered">
		      <tbody>
		      <tr id="price-qty-row">
		      	<td>Quantity</td>
		        <td class="number1"><?=number_format($min_order);?> </td>		        
		      </tr>	
		      <tr>
		        <td>Your Price (each)</td>
		        <td class="number1"><?=cat_translate($price);?></td>		        
		      </tr>
			  
		    </tbody></table>
	    </div>
		<div class="txt"><p><?=nl2br($rw1['description'])?></p></div>

		<div class="p_vw_btn">
			<a href="<?=tasvir_order_link($rw1); ?>" class="tasvir_button" target="_blank"> Order</a>
			<a target="_blank" href="./?do_action=pdf_html&product=<?=$rw1['id'];?>" class="tasvir_button"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
			<span id="share" class="tasvir_button"><i class="fa fa-share" aria-hidden="true"></i> Share</span>
		</div>
	</div>

</div>

<?
}