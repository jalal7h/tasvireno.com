<?

# jalal7h@gmail.com
# 2016/05/12
# Version 1.3

// $url = "./?page=admin&cp=".$_REQUEST['cp'];
// 	$menu = array(
// 		"ms_management_list" => "لیست موبایل ها",
// 		"ms_management_form" => "ثبت موبایل جدید",
// 		"cat_management&l=brand" => "برندها",
// 		"cat_management&l=stuff_status" => "وضعیت ها",
// 		"cat_management&l=mobile_sim" => "سیم ها",
// 		"cat_management&l=mobile_os" => "سیستم عامل ها",
// 		"cat_management&l=mobile_browser" => "مرورگر",
// 	);
// 	listmaker_tabmenu($menu,$url);
/*README*/

function cat_management(){
	
	if(!$l = $_REQUEST['l']){
		if(!sizeof($GLOBALS['cat_items'])){
			echo "err - ".__LINE__;
		} else foreach($GLOBALS['cat_items'] as $l => $r){
			break;
		}
	} else {
		$r = $GLOBALS['cat_items'][$l];
	}

	$cat_title = $GLOBALS['cat_items'][$l][0];
	$flag_subcat = $GLOBALS['cat_items'][$l][2];
	$flag_icon = $GLOBALS['cat_items'][$l][3];
	$flag_desc = $GLOBALS['cat_items'][$l][4];
	$flag_flag = $GLOBALS['cat_items'][$l][5];
	$flag_customfield = $GLOBALS['cat_items'][$l][6];
	$flag_kw = $GLOBALS['cat_items'][$l][7];

	$parent = intval($_REQUEST['parent']);
	$parent0 = $parent;
	while($parent0>0){
		$parent_status = " <a href='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=$l&parent=$parent0' >» ".table('cat',$parent0,'name')."</a>".$parent_status;
		$parent0 = table("cat",$parent0,'parent');
	}
	
	switch($_REQUEST['do']){
		
		case 'movedown':
			cat_management_ordmove($_REQUEST['id'] , "+");
			break;

		case 'moveup':
			cat_management_ordmove($_REQUEST['id'] , "-");
			break;

		case 'saveNew' : 
			cat_management_saveNew();
			break;
			
		case 'saveEdit' : 
			cat_management_saveEdit();
			break;

		case 'remove' :
			cat_management_remove();
			break;

		case 'flag' :
			listmaker_flag('cat');
			break;

		case 'customfield' :
			return customfield_mg();
	}
	
	
	echo "<div id=cat_form_management >
	<div id=cat_management >";

	// if(!$GLOBALS['cat_spread_management']){
	// 	echo "<select onchange='location.href=\""._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=\"+this.value' id=l >";
	// 	foreach($GLOBALS['cat_items'] as $k0 => $r0){
	// 		$r0 = $r0[0];
	// 		echo "<option value='$k' >$r</option>";
	// 	}
	// 	echo "</select>";
	// }

	echo "
	<script>
	document.getElementById('l').value='".$l."';
	</script>
	<div class=delimiter ></div>
	<div class=title ><font color=green ><a href='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=$l'>» ".$cat_title."</a></font>$parent_status</div>
	<div class=delimiter ></div>
	";
	
	if( $flag_desc and $flag_kw ) {
		$input_text_grid_class = "itgc_grid3";

	} else if( $flag_desc or $flag_kw ) {
		$input_text_grid_class = "itgc_grid2";

	} else {
		$input_text_grid_class = "itgc_grid1";

	}

	# list
	if(!$rs = dbq(" SELECT * FROM `cat` WHERE `cat`='".$l."' AND `parent`='$parent' ORDER BY `ord` ")){
		echo dbe();
	
	} else if(!dbn($rs)){
		echo "<br><br><br><center>هنوز موردی ثبت نشده است</center><br><br><br><br><br>";
	
	} else while( $rw = dbf($rs) ){
		
		if( is_column('cat','flag') and $flag_flag ){
			$flag_is = true;
			if( $rw['flag']=='0' ) {
				$flag_disabled_class = "disabled";
			} else {
				$flag_disabled_class = "";				
			}
		}

		echo "
		<div class='record ".$flag_disabled_class." ".$input_text_grid_class."' >
			<form enctype='multipart/form-data' method=post action='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."&id=".$rw['id']."&do=saveEdit' >
				
				<a class=remove onclick='if(!confirm(\"آیا مایل به حذف هستید؟\"))return false;' href='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."&do=remove&id=".$rw['id']."' ></a>
				
				<a class='move-up' href='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."&do=moveup&id=".$rw['id']."' ></a>

				<a class='move-down' href='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."&do=movedown&id=".$rw['id']."' ></a>
				
				<input placeholder='".lmtc('cat:name')."' type='text' name='name' value='".$rw['name']."'>

				".( $flag_desc ?"<input placeholder='".lmtc('cat:desc')."' type='text' name='desc' value='".$rw['desc']."' >":"")."

				".( $flag_kw ?"<input placeholder='".lmtc('cat:kw')."' type='text' name='kw' value='".$rw['kw']."' >":"")."

				".( $flag_icon ?"<input class='green' rel='آپلود آیکن' type='file' name='cat[]'/>":"")."

				<input type='submit' class='submit_button' value='ویرایش' >
				
				".( $flag_subcat ?"<a class='submit_button subanchor' href='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$rw['id']."'>زیردسته</a>":"")."

				".( $flag_is ?"<a class='flag' href='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."&do=flag&id=".$rw['id']."'></a>" :"")."
				
				".(
				 	$flag_customfield 
					? ( is_component("catcustomfield") 
						? "<a class='customfield' href='#' id='".$rw['id']."' ></a>" 
						: '' ) 
					: '' )."

			</form>	
		</div>";
	}
	
	# new form
	echo "
	<div id='new' class='".$input_text_grid_class."' >
		<form enctype='multipart/form-data' method=post action='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=saveNew&l=".$_REQUEST['l']."&parent=".$_REQUEST['parent']."' >
		
		<input placeholder='عنوان' type=text name='name' value='' id='newName' >
		
		".( $flag_desc ?"<input placeholder='شرح توضیحات' type=text name='desc' value='' id='newDesc' >":"")."
		
		".( $flag_kw ?"<input placeholder='".lmtc('cat:kw')."' type='text' name='kw' value='".$rw['kw']."' >":"")."

		".( $flag_icon ?"<input class='green' rel='آپلود آیکن' type='file' name='cat[]'/>":"")."
		
		<input type=submit class='submit_button' value='ثبت' >
		</form>
	</div>
	<script>document.getElementById('newName').focus();</script>
	
	<div class=delimiter ></div>
	
	</div>
	</div>";
}









