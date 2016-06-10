<?php

# jalal7h@gmail.com
# 2016/05/09
# Version 1.2

# print_r( cat_display('cat') );
# echo cat_display('cat', false );
# ff(array('گروه','n:cat*'=>$tapk,'option'=>cat_display('cat'),'inDiv')).

/*

# print_r( cat_display('cat') );
pishvarz e parametr e dovom "array" , true hast, tu in halat list i az cat ha ro besurate array mide.
in cat ha az admin ghabele control hastan.


# echo cat_display('cat', $array=false );
vaghti array false midi, besurate html mide, tuye <option>


# ff(array('گروه','n:cat*'=>$tapk,'option'=>cat_display('cat'),'inDiv')).
ff() hamun function e listmaker_formfield() hast, 

/*README*/

function cat_display( $cat , $is_array=true , $parent=0 , $str="" ){

	$query = " SELECT * FROM `cat` WHERE `flag`='1' AND `cat`='$cat' AND `parent`='$parent' ORDER BY `ord` ";
	
	if(!$rs = dbq( $query )){
		e(__FUNCTION__,__LINE__,dbe());
	
	} else if(!dbn($rs)){
		
		if($is_array){
			return array('id'=>$parent , 'str'=>$str);
		
		} else {
			return "<option value='$parent' >$str</option>";
		}

	} else while($rw = dbf($rs)){
		
		$c0 = cat_display($cat, $is_array, $rw['id'], ($str?$str." » ":"").$rw['name']);
#		if(!is_array($c0)){
#			continue;
#		} else 
		
		if(@ $c0['str']==''){
			continue;
		
		} else if($is_array){
			$GLOBALS['cat_display-array-'.$cat][$c0['id']] = $c0['str'];
		
		} else {
			$c.= $c0;
		}
	}
	
	if($parent==0 and $is_array){
		return $GLOBALS['cat_display-array-'.$cat];
	
	} else {
		return $c;
	}
}

