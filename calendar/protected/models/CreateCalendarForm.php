<?php

class CreateCalendarForm extends CFormModel {

	public $calendarName;

	public $calendarDescription;

	public $calendarColor;

	public $timezone;

	public $userId;

	public function rules(){

		return array(
			array('calendarName,timezone,calendarColor','required'),
			//array('calendarColor','validateColor'),
			array('calendarDescription','safe'),
		);
	}

	public function validateColor($attribute,$param){

							Yii::trace('color'.($this->calendarColor == 0),'system.db');

		if($this->calendarColor == 0)
			$this->addError('calendarColor','Please choose a color as default color');

Yii::trace('color'.$this->calendarColor,'system.db');

	}

	public function getTimeZoneArray(){
		return Timezone::getTimezones();
	}

	public function createCalendar(){
		$this->userId = Yii::app()->session['USER_ID'];
		return CreateCalendar::createUserCalendar($this);
	}
}
