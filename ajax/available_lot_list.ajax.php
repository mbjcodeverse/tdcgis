<?php
require_once "../controllers/lot.controller.php";
require_once "../models/lot.model.php";

class AjaxAvailableLotList{ 
   public function ajaxDisplayAvailableLotList(){
     $answer = (new ControllerLot)->ctrAvailableLotList();
     echo json_encode($answer);
   }
}

$sales = new AjaxAvailableLotList();
$sales -> ajaxDisplayAvailableLotList();