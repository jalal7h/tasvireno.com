<?php

# jalal7h@gmail.com
# 2016/03/21
# Version 1.5

/*

* the old version * * *

table( "esm e table" , "id e record" , "field i ke ma mikhaim azash ( ino age nadim kole record ro bar migardune)" , "esme element e ID, age `id` nabud, inja esmesho mizanim );

# table( "posts", $id , "fullname");
# table( "posts" $id );
# table( "posts" $username , "fullname" , "username" );


* the new version * * * 

 table([ 
 	"tablename", "count" ,
 	"id"=>$id ,
 	"parent"=>0 ,
 	"name" ,
 	" `mother`='43' AND ( 0 OR `cat`='$cat_id') "
 ]);

* no AND prefixed to conditon
/*README*/

function table__the_array_version( $list ){
	
	# the default value of fields I need
	$field_i_need = "*";

	foreach( $list as $k => $r ){
		if( is_numeric($k) ){
			if( ! trim($r) ){
				continue;
			} else if( strtolower(trim($r))=="count" ){
				$is_count = true;
			} else if(! $tableName ){
				$tableName = trim($r);
			} else if(! strstr($r," ") ) { // if it does not have SPACE, it will be the field we need in result
				$field_i_need = '`'.trim($r).'`';
			} else { // if its not the fields I need, it will be the condition
				$condition = $r;
			}
		} else { // if its not numeric, it will be the limit fields
			$condition_fields.= " AND `$k`='$r' ";
			if( $k=="id" ){
				$limit1_called = true;
				$limit1 = " LIMIT 1 ";
			}
		}
	}

	if( $is_count ){
		$field_i_need = " COUNT(*) ";
	}

	if( strstr( strtoupper($condition), " LIMIT " )) {
		$limit1_called = true;		
		$limit1 = "";
	}

	if(! $tableName ){
		echo "No Table Selected in `table` function.";
		return false;
	}
	
	$query = " SELECT $field_i_need FROM `$tableName` WHERE 1 $condition_fields $condition $limit1 ";

	if(!$rs = dbq( $query )){
		echo "err - table - $tableName, $id, $fieldName";
		echo dbe();
	} else if(! $rn = dbn($rs) ){
		//echo "error - no record found on table $tableName:$id:$fieldName";
		return false;
	} else {

		// echo __LINE__."<br>";
		if( 
			$is_count
			or
			($limit1_called AND ($field_i_need!="*"))
		){
			// echo __LINE__."<br>";
			return dbr($rs, 0, 0);

		} else if( $limit1_called ) {
			// echo __LINE__."<br>";
			return dbf($rs);

		} else {
			// echo __LINE__."<br>";
			while($rw[] = dbf($rs)){}
			return $rw;
		}

	}
}


function table($tableName, $id=null, $fieldName=null, $idFieldName="id"){
	
	if( is_array($tableName) ) {
		return table__the_array_version( $tableName );
	}

	$query = " SELECT ".($fieldName?"`$fieldName`":"*")." FROM `$tableName` 
		WHERE ".($id==null?'1':"`$idFieldName`='$id' LIMIT 1")." ";

	if(!$rs = dbq( $query )){
		echo "err - table - $tableName, $id, $fieldName";
		echo dbe();
	} else if(dbn($rs)!=1){
		//echo "error - no record found on table $tableName:$id:$fieldName";
		return false;
	} else {
		if($fieldName){
			return dbr($rs, 0, 0);
		} else {
			return dbf($rs);
		}
	}
}

