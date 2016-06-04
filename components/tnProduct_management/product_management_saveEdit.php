<?

function product_management_saveEdit(){
	
	#
	# insert
	$id = dbs("product", 
		['name','code','size','printing_Type','min_order','price','brand_id','field_id','cat_id','description'],['id'] );
	#

	#
	# upload photo
	listmaker_fileupload( 'product', $id, "*" );
	#
   
	#
	# insert in cat_product
	/* $product_id=$id;
	 $id = trim($_REQUEST['id']);
	if($cat_id = trim($_REQUEST['cat_id'])){
	if(! dbq(" UPDATE `cat_product` SET `cat_id`='{$cat_id}',`product_id`='{$product_id}' WHERE `id`='{$id}'")){
		echo dbe();
	 
	}
	}*/
	#

}

