<?php

# jalal7h@gmail.com
# 2016/04/07
# Version 1.2.4

/*
ba tavajoh be inke, ma esm e farsi e field haye table, ro tu phpmyadmin comment mikonim, 
va az un tu form estefade mikonim (dige tu form esm e farsi e field ha ro nemizanim)
ba in function mitunim esm e field ha ro dashte bashim

echo lmtc("tableName:fieldName");

/*README*/


function lmtc( $table_n_field ){
	return listmaker_tableComment( $table_n_field );
}

function listmaker_tableComment( $table_n_field ){
	
	#
	# fix variables
	if( strstr($table_n_field, ':') ){
		$table_n_field = explode(":", $table_n_field);
		$table = trim($table_n_field[0]);
		$field = trim($table_n_field[1]);
		$query = " SELECT COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema='".mysql_database."' AND table_name='".$table."' and `COLUMN_NAME`='".$field."' ";
	} else {
		$table = $table_n_field;
		$query = " SELECT TABLE_COMMENT FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='".mysql_database."' AND table_name='".$table."' and `TABLE_TYPE`='BASE TABLE' ";
	}

	#
	# get the name
	if(!$rs = dbq( $query )){
		e(__FUNCTION__.__LINE__);
	} else if( dbn($rs)==0 ){
		//e(__FUNCTION__.__LINE__);
	} else if(!$comment = dbr($rs, 0, 0)){
		// e(__FUNCTION__.__LINE__);
	} else if(! $field ){
		return explode("/", $comment);
	} else {
		return $comment;
	}

	return false;
}

