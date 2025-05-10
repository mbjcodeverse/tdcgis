<?php
class ControllerReturn{
	static public function ctrAddReturn($data){
	   	$answer = (new ModelReturn)->mdlAddReturn($data);
	}

    // List TRANSACTIONS
	static public function ctrShowReturnTransactionList($start_date, $end_date, $empid, $retstatus){
		$answer = (new ModelReturn)->mdlShowReturnTransactionList($start_date, $end_date, $empid, $retstatus);
		return $answer;
	}	

	// Get Return Details
	static public function ctrShowReturn($retnumber){
		$answer = (new ModelReturn)->mdlShowReturn($retnumber);
		return $answer;
	}

    // Get ITEMS
	static public function ctrShowReturnItems($retnumber){
		$products = (new ModelReturn)->mdlShowReturnItems($retnumber);
		return $products;
	}
}