<?
function tasvir_product_link( $rw ){
	$name = str_replace( " ", "+" , $rw['name'] );
	$link = _URL."/product-".$rw['id']."-".$name.".html";
	return $link;
}
function tasvir_product_link2( $rw ){
	$name = str_replace( " ", "+" , $rw['name'] );
	$link = _URL."/Product-".$rw['id']."-".$name.".html";
	return $link;
}
function tasvir_order_link( $rw ){
	$name = str_replace( " ", "+" , $rw['name'] );
	$link = _URL."/order-".$rw['id']."-".$name.".html";
	return $link;
}
