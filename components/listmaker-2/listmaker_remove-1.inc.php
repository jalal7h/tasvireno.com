<?php

# jalal7h@gmail.com
# 2016/03/20
# Version 1.0.2

/*

listmaker_remove( "links" , $id=11 );
listmaker_remove( "links" );

moshabehe listmaker_flag
monteha hazf mikone bejaye flag

/*README*/


function listmaker_remove( $table_name , $id=null ){
	
	if($id===null){
		if(! $id = $_REQUEST['id']){
			e(__FUNCTION__ , __LINE__);
			return false;
		}
	}
	
	if(!$rw = table( $table_name , $id )){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbq(" DELETE FROM `$table_name` WHERE `id`='$id' LIMIT 1 ")){
		e(__FUNCTION__ , __LINE__);
	} else {
		return true;
	}

	return false;
}

