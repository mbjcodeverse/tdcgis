<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";
class AjaxDecedentList{
    public $saleid;
    public function ajaxGetDecedentList(){
      $saleid = $this->saleid;
      $deceased = (new ControllerHome)->ctrShowDecedentList($saleid);
      echo json_encode($deceased);
    }
}
 
if(isset($_POST["saleid"])){
  $getDecedentList = new AjaxDecedentList();
  $getDecedentList -> saleid = $_POST["saleid"];
  $getDecedentList -> ajaxGetDecedentList();
}