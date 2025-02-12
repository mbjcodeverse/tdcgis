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
}