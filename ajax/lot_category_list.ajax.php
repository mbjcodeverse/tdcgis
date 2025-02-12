<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";

class AjaxLotCategoryList{ 
   public $categorycode;

   public function ajaxDisplayLotCategoryList(){
     $categorycode = $this->categorycode;
     $answer = (new ControllerHome)->ctrLotCategoryList($categorycode);
     echo json_encode($answer);
   }
}

$lot = new AjaxLotCategoryList();
$lot -> categorycode = $_POST["categorycode"];
$lot -> ajaxDisplayLotCategoryList();