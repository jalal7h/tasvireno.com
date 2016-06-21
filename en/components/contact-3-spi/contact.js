$(document).ready(function(){

	$('#contact_display').on('submit', function(){
		
		if( $("#contact_display select").val()=='' ){
			alert("Please enter the message recipient properly");
		} else if( $("#contact_display input:nth-child(1)").val()=='' ){
			alert("Please enter your name properly");
		} else if( $("#contact_display input:nth-child(3)").val()=='' ){
			alert("Please enter your email address properly");
		} else if( $("#contact_display textarea").val()=='' ){
			alert("Please enter the message text properly");
		}else if( $("#contact_display .chaptcha").val()=='' ){
			alert("Please enter the security code properly");
		} else  {
			return true;
		}

		return false;
	});
});