<?

function project_management_saveNew(){
	#
	# insert
	$id = dbs("project", 
		['name','image','description','flag'=>1] );
	#

	#
	# upload photo
	listmaker_fileupload( 'project', $id, "*" );
	#
   
	


}

