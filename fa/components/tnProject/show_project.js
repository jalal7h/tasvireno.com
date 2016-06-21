
$(document).ready(function(){

	
	// on click of plus	
	$('.project-grid-spesc').on('click', function(e){
	
		hitbox('<div class="boxborder" id="project_hitbox"></div>', 800, 700 );
		var project_hitbox = $("#project_hitbox");
		project_hitbox.css( {'background-color':'#fff'} );
		var id = this.id;
		project_hitbox.load("./?do_action=project_ajax&id="+id);	
			e.preventDefault();
	});

});

	
