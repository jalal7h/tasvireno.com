$(document).ready(function(){
	//References
	var sections = $("#TopMenu li");
	var text2 = $("#TopMenu a");
	var content = $("#content");
	var i=0;
	//Manage mouseover events
	sections.mouseenter(function(){
	switch(this.id){
			case "gift":

				if (i==2) {
			   	
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					
			   	}	
				content.slideDown(0.000001);
				content.load("./?do_action=menu_ajax&do=gift");
				tab = $("#gift");
				text = $("#gift a");				
				tab.css("background-color","white");
				text.css("color","#2ecc71");
				i=1;
				break;
			case "brand":

				if (i==1 || i==3) {
			   	
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					
			   	}
				tab = $("#brand");
				text = $("#brand a");
				content.slideDown(0.000001);
				content.load("./?do_action=menu_ajax&do=brand");
				tab.css("background-color","white");
				text.css("color","#2ecc71");
				i=2;
				break;
			case "field":
				if (i==2) {
			   	
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					
			   	}
			 	tab = $("#field");
				content.slideDown(0.000001);
				content.load("./?do_action=menu_ajax&do=field");
				tab.css("background-color","white");
				text = $("#field a");
				text.css("color","#2ecc71");
				i=3;
				break;
			
		}
        

			  	
});

/*content.each(function () {
                $(this).hover(function () {
				tab.css("background-color","white");
				text.css("color","#A90000");
				

                }, function () {
                    content.slideUp("fast");
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					
				});	
 });*/

$("#content").mouseleave(function(){
			   if (i==1||i==2||i==3) {
			   		content.hide(0.00001);
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					i=0;
			   	}	
});
$("#hed").mouseover(function(){
			   if (i==1||i==2||i==3) {
			   		content.slideUp(0.0001);
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					i=0;
			   	}	
});
$("li").not("#gift,#field,#brand").mouseover(function(){
			    if (i==3) {
			   		content.slideUp(0.0001);
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
				}
			
});
	
$("*").not("#gift,#field,#brand,#content").click(function(){
			   if (i==1||i==2||i==3) {
			   		content.slideUp(0.0001);
					tab.css("background-color","#2ecc71");
					text.css("color","#fff");
					
			   	}	
});
});