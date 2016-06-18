<?

function do_index(){
	
	if($_REQUEST['page']=='admin'){
		$rand = $_SESSION['hcfalf'];
		$us = cpt('user'.$rand, true);
		$pw = cpt('pass'.$rand, true);
		$su = 'ssus'.$rand;
		$sp = 'sspw'.$rand;
		
		if(
			(!admin_check($_SESSION['admin'.$su],$_SESSION['admin'.$sp])) and 
			(!admin_login($_POST[$us],cpt($_POST[$pw])))
		){
			f_admin__a_html__header();
			f_admin__a_html__top();
			admin_login_form();
			f_admin__a_html__down();
			f_admin__a_html__footer();
		} else {
			if(pinCodeRequest!==false){
				if(!knownIP($_SESSION['admin'.$su],true)){
					IncAtc();
					echo "unknown ip";
					die();
				}
			}
			admin_pre();
			f_admin__a_html__header();
			f_admin__a_html__top();
			draw_admin();
			f_admin__a_html__down();
			f_admin__a_html__footer();
		}
	} else {
		if(!$res=dbq(" select * from `page` where `id`='"._PAGE."' limit 1 ")){
			// echo "<center class=er1>invalid progress</center>";
		} elseif(dbn($res)!=1){
			$_REQUEST['page']=1;
		} else {
			;// do nothing
		}
		
		do_index_switch();
		
		if(tab__temp('webstatus_main')!=1){
			echo layout_header();
			?>
			<table bgcolor="#f4f2ed" height="100%" width="100%"><tr>
			<td align="center" style="font-size:24;">وبسايت در حال آماده سازي ميباشد</td>
			</tr></table>
			<?
			echo layout_footer();
			die();
		}
		
		echo layout_open();
		do_pre();
		echo template_engine('main');
		echo layout_close();

	}
}







