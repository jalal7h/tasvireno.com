<?

function tasvireno_sharing( $rw ){
	
	$link = tasvir_product_link( $rw );
    
	$socials = seo_share_link( $link , $rw['name'] );
	
	// if( $rw['email'] ){
	// 	$socials .= '<a class="email" href="mailto:'.$rw['email'].'" rel="nofollow" target="_blank"><icon></icon></a>';
	// }
	if( $socials ){
		$socials = '
		<div class="socials">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">اشتراک گذاری</div>
			</div>
			'.$socials.'
		</div>';
	}

	
	$c.= '
	<div class="sharing">
		
		<!-- socials -->
		'.$socials.'
	</div>';

	return $c;
}

