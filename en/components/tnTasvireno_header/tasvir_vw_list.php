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
		if( $name=='Gifts' ){
			$c.=" id=\"gift\"";
		} else if( $name=='Brands' ){
			$c.=" id=\"brand\"";
		} else if( $name=='Fields' ){
			$c.=" id=\"field\"";
		}

		$c.="><a href=";
		$c.= $link;
		$c.=">";
		$c.= $name;
		$c.="</a>";
		if( $name=='Gifts' ){
			$c.=" <ul>
						
			            <div id=\"gift1\" class=\"content\"></div>
			            
			      </ul>
			    </li>";
		} else if( $name=='Brands' ){
			$c.=" <ul>
						
			            <div id=\"brand1\" class=\"content\"></div>
			            
			      </ul>
			    </li>";
		} else if( $name=='Fields' ){
			$c.=" <ul>
						
			            <div id=\"field1\" class=\"content\"></div>
			            
			      </ul>
			    </li>";
		}
		

	}

	return $c;

}