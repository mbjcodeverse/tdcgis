<?php
require_once "../controllers/userrights.controller.php";
require_once "../models/userrights.model.php";

class userRightsEntry{
  public $trans_type; 
  public $userid;
  public $empid;
  public $sales;
  public $interment;
  public $reports;
  public $dashboard;
  public $clients;
  public $employees;
  public $lotinfo;
  public $accessprivilege;
  public $username;
  public $upassword;

  public function userRightsEntrySave(){
    $trans_type = $this->trans_type;
    $userid = $this->userid;
    $empid = $this->empid;
    $sales = $this->sales;
  	$interment = $this->interment;
    $reports = $this->reports;
  	$dashboard = $this->dashboard;
    $clients = $this->clients;
  	$employees = $this->employees;
    $lotinfo = $this->lotinfo;
  	$accessprivilege = $this->accessprivilege;
    $username = $this->username;
    $upassword = $this->upassword;

    $data = array("userid"=>$userid,
                  "empid"=>$empid,
                  "sales"=>$sales,
                  "interment"=>$interment,
                  "reports"=>$reports,
                  "dashboard"=>$dashboard,
                  "clients"=>$clients,
                  "employees"=>$employees,
                  "lotinfo"=>$lotinfo,
                  "accessprivilege"=>$accessprivilege,
                  "username"=>$username,
                  "upassword"=>$upassword);

    if ($trans_type == 'New'){
      $answer = (new ControllerUserRights)->ctrAddUserRights($data);
      echo $answer;
    }else{
      $answer = (new ControllerUserRights)->ctrEditUserRights($data);
      echo $answer;
    }

  }
}

$inputUserRights = new userRightsEntry();

$inputUserRights -> trans_type = $_POST["trans_type"];
$inputUserRights -> userid = $_POST["userid"];
$inputUserRights -> empid = $_POST["empid"];
$inputUserRights -> sales = $_POST["sales"];
$inputUserRights -> interment = $_POST["interment"];
$inputUserRights -> reports = $_POST["reports"];
$inputUserRights -> dashboard = $_POST["dashboard"];
$inputUserRights -> clients = $_POST["clients"];
$inputUserRights -> employees = $_POST["employees"];
$inputUserRights -> lotinfo = $_POST["lotinfo"];
$inputUserRights -> accessprivilege = $_POST["accessprivilege"];
$inputUserRights -> username = $_POST["username"];
$inputUserRights -> upassword = $_POST["upassword"];

$inputUserRights -> userRightsEntrySave();