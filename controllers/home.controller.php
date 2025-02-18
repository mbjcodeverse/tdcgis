<?php
class ControllerHome{
	static public function ctrLotAllList(){
		$answer = (new ModelHome)->mdlLotAllList();
		return $answer;
	}

	static public function ctrLotCategoryList($categorycode){
		$answer = (new ModelHome)->mdlLotCategoryList($categorycode);
		return $answer;
	}			

	// Update EXISTING RECORD
	static public function ctrPostLotLocation($data){
		$answer = (new ModelHome)->mdlPostLotLocation($data);
		return $answer;
	}
}