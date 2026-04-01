<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";

class lotidEntry{
  public $lotid;
  public $latitude;
  public $longitude;

  public function lotidEntrySave(){
    $lotid = $this->lotid;
    $latitude = $this->latitude;
    $longitude = $this->longitude;

    $data = array("lotid"=>$lotid,
                  "latitude"=>$latitude,
                  "longitude"=>$longitude);

    $answer = (new ControllerHome)->ctrPostLotID($data);
    echo $answer;              
  }
}

$lot_lotid = new lotidEntry();

$lot_lotid -> lotid = $_POST["lotid"];
$lot_lotid -> latitude = $_POST["latitude"];
$lot_lotid -> longitude = $_POST["longitude"];

$lot_lotid -> lotidEntrySave();