<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class AjaxSalesHistoryList{ 
   public $lotid;

   public function ajaxDisplaySalesHistoryList(){
     $lotid = $this->lotid;

     $answer = (new ControllerSales)->ctrSalesHistoryList($lotid);
     echo json_encode($answer);
   }
}

$sales_history = new AjaxSalesHistoryList();
$sales_history -> lotid = $_POST["lotid"];

$sales_history -> ajaxDisplaySalesHistoryList();