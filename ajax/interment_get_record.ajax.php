<?php
require_once "../controllers/interment.controller.php";
require_once "../models/interment.model.php";

class IntermentDetails{
    public $intermentid;
    public function getIntermentDetails(){
      $intermentid = $this->intermentid;
      $answer = (new ControllerInterment)->ctrShowInterment($intermentid);
      echo json_encode($answer);
    }
}
 
if(isset($_POST["intermentid"])){
  $getInterment = new IntermentDetails();
  $getInterment -> intermentid = $_POST["intermentid"];
  $getInterment -> getIntermentDetails();
}