<?
function breadcrumb(){
	if ($cat_id = $_REQUEST['cat']) {
		
		 if(! $cat_name_p = table("cat", $cat_id,"name")){
		   e( __FUNCTION__ , __LINE__ );
		}else{
			$cat_link_p='
			 <i class="fa fa-angle-double-left" aria-hidden="true"></i>
			<a href='.tasvir_cat_link( table("cat", $cat_id) ).'>'.$cat_name_p.'</a>
			';
			
		}
		
		
	}else if ($cat_id = $_REQUEST['cat_id']) {
		if(! $cat_name = table("cat", $cat_id,"name")){
		   e( __FUNCTION__ , __LINE__ );
		}else{
			$cat_link='
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
 			 
			<a href='._URL.'/?page=102&cat_id='.$cat_id.'>'.$cat_name.'</a>';
			
		}
	}
	if ($brand_id = $_REQUEST['brand_id']) {
		if(! $brand_name = table("cat", $brand_id,"name")){
		   e( __FUNCTION__ , __LINE__ );
		}else{
			$brand_link='
			  <i class="fa fa-angle-double-left" aria-hidden="true"></i>
 			 
			<a href='._URL.'/?page=102&brand_id='.$brand_id.'>'.$brand_name.'</a>';
			
		}
	}
	if ($brand_id = $_REQUEST['brand']) {
		if(! $brand_name = table("cat", $brand_id,"name")){
		   e( __FUNCTION__ , __LINE__ );
		}else{
			$brand_link='
			 <i class="fa fa-angle-double-left" aria-hidden="true"></i>
 			 
			<a href='._URL.'/?page=102&brand='.$brand_id.'>'.$brand_name.'</a>';
			
		}
	}
	if ($field_id = $_REQUEST['field_id']) {
		
		if(! $field_name = table("cat", $field_id,"name")){
		   e( __FUNCTION__ , __LINE__ );
		}else{
			$field_link='
			  <i class="fa fa-angle-double-left" aria-hidden="true"></i>
 			 
			<a href='._URL.'/?page=102&field_id='.$field_id.'>'.$field_name.'</a>';
			
		}
	}
?>

		<div class="back">
		&nbsp;&nbsp;  
		<i class="fa fa-th-large" aria-hidden="true"></i> 
		&nbsp;
		<a href="./">صفحه اصلی</a>
		<?=$cat_link_p?>
		<?=$field_link?>
		<?=$brand_link?>		
		<?=$cat_link?>
		
		
	</div>
	<?
}	