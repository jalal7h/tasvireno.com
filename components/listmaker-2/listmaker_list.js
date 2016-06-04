
var lml_intoolstd = "";

$(document).ready(function(){
	//
	// mouse over effect on TR
	$('.tools-td').on("mouseenter", function(){
		lml_intoolstd = "in";
		console.log(lml_intoolstd);
	});
	$('.tools-td').on("mouseleave", function(){
		lml_intoolstd = "out";
		console.log(lml_intoolstd);
	});
})


