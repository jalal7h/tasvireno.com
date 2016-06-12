<?
$GLOBALS['block_layers']['project_vw_list'] = 'لیست پروژه ها';
function project_vw_list(){
?>
<div class="project">
<h2>پروژه های انجام شده</h2>
<div class="nljxa">
<?	
	$i=0;
	$tdd = 12;
	$stt = $tdd * intval($_REQUEST['p']); 
	$query1 = " SELECT * FROM `project` WHERE `flag`='1' ORDER BY `prio` ASC LIMIT $stt , $tdd ";
    if(! $rs1 = dbq($query1) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs1) ){
	
	?>
		<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
	<?
	
	} else while( $rw1 = dbf($rs1) ){
		$cat_id = $rw1['cat_id'];				
		$image = $rw1['image']; 
		$name = $rw1['name'];
		$id=$rw1['id'];
		?>
	
	<div class=" project-grid-spesc" id="<?=$id?>">
		<div class="tile2">
			<div class="photo2">
				<div class="tile2_btn"><i class="fa fa-eye" aria-hidden="true"></i></div>	 
			</div>
			<img src="<?=img_project_src($image);?>" alt="<?=$name;?>" title="<?=$name;?>" class="img-responsive" >		   
		</div>
	</div>
	
	<?
	
	}	 
    ?>
    <br><br>
    <?

	$link = _URL."/?page=111&p=".$_REQUEST['p'];
	echo listmaker_paging($query1, $link, $tdd, $debug=true);


?>
</div>
</div>
<?
}
function img_project_src( $photo ){

	$link = _URL."/".$photo;
	return $link;
}