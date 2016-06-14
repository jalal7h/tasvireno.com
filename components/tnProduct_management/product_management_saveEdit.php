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


}

