<?
$GLOBALS['block_layers']['order_form'] = 'فرم سفارش ';

function order_form(){
	?>
	<div class="product_wv_list">
		 <div class="product_list">
		 <? order_form1()?>
		 </div>
		 <div class="product_filter">
		 <? product_filter();?>
		 </div>
	 </div>

<?	
}

function order_form1(){	

	?> 
	<div class="order product-grid">
	
	<?
	back();
	if ($_REQUEST['order_id']) {
		$id=$_REQUEST['order_id'];
				
	}else{
		$id=$_REQUEST['product_id'];
	}

	$query1 = " SELECT * FROM `product` WHERE `id`='$id' ";
    
    if(! $rs1 = dbq($query1) ){
			e(__FUNCTION__,__LINE__);
		
	} else if(! dbn($rs1) ){
			
		?>
		<div class="errors"><h1>موردی برای درخواست شما یافت نشد.</h1></div>
		<?
		
	} else while( $rw1 = dbf($rs1) ){
		
		$photo_medium = $rw1['photos_large'];
		$name = $rw1['name'];
		$code=$rw1['code'];
		$size=$rw1['size'];
		$cat=$rw1['cat_id'];
		$brand=$rw1['brand_id'];
		$description=$rw1['description'];
		$min_order=$rw1['min_order'];
		$price=$rw1['price'];
		$id=$rw1['id'];
		$query = " SELECT * FROM `product_cat_id` WHERE  `product_id`='$id' ";
		if(! $rs = dbq($query) ){
			e( __FUNCTION__ , __LINE__ );

		} else while( $rw = dbf($rs) ){

			$cat_name[] =cat_translate($rw['cat_id']) ;
			
		}
			
		$catname = implode( '&nbsp;,&nbsp;' ,$cat_name );
			
		?>
		
		<div class="p_vw_cat">
		<h2 data-mh="img-responsive" style="height: 39px;">product&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;<?=$name;?></h2>
		<h2 data-mh="img-responsive" style="height: 39px;">Category  &nbsp;:&nbsp;&nbsp;&nbsp;<?=$catname;?></h2>
		</div>  
		           
        <div class="table-responsive">
		<table id="price-grid" class="table table-bordered">
	      <tbody>
	      <tr id="price-qty-row">
	        <td>Quantity</td>
	        <td class="number1"><?=number_format($min_order);?></td>		        
	      </tr>	
	      <tr>
	        <td>Your Price (each)</td>
	        <td class="number1"><?=cat_translate($price);?></td>		        
	      </tr>
		  
	    </tbody></table>
	    </div>

	    <?
	}

	switch ($_REQUEST['do']) {
		case 'mail':
			if(! captcha_check( captcha , $_REQUEST['captcha'] ) ) {
				$errors="<h2 style=\"color:rgba(255, 0, 0, 0.3); margin-right: 12%;font-size: 18px;\">The security code is wrong</h2>";
				
			} else {
				if (!order_save()) {
					?>
				    <div class="errors"><h1>Your order will not be sent.Please try again</h1></div>
				    <?
				} else {
					order_sendOrderMail();
				}
					
			}
			break;
	}
	?>
	<div class="tite_order"><h2>Order Form</h2></div>		
	<?

	echo lmfo([
		'table' => 'orders' ,
		'action' =>'./?page=104&do=mail' ,
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
	]);

	$GLOBALS['listmaker_form-rw'] = $_REQUEST;

	echo lmfe([
		['text:name*','inDiv'],
		['text:company*','inDiv'],
		['number:tell*','inDiv'],
		['number:cell*','inDiv'],
		['email:email*','inDiv'],
		['number:number*','inDiv'],
        '<hr>',
       '<input type="hidden" name="product_id" value='.$id.'>',
        // '<input type="hidden" name="test"  value='.$id .' >',
		['textarea:details*','inDiv'],

		'<hr>',
		['text:captcha*','inDiv'],
	]);
		
	?>
	<div class="mail"><img src="<?=_URL?>/?do_action=captcha_build&captcha_name=captcha&nocache=<?=rand(10000000,99999999)?>"></div>
	<?
    if( isset($errors)){echo $errors;}
	echo lmfe([
		['submit:Send.tasvir_button.bgSameAsBG','inDiv'],
	]);

	echo lmfc();

	?>
	</div>
	<?

}




