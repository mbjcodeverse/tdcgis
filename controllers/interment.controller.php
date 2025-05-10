<?php
class ControllerInterment{
	static public function ctrAddInterment($data){
		$answer = (new ModelInterment)->mdlAddInterment($data);
	 	return $answer;
    }

	// Update EXISTING RECORD
	static public function ctrEditInterment($data){
		$answer = (new ModelInterment)->mdlEditInterment($data);
		return $answer;
	}

	// Interment List for Searching
	static public function ctrIntermentInfoList($categorycode, $start_date, $end_date, $reinterred){
		$answer = (new ModelInterment)->mdlIntermentInfoList($categorycode, $start_date, $end_date, $reinterred);
		return $answer;
	}

	static public function ctrShowInterment($intermentid){
		$answer = (new ModelInterment)->mdlShowInterment($intermentid);
		return $answer;
	}
}