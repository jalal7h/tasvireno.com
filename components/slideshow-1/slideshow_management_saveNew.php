<?

function slideshow_management_saveNew(){
	#
	# upload photo
	$file_nnme_arr = fileupload_upload( array("input"=>"slideshow") );
	#
	# insert
	$name = trim($_REQUEST['name']);
	$link = trim($_REQUEST['link']);
	$slide_id=trim($_REQUEST['slide_id']);
	$description = trim($_REQUEST['description']);
	if(!dbq(" INSERT INTO `slideshow` (`name`,`slide_id`,`link`,`description`,`pic`) 
	VALUES ('$name','$slide_id','$link','$description','".$file_nnme_arr[0]."') ")){
		echo dbe();
	}
}


