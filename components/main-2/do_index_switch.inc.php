<?php

function do_index_switch(){
	
	switch($_REQUEST['do']){
		
		case 'userForgotPasswordA' : 
			send_activatin_for_newpassword($_REQUEST['username']);
			echo layout_open();
			?>
			<script>
			alert('لينک تاييد تغيير کلمه عبور به آدرس ايميل شما ارسال شده است\nبراي تغيير کلمه عبور بايد لينک را باز کنيد');
			top.document.getElementById('forgotpassTr').style.display='';
			top.document.getElementById('forgotpassForm').style.display='none';
			</script>
			<?
			echo layout_close();
			die();
		
		case 'userForgotPasswordB' : 
			$link=$_REQUEST['link'];
			$username=base64_decode(urldecode($_REQUEST['b64user']));
			echo layout_open();
			if($link!=cpt($_SERVER['REMOTE_ADDR'].date("H").$username)){
				?>
				<script>
				alert('لينک معتبر نيست');
				</script>
				<?
			} else {
				$newPassword=substr(md5(rand(10000001,99999999)),0,8);
				dbq(" update `users` set `password`='".$newPassword."' where `username`='$username' limit 1 ");
				send_newPassword($username,$newPassword);
				?>
				<script>
				alert('کلمه عبور جديد به آدرس ايميل شما ارسال شد');
				</script>
				<table width="100%" height="100%"><tr><td align="center"><a href="/?">صفحه اصلي</a></td></tr></table>
				<?
			}
			echo layout_close();
			die();
		
		DEFAULT :
			;// do nothing
			break;
	}
	
}

