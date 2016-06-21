<?
function order_save(){
	#
	# insert
	$id = dbs("orders", 
		['name','company','tell','cell','email','number','product_id','date_created'=>date('U'),'details'] );
	#
	
	return $id;
}