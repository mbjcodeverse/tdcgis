<?php
require_once "../controllers/home.controller.php";
require_once "../models/home.model.php";

class nearestLot{
  public $latitude;
  public $longitude;

  public function fetNearestLot(){
    $latitude = $this->latitude;
    $longitude = $this->longitude;

    $data = array("latitude"=>$latitude,
                  "longitude"=>$longitude);

    $answer = (new ControllerHome)->ctrGetNearestLot($data);
    echo json_encode($answer);             
  }
}

$nearest_lot = new nearestLot();

$nearest_lot -> latitude = $_POST["latitude"];
$nearest_lot -> longitude = $_POST["longitude"];

$nearest_lot -> fetNearestLot();