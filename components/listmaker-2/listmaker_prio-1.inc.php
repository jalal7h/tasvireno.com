<?

# jalal7h@gmail.com
# 2016/04/01
# Version 1.4

/*

	listmaker_prio( 
		array( "post", 'up_or_down'=>"up", 'id'=>$my_id, 'column'=>"prio2", 'same'=>"parent,flag" , " `parent`='$parent' " )
	);

	listmaker_prio(  array( "post" )  );

	this function is sensitive about the following variables in $_REQUEST : id , up_or_down


listmaker_prio( $table_name=DB_PREF."currency" , $up_or_down="up" , $table_id=$_REQUEST['id'] , $column="prio" );
	// supporting `parent` property

new version 1.3 :

	listmaker_prio( 
		array( "post", 'up_or_down'=>"up", 'id'=>$my_id, 'column'=>"prio2", 'same'=>"parent,flag" , " `parent`='$parent' " )
	);

	listmaker_prio(  array( "post" )  );

	this function is sensitive about the following variables in $_REQUEST : id , up_or_down

/*README*/


function listmaker_prio__the_array_version( $list ){
	
	#
	# first reset all prio to an aranged collection.
	if(! $list = listmaker_prio_reset__the_array_version( $list ) ){
		return false;
	}
	// var_dump($list);
	
	#
	# 
	$table_name = $list['table_name'];
	$up_or_down = $list['up_or_down'];
	$id = $list['id'];
	$rw = $list['rw'];
	$column = $list['column'];
	$condition = $list['condition'];

	#
	# check id
	if(! $id ){
		echo "there is no id defined";
		return false;
	}

	#
	# rw check
	if(! $rw ){
		echo "cat find the related record in table";
		return false;
	}

	if(! $rw[ $column ] ){
		echo "cat find the $column column in table";
		return false;
	}

	#
	# move up or down
	switch ($up_or_down) {
		
		case 'up':
			# the biggest low one
			if(!$rs0 = dbq(" SELECT * FROM `$table_name` WHERE `$column` < ".$rw[ $column ]." $condition ORDER BY `$column` DESC LIMIT 1 ")){
				e(__FUNCTION__,__LINE__);
			} else if(!dbn($rs0)){
				// this is the top one, no need to move it up
				return true;
			} else if(!$rw_the_biggest_low = dbf($rs0)){
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `$column`='".$rw_the_biggest_low[ $column ]."' WHERE `id`='".$rw['id']."' LIMIT 1 ")){ // set the prio of `id` to `the_biggest_low`
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `$column`='".$rw[ $column ]."' WHERE `id`='".$rw_the_biggest_low['id']."' LIMIT 1 ")){ // set the prio of `the_biggest_low` to `id`
				e(__FUNCTION__,__LINE__);
			} else {
				return true;
			}
			break;
		
		case 'down':
			# the lowest big one
			if(!$rs0 = dbq(" SELECT * FROM `$table_name` WHERE `$column` > ".$rw[ $column ]." $condition ORDER BY `$column` ASC LIMIT 1 ")){
				e(__FUNCTION__,__LINE__);
			} else if(!dbn($rs0)){
				// this is the bottom one, no need to move it down
				return true;
			} else if(!$rw_the_lowest_big = dbf($rs0)){
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `$column`='".$rw_the_lowest_big[ $column ]."' WHERE `id`='".$rw['id']."' LIMIT 1 ")){ // set the prio of `id` to `the_lowest_big`
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `$column`='".$rw[ $column ]."' WHERE `id`='".$rw_the_lowest_big['id']."' LIMIT 1 ")){ // set the prio of `the_lowest_big` to `id`
				e(__FUNCTION__,__LINE__);
			} else {
				return true;
			}
			break;
		
	}

}

function listmaker_prio_reset__the_array_version( $list ){

	#
	# table_name and condition	
	foreach( $list as $k => $r ){
		if(! is_numeric($k) ){
			continue;
		} else if( $table_name=='' ){
			$table_name = $r;
		} else {
			$condition = " AND ".$r;
		}
	}
	
	#
	# table name
	if(! $table_name ){
		echo "there is no table defined";
		return false;
	}

	#
	# up or down
	if(! $up_or_down = trim($list['up_or_down']) ){
		if(! $up_or_down = $_REQUEST['up_or_down'] ){
			error_log( __FUNCTION__. __LINE__. "there is no up_or_down defined" );
			return false;
		}
	}

	#
	# id
	if(! $id = intval($list['id']) ){
		$id = intval($_REQUEST['id']);
	}
	
	#
	# rw
	$rw = table( $table_name , $id );

	#
	# column
	if(! $column = trim($list["column"]) ){
		$column = "prio";
	}
	
	#
	# same
	if( $same = trim($list['same']) ){
		$same = explode(",", $same);
		foreach ($same as $k => $r) {
			$condition.= " AND `$r`='".$rw[ $r ]."' ";
		}
	}

	#
	# save the list for future
	$list = array( 
		'table_name'=>$table_name,
		'up_or_down'=>$up_or_down,
		'id'=>$id,
		'rw'=>$rw,
		'column'=>$column,
		'condition'=>$condition
	);

	#
	# ouu, led mi du theaa
	# ORDER BY `$column` ASC
	# faghat un hai ke 0 hast ro adad bala mide.
	if(!$rs = dbq(" SELECT `id` FROM `$table_name` WHERE 1 $condition AND `$column`='0' ")){
		e(__FUNCTION__,__LINE__);
	} else if(! dbn($rs) ){
		// hich moshkeli nist
	} else {
		if(! $the_biggest_column_id = table( array($table_name, $column, " ORDER BY `$column` DESC LIMIT 1 " ) ) ){
			$the_biggest_column_id = 0;
		}
		while($rw = dbf($rs)){
			$the_biggest_column_id++;
			dbq(" UPDATE `$table_name` SET `$column`='$the_biggest_column_id' WHERE `id`='".$rw['id']."' LIMIT 1 ");
		}
	}

	return $list;
}








































function listmaker_priority( $table_name , $up_or_down="up" , $id=null , $column="prio" ){
	return listmaker_prio( $table_name , $up_or_down , $id , $column );
}



# Version 1.2

/*
	listmaker_priority( $table_name=DB_PREF."currency" , $up_or_down="up" , $table_id=$_REQUEST['id'] , $column="prio" );
	// supporting `parent` property
*/
function listmaker_prio( $table_name , $up_or_down="up" , $id=null , $column="prio" ){
	
	if( is_array($table_name) ){
		return listmaker_prio__the_array_version( $table_name );
	}

	if($id===null){
		$id = $_REQUEST['id'];
	}
	if(!$rw = table( $table_name , $id )){
		e(__FUNCTION__,__LINE__);
		return false;
	}

	#
	# first reset all prio to an aranged collection.
	listmaker_prio_reset( $table_name );

	#
	# move up or down
	switch ($up_or_down) {
		
		case 'up':
			
			# the biggest low one
			if(!$rs0 = dbq(" SELECT * FROM `$table_name` WHERE `prio` < ".$rw['prio']." ".($_REQUEST['parent'] ?" AND `parent`='".$_REQUEST['parent']."' " :'' )." ORDER BY `prio` DESC LIMIT 1 ")){
				e(__FUNCTION__,__LINE__);
			} else if(!dbn($rs0)){
				// this is the top one, no need to move it up
				return true;
			} else if(!$rw_the_biggest_low = dbf($rs0)){
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `prio`='".$rw_the_biggest_low['prio']."' WHERE `id`='".$rw['id']."' LIMIT 1 ")){ // set the prio of `id` to `the_biggest_low`
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `prio`='".$rw['prio']."' WHERE `id`='".$rw_the_biggest_low['id']."' LIMIT 1 ")){ // set the prio of `the_biggest_low` to `id`
				e(__FUNCTION__,__LINE__);
			} else {
				return true;
			}
			break;
		
		case 'down':
			# the lowest big one
			if(!$rs0 = dbq(" SELECT * FROM `$table_name` WHERE `prio` > ".$rw['prio']." ".($_REQUEST['parent'] ?" AND `parent`='".$_REQUEST['parent']."' " :'' )." ORDER BY `prio` ASC LIMIT 1 ")){
				e(__FUNCTION__,__LINE__);
			} else if(!dbn($rs0)){
				// this is the bottom one, no need to move it down
				return true;
			} else if(!$rw_the_lowest_big = dbf($rs0)){
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `prio`='".$rw_the_lowest_big['prio']."' WHERE `id`='".$rw['id']."' LIMIT 1 ")){ // set the prio of `id` to `the_lowest_big`
				e(__FUNCTION__,__LINE__);
			} else if(!dbq(" UPDATE `$table_name` SET `prio`='".$rw['prio']."' WHERE `id`='".$rw_the_lowest_big['id']."' LIMIT 1 ")){ // set the prio of `the_lowest_big` to `id`
				e(__FUNCTION__,__LINE__);
			} else {
				return true;
			}
			break;
		
	}

}

function listmaker_priority_reset( $table_name ){
	return listmaker_prio_reset( $table_name );
}

function listmaker_prio_reset( $table_name ){

	if( is_array($table_name) ){
		return listmaker_prio_reset__the_array_version( $table_name );
	}

	#
	# ouu, led mi du theaa
	if(!$rs = dbq(" SELECT `id` FROM `$table_name` WHERE 1 ".($_REQUEST['parent'] ?" AND `parent`='".$_REQUEST['parent']."' " :'' )." ORDER BY `prio` ASC ")){
		e(__FUNCTION__,__LINE__);
	} else if(!dbn($rs)){
		return true;
	} else while($rw = dbf($rs)){
		dbq(" UPDATE `$table_name` SET `prio`='".(++$i)."' WHERE `id`='".$rw['id']."' LIMIT 1 ");
	}
}







