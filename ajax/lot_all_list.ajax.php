<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";

class AjaxLotAllList{ 
   public function ajaxDisplayLotAllList(){
     $answer = (new ControllerHome)->ctrLotAllList();
     echo json_encode($answer);
   }
}

$lots = new AjaxLotAllList();
$lots -> ajaxDisplayLotAllList();