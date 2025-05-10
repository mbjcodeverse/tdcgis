<?php
class ControllerInventory{
	static public function ctrCreateInventory($data){
	   	$answer = (new ModelInventory)->mdlAddInventory($data);
	}
}