<?
function order_management_show(){

	 if(! $rw = table( "orders", $_REQUEST['id'] )){
		e( __FUNCTION__ , __LINE__);
	} else if(! $rw_product = table("product", $rw['product_id'] )){
		e( __FUNCTION__ , __LINE__);
	} else {
		?>

		<div class="order_management_show" >
			<div class="hed" style=""><h1>مشخصات سفارش</h1></div>
			<div class="">
				<span>شماره سفارش :‌ </span>
				<div class="en">#<?=$rw['id']?></div>
			</div>
		    <div>
				<span>ثبت سفارش : </span>
				<div class="en"><?=substr( U2vaght($rw['date_created']), 0, 10)?></div>
			</div>
			<div>
				<span>نام مشتری :‌ </span>
				<div>
					
					<div class="currency_name"><?=$rw['name']?></div>
				</div>
			</div>
			<div>
				<span>نام شرکت :‌ </span>
				<div>
					
					<div class="currency_name"><?=$rw['company']?></div>
				</div>
			</div>
			<div>
				<span>ایمیل مشتری :‌ </span>
				<div>
					
					<div class="currency_name"><?=$rw['email']?></div>
				</div>
			</div>
			<div>
				<span>تلفن : </span>
				<div class="en"><?=$rw['tell']?></div>
			</div>
			<div>
				<span>همراه : </span>
				<div class="en"><?=$rw['cell']?></div>
			</div>
			<div>
				<span>تعداد سفارش : </span>
				<div class="en"><?=number_format($rw['number'])?> </div>
			</div>
		    <div>
				<span>نام کالا :‌ </span>
				<div>
					
					<div class="currency_name"><?=$rw_product['name']?></div>
				</div>
			</div>
			<div>
				<span>کد کالا:‌ </span>
				<div>
					
					<div class="currency_name"><?=$rw_product['code']?></div>
				</div>
			</div>							
			<div class="contact">
				توضیحات: <br>
				<div class="currency_name"><?=nl2br($rw['details'])?></div>
			</div>
		</div>
		<?
	}
}