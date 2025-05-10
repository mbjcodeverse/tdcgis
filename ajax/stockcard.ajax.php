<?php
require_once "../controllers/items.controller.php";
require_once "../models/items.model.php";

class AjaxProdStocks{ 
   public $itemid;

   public function ajaxDisplayProdStocks(){
     $itemid = $this->itemid;
     $answer = (new ControllerItems)->ctrShowProdStocks($itemid);
     echo json_encode($answer);
   }
  
}

if(isset($_POST["itemid"])){
  $prod_stocks = new AjaxProdStocks();
  $prod_stocks -> itemid = $_POST["itemid"];
  $prod_stocks -> ajaxDisplayProdStocks();
}