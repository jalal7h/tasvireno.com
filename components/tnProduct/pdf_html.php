<?
$GLOBALS['do_action'][] = 'pdf_html';

function pdf_html(){ 

	$query1 = " SELECT * FROM `product` WHERE `id`='".$_REQUEST['product']."' ";
    if(! $rs1 = dbq($query1) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs1) ){
		//
	} else while( $rw1 = dbf($rs1) ){
		$photo_medium = $rw1['photos_large'];
		$name = $rw1['name'];
		$code=$rw1['code'];
		$size=$rw1['size'];
		$cat=$rw1['cat_id'];
		$brand=$rw1['brand_id'];
		$description=$rw1['description'];
		$min_order=$rw1['min_order'];
		$price=$rw1['price_id'];
		$id=$rw1['id'];
		$query = " SELECT * FROM `product_cat_id` WHERE  `product_id`='$id' ";
		if(! $rs = dbq($query) ){
			e( __FUNCTION__ , __LINE__ );

		} else while( $rw = dbf($rs) ){

			$cat_name[] =cat_translate($rw['cat_id']) ;
			
		}
			
		$catname = implode( '&nbsp;,&nbsp;' ,$cat_name );
				

$html='
<html>
	<head>
		<style>
		    body {font-family: "IRANSans";}
		    .main{
		    	margin:30px auto;
		    	padding: 0px 10px 0 0 ;
		    	list-style: none;
		    	width: 90%;direction:rtl;
		    	font-family:IRANSans;
		    }
		    .img{
		    	width:70%;
		    	margin:50px auto;
		    	background-color:#fff;
		    }
		    .name{ 
		    	color:#2ecc71;
		    	font-size:20px;
		    	padding:15px 0 25px 10%;
	        	border-top: 1px dashed #ccc;
		    }
		    h2{
		    	font-size:18px;
		    	font-family:IRANSans;
		    	margin: 0 0 -10px 0;
		    }
		    .cat{
		    	padding:0px 0 0 10%;
		    }
		    .cat h3{
		    	font-size:14px;
		    	font-family:IRANSans;
		    	margin: 0 0 10px 0;
		    }
		    .brand h3{
		    	height: 10px;
		    	font-size:14px;
		    	font-family:IRANSans;
		    	margin: 0 0 -5px 0;
		    }
		    .txt{
		    	padding:0px 0 20px 0;
		    }
		    p{
		    	line-height:35px!important;
		    	font-family:IRANSans;
		    }
		    tbody{
		    	font-size:12px;
		    	font-family:IRANSans;
		    }
		    td,th{
		    	
		    	padding: 8px;
			    line-height: 1.42857143;
			    vertical-align: top;
			    
		    }
		</style>
	</head>
	<body>
		<div class="main">
			<div class="img">
				<img src="'.img_product_src($photo_medium).'" alt="'.$name.'" title="'.$name.'"  >
			</div>
			<div class="name">
				<h2>'.$name.'</h2>
			</div> 
			<div class="cat" >
				<h3>دسته :&nbsp;&nbsp; '.$catname.'</h3>
			</div> 
			<div class="brand">
				<h3>برند&nbsp;&nbsp;:&nbsp;&nbsp; '.cat_translate($brand).'</h3>
			</div> 
			<div class="txt" style="">
				<p>'.nl2br($rw1['description']).'</p>
			</div>
			<div>
				<table>
			      <tbody>
			      <tr>
			      	<td>حداقل سفارش</td>
			        <td>:&nbsp;'.number_format($min_order).' عدد</td>		        
			      </tr>	
			      <tr>
			        <td>قیمت برای هر عدد کالا</td>
			        <td>:&nbsp;'.cat_translate($price).'</td>		        
			      </tr> 
			      </tbody>
			    </table>
		    </div>
		</div>
	</body>
</html>';
}

include('modules/MPDF57/mpdf.php');
$mpdf=new mPDF('utf-8');
$html=iconv("utf-8","UTF-8//IGNORE",$html);
$mpdf=new mPDF('ar','A4','','',5,5,5,5,16,13,IRANSans);
$mpdf->SetDirectionality('rtl');
$mpdf->WriteHTML($html);
$mpdf->Output();

}	