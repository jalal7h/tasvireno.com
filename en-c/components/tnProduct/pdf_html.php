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
		$price=$rw1['price'];
		$printing_Type=$rw1['printing_Type']; 
		$id=$rw1['id'];
		if ($brand) {
			$brand2='<div class="brand">
				<h3>Brand&nbsp;&nbsp;:&nbsp;&nbsp; '.cat_translate($brand).'</h3>
			</div>';
		}else{$brand2="";}
		if ($printing_Type) {
			$printing_Type2='<div class="brand">
				<h3>printing_Type:&nbsp;&nbsp; '.$printing_Type.'</h3>
			</div>';
		}else{$printing_Type2="";}
		
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
		    body {font-family: "IRANSans";direction:ltr}
		    .main{
		    	margin:30px auto;
		    	padding: 0px 10px 0 0 ;
		    	list-style: none;
		    	width: 90%;
		    	direction:ltr;
		    	font-family:IRANSans;
		    }
		    .img{
		    	width:65%;
		    	margin:50px auto;
		    	background-color:#fff;
		    }
		    .name{ 
		    	color:#e84e0f;
		    	font-size:20px;
		    	padding:15px 010% 25px 0;
	        	border-top: 1px dashed #ccc;
	        	direction:ltr;
		    }
		    h2{
		    	font-size:18px;
		    	font-family:IRANSans;
		    	margin: 0 0 -10px 0;
		    	direction:ltr;
		    }
		    .cat{
		    	padding:0px 10% 0 0 ;
		    	direction:ltr;
		    }
		    .cat h3{
		    	font-size:14px;
		    	font-family:IRANSans;
		    	margin: 0 0 10px 0;
		    	direction:ltr;
		    }
		    .brand h3{
		    	height: 10px;
		    	font-size:14px;
		    	font-family:IRANSans;
		    	margin: 0 0 -5px 0;
		    	direction:ltr;
		    }
		    .txt{
		    	padding:0px 0 20px 0;
		    	direction:ltr;
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
		    .logo{
		    	text-align:center;
		    }
		    .table{
		    	margin:-15px 0 10px 0;
		    	border-bottom:1px dashed #ccc;
		    	padding-bottom:10px;
		    }
		</style>
	</head>
	<body>
		<div class="main">
			<div class="logo">
				<img src="'._URL.'/'.tab__temp('logo').'" />
			</div>
			<div class="img">
				<img src="'.img_product_src($photo_medium).'" alt="'.$name.'" title="'.$name.'"  >
			</div>
			<div class="name">
				<h2>'.$name.'</h2>
			</div> 
			<div class="cat" >
				<h3>Category :&nbsp;&nbsp; '.$catname.'</h3>
			</div> 
			 '.$brand2.'
			 <br>
			 '.$printing_Type2.'
			<div class="txt" style="">
				<p>'.nl2br($rw1['description']).'</p>
			</div>
			<div class="table">
				<table>
			      <tbody>
			      <tr>
			      	<td>Quantity</td>
			        <td>:&nbsp;'.number_format($min_order).'</td>		        
			      </tr>	
			      <tr>
			        <td>Your Price (each)</td>
			        <td>:&nbsp;'.cat_translate($price).'</td>		        
			      </tr> 
			      </tbody>
			    </table>
		    </div>
		    <div class="cat" >		    
			<h3>company address :'.setting( contact_address).'</h3>
			<h3>Sales Office : <span dir=ltr >'.setting(contact_tell).'</h3>
			<h3>Office Support : <span dir=ltr >'.setting(contact_fax).'</h3>
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