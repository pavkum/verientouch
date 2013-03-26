<?php

class Test {

	private static $TOTAL_DAYS_IN_WEEK = 7;

	private static $SUNDAY = 1;

	private static $MONDAY = 2;

	private static $TUESDAY = 3;

	private static $WEDNESDAY = 4;

	private static $THURSDAY = 5;

	private static $FRIDAY = 6;

	private static $SATURDAY = 7;

	private static $SUNDAY_TEXT = "sunday";

	private static $MONDAY_TEXT = "monday";

	private static $TUESDAY_TEXT = "tuesday";

	private static $WEDNESDAY_TEXT = "wednesday";

	private static $THURSDAY_TEXT = "thursday";

	private static $FRIDAY_TEXT = "friday";

	private static $SATURDAY_TEXT = "saturday";

	private static $LAST = "last ";

	private static $NEXT = "next ";

	private static $TODAY = "today";

	private function getThisWeek(){
		$dayIndex = $this->getPresentDaysPosition();

		$totalNumberOfRemainingDays = self::$TOTAL_DAYS_IN_WEEK - $dayIndex;

		$totalNumberOfPreviousDays = self::$TOTAL_DAYS_IN_WEEK - $totalNumberOfRemainingDays;

		$this->getPreviousDaysOfTheWeek($totalNumberOfPreviousDays);
		$this->getRemainingDaysOfTheWeek($totalNumberOfPreviousDays);
	}

	private function getPresentDaysPosition(){
		return date('w') + 1;
	}

	private function getPreviousDaysOfTheWeek($totalNumberOfPreviousDays){
		for($i = 1; $i < $totalNumberOfPreviousDays; $i++) {
			echo date('d-M-Y',strtotime(self::$LAST. self::getDayNames($i)))."\n";
		}		
		echo date('d-M-Y',strtotime(self::$TODAY))."\n";
	}

	private function getRemainingDaysOfTheWeek($totalNumberOfPreviousDays){
		for($i = $totalNumberOfPreviousDays+1; $i <= self::$TOTAL_DAYS_IN_WEEK; $i++) {
			echo date('d-M-Y',strtotime(self::$NEXT. self::getDayNames($i)))."\n";
		}
	}

	private static function getDayNames($dayIndex) {
		
		switch($dayIndex) {
			case self::$SUNDAY    :  return self::$SUNDAY_TEXT;
					   	 break;

			case self::$MONDAY    :  return self::$MONDAY_TEXT;
					  	 break;

			case self::$TUESDAY   :  return self::$TUESDAY_TEXT;
					  	 break;

			case self::$WEDNESDAY :  return self::$WEDNESDAY_TEXT;
					 	 break;

			case self::$THURSDAY  :  return self::$THURSDAY_TEXT;
					  	 break;

			case self::$FRIDAY    :  return self::$FRIDAY_TEXT;
                                          	 break;
	
			case self::$SATURDAY  :  return self::$SATURDAY_TEXT;
					  	 break;

		
		}
	}

}

	$instance = new Test;

	$instance->getThisWeek();
	
	/*
	$previousdate = strtotime('last sunday');

	echo $date.":".$previousdate."\n";*/
?>
