<?
function product_filter_cat()
{
	?>
	<h2 class="Category" id="filter_cat">دسته بندی</h2>
	<div class="Category_cat">
	<?
    
    if( $_REQUEST['brands'] )              /* کلیک روی برند های هدایا در داخل لیست محصولات*/
    {
		$query_brand = "AND `brand_id` in(SELECT `id` FROM `cat` WHERE `cat`='brand')";
	
	}else if( $_REQUEST['cat'] )              /* کلیک روی برند خاص */
    {
		$cat_id = $_REQUEST['cat'];
		if ($cat_id==not_cat) {             /* کلیک بر روی برند خاص در داخل همه برندها*/
			$query_brand = "AND `brand_id`='".$_REQUEST['id']."' ";
			$brand_id=$_REQUEST['id'];
		}else{                                        /* کلیک بر روی برند در داخل یک دسته خاص*/
			$query_cat="AND `parent`='".$cat_id."'";
		    $rw_cat = table("cat", $cat_id);
		    $query_brand = "AND `brand_id`='".$_REQUEST['id']."' ";
		    $brand_id=$_REQUEST['id'];
		   
		}
		


	}else if( $_REQUEST['id'] || $_REQUEST['brand_id'] )
	{
		if ($_REQUEST['id']) {      /* کلیک روی دسته خاص */
			
			$cat_id = $_REQUEST['id'];
			$query_cat="AND `parent`='".$cat_id."'";
			/*$query_brand = "AND `brand_id`='".$_REQUEST['id']."' ";*/
			$rw_cat = table("cat", $cat_id);
			
		}else if ($_REQUEST['brand_id']) {     /* کلیک روی دسته خاص در داخل یک برند خاص */
			$brand_id=$_REQUEST['brand_id'];
			$cat_id = $_REQUEST['brand_id'];
			$query_brand = "AND `brand_id`='".$_REQUEST['brand_id']."' ";
		}
			 
					
	}
		/////////////////////////header
	if ($rw_cat['name']) 
	{
		echo '<h2 class="Category2">'.$rw_cat['name'].'</h2>';
	?>
		<label>
			<input type="checkbox" id="<?=$rw_cat['id']?>" name="cat_<?=$rw_cat['id']?>" value="1" <?=($_REQUEST['id']== $rw_cat['id'] ?"checked": "")?> />
			<span><?=$rw_cat['name']?></span>
		</label>
	<?
    }
		$query = " SELECT * FROM `cat` WHERE  `cat`='cat' $query_cat  ORDER BY `id` ASC  ";
			if(! $rs = dbq($query) )
			{
				/*e(__FUNCTION__,__LINE__);*/
			
			} else if(! dbn($rs) )
			{
				?>
				<!-- <div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div> -->
				<?
			
			} else while( $rw = dbf($rs) )
			{   
				$cat = $rw['name'];
				$id=$rw['id'];
				$query2 = " SELECT * FROM `product` WHERE `flag`='1' AND `cat_id`='{$id}' $query_brand ";
				if($rs2 = dbq($query2) )
				{
					 if(!$num=dbn($rs2) )
					 {
					 	continue;
					 }else
					 {
					 	$n=$num;
					 ?>
						<label>
							<input type="checkbox" id="<?=$id?>" class="<?=$brand_id?>" name="cat_<?=$id?>" value="1" <?=($_REQUEST['id']==$id ?"checked": "")?> />
							<span><?=$cat?></span><span>(<?=$n?>)</span>
						</label>
						<?
		             } 
				}
			}		        
?>
</div>
<?
}