$(document).ready(function(){
		
   	content = $("#gift1");
	content.load("./?do_action=menu_ajax&do=gift");

	content2 = $("#brand1");
	content2.load("./?do_action=menu_ajax&do=brand");
	
   	content3 = $("#field1");
 	content3.load("./?do_action=menu_ajax&do=field");
	
	$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');


    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');

    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");


    $(".menu > ul > li").hover(function (e) {
        if ($(window).width() > 943) {
            $(this).children("ul").stop(true, false).fadeToggle(0.0001);
            e.preventDefault();
        }
    });

    $("#gift , #brand , #field ").click(function (e) {
        if ($(window).width() <= 943) {
            $(this).children("ul").fadeToggle(200);
            e.preventDefault();
        }
    });

    $(".menu-mobile").click(function (e) {
        $(".menu > ul").slideToggle(0.0000003);
        e.preventDefault();
    });

    $(window).resize(function(){
       if ($('.menu').width() > 944) {
       	
    $(".menu > ul").slideDown(0.0000003);
    $(".menu > ul > li > ul ").fadeOut(0.0000003);
    
	}
    });

});