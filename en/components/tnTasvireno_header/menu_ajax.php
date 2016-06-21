<?php
$GLOBALS['do_action'][] = 'menu_ajax';

function menu_ajax(){
		
?>
<div class="tabmenu">
<div class="tabmenu_rast">
<?
switch($_REQUEST['do']){

		case "gift":
			echo "<h1> Corporate Gifts:</h1>";	
			tabmenu_rast_cat();
			break;

		case "brand":
			echo "<h1> Brands in Corporate Gifts:</h1>";	
			tabmenu_rast_brand();
			break;

		case "field":
			echo "<h1> Field Gifts:</h1>";	
			tabmenu_rast_field();
			break;
}
?>				
</div>
<div class="tabmenu_chap">
<h1> Recommended:</h1>
<?tabmenu_chap();?>
</div>	
</div>

<?

}

function tabmenu_chap(){
	$query1 = " SELECT * FROM `product` WHERE `flag`='1' ORDER BY rand() ASC LIMIT 2 ";
	        if(! $rs1 = dbq($query1) ){
				e(__FUNCTION__,__LINE__);
			
			} else if(! dbn($rs1) ){
				
				?>
				<div class="errors"><h1>The case was not found for your request.</h1></div>
				<?
			
			} else while( $rw1 = dbf($rs1) ){
				$photo_medium=$rw1['photo_medium'];
				$name = $rw1['name'];
				
			?>
			<a href="<?=tasvir_product_link2($rw1);?>" class="cbp-item-wrapper">
				<div class="p_img_head ">
					<img src="<?=img_product_src($photo_medium);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive hvr-round" >
				</div>
					<div class="tabmenu_chap_name">
					<h2 style="height: 35px;"> <?=$name;?></h2>
				</div>
			</a>
			
			<?
			}

}

function tabmenu_rast_cat(){
?>
<ul class="cat-grid2"><?
	$query = " SELECT * FROM `cat` WHERE `cat`='cat' AND `parent` not in(0) ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>The case was not found for your request.</h1></div>
				<?
			
	} else{ while( $rw = dbf($rs) ){

				$cat_name = $rw['name'];
				$id=$rw['id'];
				
				?>
				<li class="">							
					<a href="./?page=102&cat_id=<?=$rw['id']?>" class="">
					    <span data-mh="tile-category" style="height: 35px;"> <?=$cat_name;?></span>
					</a>
				</li>
<?	 
			}
		}
?>
 </ul>
<?
}

function tabmenu_rast_brand(){
?>
<ul class="cat-grid2"><?
	$query = " SELECT * FROM `cat` WHERE `cat`='brand' ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>The case was not found for your request.</h1></div>
				<?
			
	} else{ while( $rw = dbf($rs) ){

				$cat_name = $rw['name'];
				$id=$rw['id'];
				$id=$rw['id'];
				?>
				<li class="">
					<a href="<?=tasvir_brand_link( table("cat", $id) );?>" class="">
					    <span data-mh="tile-category" style="height: 35px;"> <?=$cat_name;?></span>
					</a>
				</li>
	<?	 
			}
		}
?>
</ul>
<?
}
function tabmenu_rast_field(){
	?><ul class="cat-grid2"><?
	$query = " SELECT * FROM `cat` WHERE `cat`='field' ORDER BY `id` ASC  ";
	if(! $rs = dbq($query) ){
		e( __FUNCTION__ , __LINE__ );

	} else if(! dbn($rs) ){
				?>
				<div class="errors"><h1>The case was not found for your request.</h1></div>
				<?
			
	} else{ while( $rw = dbf($rs) ){

				$field_name = $rw['name'];
				$id=$rw['id'];
				$id=$rw['id'];
				?>
			<li class="">
				<a href="<?=tasvir_field_link( table("cat", $id) );?>" class="">
				    <span data-mh="tile-category" style="height: 35px;"> <?=$field_name;?></span>
				</a>
			</li>
<?	 
			}
		}
?>
</ul>
<?
}