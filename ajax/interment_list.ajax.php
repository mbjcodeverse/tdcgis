<?php
require_once "../controllers/interment.controller.php";
require_once "../models/interment.model.php";

class IntermentInfoList{ 
   public $categorycode;
   public $start_date;
   public $end_date;   
   public $reinterred;

   public function DisplayIntermentInfoList(){
     $categorycode = $this->categorycode;
     $start_date = $this->start_date;
     $end_date = $this->end_date;
     $reinterred = $this->reinterred;

     $answer = (new ControllerInterment)->ctrIntermentInfoList($categorycode, $start_date, $end_date, $reinterred);
     echo json_encode($answer);
   }
}

$interment = new IntermentInfoList();
$interment -> categorycode = $_POST["categorycode"];
$interment -> start_date = $_POST["start_date"];
$interment -> end_date = $_POST["end_date"];
$interment -> reinterred = $_POST["reinterred"];
$interment -> DisplayIntermentInfoList();