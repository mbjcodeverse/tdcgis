<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class AjaxSaleLotInfo{
    public $lotid;
    public function ajaxGetSaleLotInfo(){
      $lotid = $this->lotid;
      $answer = (new ControllerSales)->ctrShowSaleLotInfo($lotid);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["lotid"])){
  $getSaleLotInfo = new AjaxSaleLotInfo();
  $getSaleLotInfo -> lotid = $_POST["lotid"];
  $getSaleLotInfo -> ajaxGetSaleLotInfo();
}