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
	<div class="product-grid">
	     <div class="back">  <i class="fa fa-th-large" aria-hidden="true"></i> <a href="./">صفحه اصلی</a>&nbsp;&nbsp;  / &nbsp;&nbsp; <a href="./?page=102&cats=1">هدایای شرکت</a>  &nbsp;&nbsp;/ &nbsp;&nbsp; <a href="./?page=102&brands=1">برند هدایا</a> &nbsp;&nbsp;/&nbsp;&nbsp;
	<?
	if(isset($_SERVER['HTTP_REFERER']))
	echo '<a href="'.$_SERVER['HTTP_REFERER'].'">برگشت به صفحه قبل</a>';
	else
	echo '<a href="'.$_SERVER['SERVER_NAME'].'">برگشت به صفحه قبل</a>';
	?>
	</div>
	   
	<?

	    $query1 = " SELECT * FROM `product` WHERE `id`='".$_REQUEST['product_id']."' ";
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
				$_SESSION['product_id']=$rw1['id'];
			?>
			<div class="p_img_vw"><img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" ></div>
			<div class="p_vw_btn">
			<a href="<?=tasvir_product_link($rw1);?>" class="tasvir_button"><i class="fa fa-download" aria-hidden="true"></i> دانلود</a>
			<a href="<?=tasvir_product_link($rw1);?>" class="tasvir_button"><i class="fa fa-share" aria-hidden="true"></i> اشتراک</a>
			</div>	
			<div class="p_vw_name">
			<h2 data-mh="img-responsive" style="height: 35px;"><?=$name;?></h2>
			</div> 
			<div class="p_vw_cat">
			<h2 data-mh="img-responsive" style="height: 35px;">دسته : <?=cat_translate($cat);?></h2>
			</div> 
			<?= $brand ? '<div class="p_vw_cat"><h2 data-mh="img-responsive" style="height: 35px;">برند : '.cat_translate($brand).'</h2></div> ' : ''; 
							        
			?>
			<div class="txt"><p><?=nl2br($rw1['description'])?></p></div>

			<div class="p_vw_btn">
			<a href="<?=tasvir_order_link($rw1);?>" class="tasvir_button"> سفارش</a>
			</div>
            
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
			
			<?
			}	 

            ?>
	 </div>
	 <?
}