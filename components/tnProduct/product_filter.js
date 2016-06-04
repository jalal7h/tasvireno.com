
$(document).ready(function($) {
	

   
	// cats click
	$('.cats input[type="checkbox"]').on('click', function(){
		var id = this.id;
		var brand = this.className;
		location.href='./?page=102&id='+id+'&brand='+brand;
	});

	// brands click
	$('.brands input[type="checkbox"]').on('click', function(){
		var id = this.id;
		var cat = this.className;
		
		location.href='./?page=102&id='+id+'&cat='+cat;
	});

	// filter_cat
	$('#filter_cat').on('click', function(){
		
		$('.Category_cat').slideToggle("fast");
	});

	// filter_brand
	$('#filter_brand').on('click', function(){
		
		$('.Category_brand').slideToggle("fast");
	});



	
});


