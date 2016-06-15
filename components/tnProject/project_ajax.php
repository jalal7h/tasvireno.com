<?php
$GLOBALS['do_action'][] = 'project_ajax';

function project_ajax(){
		
	#
	# find it
	if(! $project_id =$_REQUEST['id'] ){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
		<? 
		return false;
	} else if(! $rw1 = table("project", $project_id)){
		/*e( __FUNCTION__ , __LINE__ );*/
		?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
		<?		
		return false;
	}
	$image = $rw1['image']; 
	$name = $rw1['name'];
	$description = $rw1['description'];
	?>
	<div class="project_img_vw">
		<img src="<?=img_product_src($image);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" >
	</div>
	<div class="text_project">
		<div class="sharing">
			<div class="head">
				<div class="dotline"></div>
				<div class="text">
					<h3 style="font-size: 16px;color: #2ECC71"><?=$name;?></h3>
				</div>
			</div>
		</div>	
		<div class="txt"><p><?=nl2br($description)?></p></div>	
	</div>
	



<?
}