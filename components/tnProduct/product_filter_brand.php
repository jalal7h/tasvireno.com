<?
function product_filter_brand(){
	?><h2 class="Category" id="filter_brand">برند ها</h2>
	<div class="Category_brand">

	<?
	if( $_REQUEST['brand_id'] )         /*کلیک بر روی یک برند خاص از صفحه اصلی*/
    {
		$brand_name=table( "cat", $_REQUEST['brand_id'] , "name");
		$brand_id=$_REQUEST['brand_id'];
		$cat_id=not_cat;
		?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="<?=$cat_id?>" name="brand_<?=$brand_id?>" value="1" <?=($_REQUEST['brand_id']==$brand_id ?"checked": "")?> />
							<span><?=$brand_name?></span></span>
			</label>
					<?
	}else if( $_REQUEST['cat'] )        /*کلیک بر روی یک برند در داخل لیست محصول*/
    {
		$cat_id = $_REQUEST['cat'];
		$brand_id = $_REQUEST['id'];
		if ($cat_id=='not_cat') {
			$brand_name=table( "cat", $_REQUEST['id'] , "name");
			$brand_id=$_REQUEST['brand_id'];
			$cat_id=not_cat;
			?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="<?=$cat_id?>" name="brand_<?=$brand_id?>" value="1" <?=($_REQUEST['brand_id']==$brand_id ?"checked": "")?> />
					<span><?=$brand_name?></span></span>
				</label>
			<?
		}else{
		$brand_id = $_REQUEST['id'];
		$query_brand = "AND `id`='".$_REQUEST['id']."' ";
		$query = " SELECT * FROM `cat` WHERE 1 $query_brand  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{
			$brand_name = $rw['name'];
			$brand_id=$rw['id'];
			$query2 = " SELECT * FROM `cat` WHERE `id`='{$cat_id}' OR `parent`='{$cat_id}'  ORDER BY `id` ASC  ";
			$n=0;
			if(! $rs2 = dbq($query2) )
			{
				e( __FUNCTION__ , __LINE__ );

			} else if(! dbn($rs2) )			
			{} else while( $rw2 = dbf($rs2) )
			{
				$query_cat = " AND `cat_id`='".$rw2['id']."' ";	

				$query3 = " SELECT * FROM `product` WHERE `flag`='1' AND  `brand_id`='{$brand_id}' $query_cat ";
				if(!$rs3 = dbq($query3) )
				{
					e( __FUNCTION__ , __LINE__ );
				}else if(!$num3=dbn($rs3) )
				{
					    continue;
				}else
				{
					$n+=$num3;
			}	}
			if ($n!=0) {
			
							 
			?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="<?=$cat_id?>" name="brand_<?=$brand_id?>" value="1" <?=($_REQUEST['id']==$brand_id ?"checked": "")?> />
							<span><?=$brand_name?></span></span><span>(<?=$n?>)</span>
				</label>
					<?
		    }   
		}
	}

	}else if($cat_id = $_REQUEST['id'] )  /*کلیک بر روی یک دسته در داخل لیست محصول*/
	{ 
		if ($_REQUEST['brand']) {
			$brand=$_REQUEST['brand'];
		}
	    $query = " SELECT * FROM `cat` WHERE `cat`='brand'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{   
			$brand_name = $rw['name'];
			$brand_id=$rw['id'];
			$query2 = " SELECT * FROM `cat` WHERE `id`='{$cat_id}' OR `parent`='{$cat_id}'  ORDER BY `id` ASC  ";
			$n=0;
			if(! $rs2 = dbq($query2) )
			{
				e( __FUNCTION__ , __LINE__ );

			} else if(! dbn($rs2) )			
			{} else while( $rw2 = dbf($rs2) )
			{
				$query_cat = " AND `cat_id`='".$rw2['id']."' ";	

				$query3 = " SELECT * FROM `product` WHERE `flag`='1' AND `brand_id`='{$brand_id}' $query_cat ";
				if(!$rs3 = dbq($query3) )
				{
					e( __FUNCTION__ , __LINE__ );
				}else if(!$num3=dbn($rs3) )
				{
					    continue;
				}else
				{
					$n+=$num3;
			}	}
			if ($n!=0) {		 
			?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="<?=$cat_id?>" name="brand_<?=$brand_id?>" value="1" <?=($brand_id==$brand ?"checked": "")?> />
							<span><?=$brand_name?></span></span><span>(<?=$n?>)</span>
				</label>
					<?
		  }    
		}
    }else if($_REQUEST['brands'] )/*کلیک بر روی برند هدایا در داخل لیست محصول*/
	{

	    $query = " SELECT * FROM `cat` WHERE `cat`='brand'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{
			$brand_name = $rw['name'];
			$brand_id=$rw['id'];
			$query2 = " SELECT * FROM `cat` WHERE `cat`='cat'  ORDER BY `id` ASC  ";
			$n=0;
			if(! $rs2 = dbq($query2) )
			{
				e( __FUNCTION__ , __LINE__ );

			} else if(! dbn($rs2) ){
				//
			} 
			else while( $rw2 = dbf($rs2) )
			{
				$query_cat = " AND `cat_id`='".$rw2['id']."' ";	

				$query3 = " SELECT * FROM `product` WHERE `flag`='1' AND `brand_id`='{$brand_id}' $query_cat ";
				if(!$rs3 = dbq($query3) )
				{
					e( __FUNCTION__ , __LINE__ );
				}else if(!$num3=dbn($rs3) )
				{
					    continue;
				}else
				{
					$n+=$num3;
			}	}
			if ($n!=0) {		 
			?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="not_cat" name="brand_<?=$brand_id?>" value="1" <?=($_REQUEST['id']==$brand_id ?"checked": "")?> />
							<span><?=$brand_name?></span></span><span>(<?=$n?>)</span>
				</label>
					<?
		  }    
		}
    }else if($_REQUEST['product_id'] || $_REQUEST['order_id'] || $_REQUEST['q'] )/*کلیک بر روی نمایش محصول یا سفارش*/
	{

	    $query = " SELECT * FROM `cat` WHERE `cat`='brand'  ORDER BY `id` ASC  ";
		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{
			$brand_name = $rw['name'];
			$brand_id=$rw['id'];
			$query2 = " SELECT * FROM `cat` WHERE `cat`='cat'  ORDER BY `id` ASC  ";
			$n=0;
			if(! $rs2 = dbq($query2) )
			{
				e( __FUNCTION__ , __LINE__ );

			} else if(! dbn($rs2) )			
			{} else while( $rw2 = dbf($rs2) )
			{
				$query_cat = " AND `cat_id`='".$rw2['id']."' ";	

				$query3 = " SELECT * FROM `product` WHERE `flag`='1' AND `brand_id`='{$brand_id}' $query_cat ";
				if(!$rs3 = dbq($query3) )
				{
					e( __FUNCTION__ , __LINE__ );
				}else if(!$num3=dbn($rs3) )
				{
					    continue;
				}else
				{
					$n+=$num3;
			}	}
			if ($n!=0) {		 
			?>	<label>
					<input type="checkbox" id="<?=$brand_id?>" class="not_cat" name="brand_<?=$brand_id?>" value="1" <?=($_REQUEST['id']==$brand_id ?"checked": "")?> />
							<span><?=$brand_name?></span></span><span>(<?=$n?>)</span>
				</label>
					<?
		  }    
		}
    }
?>
</div>
<?    
}