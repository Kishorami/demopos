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

//TRAEMOS LA INFORMACIÓN DEL Customer

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

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A7');

//---------------------------------------------------------

$block1 = <<<EOF

<table style="font-size:9px; text-align:center">

	<tr>
		
		<td style="width:160px;">
	
			<div>
			
				Date: $saledate

				<br><br>
				Inventory System
				
				<br>
				NIT: 71.759.963-9

				<br>
				Address: 5th Ave. Miami, Fl

				<br>
				Phone: 300 786 52 49

				<br>
				Invoice N.$valueSale

				<br><br>					
				Customer: $answerCustomer[name]

				<br>
				Seller: $answerSeller[name]

				<br>

			</div>

		</td>

	</tr>


</table>

EOF;

$pdf->writeHTML($block1, false, false, false, false, '');

// ---------------------------------------------------------


foreach ($products as $key => $item) {

$unitValue = number_format($item["price"], 2);

$totalPrice2 = number_format($item["totalPrice"], 2);

$block2 = <<<EOF

<table style="font-size:9px;">

	<tr>
	
		<td style="width:160px; text-align:left">
		$item[description] 
		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:right">
		$ $unitValue Units * $item[quantity]  = $ $totalPrice2
		<br>
		</td>

	</tr>

</table>

EOF;

$pdf->writeHTML($block2, false, false, false, false, '');

}

// ---------------------------------------------------------

$block3 = <<<EOF

<table style="font-size:9px; text-align:right">

	<tr>
	
		<td style="width:80px;">
			 NET: 
		</td>

		<td style="width:80px;">
			$ $netPrice
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TAX: 
		</td>

		<td style="width:80px;">
			$ $tax
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ $totalPrice
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			<br>
			<br>
			Thank you for your purchase
		</td>

	</tr>

</table>



EOF;

$pdf->writeHTML($block3, false, false, false, false, '');


// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

// $pdf->Output('bill.pdf', 'D');

$pdf->Output('bill.pdf');

}

}

$bill = new printBill();
$bill -> code = $_GET["code"];
$bill -> getBillPrinting();

?>