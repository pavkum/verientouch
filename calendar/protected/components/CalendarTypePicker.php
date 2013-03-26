<?php

/*
 *
 *  @author Pavan
 *
 *
 */

class CalendarTypePicker extends CWidget{
	
	public $year;
	public $month;
	public $week;
	public $day;

	public $name;

	public function __constructor(){
		$this->initialize();
	}

	public function run(){

		CHtml::radioButtonList($this->name, $this->model, $this->getData,$this->htmlOptions);
		
	}

	private function getData(){
		return array(
				$this->year => "Year",
				$this->month => "Month",
				$this->week => "Week",
				$this->day => "Day",
			);
	}
	
}
