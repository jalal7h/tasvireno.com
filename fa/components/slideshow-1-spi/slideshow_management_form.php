<?

function slideshow_management_form(){
	if(!$id = $_REQUEST['id']){
		//
	} else if(!$tSlideshow = table("slideshow",$id)){
		echo "err - ".__LINE__;
	}
	?>
		<div id="slideshow_management_form">
	<?
		echo lmfo([
		'table' => 'slideshow' ,
		'action' =>'./?page=admin&cp='.$_REQUEST['cp'].'&func=slideshow_management_list',
		
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);

	echo lmfe([

		['text:name*','inDiv'],
		['url:link*','inDiv'],
		['text:description','inDiv'],
		['file:pic','inDiv'],
		
		
        '<hr>',
		
		['cat:slide_id*','cat_name'=>'slide','inDiv'],		
		
		
		

		['submit:ثبت.tasvir_button.bgSameAsBG','inDiv'],

	]);
	
	echo lmfc();
?>
	</div>
<?
}


