<?
$GLOBALS['block_layers']['order_form'] = 'فرم سفارش ';

function order_form(){
	?>
	<div class="product_wv_list">
		 <div class="product_list">
		 <?order_form1()?>
		 </div>
		 <div class="product_filter">
		 <? product_filter();?>
		 </div>
	 </div>

<?	
}

function order_form1(){	

	
?> 
	<div class="order">
	<div class="back">  <i class="fa fa-th-large" aria-hidden="true"></i> <a href="./">صفحه اصلی</a>&nbsp;&nbsp;  / &nbsp;&nbsp; <a href="./?page=102&cats=1">هدایای شرکت</a>&nbsp;&nbsp;  / &nbsp;&nbsp; <a href="./?page=102&brands=1">برند هدایا</a>&nbsp;&nbsp; /&nbsp;&nbsp;
	<?
	if(isset($_SERVER['HTTP_REFERER']))
	echo '<a href="'.$_SERVER['HTTP_REFERER'].'">برگشت به قبل</a>';
	else
	echo '<a href="'.$_SERVER['SERVER_NAME'].'">برگشت به قبل</a>';
	?>
	</div>
	
	<?
	if ($_SESSION['product_id']) {
		$id=$_SESSION['product_id'];
	}	
	$query1 = " SELECT * FROM `product` WHERE `id`='$id' ";
	    if(! $rs1 = dbq($query1) ){
				e(__FUNCTION__,__LINE__);
			
		} else if(! dbn($rs1) ){
				
			?>
			<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
			<?
			
		} else while( $rw1 = dbf($rs1) )
		{
				$photo_medium = $rw1['photos_large'];
				$name = $rw1['name'];
				$code=$rw1['code'];
				$size=$rw1['size'];
				$cat=$rw1['cat_id'];
				$brand=$rw1['brand_id'];
				$description=$rw1['description'];
				$min_order=$rw1['min_order'];
				$price=$rw1['price'];
			?>
			
			<div class="p_vw_cat">
			<h2 data-mh="img-responsive" style="height: 35px;">محصول :&nbsp;&nbsp;&nbsp;<?=$name;?></h2>
			</div> 
			<div class="p_vw_cat">
			<h2 data-mh="img-responsive" style="height: 35px;">دسته :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=cat_translate($cat);?></h2>
			</div>  
			           
            <div class="table-responsive">
			<table id="price-grid" class="table table-bordered">
		      <tbody><tr id="price-qty-row">
		        <td>حداقل سفارش</td>
		        <td class="number1"><?=$min_order?> عدد</td>		        
		      </tr>	
		      <tr>
		        <td>قیمت برای هر عدد کالا</td>
		        <td class="number1"><?=$price?> ریال</td>		        
		      </tr>
			  
		    </tbody></table>
		    </div>

		    <?
		}

	switch ($_REQUEST['do']) {
		case 'mail':
			if (!captcha_check( captcha , $_REQUEST['captcha'] )) {
				?>
				<div class="errors"><h1>کد امنیتی اشتباه است</h1></div>
				<?
			}else{
				if (!order_save()) {
					?>
				    <div class="errors"><h1>سفارش شما ارسال نشد.لطفا دباره امتحان کنید</h1></div>
				    <?
				}else{order_sendOrderMail();}
				
				
			}
			
			
	}
	?>
		<div class="tite_order"><h2>فرم سفارش</h2></div>		
	<?
	echo lmfo([
		'table' => 'orders' ,
		'action' =>'./?page=104&do=mail' ,
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		
	]);


    echo lmfe([
		['text:name*','inDiv'],
		['text:company*','inDiv'],
		['number:tell*','inDiv'],
		['number:cell*','inDiv'],
		['email:email*','inDiv'],
		['number:number*','inDiv'],
        '<hr>',
        '<input type="hidden" name="product_id" value='.$_SESSION['product_id'].'>',
        /*'<input type="text" name="test"  value='.$_POST['name'] .' >',*/
		['textarea:details*','inDiv'],
       
		'<hr>',
		['text:captcha*','inDiv'],
		]);
		?>
		<div class="mail"><img src="<?=_URL?>/?do_action=captcha_build&captcha_name=captcha&nocache=<?=rand(10000000,99999999)?>"></div>
	
	    <?
	echo lmfe([
		
		['submit:ارسال.tasvir_button.bgSameAsBG','inDiv'],
       
        ]);
	
	
	echo lmfc();

	?>
	</div>
	<?

}




