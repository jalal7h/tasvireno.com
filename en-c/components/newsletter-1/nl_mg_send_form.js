
$(document).ready(function(){
	
	$('#nlmg_list_of_emails_checkbox').on('click', function(){
		$('#nlmg_list_of_emails').toggle();		
	});

	$('.nl_mg_send_form').on('submit', function(e){

		//
		// if no subject
		if( $('#nl_mg_send_form_subject').val()=='' ) {
			// $(this).focus();
			e.preventDefault();
		}

		//
		// if no text
		if( $('#nl_mg_send_form_text').val()=='' ) {
			// $(this).focus();
			e.preventDefault();
		}

		//
		// if no checkbox checked
		if( (document.getElementById('newsletter_email_list').checked) || (document.getElementById('user_email_list').checked) || (document.getElementById('nlmg_list_of_emails_checkbox').checked) ){
			console.log('its ok');
		} else {
			e.preventDefault();
		}
	})

});

