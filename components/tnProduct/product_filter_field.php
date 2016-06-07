<?
function product_filter_field(){
	?>
	<h3 class="Category" id="filter_field">زمینه</h3>
	<div class="Category_field">
	<?
	if ($cat_id = $_REQUEST['cat']) {
		$q_cat="AND  `cat_id` in(SELECT `id` FROM `cat` WHERE `cat`='cat' AND `parent`='$cat_id' ORDER BY `id` ASC)";
		
	}else if ($cat_id = $_REQUEST['cat_id']) {
		
		$q_cat="AND `cat_id` ='$cat_id' ";
	}	
	if ($field_id = $_REQUEST['field_id']) {
		
		$q_field="AND `field_id` ='$field_id'";
	}
	if ($brand_id = $_REQUEST['brand_id']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}else if ($brand_id = $_REQUEST['brand']) {
		
		$q_brand="AND `brand_id` ='$brand_id'";
	}

	// tuye ye brand hastim alan, 
	if( $field_id ){
		$name= table("cat", $field_id, "name");
		?>	
			<label>
					<input type="checkbox" id="no_brand" class="<?=$cat_id?>" name="brand_<?=$brand_id?>" value="1" checked <?=($_REQUEST['brand']==$brand_id ?"checked": "")?> />
						<a href='./?page=102&brand_id=<?=$brand_id?>&cat_id=<?=$cat_id?>'><?=$name?></a>
			</label>
			
		<?

	// age tuye brand nistim, list brand ha ro neshun bede
} else {
	
		
		$query = " SELECT * FROM `cat` WHERE `cat`='field' ORDER BY `id` ASC  ";

		if(! $rs = dbq($query) )
		{
			e( __FUNCTION__ , __LINE__ );

		} else if(! dbn($rs) )
		{
			//
				
		}else while( $rw = dbf($rs) )
		{	
			$query3 = " SELECT * FROM `product` WHERE `flag`='1' AND  `field_id`='".$rw['id']."' $q_cat  $q_brand";
			
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
			$field_name=$rw['name'];
			$field_id=$rw['id'];				 
			?>	
				<label>
					<input type="checkbox" id="no_brand" class="<?=$field_id?>" name="field_<?=$field_id?>" value="1" <?=($_REQUEST['field_id']==$field_id ?"checked": "")?> />
					<a href="./?page=102&brand=<?=$brand_id?>&field_id=<?=$rw['id']?>&cat_id=<?=$cat_id?>"><span><?=$field_name?></span></span><span>(<?=$n?>)</span></a>
				</label>
				
			<?
		    }   
		}
}
	
?>
</div>
<?    
}