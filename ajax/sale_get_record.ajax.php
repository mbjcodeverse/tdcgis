<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class AjaxSaleDetails{
    public $saleid;
    public function ajaxGetSaleDetails(){
      $saleid = $this->saleid;
      $answer = (new ControllerSales)->ctrShowSale($saleid);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["saleid"])){
  $getSale = new AjaxSaleDetails();
  $getSale -> saleid = $_POST["saleid"];
  $getSale -> ajaxGetSaleDetails();
}