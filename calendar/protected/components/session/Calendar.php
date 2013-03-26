<?php

class Calendar {

	private $calendarId;

	private $calendarName;

	private $calendarTimezone;

	private $calendarColor;
	
	private $events;

	public function __construct(){
		$events = array();
	}

	public function setCalendarId($calendarId){
		$this->calendarId = $calendarId;
	}

	public function getCalendarId(){
		return $this->calendarId;
	}

	public function setCalendarName($calendarName){
		$this->calendarName = $calendarName;
	}

	public function getCalendarName(){
		return $this->calendarName;
	}

	public function setCalendarTimezone($calendarTimezone){
		$this->calendarTimezone = $calendarTimezone;
	}

	public function getCalendarTimezone(){
		$this->calendarTimezone;
	}

	public function setCalendarColor($calendarColor){
		$this->calendarColor = $calendarColor;
	}

	public function getCalendarColor(){
		return $this->calendarColor;
	}

	public function getEvents(){
		return $this->events;
	}

	public function addEvent($event){
		array_push($this->events,$event);
	}

}
