<?


function tasvir_brand_link( $rw ){

	$link = _URL."/brand-".$rw['id']."-".$rw['name'].".html";
	return $link;
}

