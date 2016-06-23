$(document).ready(function(){

	$('.order_form1').on('submit', function(){
		
		if( $("#lmfe_order_form1_name").val()=='' ){
			alert("لطفا نام خود را به درستی وارد کنید");
		} else if( $("#lmfe_order_form1_company").val()=='' ){
			alert("لطفا نام شرکت خود را به درستی وارد کنید");
		} else if( $("#lmfe_order_form1_tell").val()=='' ){
			alert("لطفا شماره تلفن را به درستی وارد کنید");
		}else if( $("#lmfe_order_form1_cell").val()=='' ){
			alert("لطفا شماره موبایل را به درستی وارد کنید");
		}else if( $("#lmfe_order_form1_email").val()=='' ){
			alert("لطفا ایمیل آدرس را به درستی وارد کنید");
		}else if( $("#lmfe_order_form1_number").val()=='' ){
			alert("لطفا تعداد کالای  را به درستی وارد کنید");
		}else if( $("#lmfe_order_form1_details").val()=='' ){
			alert("لطفا متن توضیحات را به درستی وارد کنید");
		}else if( $("#lmfe_order_form1_captcha").val()=='' ){
			alert("لطفا کد امنیتی را به درستی وارد کنید");
		}else {
			return true;
		}

		return false;
	});
});