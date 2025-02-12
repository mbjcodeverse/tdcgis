<?php
class ControllerStockout{
	static public function ctrCreateStockout($data){
	   	$answer = (new ModelStockout)->mdlAddStockout($data);
	}

    // List TRANSACTIONS
	static public function ctrShowReleasingTransactionList($machineid, $start_date, $end_date, $empid, $reqstatus){
		$answer = (new ModelStockout)->mdlShowReleasingTransactionList($machineid, $start_date, $end_date, $empid, $reqstatus);
		return $answer;
	}	

	// Get Releasing Details
	static public function ctrShowReleasing($reqnumber){
		$answer = (new ModelStockout)->mdlShowReleasing($reqnumber);
		return $answer;
	}

    // Get ITEMS
	static public function ctrShowReleasingItems($reqnumber){
		$products = (new ModelStockout)->mdlShowReleasingItems($reqnumber);
		return $products;
	}
}