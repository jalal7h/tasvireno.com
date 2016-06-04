<?
$GLOBALS['block_layers']['product_vw_list'] = 'لیست محصولات ';

function product_vw_list(){
	?>
	<div class="product_wv_list">
		 <div class="product_list">
		 <?product_list()?>
		 </div>
		 <div class="product_filter">
		 <? product_filter();?>
		 </div>
	 </div>

<?
}



