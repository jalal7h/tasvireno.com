<?
$GLOBALS['block_layers']['baner'] = 'بنر';

function baner(){
	?>
<div class="baner"> 
<h2>پروژه های انجام شده</h2>
<a href="<?=_URL.'/project'?>" class="logo2" ><img src="<?=_URL.'/'.tab__temp('baner')?>" /></a>
</div>
<?
}

