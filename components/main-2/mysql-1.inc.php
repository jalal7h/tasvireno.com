<?

# jalal7h@gmail.com
# 2016/06/10
# Version 1.8

/*

	
	#
	# insert
	$id = dbs("session", 
		['name','text','approach','publisher','reflection','clock','date','date_created'=>date('U'),'state','university','address','film','flag'=>1] );
	#

	#
	# upload photo
	listmaker_fileupload( 'session', $id, "*" );
	#


/*README*/

$GLOBALS['DB_POINTER'] = false;

function db_connect($S=false){

// INSERT `test` SET `zaman` = 3.5 * 3600 + UNIX_TIMESTAMP();

#	if($GLOBALS['DB_POINTER']){
#		return $GLOBALS['DB_POINTER'];
#	} else 
	
	if(!$db = mysql_connect( mysql_host , mysql_username , mysql_password )){
		$prompt = "problem connecting to mysql server - (invalid username / password)";
	
	} else if(!mysql_query(" SET NAMES 'utf8' ")){
		$prompt = "problem setting NAMES - (cant set names)";
	
	} else if(!mysql_query(" SET time_zone = '+3:30' ")){
		$prompt = "problem setting time_zone";
	
	} else if(!mysql_select_db( mysql_database ) ){
		$prompt = "
		<div style='width:100%;padding-top:8%; font:bold 30px monospace; margin:auto;'>
		<img style='width:350px; max-width:50%; margin-bottom:30px;' src='http://parsunix.com/cdn/img/tools2.png' >
		<br>
		MySQL service is down !
		</div>";
	
	} else {
		$GLOBALS['DB_POINTER']=$db;
		return $db;
	}
	
	if($S==true){
		;
	} else {
		echo "<center class=er1 >$prompt</center>";
		die();
	}
	
	return false;
}


function dbq( $query='' ){

	if(! $query ){
		echo "No query defined!";
	
	} else {
		
		$query = str_replace("ي","ی",$query);	
		
		if( $query=='' ){
			return false;
		
		} else {
			
			if( db_connect() ){
				
				$query = dbq_query_normalize( $query );
				$query = dbq_query_hide( $query );

				if( $res = mysql_query( $query ) ){
					return $res;
				
				} else {
					return false;
				}
			
			} else {
				return false;
			}
		}

	}

	return false;
}


function dbf($rs=null){
	if($rs==null){
		echo "No \$rs pointer defined!";
	} else {
		return mysql_fetch_assoc($rs);
	}

	return false;
}


function dbr($rs=null,$r="",$c=""){
	if($rs==null){
		echo "No \$rs pointer defined!";
	} else if($r==null and $r!==0){
		echo "No \$row pointer defined!";
	} else if($c==""){
		return mysql_result($rs,$r);
	} else {
		return mysql_result($rs,$r,$c);
	}

	return false;
}

function dbn($rs=null){
	if($rs==null){
		echo "No \$rs pointer defined!";
	} else {
		return mysql_num_rows($rs);
	}

	return false;
}

function dbc( $rs=null ){

    if($rs==null){
            echo "No \$rs pointer defined!";
    } else {
            return mysql_num_fields($rs);
    }

    return false;
}

function dbi(){
	return mysql_insert_id();
}

function dbe(){
	// cm_install($force=true);
	return mysql_error();
}

function dbs( $table, $array_set, $array_where=null, $debug=null ){
	
	#
	# insert
	if(! $array_where ){
		if(! dbq(" INSERT INTO `$table` (`id`) VALUES ('') ") ){
			e(__FUNCTION__,__LINE__);
		} else if(! $id = dbi() ){
			e(__FUNCTION__,__LINE__);			
		} else {
			$array_where = [ 'id'=>$id ];
		}
	}

	# 
	# fix arrays
	foreach( $array_set as $k => $r ){
		if( is_numeric($k) ){
			unset($array_set[$k]);
			$k = $r;
			$r = @trim($_REQUEST[$r]);
			$array_set[$k] = $r;
		}
	}
	foreach( $array_where as $k => $r ){
		if( is_numeric($k) ){
			unset($array_where[$k]);
			$k = $r;
			$r = @trim($_REQUEST[$r]);
			$array_where[$k] = $r;
		}
	}

	# 
	# update
	foreach( $array_set as $column => $value ){
		
		#
		# usual case, `table`, and `column` are known
		if( is_column($table, $column) ){
			$string_set[] = "`$column`='$value'";
		
		} else {
			#
			# table e janebi
			$table_etc = $table."_".$column;
			$table_fgc = $table."_id";
			#
			# if its realy an external table
			if( is_table( $table_etc ) and is_column( $table_etc, $column ) ){
			
				#
				# fix `value`
				$value = $_REQUEST[ $column ];
			
				#
				# fix `id`
				if(! $id ){
					$id = $_REQUEST['id'];
				}
				if(! $id ){
					e(__FUNCTION__,__LINE__,"Something wrong, could not find `id` for table: $table , column: $column");
				}
				
				#
				# if we have array of value in REQUEST
				if( is_array($value) and sizeof($value) ){
					foreach ($value as $i => $v) {
						
						#
						# fix v
						$v = trim($v);
						
						#
						# edit on `external table`
						if( $v_id = $_REQUEST[ $column.'_in_table' ][$i] ){
							
							#
							# delete row
							if( $v=='' ){
								dbq(" DELETE FROM `$table_etc` WHERE `id`='$v_id' LIMIT 1 ");
							
							#
							# update row
							} else {
								dbq(" UPDATE `$table_etc` SET `$column`='$v' WHERE `id`='$v_id' LIMIT 1 ");

							}
						
						#
						# new on `external table`
						} else {
							dbq(" INSERT INTO `$table_etc` (`$table_fgc`,`$column`) VALUES ('$id','$v') ");
						}

					}
				}

			#
			# no `column` found, and also no `external table` found
			} else {
				e(__FUNCTION__,__LINE__,"Something wrong, table: $table , column: $column");
			}
		}

	}
	$string_set = implode(",",$string_set);
	#
	foreach( $array_where as $column => $value ){
		if( is_column($table, $column) ){
			$string_where[] = "`$column`='$value'";
		}
	}
	$string_where = implode(" AND ",$string_where);
	#
	$query = " UPDATE `$table` SET $string_set WHERE $string_where ";
	#
	if( $debug ){
		 e( $query );
	}
	
	#
	# query
	if(! $rs = dbq( $query ) ){
		e( __FUNCTION__, __LINE__, dbe() );
		echo $query;
		return false;
	
	} else {
		
		#
		# return `id`
		foreach ($array_where as $k => $v) {
			if(! is_numeric($k) ){
				return $v;
			}
		}

	}

}


function dbq_query_normalize( $query ){
	$query = trim($query);
	return $query;
}



function dbq_query_hide( $query ){

	// return $query;

	if( stristr($query, 'INFORMATION_SCHEMA.') ){
		return $query;
	}

	$qUT = strtoupper($query);
	$q7 = substr($qUT,0,7);

	switch( $q7 ){
		
		case 'SELECT ':
			$its = "SELECT";
			break;

		case 'DELETE ':
			$its = "DELETE";
			break;

		default:
			return $query;
	}

	$table_name = trim(preg_split("/ from /i", $query)[1]);
	$table_name = trim(explode(' ', $table_name)[0]);
	$table_name = str_replace('`', '', $table_name);
	
	if(! is_column($table_name,'hide') ){
		return $query;
	}

	#
	# normalize
	if( stristr($query, ' WHERE ') ){
		$query = preg_split("/ WHERE /i", $query);
		
		// $query[0] = str_replace("\t", " ", $query[0]);

		$from0 = preg_split("/ FROM /i", $query[0]); // from: `cat` :WHERE
		$from = $from0[1];
		$from = trim( $from );
		$from = str_replace('`', '', $from);
		$query[0] = $from0[0]." FROM `".$from."`";

		if( $its=="SELECT" ){
			$query = implode(" WHERE `hide`='0' AND ", $query);
		} else {
			$query = implode(" WHERE ", $query);
		}
	}

	#
	# replace
	// if( $its=="SELECT" ){
	// 	if( stristr($query, ' WHERE ') ){
			
	// 		$query = str_ireplace(
	// 			" FROM `$table_name` WHERE ", 
	// 			" FROM `$table_name` WHERE `hide`='0' AND ", 
	// 			$query);

	// 		error_log('dqh; '.$query);
	// 	}
	// } else 

	if( $its=="DELETE" ){
		// echo $query;die();
		$query = str_ireplace( 
			"DELETE FROM `$table_name` ", 
			"UPDATE `$table_name` SET `hide`='1' ", $query );
	}
	
	// error_log('dqh; '.$query);
	// die();

	return $query;
}








