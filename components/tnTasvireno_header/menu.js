$(document).ready(function(){
	//References
	var sections = $("#gift");
	var text = $("#gift a");
	var content = $("#content");
	var i=0;
	//Manage mouseover events

sections.mouseover(function(){
	if (i==0) {
		        content.slideDown("fast");
				content.load("./?do_action=menu_ajax");
				sections.css("background-color","white");
				text.css("color","#F25826");
				i=1;
	}
			  	
});



content.each(function () {
                $(this).hover(function () {
				sections.css("background-color","white");
				text.css("color","#F25826");
				i=3;

                }, function () {
                    content.slideUp("fast");
					sections.css("background-color","#F25826");
					text.css("color","#fff");
					i=0;
				});	
 });
$("#hed").mouseover(function(){
			   if (i==1) {
			   		content.slideUp("fast");
					sections.css("background-color","#F25826");
					text.css("color","#fff");
					i=0;
			   	}	
});
$("li").not("#gift").mouseover(function(){
			   if (i==1) {
			   		content.slideUp("fast");
					sections.css("background-color","#F25826");
					text.css("color","#fff");
					i=0;
			   	}	
});
$("*").not("#gift").click(function(){
			   if (i==1) {
			   		content.slideUp("fast");
					sections.css("background-color","#F25826");
					text.css("color","#fff");
					i=0;
			   	}	
});
});