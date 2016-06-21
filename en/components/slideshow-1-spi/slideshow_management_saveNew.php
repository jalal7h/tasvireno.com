<?

function slideshow_management_saveNew(){

	#
	# insert
	$id = dbs("slideshow", 
		['name','link','slide_id','description','pic']);
	#

	#
	# upload photo
	listmaker_fileupload( 'slideshow', $id, "*" );
	#



}


