<?php
require_once "../controllers/sales.controller.php";
require_once "../models/sales.model.php";

class salesTransferResale{
  public $transaction;
  public $lotid;
  public $saleid;
  public $lname;
  public $fname;
  public $mi;
  public $clientid;
  public $client_status;
  public $landline;
  public $mobile;
  public $email;
  public $address;
  public $purdate;
  public $beneficiary;
  public $relation;
  public $certnum;
  public $scode;
  public $salecode;
  public $remarks;

  public function salesTransferResaleSave(){
    $transaction = $this->transaction;
    $lotid = $this->lotid;
    $saleid = $this->saleid;
  	$lname = $this->lname;
    $fname = $this->fname;
  	$mi = $this->mi;
    $clientid = $this->clientid;
  	$client_status = $this->client_status;
    $landline = $this->landline;
  	$mobile = $this->mobile;
  	$email = $this->email;
  	$address = $this->address;
  	$purdate = $this->purdate;
    $beneficiary = $this->beneficiary;
    $relation = $this->relation;
    $certnum = $this->certnum;
    $scode = $this->scode;
    $salecode = $this->salecode;
    $remarks = $this->remarks;

    $data = array("transaction"=>$transaction,
                  "lotid"=>$lotid,
                  "saleid"=>$saleid,
                  "lname"=>$lname,
                  "fname"=>$fname,
                  "mi"=>$mi,
                  "clientid"=>$clientid,
                  "client_status"=>$client_status,
                  "landline"=>$landline,
                  "mobile"=>$mobile,
                  "email"=>$email,
                  "address"=>$address,
                  "purdate"=>$purdate,
                  "beneficiary"=>$beneficiary,
                  "relation"=>$relation,
                  "certnum"=>$certnum,
                  "scode"=>$scode,
                  "salecode"=>$salecode,
                  "remarks"=>$remarks);

    $answer = (new ControllerSales)->ctrTransferResale($data);
    echo $answer;
  }
}

$transfer_resale = new salesTransferResale();

$transfer_resale -> transaction = $_POST["transaction"];
$transfer_resale -> lotid = $_POST["lotid"];
$transfer_resale -> saleid = $_POST["saleid"];
$transfer_resale -> lname = $_POST["lname"];
$transfer_resale -> fname = $_POST["fname"];
$transfer_resale -> mi = $_POST["mi"];
$transfer_resale -> clientid = $_POST["clientid"];
$transfer_resale -> client_status = $_POST["client_status"];
$transfer_resale -> landline = $_POST["landline"];
$transfer_resale -> mobile = $_POST["mobile"];
$transfer_resale -> email = $_POST["email"];
$transfer_resale -> address = $_POST["address"];
$transfer_resale -> purdate = $_POST["purdate"];
$transfer_resale -> beneficiary = $_POST["beneficiary"];
$transfer_resale -> relation = $_POST["relation"];
$transfer_resale -> certnum = $_POST["certnum"];
$transfer_resale -> scode = $_POST["scode"];
$transfer_resale -> salecode = $_POST["salecode"];
$transfer_resale -> remarks = $_POST["remarks"];

$transfer_resale -> salesTransferResaleSave();