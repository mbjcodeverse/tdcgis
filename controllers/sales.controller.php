<?php
class ControllerSales{
    static public function ctrRelationList(){
		$answer = (new ModelSales)->mdlRelationList();
		return $answer;
	}

    // List TRANSACTIONS
	static public function ctrSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus){
		$answer = (new ModelSales)->mdlSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus);
		return $answer;
	}
}