<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class salesEntry{
  public $trans_type; 
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

  public function salesEntrySave(){
    $trans_type = $this->trans_type;
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

    if ($trans_type == 'New'){
      $answer = (new ControllerSales)->ctrAddSale($data);
      echo $answer;
    }else{
      $answer = (new ControllerSales)->ctrEditSale($data);
      echo $answer;
    }

  }
}

$processSales = new salesEntry();

$processSales -> trans_type = $_POST["trans_type"];
$processSales -> saleid = $_POST["saleid"];
$processSales -> salestatus = $_POST["salestatus"];
$processSales -> scode = $_POST["scode"];
$processSales -> salecode = $_POST["salecode"];
$processSales -> lotid = $_POST["lotid"];
$processSales -> clientid = $_POST["clientid"];
$processSales -> purdate = $_POST["purdate"];
$processSales -> certnum = $_POST["certnum"];
$processSales -> certdate = $_POST["certdate"];
$processSales -> beneficiary = $_POST["beneficiary"];
$processSales -> relation = $_POST["relation"];
$processSales -> councilor = $_POST["councilor"];
$processSales -> remarks = $_POST["remarks"];

$processSales -> salesEntrySave();