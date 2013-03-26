<?php

class Today extends CWidget {

	public $events;

	public $user;

	public $date;

	public $scriptUrl;

	public $themeUrl;

	private static $AM = ' AM';

	private static $PM = ' PM';

	public $timestamp;

	public $scriptFile = array(
				'jquery.jscrollpane.min.js',
				'jquery.mousewheel.js',
				'today.js',
				'applystyle.js',
				);

	public $cssFile = array(
				'today.css',
				'common.css',
				'jquery.jscrollpane.css',
				);

	public $theme = 'default';

	public function init()
	{
		$this->resolvePackagePath();		
		$this->registerCoreScripts();

		parent::init();
	}


	private function prepareTime(){
		$this->date = date('Y-m-d',$this->timestamp);
		$this->events = $this->user->getEvent('"'.$this->date.'"');
		return 'Displaying '.date('Y-M-d',$this->timestamp);
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


	public function run() {
		$this->render();
	}

	public function render() {
		$date = $this->prepareTime();
		echo CHtml::openTag('div',array('class'=>'today-container'));
			$this->renderTodayControls($date);
			//$this->addDateHeader();
			$this->addEventData();
			$this->applyEvents();	
		echo CHtml::closeTag('div');
	}

	public function applyEvents(){
		if($this->events != null){
			foreach($this->events as $event){
				$eventStartTime = strtotime($event->getStartTime());
				$eventEndTime = strtotime($event->getEndTime());

				$eventName = $event->getEventName();
				$eventColor = $event->getEventColor();

				if($eventColor === 0){
					$calendarId = $event->getCalendarId();
					$eventColor = $this->user->getCalendar($calendarId)->getCalendarColor();
				}

				echo "<script>applyStyle(".$eventStartTime . "," . $eventEndTime . ",\"" . $eventName . "\",\"" . $eventColor . "\");</script>";

			}
		}

	}

	private function addEventData() {
		echo CHtml::openTag('div',array('class'=>'eventTable'));
		echo CHtml::openTag('table');

		

		for($i=0; $i<24; $i++){
			echo CHtml::openTag('tr');
			echo CHtml::openTag('td',array('class'=>'hourSpecifier','id'=>'hourData'));
				echo self::get24hourFormattedHour($i);
			echo CHtml::closeTag('td');

			echo CHtml::openTag('td',array('class'=>'eventSpecifier','id'=>'eventData'));
			echo CHtml::openTag('table');

				$time = strtotime($this->date . " " . $i . ":00:00");

				echo CHtml::openTag('tr',array('style'=>'height:50%'));
					echo CHtml::openTag('td');
					echo CHtml::openTag('table',array('style'=>'padding:0;border-spacing:0;margin:0'));

					echo CHtml::openTag('tr',array('id'=>$time,'style'=>'height:50%'));
					echo CHtml::closeTag('tr');

					echo CHtml::closeTag('table');
					echo CHtml::closeTag('td');
				echo CHtml::closeTag('tr');
				
				$time = strtotime($this->date . " " . $i . ":30:00");
				echo CHtml::openTag('tr',array('style'=>'height:50%'));
					echo CHtml::openTag('td');
					echo CHtml::openTag('table',array('style'=>'padding:0;border-spacing:0;margin:0'));

					echo CHtml::openTag('tr',array('id'=>$time,'style'=>'height:50%'));
					echo CHtml::closeTag('tr');

					echo CHtml::closeTag('table');
					echo CHtml::closeTag('td');
				echo CHtml::closeTag('tr');
			echo CHtml::closeTag('table');
			echo CHtml::closeTag('td');
			echo CHtml::closeTag('tr');
		}

		echo CHtml::closeTag('table');
		echo CHtml::closeTag('div');
	}

	private static function get24hourFormattedHour($hour) {
		
		$meridian = "";		
		
		if($hour > 11){
			$meridian = self::$PM;

				if($hour == 12)
					return $hour . $meridian;
				else
					return ($hour % 12) . $meridian; 

		}else {
			$meridian = self::$AM;
				if($hour == 0)
					return 12 . $meridian;
				else
					return $hour . $meridian; 
		}



	}

	private function renderTodayControls($date) {
		echo CHtml::openTag('div',array('class'=>'calendarHeaderInfo'));

		echo CHtml::openTag('table');//,array('class'=>'calendarHeaderInfo'));
		echo CHtml::openTag('tr');

			echo CHtml::openTag('td');
				echo CHtml::button('<',array('class'=>'controlButtons',
						'submit'=>array('calendar/previousday','timestamp'=>$this->timestamp),
						 ));
			echo CHtml::closeTag('td');

			echo CHtml::openTag('td');
				echo CHtml::button('>',array('class'=>'controlButtons',	
						'submit'=>array('calendar/nextday','timestamp'=>$this->timestamp),
						));
			echo CHtml::closeTag('td');

			echo CHtml::openTag('td', array('id'=>'displayheaderinfo'));
				echo $date;
			echo CHtml::closeTag('td');

			
		echo CHtml::closeTag('tr');			
		echo CHtml::closeTag('table');

		echo CHtml::closeTag('div');
	}

	
	
}
