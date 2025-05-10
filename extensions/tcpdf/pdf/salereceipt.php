<?php
require_once "../../../controllers/sale.controller.php";
require_once "../../../models/sale.model.php";

require_once "../../../controllers/employees.controller.php";
require_once "../../../models/employees.model.php";

class printOrderSlip{
public $invno;
public $cash_tendered;
public $change_amount;

public function getOrderSlip(){
  $invno = $this->invno;   
  $cash_tendered = $this->cash_tendered;
  $change_amount = $this->change_amount;     

  $prefix = strtolower(substr($invno,0,2));

  $sale = (new ControllerSale)->ctrShowSale($invno);
  $salesitems = (new ControllerSale)->ctrShowSaleItems($invno);

  $sale_date = $sale['sdate'];
  $sdate = substr($sale_date,5,2)."/".substr($sale_date,8,2)."/".substr($sale_date,0,4);

  $stime = $sale['stime'];
  $soldto = strtoupper($sale['soldto']);
  $amount = number_format($sale['amount'],2);
  $discount = number_format($sale['discount'],2);
  $amount = number_format($sale['amount'],2);
  $netamount = number_format($sale['netamount'],2);
  $vatamnt = number_format($sale['vatamnt'],2);
  $excempt = number_format($sale['excempt'],2);
  $vatable = number_format($sale['vatable'],2);
  $zerorated = number_format($sale['zerorated'],2);
  $sellerid = $sale['sellerid'];
  $postedby = $sale['postedby'];

  $nRec = count($salesitems).' item(s)';

  $item = "empid";
  $value = $sellerid;
  $seller = (new ControllerEmployees)->ctrShowEmployees($item, $value);
  $seller_name = $seller['fname'].' '.$seller['mi'].'. '.$seller['lname'];

  $item = "empid";
  $value = $postedby;
  $cashier = (new ControllerEmployees)->ctrShowEmployees($item, $value);
  $cashier_name = $cashier['fname'].' '.$cashier['mi'].'. '.$cashier['lname'];  

  require_once('tcpdf_include.php');
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(180,200), true, 'UTF-8', false);
  $pdf->startPageGroup();
  $pdf->setPrintHeader(false);	/*remove line on top of the page*/
  $pdf->setPrintFooter(false);  /*remove line at the bottom of the page*/
  // $pdf->AddPage();

  $width = $pdf->pixelsToUnits(230); 
  $height = $pdf->pixelsToUnits(600);

  $resolution= array($width, $height);
  $pdf->SetMargins(8, 4, 8, true);

  // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  $pdf->AddPage('P', $resolution);

  $header = <<<EOF
    <table>
      <tr>
        <td style="width:180px;text-align:center;font-size:1.2em;font-weight:bold;">ORDER SLIP</td> 
      </tr>

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">Date: $sdate [$stime]</td> 
      </tr> 

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">Inv #: $invno</td> 
      </tr> 

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">$soldto</td> 
      </tr> 

      <tr>
        <td></td>
      </tr>        
 
      <tr style="background-color:#f2f4f7;">
        <td style="border: 1px solid #666;width:70px;text-align:left;font-size:7px;">&nbsp;&nbsp;Products </td>
        <td style="border: 1px solid #666;width:35px;text-align:right;font-size:7px;">Qty&nbsp;&nbsp;&nbsp;</td> 
        <td style="border: 1px solid #666;width:40px;text-align:right;font-size:7px;">Price&nbsp;&nbsp;&nbsp;</td> 
        <td style="border: 1px solid #666;width:45px;text-align:right;font-size:7px;">Amount&nbsp;&nbsp;&nbsp;</td>            
      </tr>                  
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------
// for ($s = 1; $s <= $nRec; $s++) {
foreach ($salesitems as $key => $value) {
  $brandname = $value["brandname"];
  $prodname = $value["prodname"];
  $prod_name = ($brandname != '') ? $brandname . ' ' . $prodname : $prodname;
  $qty = number_format($value['qty'],2);
  $price = number_format($value['price'],2);
  $tamount = number_format($value['tamount'],2);

  $content = <<<EOF
    <table style="border: none;">    
      <tr>
        <td style="font-family: Arial Narrow, Helvetica, sans-serif;width:70px;text-align:left;font-size:7px;border-right: 1px solid black;border-left: 1px solid black;">$prod_name</td>
        <td style="width:35px;text-align:right;font-size:7px;border-right: 1px solid black;">$qty</td>  
        <td style="width:40px;text-align:right;font-size:7px;border-right: 1px solid black;">$price</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-right: 1px solid black;">$tamount</td>            
      </tr>                 
    </table>
EOF;
  $pdf->writeHTML($content, false, false, false, false, '');
}

$close_content = <<<EOF
    <table style="border: none;">    
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;border-top: 0.5px solid black;">$nRec</td>
        <td style="width:40px;text-align:right;font-size:7px;border-top: 0.5px solid black;">Total</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-top: 0.5px solid black;">$amount</td>            
      </tr>
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Discount</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$discount</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;">Seller: $seller_name</td>
        <td style="width:40px;text-align:right;font-size:7px;">Amount</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$netamount</td>            
      </tr>  
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;">Cashier: $cashier_name</td>
        <td style="width:40px;text-align:right;font-size:7px;border-top: 0.5px solid black;">Tendered</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-top: 0.5px solid black;">$cash_tendered</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:8px;border-bottom: 0.5px solid black;">Change</td>  
        <td style="width:45px;text-align:right;font-size:9px;border-bottom: 0.5px solid black;">$change_amount</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">VAT Sale</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$vatable</td>            
      </tr>
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">VAT 12%</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$vatamnt</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Excempt</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$excempt</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Zero Rate</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$zerorated</td>            
      </tr>                                                             
    </table>       
EOF;
$pdf->writeHTML($close_content, false, false, false, false, '');

  $footer = <<<EOF
	    <table style="border: none;">              
            <tr>
                <td style="width:180px;font-size:8px;">rfw-$prefix</td>
            </tr>    
            <tr>
                <td style="border-bottom: 1px solid #e2e0e0;width:180px;"></td>
            </tr>
	    </table>
EOF;
  $pdf->writeHTML($footer, false, false, false, false, '');  







  $pdf->AddPage('P', $resolution);

  $header = <<<EOF
    <table>
      <tr>
        <td style="width:180px;text-align:center;font-size:1.2em;font-weight:bold;">DUPLICATE ORDER SLIP</td> 
      </tr>

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">Date: $sdate [$stime]</td> 
      </tr> 

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">Inv #: $invno</td> 
      </tr> 

      <tr>
        <td style="width:180px;text-align:center;font-size:9px;">$soldto</td> 
      </tr> 

      <tr>
        <td></td>
      </tr>        
 
      <tr style="background-color:#f2f4f7;">
        <td style="border: 1px solid #666;width:70px;text-align:left;font-size:7px;">&nbsp;&nbsp;Products </td>
        <td style="border: 1px solid #666;width:35px;text-align:right;font-size:7px;">Qty&nbsp;&nbsp;&nbsp;</td> 
        <td style="border: 1px solid #666;width:40px;text-align:right;font-size:7px;">Price&nbsp;&nbsp;&nbsp;</td> 
        <td style="border: 1px solid #666;width:45px;text-align:right;font-size:7px;">Amount&nbsp;&nbsp;&nbsp;</td>            
      </tr>                  
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------
// for ($s = 1; $s <= $nRec; $s++) {
foreach ($salesitems as $key => $value) {
  $brandname = $value["brandname"];
  $prodname = $value["prodname"];
  $prod_name = ($brandname != '') ? $brandname . ' ' . $prodname : $prodname;
  $qty = number_format($value['qty'],2);
  $price = number_format($value['price'],2);
  $tamount = number_format($value['tamount'],2);

  $content = <<<EOF
    <table style="border: none;">    
      <tr>
        <td style="font-family: Arial Narrow, Helvetica, sans-serif;width:70px;text-align:left;font-size:7px;border-right: 1px solid black;border-left: 1px solid black;">$prod_name</td>
        <td style="width:35px;text-align:right;font-size:7px;border-right: 1px solid black;">$qty</td>  
        <td style="width:40px;text-align:right;font-size:7px;border-right: 1px solid black;">$price</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-right: 1px solid black;">$tamount</td>            
      </tr>                 
    </table>
EOF;
  $pdf->writeHTML($content, false, false, false, false, '');
}

$close_content = <<<EOF
    <table style="border: none;">    
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;border-top: 0.5px solid black;">$nRec</td>
        <td style="width:40px;text-align:right;font-size:7px;border-top: 0.5px solid black;">Total</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-top: 0.5px solid black;">$amount</td>            
      </tr>
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Discount</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$discount</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;">Seller: $seller_name</td>
        <td style="width:40px;text-align:right;font-size:7px;">Amount</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$netamount</td>            
      </tr>  
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;">Cashier: $cashier_name</td>
        <td style="width:40px;text-align:right;font-size:7px;border-top: 0.5px solid black;">Tendered</td>  
        <td style="width:45px;text-align:right;font-size:7px;border-top: 0.5px solid black;">$cash_tendered</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:8px;border-bottom: 0.5px solid black;">Change</td>  
        <td style="width:45px;text-align:right;font-size:9px;border-bottom: 0.5px solid black;">$change_amount</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">VAT Sale</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$vatable</td>            
      </tr>
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">VAT 12%</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$vatamnt</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Excempt</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$excempt</td>            
      </tr> 
      <tr>
        <td colspan="2" style="width:105px;text-align:left;font-size:7px;"></td>
        <td style="width:40px;text-align:right;font-size:7px;">Zero Rate</td>  
        <td style="width:45px;text-align:right;font-size:7px;">$zerorated</td>            
      </tr>                                                             
    </table>       
EOF;
$pdf->writeHTML($close_content, false, false, false, false, '');

  $footer = <<<EOF
	    <table style="border: none;">              
            <tr>
                <td style="width:180px;font-size:8px;">rfw-$prefix</td>
            </tr>    
	    </table>
EOF;
  $pdf->writeHTML($footer, false, false, false, false, '');








//   $pdf->IncludeJS("print();");
  $pdf->Output('salereceipt.pdf', 'I');
 }
}

$sale_order_slip = new printOrderSlip();
$sale_order_slip -> invno = $_GET["invno"];
$sale_order_slip -> cash_tendered = $_GET["cash_tendered"];
$sale_order_slip -> change_amount = $_GET["change_amount"];
$sale_order_slip -> getOrderSlip();
?>