<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";

class locationEntry{
  public $id; 
  public $latitude;
  public $longitude;

  public function locationEntrySave(){
    $id = $this->id;
    $latitude = $this->latitude;
    $longitude = $this->longitude;

    $data = array("id"=>$id,
                  "latitude"=>$latitude,
                  "longitude"=>$longitude);

    $answer = (new ControllerHome)->ctrPostLotLocation($data);
    echo $answer;              
  }
}

$lot_location = new locationEntry();

$lot_location -> id = $_POST["id"];
$lot_location -> latitude = $_POST["latitude"];
$lot_location -> longitude = $_POST["longitude"];

$lot_location -> locationEntrySave();