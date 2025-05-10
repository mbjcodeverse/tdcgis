<?php
class ControllerSales{
	static public function ctrAddSale($data){
		$answer = (new ModelSales)->mdlAddSale($data);
	 	return $answer;
    }

	static public function ctrAddSaleHistory($data){
		$answer = (new ModelSales)->mdlAddSaleHistory($data);
	 	return $answer;
    }

	static public function ctrTransferResale($data){
		$answer = (new ModelSales)->mdlTransferResale($data);
	 	return $answer;
    }

	static public function ctrCancelSale($data){
		$answer = (new ModelSales)->mdlCancelSale($data);
	 	return $answer;
    }	

	// Update EXISTING RECORD
	static public function ctrEditSale($data){
		$answer = (new ModelSales)->mdlEditSale($data);
		return $answer;
	}

    static public function ctrRelationList(){
		$answer = (new ModelSales)->mdlRelationList();
		return $answer;
	}

    // List TRANSACTIONS
	static public function ctrSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus){
		$answer = (new ModelSales)->mdlSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus);
		return $answer;
	}

    // Lot ID HISTORY
	static public function ctrSalesHistoryList($lotid){
		$answer = (new ModelSales)->mdlSalesHistoryList($lotid);
		return $answer;
	}	

	// Get Sales Details
	static public function ctrShowSale($saleid){
		$answer = (new ModelSales)->mdlShowSale($saleid);
		return $answer;
	}

	static public function ctrShowSaleLotInfo($lotid){
		$answer = (new ModelSales)->mdlShowSaleLotInfo($lotid);
		return $answer;
	}	
}