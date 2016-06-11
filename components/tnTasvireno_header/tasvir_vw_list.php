<?
function tasvir_vw_list(){

	if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='header' ORDER BY `prio` ASC ") ){
		e(__FUNCTION__,__LINE__);
		
	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);
		
	} else while( $rw = dbf($rs) ){

		$link = $rw['url'];
		$name = $rw['name'];
		
		$c.="<li";
		if( $name=='هدایا' ){
			$c.=" id=\"gift\"";
		} else if( $name=='برند' ){
			$c.=" id=\"brand\"";
		} else if( $name=='زمینه' ){
			$c.=" id=\"field\"";
		}

		$c.="><a href=";
		$c.= $link;
		$c.=">";
		$c.= $name;
		$c.="</a></li>";

	}

	return $c;

}