<?
$GLOBALS['block_layers']['brand_vw_list2'] = 'لیست برند ';

function brand_vw_list2(){
	?>
<div class="brand"> 
<div class="row"> 
	<h2>Shop our Brands</h2>
	<ul class="brand-grid">
	<?
	if(! $brands = cat_display( "brand" , $is_array=true , $parent=0 , $str="") ){
		e( __FUNCTION__ , __LINE__ );
	} else foreach ($brands as $brand_id => $brand_name){	
         
			?>
			<li class="flip-card">
			<a href="<?=tasvir_brand_link( table("cat", $brand_id) );?>" class="tile-shopbrand">
			        <img src="<?=img_brand_src( table("cat", $brand_id) );?>" alt="" class="img-responsive" style="">
			</a>
			</li>
	<?	 
	}
	?>
	 </ul>
</div>	
</div>
<?
}

function img_brand_src( $rw ){

	$link = _URL."/".$rw['logo'];
	return $link;
}

