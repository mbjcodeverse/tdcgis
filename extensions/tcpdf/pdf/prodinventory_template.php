<?php
session_start();

require_once "../../../controllers/products.controller.php";
require_once "../../../models/products.model.php";

require_once "../../../controllers/employees.controller.php";
require_once "../../../models/employees.model.php";

class printProdInventoryTemplate{
public $arrange_by;
public function getProdInventoryTemplatePrinting(){
  $id = "id";
  $empid = $_SESSION["idEmployee"];
  $employee = (new ControllerEmployees)->ctrShowEmployees($id, $empid);
  $generated_by = $employee['fname'].' '.$employee['lname']; 
  
  $arrange_by = $this->arrange_by;
  // $products = (new controllerProducts)->ctrShowProductsCategory($arrange_by);
  $products = (new controllerProducts)->ctrShowProductsArrangement($arrange_by);

  // Date Label
  $inventory_label_date = 'Date: ____________';

  require_once('tcpdf_include.php');
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->startPageGroup();
  $pdf->setPrintHeader(false);	/*remove line on top of the page*/

  // $pdf->AddPage();   /*short-size portrait*/
  $pdf->AddPage('L', 'LETTER');
  $header = <<<EOF
    <table>
      <tr>
        <td style="width:721px;text-align:center;font-size:1.2em;font-weight:bold;">RIVSON GOLDPLAST MANUFACTURING CORPORATION</td> 
      </tr>

      <tr>
        <td style="width:721px;text-align:center;font-size:10px;">Purok Paho, Brgy. Felisa, Bacolod City</td> 
      </tr>  

      <tr>
        <td style="width:721px;text-align:center;font-size:1.2em;font-weight:bold;">PRODUCTS INVENTORY TEMPLATE</td> 
      </tr>   

      <tr>
        <td></td>
      </tr>

      <tr>
        <td style="width:511px;"></td>
        <td style="width:210px;text-align:right;font-size:11px;">$inventory_label_date</td>
      </tr>

      <tr>
        <td style="width:20px;"></td>

        <td style="border: 1px solid #666;width:102px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp;Category</td>
                                                            
        <td style="border: 1px solid #680;width:310px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp; Description </td>

        <td style="border: 1px solid #680;width:175px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp; Details </td>        

        <td style="border: 1px solid #680;width:70px;text-align:right;font-size:11px;">Count &nbsp;&nbsp;&nbsp;</td>     

        <td style="border: 1px solid #666;width:45px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp;Meas</td>                  
      </tr>                   
    </table>
EOF;
    $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------
  foreach ($products as $key => $value) {
    $cdesc = $value["cdesc"];
    $pdesc = $value["pdesc"];
    $mdesc = $value["mdesc"];
    $content = <<<EOF
      <table style="border: none;">    
        <tr>
          <td style="width:20px;"></td>

          <td style="width:102px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp;$cdesc</td>
                                                              
          <td style="width:310px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp; $pdesc</td>

          <td style="width:175px;text-align:left;font-size:11px;">___________________________</td>          

          <td style="width:77px;text-align:right;font-size:11px;">________ &nbsp;&nbsp;&nbsp;</td>  

          <td style="width:45px;text-align:left;font-size:11px;">&nbsp;&nbsp;&nbsp;$mdesc</td>           
        </tr>                 
      </table>
EOF;
      $pdf->writeHTML($content, false, false, false, false, ''); 
  }  /*for*/      

  $footer = <<<EOF
    <table style="border: none;">    
      <tr>
        <td></td>
      </tr>
      <tr>  
        <td style="width:718px;text-align:right;font-size:8px;">Generated by</td>
      </tr> 
      <tr>  
        <td style="width:718px;text-align:right;font-size:10px;">$generated_by</td>
      </tr>                              
    </table>
EOF;
      $pdf->writeHTML($footer, false, false, false, false, '');

    $pdf->Output('prodinventory_template.pdf', 'I');
   }
  }  

  $productsTemplateForm = new printProdInventoryTemplate();
  $productsTemplateForm -> arrange_by = $_GET["arrange_by"];
  $productsTemplateForm -> getProdInventoryTemplatePrinting();
?>