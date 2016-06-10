<?

function seo_share_link( $link , $title="" ){

	$c.= "
	<div class='seo_share_link'>
		<a href='http://www.facebook.com/sharer/sharer.php?u=".urlencode($link)."' target='_blank' class='facebook' ><icon></icon></a>
		<a href='http://twitter.com/share?url=".$link."' target='_blank' class='twitter' ><icon></icon></a>
		<a href='http://instagram.com/share?url=".$link."' target='_blank' class='instagram' ><icon></icon></a>
		<a href='https://www.telegram.com/shareArticle?mini=true&url=".urlencode($link)."&title=".urlencode($title)."&summary=&source=' target='_blank' class='telegram' ><icon></icon></a>
	</div>
	";
	
	return $c;
}