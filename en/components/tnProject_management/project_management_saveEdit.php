<?

function project_management_saveEdit(){
	
	#
	# insert
	$id = dbs("project", 
		['name','description'],['id'] );
	#

	#
	# upload photo
	listmaker_fileupload( 'project',$id, "*");
	#
   
	

}

