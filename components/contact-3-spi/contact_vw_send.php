<?

function contact_vw_send(){

	if(! captcha_check( captcha , $_REQUEST['captcha'] ) ) {	
		echo "<div class='errors'><h2 style=\"font-size: 18px;\">کد امنیتی اشتباه است</h2></div>";
				
	} else if(! $_REQUEST['to'] = $_REQUEST['to'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $_REQUEST['to'] = setting($_REQUEST['to']) ){
		e(__FUNCTION__,__FILE__);
	
	} else if(! dbs('contact', ['name','email_address','cell_number','to','content','date'=>U()] ) ){
		e(__FUNCTION__,__FILE__);

	} else {
		texty_msg( 
			"admin", "admin_contactMessageReceived" , 
			array(
				"name" => $_REQUEST['name'], 
				'message' => $_REQUEST['content'],
			)
		);
		echo "<div class='convbox contact_vw_send'>پیام شما ثبت شد</div>";
	}

}

