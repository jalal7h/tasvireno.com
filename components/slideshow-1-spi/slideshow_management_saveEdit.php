<?

function slideshow_management_saveEdit(){
	#
	# insert
	$id = dbs("slideshow", 
		['name','link','slide_id','description'],['id'] );
	#

	#
	# upload photo
	listmaker_fileupload( 'slideshow', $id, "*" );
	#

}


