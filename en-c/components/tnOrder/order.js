$(document).ready(function(){

	$('.order_form1').on('submit', function(){
		
		if( $("#lmfe_order_form1_name").val()=='' ){
			alert("Please enter your name properly");
		} else if( $("#lmfe_order_form1_company").val()=='' ){
			alert("Please enter your company name properly");
		} else if( $("#lmfe_order_form1_tell").val()=='' ){
			alert("Please enter your phone number properly");
		}else if( $("#lmfe_order_form1_cell").val()=='' ){
			alert("Please enter your mobile number correctly");
		}else if( $("#lmfe_order_form1_email").val()=='' ){
			alert("Please enter your email address correctly");
		}else if( $("#lmfe_order_form1_number").val()=='' ){
			alert("Please enter the number of products properly");
		}else if( $("#lmfe_order_form1_details").val()=='' ){
			alert("Please enter descriptive text properly");
		}else if( $("#lmfe_order_form1_captcha").val()=='' ){
			alert("Please enter the security code properly");
		}else {
			return true;
		}

		return false;
	});
});