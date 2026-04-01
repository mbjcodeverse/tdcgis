<?php
class ControllerLot{
    static public function ctrCategoryList(){
		$answer = (new ModelLot)->mdlCategoryList();
		return $answer;
	}

    static public function ctrClassificationList(){
		$answer = (new ModelLot)->mdlClassificationList();
		return $answer;
	} 
	
    static public function ctrAvailableLotList(){
		$answer = (new ModelLot)->mdlAvailableLotList();
		return $answer;
	} 	

    static public function ctrLotList(){
		$answer = (new ModelLot)->mdlLotList();
		return $answer;
	}	
}