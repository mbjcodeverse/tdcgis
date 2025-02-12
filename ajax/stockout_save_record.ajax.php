<?php
require_once "../controllers/stockout.controller.php";
require_once "../models/stockout.model.php";

class saveStockout{
  public $trans_type; 
  public $machineid;
  public $requestby;
  public $reqdate;
  public $reqstatus;
  public $remarks;
  public $postedby;
  public $productlist;

  public function postSavedStockout(){
    $trans_type = $this->trans_type;
    $machineid = $this->machineid;
  	$requestby = $this->requestby;
  	$reqdate = $this->reqdate;
  	$reqstatus = $this->reqstatus;
    $remarks = $this->remarks;
  	$postedby = $this->postedby;
  	$productlist = $this->productlist;

    $data = array("machineid"=>$machineid,
                  "requestby"=>$requestby,
    	            "reqdate"=>$reqdate,
                  "reqstatus"=>$reqstatus,
                  "remarks"=>$remarks,
                  "postedby"=>$postedby,
                  "productlist"=>$productlist);

    if ($trans_type == 'New'){
      $answer = (new ControllerStockout)->ctrCreateStockout($data);
    }else{
      $answer = (new ControllerStockout)->ctrEditStockout($data);
    }

  }
}

$inventory = new saveStockout();

$inventory -> trans_type = $_POST["trans_type"];
$inventory -> machineid = $_POST["machineid"];
$inventory -> requestby = $_POST["requestby"];
$inventory -> reqdate = $_POST["reqdate"];
$inventory -> reqstatus = $_POST["reqstatus"];
$inventory -> remarks = $_POST["remarks"];
$inventory -> postedby = $_POST["postedby"];
$inventory -> productlist = $_POST["productlist"];
$inventory -> postSavedStockout();