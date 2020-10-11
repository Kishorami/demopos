<?php

require_once "../../../controllers/sales.controller.php";
require_once "../../../models/sales.model.php";

require_once "../../../controllers/customers.controller.php";
require_once "../../../models/customers.model.php";

require_once "../../../controllers/users.controller.php";
require_once "../../../models/users.model.php";

require_once "../../../controllers/products.controller.php";
require_once "../../../models/products.model.php";

class printBill{

public $code;

public function getBillPrinting(){

//WE BRING THE INFORMATION OF THE SALE

$itemSale = "code";
$valueSale = $this->code;

$answerSale = ControllerSales::ctrShowSales($itemSale, $valueSale);

$saledate = substr($answerSale["saledate"],0,-8);
$products = json_decode($answerSale["products"], true);
$netPrice = number_format($answerSale["netPrice"],2);
$tax = number_format($answerSale["tax"],2);
$totalPrice = number_format($answerSale["totalPrice"],2);

 // var_dump($answerSale);


//TRAEMOS LA INFORMAYION OF Customer

$itemCustomer = "id";
$valueCustomer = $answerSale["idCustomer"];

$answerCustomer = ControllerCustomers::ctrShowCustomers($itemCustomer, $valueCustomer);

//TRAEMOS LA INFORMACIÓN DEL Seller

$itemSeller = "id";
$valueSeller = $answerSale["idSeller"];

$answerSeller = ControllerUsers::ctrShowUsers($itemSeller, $valueSeller);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$block1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/DemoPosLogo2.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: 35/1

					<br>
					ADDRESS: Arjatpara, Mohakhali, Dhaka

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					CELLPHONE: 0088 01777 777777
					
					<br>
					sales@demopos.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>BILL N.<br>$valueSale</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($block1, false, false, false, false, '');

// ---------------------------------------------------------

$block2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Customer: $answerCustomer[name]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Date: $saledate

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Seller: $answerSeller[name]</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($block2, false, false, false, false, '');

// ---------------------------------------------------------

$block3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Product</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">quantity</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">value Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">value Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($block3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($products as $key => $item) {

$itemProduct = "description";
$valueProduct = $item["description"];
$order = null;

$answerProduct = ControllerProducts::ctrShowProducts($itemProduct, $valueProduct, $order);

$valueUnit = number_format($item["price"], 2);

$totalPrice2 = number_format($item["totalPrice"], 2);

// var_dump($answerProduct);

$block4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">
				$item[description]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$item[quantity]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$valueUnit
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$totalPrice2
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($block4, false, false, false, false, '');

}

// ---------------------------------------------------------

$block5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Net:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $netPrice
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Tax:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $tax
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $totalPrice
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($block5, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('bill.pdf', 'D');

}

}

$bill = new printBill();
$bill -> code = $_GET["code"];
$bill -> getBillPrinting();

?>