<?
function product_filter_cat()
{
	?>
	<h3 class="Category" id="filter_cat">Category</h3>
	<div class="Category_cat">
	<?
	if ($cat_id2 = $_REQUEST['cat']) {
			if ($field_id = $_REQUEST['field_id']) {
		
				$q_field="AND `id` in (SELECT `product_id` FROM `product_field_id` WHERE  `field_id`='$field_id' )";
			}
			if ($brand_id = $_REQUEST['brand_id']) {
				
				$q_brand="AND `brand_id` ='$brand_id'";
			}else if ($brand_id = $_REQUEST['brand']) {
				
				$q_brand="AND `brand_id` ='$brand_id'";
			}

			$name=table("cat", $cat_id2, "name");
			echo '<h2>'.$name.'</h2>';
			$query = " SELECT * FROM `cat` WHERE `cat`='cat' AND `parent`='$cat_id2' ORDER BY `id` ASC  ";
			
			if(! $rs = dbq($query) )
			{
				e( __FUNCTION__ , __LINE__ );

			} else if(! dbn($rs) )
			{
				//
					
			}else while( $rw = dbf($rs) )
			{
			$q_cat2="AND `id` in (SELECT `product_id` FROM `product_cat_id` WHERE  `cat_id`='".$rw['id']."' )";
			$query3 = " SELECT * FROM `product` WHERE `flag`='1' $q_cat2 $q_field  $q_brand";
			
			if(!$rs3 = dbq($query3) )
			{
				e( __FUNCTION__ , __LINE__ );
			}else if(!$num3=dbn($rs3) )
			{
				    continue;
			}else
			{
				$n=$num3;
			}	
		
			if ($n!=0) {
			$cat_name=$rw['name'];
			$cat_id=$cat_id2;				 
			?>	
				<label class="parent">					
					<a href="./?page=102&brand=<?=$_REQUEST['brand_id']?>&cat_id=<?=$rw['id']?>&field_id=<?=$_REQUEST['field_id']?>">
						<span><?=$cat_name?></span>&nbsp;<span>(<?=$n?>)</span>
					</a>
				</label>
				
			<?
		    }
		    }   
	}else { 
	if ($cat_id = $_REQUEST['cat_id']) {
		
		$q_cat="AND `id` in (SELECT `product_id` FROM `product_cat_id` WHERE  `cat_id` in(SELECT `id` FROM `cat` WHERE `cat`='cat' AND `parent`='$cat_id' OR `id`='$cat_id' ))";
	}	
	if ($field_id = $_REQUEST['field_id']) {
		
		$q_field="AND `id` in (SELECT `product_id` FROM `product_field_id` WHERE  `field_id`='$field_id' )";
	}
	if ($brand_id = $_REQUEST['brand_id']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}else if ($brand_id = $_REQUEST['brand']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}

	// tuye ye brand hastim alan, 
	if( $cat_id ){
		$name= table("cat", $cat_id, "name");
		?>	
			<label  class="check">
				<a href='./?page=102&brand_id=<?=$brand_id?>&field_id=<?=$field_id?>'>
				<i class="fa fa-check" aria-hidden="true"></i>
				<?=$name?>
				</a>

			</label>
			
		<?

	// age tuye brand nistim, list brand ha ro neshun bede
} else {
	
		
		$query = " SELECT * FROM `cat` WHERE `cat`='cat' ORDER BY `id` ASC  ";

		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{	
			$q_cat2="AND `id` in (SELECT `product_id` FROM `product_cat_id` WHERE  `cat_id`='".$rw['id']."' )";
			$query3 = " SELECT * FROM `product` WHERE `flag`='1' $q_cat2 $q_field  $q_brand";
			
				if(!$rs3 = dbq($query3) )
				{
					e( __FUNCTION__ , __LINE__ );
				}else if(!$num3=dbn($rs3) )
				{
					    continue;
				}else
				{
					$n=$num3;
				}	
		
			if ($n!=0) {
			$cat_name=$rw['name'];
			$cat_id=$rw['id'];				 
			?>	
				<label <?=($_REQUEST['cat_id']==$cat_id ?"class=\"check\"": "")?>>
					
					<a href="./?page=102&brand=<?=$brand_id?>&cat_id=<?=$rw['id']?>&field_id=<?=$field_id?>">
					<?=($_REQUEST['cat_id']==$cat_id ?"<i class=\"fa fa-check\" aria-hidden=\"true\"></i>": "")?>					
					<span><?=$cat_name?></span>&nbsp;<span>(<?=$n?>)</span>
					</a>
				</label>
				
			<?
		    }   
		}
}
}	
?>
</div>
<?    
}