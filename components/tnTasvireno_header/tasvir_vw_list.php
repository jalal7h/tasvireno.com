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
		if($name =='هدایا'){$c.=" id=\"gift\"";}
		$c.="><a href=";
		if($name =='هدایا'){$c.= "#";}else{$c.= $link;}
		$c.=">"; $c.= $name;$c.="</a></li>";
	
		}

return $c;

}