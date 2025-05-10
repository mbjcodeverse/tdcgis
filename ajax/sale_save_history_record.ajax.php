<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class salesHistoryEntry{
  public $saleid;
  public $salestatus;
  public $scode;
  public $salecode;
  public $lotid;
  public $clientid;
  public $purdate;
  public $certnum;
  public $certdate;
  public $beneficiary;
  public $relation;
  public $councilor;
  public $remarks;

  public function salesHistoryEntrySave(){
    $saleid = $this->saleid;
    $salestatus = $this->salestatus;
  	$scode = $this->scode;
    $salecode = $this->salecode;
  	$lotid = $this->lotid;
    $clientid = $this->clientid;
  	$purdate = $this->purdate;
    $certnum = $this->certnum;
  	$certdate = $this->certdate;
  	$beneficiary = $this->beneficiary;
  	$relation = $this->relation;
  	$councilor = $this->councilor;
    $remarks = $this->remarks;

    $data = array("saleid"=>$saleid,
                  "salestatus"=>$salestatus,
                  "scode"=>$scode,
                  "salecode"=>$salecode,
                  "lotid"=>$lotid,
                  "clientid"=>$clientid,
                  "purdate"=>$purdate,
                  "certnum"=>$certnum,
                  "certdate"=>$certdate,
                  "beneficiary"=>$beneficiary,
                  "relation"=>$relation,
                  "councilor"=>$councilor,
                  "remarks"=>$remarks);

    $answer = (new ControllerSales)->ctrAddSaleHistory($data);
    echo $answer;
  }
}

$processSalesHistory = new salesHistoryEntry();

$processSalesHistory -> saleid = $_POST["saleid"];
$processSalesHistory -> salestatus = $_POST["salestatus"];
$processSalesHistory -> scode = $_POST["scode"];
$processSalesHistory -> salecode = $_POST["salecode"];
$processSalesHistory -> lotid = $_POST["lotid"];
$processSalesHistory -> clientid = $_POST["clientid"];
$processSalesHistory -> purdate = $_POST["purdate"];
$processSalesHistory -> certnum = $_POST["certnum"];
$processSalesHistory -> certdate = $_POST["certdate"];
$processSalesHistory -> beneficiary = $_POST["beneficiary"];
$processSalesHistory -> relation = $_POST["relation"];
$processSalesHistory -> councilor = $_POST["councilor"];
$processSalesHistory -> remarks = $_POST["remarks"];

$processSalesHistory -> salesHistoryEntrySave();