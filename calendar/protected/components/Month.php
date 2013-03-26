<?php
	
class Month extends CWidget {
	
	public $model;

	public $form;

	public $monthHeaderHtmlOptions = array();

	public $monthDaysHtmlOptions = array();

	public $previousMonthOptions = array();

	public $presentMonthOptions = array();

	public $sundayHtmlOptions = array();

	public $presentDayOptions = array();

	public $today = array();

	public $month;

	public $year;

	public function run(){
		$this->render();

	}

	public function render(){
		echo CHtml::openTag('table');//,array('cellspacing'=>'0'))."\n";
		$this->monthHeader();
		$this->addMonthDays();
		echo CHtml::closeTag('table')."\n";

	}

	protected function monthHeader() {
		echo CHtml::openTag('tr',$this->monthHeaderHtmlOptions)."\n";
		$this->addDays();
		echo CHtml::closeTag('tr')."\n";
	}

	protected function addDays(){
		
		for($i=0; $i<7; $i++){
			echo CHtml::openTag('td')."\n";
			$this->getDayOfWeek($i);
			echo CHtml::closeTag('td')."\n";			
		}
	}

	protected function getDayOfWeek($i){
		switch($i){
			case 0: echo "Sun";
				break;
			case 1: echo "Mon";
				break;
			case 2: echo "Tue";
				break;
			case 3: echo "Wed";
				break;
			case 4: echo "Thu";
				break;
			case 5: echo "Fri";
				break;
			case 6: echo "Sat";
				break;
		}
	}

	protected function addMonthDays(){
		$previousMonthDays = date('w',mktime(0,0,0,$this->month,1,$this->year));
		$currentMonthDays = date('t',mktime(0,0,0,$this->month,1,$this->year));

		$previousYear = $this->year;
		$previousMonth = $this->month;

		if($this->month == 1){
			$previousYear = $this->year - 1;
			$previousMonth = 12;
		}else{
			$previousMonth = $this->month - 1;
		}

		$totalDaysInPreviousMonth = date('t',mktime(0,0,0,$previousMonth,1,$previousYear));
		$firstWeekStartDate = $totalDaysInPreviousMonth - $previousMonthDays + 1;
		
		$date = date('d');
		$day = 1;
		$nextMonthStartDate = 1;
		for($i = 0; $i < 5 ; $i++){
			echo CHtml::openTag('tr',$this->monthDaysHtmlOptions)."\n";
			for($j = 0; $j < 7; $j++){

				if($previousMonthDays > 0 ){

					echo CHtml::openTag('td',$this->previousMonthOptions)."\n";
					echo $firstWeekStartDate;
					echo CHtml::closeTag('td')."\n";
					$previousMonthDays--;
					$firstWeekStartDate++;

				}else{

					if($day <= $currentMonthDays){
						if($date == $day){
							echo CHtml::openTag('td',$this->today)."\n";
						}else{
							echo CHtml::openTag('td',$this->presentMonthOptions)."\n";
						}
						
						echo $day;
						echo CHtml::closeTag('td')."\n";
						$day++;
					}else{
						echo CHtml::openTag('td',$this->previousMonthOptions)."\n";
						echo $nextMonthStartDate;
						echo CHtml::closeTag('td')."\n";
						$nextMonthStartDate++;
					}					

					
				}

			}
			echo CHtml::closeTag('tr');
		}

		
	}

}

?>
