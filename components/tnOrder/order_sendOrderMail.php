<?
function order_sendOrderMail(){
	
	if (! user_order_msg() && ! admin_order_msg() ) {
	    ?>
		<div class="message"><h1>سفارش شما با موفقیعت ثبت شد</h1></div>
	    <?
	} else {
		?>
		<div class="message"><h1>سفارش شما با موفقیعت ارسال شد</h1></div>
	    <?
	}
	
}
function user_order_msg(){
	
	if( function_exists("texty_msg") ){
        $who=$_REQUEST['email'];
		texty_msg( $who , "user_order_msg" , array(
			"main_title"=>tab__temp("main_title"),
			"user_name"=>$_REQUEST['name'],
		) );
	}

}
function admin_order_msg(){
	
	if( function_exists("texty_msg") ){
		texty_msg( "admin" , "admin_order_msg" , array(
			"main_title"=>tab__temp("main_title"),
			"user_name"=>$_REQUEST['name'],
			"date"=>u2vaght(date('U')),
		) );
	}

}
