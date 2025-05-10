<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class salesCancelEntry{
  public $datecancelled;
  public $cancelremarks;
  public $saleid;
  public $lotid;

  public function salesCancelEntrySave(){
    $datecancelled = $this->datecancelled;
    $cancelremarks = $this->cancelremarks;
  	$saleid = $this->saleid;
    $lotid = $this->lotid;

    $data = array("datecancelled"=>$datecancelled,
                  "cancelremarks"=>$cancelremarks,
                  "saleid"=>$saleid,
                  "lotid"=>$lotid);

    $answer = (new ControllerSales)->ctrCancelSale($data);
    echo $answer;
  }
}

$processSalesCancel = new salesCancelEntry();

$processSalesCancel -> datecancelled = $_POST["datecancelled"];
$processSalesCancel -> cancelremarks = $_POST["cancelremarks"];
$processSalesCancel -> saleid = $_POST["saleid"];
$processSalesCancel -> lotid = $_POST["lotid"];

$processSalesCancel -> salesCancelEntrySave();