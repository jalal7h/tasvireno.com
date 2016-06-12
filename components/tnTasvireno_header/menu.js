$(document).ready(function(){
		
   	content = $("#gift1");
	content.load("./?do_action=menu_ajax&do=gift");

	content2 = $("#brand1");
	content2.load("./?do_action=menu_ajax&do=brand");
	
   	content3 = $("#field1");
 	content3.load("./?do_action=menu_ajax&do=field");
	
	$(".menu > ul > li").hover(function (e) {
        
            $(this).children("ul").stop(true, false).fadeToggle(0.0000001);
            e.preventDefault();
       
    });

});