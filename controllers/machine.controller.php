<?php
class ControllerMachine{
	static public function ctrCreateMachine($data){
	   	$answer = (new ModelMachine)->mdlAddMachine($data);
	}

	static public function ctrShowMachineList(){
	   	$answer = (new ModelMachine)->mdlShowMachineList();
	   	return $answer;
	}	
}