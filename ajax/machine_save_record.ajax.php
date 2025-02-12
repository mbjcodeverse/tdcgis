<?php
require_once "../controllers/machine.controller.php";
require_once "../models/machine.model.php";

class machineDetail{
  public $trans_type; 

  public $classcode;
  public $machtype;
  public $machabbr;
  public $machinedesc;
  public $buildingcode;
  public $isactive;
  public $machstatus;
  public $image;
  public $attributelist;

  public function showMachineDetail(){
    $trans_type = $this->trans_type;

  	$classcode = $this->classcode;
  	$machtype = $this->machtype;
    $machabbr = $this->machabbr;
    $machinedesc = $this->machinedesc;
    $buildingcode = $this->buildingcode;
    $isactive = $this->isactive;
    $machstatus = $this->machstatus;
    $image = $this->image;
    $attributelist = $this->attributelist;

    $data = array("classcode"=>$classcode,
                  "machtype"=>$machtype,
                  "machabbr"=>$machabbr,
                  "machinedesc"=>$machinedesc,
                  "buildingcode"=>$buildingcode,
                  "isactive"=>$isactive,
                  "machstatus"=>$machstatus,
                  "image"=>$image,
                  "attributelist"=>$attributelist);

    if ($trans_type == 'New'){
      $answer = (new ControllerMachine)->ctrCreateMachine($data);
    }else{
      $answer = (new ControllerMachine)->ctrEditMachine($data);
    }

  }
}

$machine = new machineDetail();
$machine -> trans_type = $_POST["trans_type"];
$machine -> classcode = $_POST["classcode"];
$machine -> machtype = $_POST["machtype"];
$machine -> machabbr = $_POST["machabbr"];
$machine -> machinedesc = $_POST["machinedesc"];
$machine -> buildingcode = $_POST["buildingcode"];
$machine -> isactive = $_POST["isactive"];
$machine -> machstatus = $_POST["machstatus"];
$machine -> image = $_FILES["image"]["tmp_name"];
$machine -> attributelist = $_POST["attributelist"];
$machine -> showMachineDetail();