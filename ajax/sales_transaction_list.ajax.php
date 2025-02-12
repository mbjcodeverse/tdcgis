<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class AjaxSalesTransactionList{ 
   public $categorycode;
   public $start_date;
   public $end_date;   
   public $classcode;
   public $salestatus;

   public function ajaxDisplaySalesTransactionList(){
     $categorycode = $this->categorycode;
     $start_date = $this->start_date;
     $end_date = $this->end_date;
     $classcode = $this->classcode;
     $salestatus = $this->salestatus;

     $answer = (new ControllerSales)->ctrSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus);
     echo json_encode($answer);
   }
}

$sales = new AjaxSalesTransactionList();
$sales -> categorycode = $_POST["categorycode"];
$sales -> start_date = $_POST["start_date"];
$sales -> end_date = $_POST["end_date"];
$sales -> classcode = $_POST["classcode"];
$sales -> salestatus = $_POST["salestatus"];
$sales -> ajaxDisplaySalesTransactionList();