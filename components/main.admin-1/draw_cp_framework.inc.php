<?

function draw_cp_framework(){
	
	$users_id = admin_login_id();
	asort( $GLOBALS['cmp'] );

	echo '<div class="draw_cp_framework">';	
	foreach($GLOBALS['cmp'] as $func => $title){
		
		if(! $title = trim($title) ){
			continue;
		
		} else if( (! is_component('useraccess')) or useraccess($users_id, $func) ){
			draw_cp_framework_this( $func , $title );
		}

	}
	echo '</div>';

}

function draw_cp_framework_this( $func , $title ){
	
	echo '<a href="./?page=admin&cp='.$func.'">
	<div class="title">'.$title.'</div>
	</a>';

}





