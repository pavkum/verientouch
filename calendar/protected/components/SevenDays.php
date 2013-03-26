<?php

class SevenDays extends CWidget {

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


	public $model;

	public $form;

	public $month;

	public $year;

	public $scriptUrl;

	public $themeUrl;

	public $containerHtmlOptions = array (
						'class'  => 'week-container',
					);

	public $theme = "default";

	public $dataHtmlOptions = array (
						'class' => 'weekdata'
					);

	public $cssFile = array(
				'week.css',
				'jquery.jscrollpane.css',
				);

	public $scriptFile = array (
				'jquery.jscrollpane.min.js',
				'jquery.mousewheel.js',
				'week.js',
				);

	public $eventHtmlOptions = array();

	public $hourHtmlOptions = array();

	public $headerHtmlOptions = array();

	public $hourheaderHtmlOptions = array(
				'class'=>'hourheader',			
				);

	private $tableOptions = array(
				'class'=>'scrollpanel',			
				);

	private $coverTableOptions = array (
					'style'=>'padding:0;border-spacing:1;height:25px;font-size:15px',
					);


	public function init()
	{
		$this->resolvePackagePath();		
		$this->registerCoreScripts();

		parent::init();
	}

	public function run() {
		$this->render();
	}

	protected function resolvePackagePath(){
		if($this->scriptUrl===null || $this->themeUrl===null)
		{
			$cs=Yii::app()->getClientScript();
			if($this->scriptUrl===null)
				$this->scriptUrl=$cs->getCoreScriptUrl().'/calendar/js';
			if($this->themeUrl===null)
				$this->themeUrl=$cs->getCoreScriptUrl().'/calendar/css';
		}
	}

	protected function registerCoreScripts(){
		$cs=Yii::app()->getClientScript();
		if(is_string($this->cssFile))
			$cs->registerCssFile($this->themeUrl.'/'.$this->theme.'/'.$this->cssFile);
		elseif(is_array($this->cssFile))
		{
			foreach($this->cssFile as $cssFile)
				$cs->registerCssFile($this->themeUrl.'/'.$this->theme.'/'.$cssFile);
		}

		//$cs->registerCoreScript('jquery');
		if(is_string($this->scriptFile))
			$this->registerScriptFile($this->theme.'/'.$this->scriptFile);
		elseif(is_array($this->scriptFile))
		{
			foreach($this->scriptFile as $scriptFile)
				$this->registerScriptFile($this->theme.'/'.$scriptFile);
		}
	}

	protected function registerScriptFile($fileName,$position=CClientScript::POS_HEAD){
		Yii::app()->getClientScript()->registerScriptFile($this->scriptUrl.'/'.$fileName,$position);
	}


	public function render() {
		$dates = self::getThisWeek();

		echo CHtml::openTag('div',$this->containerHtmlOptions);
			echo CHtml::openTag('table',array('style'=>'width:97%;'));
				echo CHtml::openTag('tr');

					echo CHtml::openTag('td',$this->hourHtmlOptions);

					echo CHtml::closeTag('td');

					echo CHtml::openTag('td',$this->dataHtmlOptions);
						
						echo CHtml::openTag('table',$this->coverTableOptions);
		
						echo CHtml::openTag('tr');

							for($i=0; $i<count($dates); $i++){
								$this->addHeader($dates[$i]);
							}

						echo CHtml::closeTag('tr');
		
						echo CHtml::closeTag('table');
					
					echo CHtml::closeTag('td');

				echo CHtml::closeTag('tr');
			echo CHtml::closeTag('table');

			echo CHtml::openTag('div',array('style'=>'height:350px;overflow:scroll;','class'=>'scrollpanel'));

			echo CHtml::openTag('table',array('style'=>'width:100%;height:350px;'));
				echo CHtml::openTag('tr' );
					
						echo CHtml::openTag('td',$this->hourHtmlOptions);
							$this->addHourHeaders();
						echo CHtml::closeTag('td');

						echo CHtml::openTag('td',$this->dataHtmlOptions);

						echo CHtml::openTag('table',$this->eventHtmlOptions);

							for($i=0; $i<count($dates); $i++){
								echo CHtml::openTag('td');
								$this->addHours();
								echo CHtml::closeTag('td');
							}

						echo CHtml::closeTag('table');
						echo CHtml::closeTag('td');

						/*echo CHtml::openTag('td',$this->hourHtmlOptions);
							$this->addHourHeaders();
						echo CHtml::closeTag('td');*/					

					//echo CHtml::closeTag('span');
					//echo CHtml::closeTag('table');
				echo CHtml::closeTag('tr');

			echo CHtml::closeTag('table');
		echo CHtml::closeTag('div');
		echo CHtml::closeTag('div');
	}

	
	private function addHeader($date) {

		//echo CHtml::openTag('tr',$this->headerHtmlOptions);
		echo CHtml::openTag('td',$this->headerHtmlOptions);
		echo $date;
		echo CHtml::closeTag('td');
		//echo CHtml::closeTag('tr');

	}

	private function addHourHeaders(){
		//echo CHtml::openTag('td');
		echo CHtml::openTag('table',$this->hourheaderHtmlOptions);
		
		for($i=0; $i<24; $i++){
			echo CHtml::openTag('tr');
			echo CHtml::openTag('td');
			echo $i;
			echo CHtml::closeTag('td');
			echo CHtml::closeTag('tr');
		}
		echo CHtml::closeTag('table');
		//echo CHtml::closeTag('td');

	}

	private function addHours() {
		echo CHtml::openTag('table');
		for($i=0; $i<24; $i++){
			echo CHtml::openTag('tr');
			echo CHtml::openTag('td');

			echo CHtml::closeTag('td');
			echo CHtml::closeTag('tr');
		}
		echo CHtml::closeTag('table');
	}

		private static function getThisWeek(){
			$dayIndex = self::getPresentDaysPosition();
		
			$totalNumberOfRemainingDays = self::$TOTAL_DAYS_IN_WEEK - $dayIndex;

			$totalNumberOfPreviousDays = self::$TOTAL_DAYS_IN_WEEK - $totalNumberOfRemainingDays;
		
			$dates = array();

			$previousDates = self::getPreviousDaysOfTheWeek($totalNumberOfPreviousDays);

			$remainingDates = self::getRemainingDaysOfTheWeek($totalNumberOfPreviousDays);

			return array_merge($previousDates, $remainingDates);
		}

		private static function getPresentDaysPosition(){
			return date('w') + 1;
		}

		private static function getPreviousDaysOfTheWeek($totalNumberOfPreviousDays){
			$dates = array();		
			for($i = 1; $i < $totalNumberOfPreviousDays; $i++) {
				$dates[$i] = date('d-M-Y',strtotime(self::$LAST. self::getDayNames($i)));

			}		
			$dates[$i] = date('d-M-Y',strtotime(self::$TODAY));
			return $dates;

		}

		private static function getRemainingDaysOfTheWeek($totalNumberOfPreviousDays){
			$dates = array();
			for($i = $totalNumberOfPreviousDays+1; $i <= self::$TOTAL_DAYS_IN_WEEK; $i++) {
				$dates[$i] = date('d-M-Y',strtotime(self::$NEXT. self::getDayNames($i)));

			}
			return $dates;
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
