<?

# jalal7h@gmail.com
# 2016/06/14
# Version 1.20

/*
	
	###################################################################################
	the new version 1.2

	# 
	# the list
	$list['name'] = 'linkify_mg_list';
	$list['query'] = " SELECT * FROM `linkify` WHERE 1 AND `parent`='$parent' ORDER BY `prio` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].($parent?'&parent='.$parent:'');

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].'&parent=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['modify_url'] = true; // link icon modify
	$list['addnew_url'] = false; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc("linkify:pic") , "tag"=>"th", "picture" => '$rw[\'pic\']');
	$list['list_array'][] = array("head"=>lmtc("linkify:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("linkify:url"), "content" => '$rw[\'url\']');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("name","url");

	#
	# paging select
	$list['paging_select'] = array(
		'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
		'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
		'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
		'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	);

	#
	# echo result
	echo listmaker_list( $list );

	########################################################################################

in , joziat ro migire, ye list mide

esm e list, class e list (tu css be kar miad)
	$list['name'] = 'name-of-list-as-classname';
	
query
$list['query'] = " SELECT * FROM `hotel` WHERE 1 ORDER BY `name` ASC ";
	
tedad dar safhe
$list['tdd'] = 12;


// link e click ru record
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

// link e virayesh (albate man mamulan edit ro ru target_url link midam va ino disable mikonam)
	$list['modify_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';
	
// button e sabt e jadid => redirect be form e sabt
	$list['addnew_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form';
	

// link e page 2 , 3 , ... (addadd e page ro khodesh ezafe mikone)
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	
// esme variable e shomarande page, masalan p0=2 , p0=3, esme variable ro dadim "p0"
// albate in mored pishfarz "p" hast
	$list['page_number_field'] = "p0";

// link e hazf
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=remove&id=".$rw["id"]';
	
// peygham e hazf
	$list['remove_prompt'] = '"آیا مایل به حذف مورد به نام ".$rw["name"]." هستید?"';
	
// dokme haye enteghal be bala va pain
	$list['up_n_down'] = array(
		'up'=>'"./?page=admin&cp='.$_REQUEST['cp'].'&do=moveUp&id=".$rw["id"]',
		'down'=>'"./?page=admin&cp='.$_REQUEST['cp'].'&do=moveDown&id=".$rw["id"]'
	);

// link e tanzim e flag , ke gharare be listmaker_flag berese
	$list['setflag_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=active&id=".$rw["id"]';
	
// sotun e tain konande ye rang e record. (faal ya gheyre faal)
	$list['tr_color_identifier'] = '$rw["flag"]';

// list e sotun ha
	$list['list_array'] = array (
		array("head"=>"عکس", "tag"=>"th", "picture" => '$rw[\'pic\']'),
		array("content" => '$rw[\'visit\']." بازدید"' ,"attr" => array("align" => 'center',"dir" => "rtl")),
	);

// in baes mishe , age 2ta az in function call konim, unai ke tu run e aval list shod, tu run e dovom list nashe
	$list['exclude_in_query'] = true;

// link haye ezafe ke baste be karbord ezafe mikonim o kenare dokme edit / remove / flag/ .. miad
	$list['linkTo'][] = array(
		'url' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=tour_management_list&p=".$_REQUEST["p"]."&do=setHotel&id=".$rw["id"]',
		'name' => 'هتلها',
		'width' => 35,
	);
	

// filter haye zire list
	$list['paging_select'] = array(
		'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
		'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
		'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
		'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	);

// lit e sotun hai ke bauat tush search beshe ro inja miarim
// va balaye list ye form e search miare
	$list['search'] = array("name");

//echo mikone ...
	echo listmaker_list($list);

/*README*/


function listmaker_list($list){

	#
	# height
	if(!$list['height']){
		$list['height'] = 50;
	}

	#
	# replacing up_n_down with up_or_down in version 1.16
	if(! $list['up_or_down'] ){
		$list['up_or_down'] = $list['up_n_down'];
	}



	###################################################################################
	# minifing the parameters in listmaker_list
	#
	#
	$base_url_tmp = str_replace('?','&',$list['base_url']);
	do {
		$doFieldName = "do".$do_c;
		$do_c++;
	} while( strstr( $base_url_tmp , '&'.$doFieldName.'=' ) );
	#
	#
	# up or down
	if( $list['up_or_down']===true and is_bool($list['up_or_down']) ){
		$list['up_or_down'] = array(
			'up'	=> $list['base_url'].'."&'.$doFieldName.'=prio&up_or_down=up&id=".$rw["id"]' ,
			'down'	=> $list['base_url'].'."&'.$doFieldName.'=prio&up_or_down=down&id=".$rw["id"]'
		);
	}
	#
	# remove url
	if( $list['remove_url']===true and is_bool($list['remove_url']) ){
		// its new version if lml and its true , so it have the base_url
		$list['remove_url'] = $list['base_url'].'."&'.$doFieldName.'=remove&id=".$rw["id"]';
	}
	#
	# modify url
	if( $list['modify_url']===true and is_bool($list['modify_url']) ){
		$list['modify_url'] = $list['base_url'].'."&'.$doFieldName.'=form&id=".$rw["id"]';
	} else if( $list['target_url']===true and is_bool($list['target_url']) ){
		$list['target_url'] = $list['base_url'].'."&'.$doFieldName.'=form&id=".$rw["id"]';
	}
	#
	# paging url
	if( ( (!$list['paging_url']) and $list['tdd'] ) 
	or( is_bool($list['paging_url']) and $list['paging_url']===true ) ){
		$list['paging_url'] = $list['base_url'].'."&p=%%"';
	}
	#
	# setflag url
	if( $list['setflag_url']===true and is_bool($list['setflag_url']) ){
		$list['setflag_url'] = $list['base_url'].'."&'.$doFieldName.'=flag&id=".$rw["id"]';
		if(! $list['tr_color_identifier'] ){
			$list['tr_color_identifier'] = '$rw["flag"]';
		}
	}
	#
	################################################################################### 



	# 	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.
	# prepare the addnew_url
	if($list['addnew_url']===false){
		$addnew_url = false;
	
	} else if($addnew_url = trim($list['addnew_url'])){
		eval("\$addnew_url = $addnew_url;");
	
	} else if($list['target_url']==''){
		$addnew_url = false;
	
	} else {
		$addnew_url = trim($list['target_url']);
		eval("\$addnew_url = $addnew_url;");
		$addnew_url = explode('&id=', $addnew_url);
		$addnew_url = $addnew_url[0];
	}
	
	if( $_REQUEST['q'] ){
		$addnew_url = "";
	}
	# 	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.	.


	#
	# the tag
	// $tag = ($list['tag']=='th'?'th':'td');

	#
	# paging
	if($paging_url = trim($list['paging_url'])){

		#
		# bake the paging url
		eval("\$paging_url = $paging_url;");

		#
		# page number field and value of the `P`
		if($list['page_number_field']!=''){
			$page_number_field = $list['page_number_field'];
		} else {
			$page_number_field = $paging_url;
			if(strstr($page_number_field, "=%%")){
				$page_number_field = explode("=%%", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("&", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
			} else if(substr(strrev($page_number_field), 0, 1)=="="){
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("&", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("=", $page_number_field);
				$page_number_field = $page_number_field[0];
			} else {
				$page_number_field = "p";
			}
		}
		$p = intval($_REQUEST[$page_number_field]);
	}

	# 
	# fix initial query
	# when there is no WHERE and ORDER, but its needed
	if(!stristr($list['query'], " WHERE ")){
		if(stristr($list['query'], " ORDER ")){
			$list['query'] = explode(" ORDER ", $list['query']);
			$list['query'][0].= " WHERE 1 ";
			$list['query'] = implode(" ORDER ", $list['query']);
		} else {
			$list['query'].= " WHERE 1 ";
		}
	}
	// if(!stristr($list['query'], " ORDER ")){
	// 	$list['query'].= " ORDER BY `id` DESC ";
	// }
	
	#
	# exclude in query
	if($list['exclude_in_query'] and sizeof($GLOBALS['exclude_in_query'])){
		$list['query'] = explode(' WHERE ', $list['query']);
		$list['query'][1] = " `id` NOT IN (".implode(",", $GLOBALS['exclude_in_query']).") AND ".$list['query'][1];
		$list['query'] = implode(" WHERE ", $list['query']);
	}

	# 
	# make the limit stt tdd
	$tdd = ($list['tdd']>0?$list['tdd']:10);
	$stt = $tdd * $p;
	$list['query'].= " LIMIT $stt,$tdd ";
	$remove_prompt = "آیا مایل به حذف هستید؟";
	
	#
	# add search parameter in QUERY, and also in URL
	if($list['search']){
		if($q = $_REQUEST['q']){
			$add_to_end_of_url.= "&q=".$q;
			$search_query.= "(";
			foreach ($list['search'] as $k => $field) {		
				$search_query.= " `".$field."` LIKE '%".$q."%' OR ";
			}
			$search_query.= "0) AND ";
		}
		if($search_query!=''){
			$list['query'] = str_ireplace(" WHERE "," WHERE ".$search_query." ", $list['query']); // *
		}
	}

	#
	#  the select-boxes.
	if($list['paging_select']){
		#
		# processing paging-select parameters
		foreach($list['paging_select'] as $paging_select_name => $paging_select_value){
			#
			# add the paging select to URL
			$add_to_end_of_url.= "&".$paging_select_name."=".$_REQUEST[$paging_select_name];
			#
			# collect the paging select parameters for query
			if(intval($_REQUEST[$paging_select_name])!=0){
				$paging_select_query.=" `$paging_select_name`='".$_REQUEST[$paging_select_name]."' AND ";
			}
		}
		#
		# use paging select query parameters in QUERY
		$list['query'] = str_ireplace(" WHERE "," WHERE ".$paging_select_query." ", $list['query']); // *

		# 
		# adding the select-box params to end of paging-url
		# remembering the filters to page-links
		$paging_url = listmaker_list__add_to_begin_of_url( $paging_url , $add_to_end_of_url );
		
		#
		# html content of paging-select tags
		# this will displaied in footer of list
		foreach($list['paging_select'] as $paging_select_name => $paging_select_value){
			$rand = rand(10000,99999);
			$select_url = $paging_url;
			$select_url = str_replace('&'.$paging_select_name.'=','&nt=',$select_url);
			$select_url = str_replace('&'.$page_number_field.'=','&nt=',$select_url);
			$paging_select_c.= "
			<div id='paging_select".$rand."' class='paging_select'>
			<select onchange=\"location.href='".$select_url."&".$paging_select_name."='+this.value;\" >
				".(strstr($paging_select_value," value=''")?"":"<option value=''></option>")."
				$paging_select_value
			</select>
			</div>
			<script>$('#paging_select".$rand." select').val('".$_REQUEST[$paging_select_name]."')</script>\n";
		}
	}

	#
	# try to query mysql
	if(! $rs = dbq($list['query']) ){
		e(__FUNCTION__." : ".__LINE__);
		e($list['query']);
		echo dbe();
	
	} else if(! dbn($rs) ){
		$c.= "
		<div class='listmaker_list-no-record-found'>\n
			موردی یافت نشد.
			".($addnew_url ?"<br><a class='submit_button' href='".$addnew_url."' >ثبت مورد جدید</a>\n" :"")."
		</div>\n";
		$c.= $paging_select_c;
	
	} else {

		#
		# textbox for search if needed
		if( $list['search'] ){
			$c.= "
			<form class='listmaker_list_search' action='".$paging_url."' method='post'>\n
			<input placeholder='جستجو ...' type='text' name='q' value='".$_REQUEST['q']."'>\n
			</form>\n";
		}

		$c.= "<form class='listmaker_list_form' id='listmaker_list_".$list['name']."_form' method='post' action='' >\n";
		$c.= '<table class="listmaker_list boxborder'.($list['name']?" ".$list['name']:"").'" cellpadding="10" cellspacing="5" >'."\n";

		if( $addnew_url ){
			$c.= "<a class='list_addnew_url submit_button' href='".$addnew_url."' >ثبت مورد جدید</a>\n";
		}

		#
		# head
		foreach($list['list_array'] as $k => $th){
			if($th['head']){
				$display_head = true;
			}
		}
		if($display_head){
			$c.= "<tr class='listmaker_list_head' >\n";
			$clspan = 0;
			foreach($list['list_array'] as $k => $th){
				$c.= "<th>".$th['head']."</th>\n";
				$clspan++;
			}
			if($list['remove_url'] or $list['setflag_url'] or $list['modify_url'] or $list['up_or_down']){
				$c.= "<th></th>\n";
				$clspan++;
			}

			$c.= "</tr>\n";
			$c.= "<tr class=listmaker_list_head_footer ><td colspan=$clspan ></td></tr>\n";
		}
		
		#
		# TR
		while($rw = dbf($rs)){
			
			#
			# put into exclude-queue
			if($list['exclude_in_query']){
				$GLOBALS['exclude_in_query'][] = $rw['id'];
			}
			
			#
			# TR bgcolor
			if( $list['tr_color_identifier'] ){
				$tr_color_identifier = $list['tr_color_identifier'];
				eval("\$tr_color_identifier = $tr_color_identifier;");
			} else {
				$tr_color_identifier = 1;
			}
			
			#
			# bake the target url
			if($target_url = trim($list['target_url'])){
				eval("\$target_url = $target_url;");
			}
			if(strstr($target_url, "?")){
				if(!strstr($target_url, "&".$page_number_field."=")){
					$target_url.= "&".$page_number_field."=".$p;
				}
				$target_url.= $add_to_end_of_url;
			} else {
				$target_url.= "?".substr($add_to_end_of_url,1);
			}
			
			#
			# bake the remove url
			if($remove_url = trim($list['remove_url'])){
				eval("\$remove_url = $remove_url;");
			}
			if(!strstr($remove_url, "&".$page_number_field."=")){
				$remove_url.= "&".$page_number_field."=".$p;
			}
			$remove_url.= $add_to_end_of_url;
			
			#
			# bake the modify url
			if($modify_url = trim($list['modify_url'])){
				eval("\$modify_url = $modify_url;");
			}
			if(!strstr($modify_url, "&".$page_number_field."=")){
				$modify_url.= "&".$page_number_field."=".$p;
			}
			$modify_url.= $add_to_end_of_url;
			
			#
			# bake the setflag url
			if($setflag_url = trim($list['setflag_url'])){
				eval("\$setflag_url = $setflag_url;");
			}
			if(!strstr($setflag_url, "&".$page_number_field."=")){
				$setflag_url.= "&".$page_number_field."=".$p;
			}
			$setflag_url.= $add_to_end_of_url;
			



			#
			# opening new TR
			$c.= "<tr class='listmaker_list_record ".( $tr_color_identifier==0 ?"listmaker_list_record_inactive":"")."' onc".($list['target_url']?"":"0")."lick='".($list['target_blank']?"location.target=\"_blank\";":"")."if(lml_intoolstd!=\"in\")location.href=\"$target_url\";' >\n";

			$clspan0++;
			# TD Open
			foreach($list['list_array'] as $k => $td){
				
				#
				# picture cell
				if($td['picture']){
					$picture = $td['picture'];
					eval("\$picture = ".$picture.";");
					$attr_str = "class='listmaker_list_picture' width=".$list['height']."px ";
				} else {
					$attr_str = "";
				}
				
				#
				# bake all values in td attr
				if(sizeof($td['attr']) > 0){
					foreach($td['attr'] as $attr => $value){
						if(!trim($value)){
							continue;
						} else {
							#
							# bake the attr value
							if(strstr(str_replace(array('$',')'),'$',$value),"$")){
								eval("\$value = ".$value.";");
							}
							$attr_str.= " ".$attr."='$value'";
						}
					}
				}

				#
				# tag
				$tag = ( $td['tag'] ? $td['tag'] : 'td' );

				#
				# tag display
				$c.= "<$tag $attr_str >\n";
				$td['content'] = trim($td['content']);
				if($td['content']){
					eval("\$content = ".$td['content'].";");
					$c.= $content;
				} else if($td['picture']){
					$c.= "<img src='$picture' style='height:".$list['height']."px; width:".$list['height']."px' />\n";
				}
				$c.= "</$tag>\n";
				$clspan0++;
			}
			# TD Close

			#
			# tools TD width
			$url_td_width = 0;
			if($list['remove_url']){
				$url_td_width+= 33;
			}
			if($list['setflag_url']){
				$url_td_width+= 33;
			}
			if($list['modify_url']){
				$url_td_width+= 33;
			}
			if($list['up_or_down']){
				$url_td_width+= 66;
			}
			if(sizeof($list['linkTo'])){
				foreach($list['linkTo'] as $linkTo){
					if($linkTo['width']){
						$url_td_width+= $linkTo['width'];
					} else {
						$url_td_width+= 35;
					}
				}
			}

			$url_td_width+= 20;

			#
			# tools TD display
			if($list['remove_url'] or $list['setflag_url'] or $list['modify_url'] or sizeof($list['linkTo'])){
				$c.= "<td width='".$url_td_width."px' class='tools-td' >\n";
				
				#
				# remove url html code
				if($list['remove_url']){
					if($list['remove_prompt']){
						$remove_prompt = $list['remove_prompt'];
						eval("\$remove_prompt = $remove_prompt;");
					}
					$c.= "<a class='remove' href='$remove_url' title='حذف' onclick='if(!confirm(\"".$remove_prompt."\"))return false;' ></a>\n";
				}

				#
				# setflag url html code
				if($list['setflag_url']){
					$c.= "<a class='setflag' href='$setflag_url' title='فعال / غیرفعال' ></a>\n";
				}

				#
				# modify url html code
				if($list['modify_url']){
					$c.= "<a class='modify' href='$modify_url' title='ویرایش' ></a>\n";
				}

				#
				# linkTo url html code
				if(sizeof($list['linkTo'])){
					foreach($list['linkTo'] as $linkTo){
						eval("\$linkTo_url = ".$linkTo['url'].";");
						$c.= "<a class='linkTo' href='$linkTo_url' title='".$linkTo['name']."' >".$linkTo['name']."</a>";
					}
				}

				# up and down links
				if( $list['up_or_down'] ){
					
					#
					# up link
					$up_or_down_up = $list['up_or_down']['up'];
					eval("\$up_or_down_up = $up_or_down_up;");
					#
					if(!strstr($up_or_down_up, "&".$page_number_field."=")){
						$up_or_down_up.= "&".$page_number_field."=".$p;
					}
					$up_or_down_up.= $add_to_end_of_url;

					#
					# down link
					$up_or_down_down = $list['up_or_down']['down'];
					eval("\$up_or_down_down = $up_or_down_down;");
					#
					if(!strstr($up_or_down_down, "&".$page_number_field."=")){
						$up_or_down_down.= "&".$page_number_field."=".$p;
					}
					$up_or_down_down.= $add_to_end_of_url;

					#
					# print it
					$c.= "	<a href='$up_or_down_up' class='up'></a>
							<a href='$up_or_down_down' class='down'></a>\n";
				}

				$c.= "</td>\n";
				$clspan0++;
			}

			#
			# closing this TR
			$c.= "</tr>\n";
		}

		#
		# closing the list
		$c.= "</table>\n";
		$c.= "</form>\n";
		
		#
		# attaching the select-boxes
		$c.= $paging_select_c;
		
		#
		# paging
		if($paging_url){
			// e('__link: '.$paging_url);
			$c.= listmaker_paging($list['query'], $paging_url, $tdd);
		}

	}

	$c.= "<div style='clear:both;'></div>\n";
	
	return $c;
}



function listmaker_list__add_to_begin_of_url( $url_string , $add_to_begin_of_url ){
	if(strstr($url_string, "?")){
		$url_string = explode("?", $url_string);
		$url_string[1] = $add_to_begin_of_url."&".$url_string[1]; // *
		$url_string = implode("?", $url_string);
		$url_string = str_replace("?&", "?", $url_string);
		$url_string = str_replace("&&", "&", $url_string);
	} else {
		$url_string.= "?".$add_to_begin_of_url;
	}

	return $url_string;
}



