<?

# jalal7h@gmail.com
# 2015/11/01
# Version 1.2

/*
	$path = "data/irtoya_slide/".$rw['id'];
	slideit( $path , 3000 );
	or
	$table = "slidebox";
	slideit( $table , 2000 );
*/

function slideit( $path , $time=1000 , $class="",$alt="slide" ){
	
	if($class){
		$elem_class = $class;
		$elem_class = strrev($elem_class);
		$elem_class = explode(" ", $elem_class);
		$elem_class = $elem_class[0];
		$elem_class = strrev($elem_class);
		$elem_class = str_replace(".", "", $elem_class);
		$elem_class.= " slideit";
	} else {
		$class = ".slideit";
		$elem_class = "slideit";
	}
	
	if(is_array( $path )){
		foreach ($path as $i => $rw) {
			$file_list[] = $rw['pic'];
			$file_link[] = trim($rw['link']);
		}
	} else if( file_exists( $path ) ){
		$file_list = fileupload_filelist( $path );
	} else {
		e( __FUNCTION__ , __LINE__ );
		return false;
	}

	$fs = getimagesize($file_list[0]);

	$c.= '<div class="'.$elem_class.'">';
	foreach ($file_list as $k => $file) {
		$c.= ( $file_link[$k]? "<a target='_blank' href='".$file_link[$k]."' >\n" :"<b>" );
		$c.= "<img class='img_slideit' src='".$file."' alt='".$alt."' />\n";
		$c.= ( $file_link[$k]? "</a>\n" :"</b>" );
	}
	$c.= '</div>';

	$c.= "
	<script>
		$(document).ready(function(){
			
			slideit_w = $('.slideit').width();
			slideit_h = slideit_w * ".$fs[1].";
			slideit_h = slideit_h / ".$fs[0].";
			slideit_h = Math.round(slideit_h);
			
			console.log(slideit_w + 'x' + slideit_h);
			$('.slideit').height( slideit_h );
			
			size$class = $('.".$class." > a').size();
			
			i0$class = 1;
			disable_auto_flag$class = 0;
			setInterval( function(){
				if(disable_auto_flag$class==0){
					$('.".$class." > * > .img_slideit').css({'opacity':'0.0'});
					$('.".$class." > * > .img_slideit').css({'z-index':'1'});
					i0$class = (i0$class%size$class);
					i0$class++;
					$('.".$class." > *:nth-child('+i0$class+') > .img_slideit').css({'z-index':'2'});
					$('.".$class." > *:nth-child('+i0$class+') > .img_slideit').css({'opacity':'1.0'});
				}
			}, ".$time.");
			$('.".$class."  img').on('mouseenter', function(){
				console.log('mouse enter');
				disable_auto_flag$class = 1;
			}).on('mouseleave', function(){
				console.log('mouse leave');
				disable_auto_flag$class = 0;
			})
		})
	</script>
	";

	return $c;
}




