
$(document).ready(function($) {
	

   
	// cats click
	$('.cats input[type="checkbox"]').on('click', function(){
		var cat_id = this.id;
		var brand_id = this.className;

		if (brand_id=='' && cat_id=='not_cat') {
			location.href='./?page=102&cats=1';
		}else if ( brand_id=='') {
		
			location.href='./?page=102&cat_id='+cat_id+'&brand_id='+brand_id;

		}else  if (brand_id!='' && cat_id=='not_cat') {
			
			location.href='./?page=102&brand_id='+brand_id+'&cat=not_cat';
			
		}else if ( brand_id !=''&& cat_id !='') {
			
			location.href='./?page=102&cat_id='+cat_id+'&brand_id='+brand_id;
			
		}
	});

	// brands click
	$('.brands input[type="checkbox"]').on('click', function(){

		var brand_id = this.id;
		var cat = this.className;

		if (brand_id=='no_brand' && cat=='not_cat') {
			location.href='./?page=102&brands=1';
			
		}else if (brand_id=='no_brand' && cat!='') {
			location.href='./?page=102&cat_id='+cat+'&brand_id=';
			
		}else {
			location.href='./?page=102&brand_id='+brand_id+'&cat='+cat;
		}
		
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


