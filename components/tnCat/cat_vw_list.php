<?
$GLOBALS['block_layers']['cat_vw_list'] = 'لیست دسته ها ';

function cat_vw_list(){
	?>
<div class="cat_vw_list"> 
<div class="row">
<div class="h-cat"><h2>هدایای تبلیغاتی</h2></div>
	
	<ul class="cat-grid">
	<?
	$query = " SELECT * FROM `cat` WHERE `parent`='0' AND `cat`='cat'  ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
				<?
			
	} else while( $rw = dbf($rs) ){

				
				$cat_name = $rw['name'];
				$id=$rw['id'];
         
			?>
			<li class="hvr-shrink">
			<a href="<?=tasvir_cat_link( table("cat", $id) );?>" class="tile-shopcat tile-category">
			    <img src="<?=img_cat_src( table("cat", $id) );?>" alt="<?=$cat_name;?>" class="img-responsive " style="">
			    <h2 data-mh="tile-category" style="height: 35px;"><?=$cat_name;?></h2>
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

function img_cat_src( $rw ){

	$link = _URL."/".$rw['logo'];
	return $link;
}

