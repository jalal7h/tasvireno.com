<?
function tasvir_product_link( $rw ){

	$link = _URL."/product-".$rw['id']."-".$rw['name'].".html";
	return $link;
}

function tasvir_order_link( $rw ){

	$link = _URL."/order-".$rw['id']."-".$rw['name'].".html";
	return $link;
}
