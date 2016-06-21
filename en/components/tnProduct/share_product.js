
$(document).ready(function(){

	
	// on click of plus	
	$('#share').on('click', function(e){
	
	hitbox('<div class="boxborder" id="share_hitbox"></div>', 400, 465 );
	$('#share_hitbox').css( {'background-color':'#fff'} );
	var share_hitbox = $("#share_hitbox");
	share_hitbox.load("./?do_action=share_ajax");	
		e.preventDefault();
	});

});

	
