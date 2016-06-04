<?

function product_management_form(){
	
?>
	<div class="wrap2">
	
	<?

	echo lmfo([
		'table' => 'product' ,
		'action' =>'./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp']."_list" ,
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);

	echo lmfe([

		['text:name*@','inDiv'],
		['text:code*@','inDiv'],
		['text:size@','inDiv'],
		['text:printing_Type@','inDiv'],
		['text:min_order*@','inDiv'],
		['text:price*@','inDiv'],
        '<hr>',
		
		['cat:cat_id*','cat_name'=>'cat','inDiv'],
		['file:photo_small*','inDiv'],
		['cat:field_id','cat_name'=>'field','inDiv'],
		['file:photo_medium*','inDiv'],
		['cat:brand_id','cat_name'=>'brand','inDiv'],
		['file:photos_large','inDiv'],
		
		'<hr>',
		['textarea:description@'],

		'<hr>',
		

		['submit:ثبت.tasvir_button.bgSameAsBG','inDiv'],

	]);
	
	echo lmfc();

	?>
	</div>
	<?

}




