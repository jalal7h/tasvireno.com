<?


function tasvir_cat_link( $rw ){
	$name = str_replace( " ", "+" , $rw['name'] );
	$link = _URL."/cat-".$rw['id']."-".$name.".html";
	return $link;
}

