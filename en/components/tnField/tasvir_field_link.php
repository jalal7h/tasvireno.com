<?
function tasvir_field_link( $rw ){
	$name = str_replace( " ", "+" , $rw['name'] );
	$link = _URL."/field-".$rw['id']."-".$name.".html";
	return $link;
}