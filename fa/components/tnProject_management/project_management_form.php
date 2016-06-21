<?

function project_management_form(){
	
?>
	<div class="wrap2">
	
	<?

	echo lmfo([
		'table' => 'project' ,
		'action' =>'./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp']."_list" ,
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);

	echo lmfe([

				
		
		['text:name*@','inDiv'],
		'<br>',
		['file:image','inDiv'],
			
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




