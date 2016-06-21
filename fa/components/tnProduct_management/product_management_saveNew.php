<?

function product_management_saveNew(){
	#
	# insert
	$id = dbs("product", 
		['name','code','size','printing_Type','min_order','price','brand_id','photo_medium','photos_large','description','field_id','cat_id','flag'=>1] );
	#

	#
	# upload photo
	listmaker_fileupload( 'product', $id, "*" );
	#


}

