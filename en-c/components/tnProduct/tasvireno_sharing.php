<?

function tasvireno_sharing( $rw ){
	
	$link = tasvir_product_link( $rw );
    
	$socials = seo_share_link( $link , $rw['name'] );
	
	if( $socials ){
		$socials = '
		<div class="socials">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">share</div>
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

