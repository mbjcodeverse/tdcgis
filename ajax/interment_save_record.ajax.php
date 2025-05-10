<?php
require_once "../controllers/interment.controller.php";
require_once "../models/interment.model.php";

class intermentEntry{
  public $trans_type; 
  public $userid;
  public $lotid;
  public $intermentid;
  public $saleid;
  public $interdate;
  public $location;
  public $layer;
  public $remarks;
  public $decedentlist;

  public function intermentEntrySave(){
    $trans_type = $this->trans_type;
    $userid = $this->userid;
    $lotid = $this->lotid;
    $intermentid = $this->intermentid;
    $saleid = $this->saleid;
  	$interdate = $this->interdate;
    $location = $this->location;
  	$layer = $this->layer;
    $remarks = $this->remarks;
  	$decedentlist = $this->decedentlist;

    $data = array("userid"=>$userid,
                  "lotid"=>$lotid,
                  "intermentid"=>$intermentid,
                  "saleid"=>$saleid,
                  "interdate"=>$interdate,
                  "location"=>$location,
                  "layer"=>$layer,
                  "remarks"=>$remarks,
                  "decedentlist"=>$decedentlist);

    if ($trans_type == 'New'){
      $answer = (new ControllerInterment)->ctrAddInterment($data);
      echo $answer;
    }else{
      $answer = (new ControllerInterment)->ctrEditInterment($data);
      echo $answer;
    }

  }
}

$interment = new intermentEntry();

$interment -> trans_type = $_POST["trans_type"];
$interment -> userid = $_POST["userid"];
$interment -> lotid = $_POST["lotid"];
$interment -> saleid = $_POST["saleid"];
$interment -> intermentid = $_POST["intermentid"];
$interment -> interdate = $_POST["interdate"];
$interment -> location = $_POST["location"];
$interment -> layer = $_POST["layer"];
$interment -> remarks = $_POST["remarks"];
$interment -> decedentlist = $_POST["decedentlist"];

$interment -> intermentEntrySave();